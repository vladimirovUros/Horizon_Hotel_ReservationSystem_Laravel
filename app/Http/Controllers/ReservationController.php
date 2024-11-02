<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveRoomRequest;
use App\Models\OccupiedRoom;
use App\Models\Price;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends BaseController
{
    public function checkAvailability(Request $request)
    {
        $request->validate([
            "checkInDate" => "required|date|after_or_equal:today",
            "checkOutDate" => "required|date|after:checkInDate",
        ],
            [
                "checkInDate.required" => "Check in date is required",
                "checkInDate.after_or_equal" => "Check in date can't be in the past",
                "checkOutDate.required" => "Check out date is required",
                "checkOutDate.after" => "Check out date must be after check in date",
            ]
        );
        $roomId = $request->input("roomId");
        $checkInDate = $request->input("checkInDate");
        $checkOutDate = $request->input("checkOutDate");
        $result = Room::checkIfRoomIsReserved($roomId, $checkInDate, $checkOutDate);
        $messages = [];
        if (!$result) {
            $messages["msgSuccess"] = "Room is available for reservations, please reserve it on time";
            if(!$request->session()->has("users")){
                $messages["notice"] = "You must be logged in to reserve a room";
            }
            return response()->json($messages, 200);
        }
        return response()->json(["msgError" => "Room is already reserved for this period. Please choose different dates"], 400);
    }

    public function reserveRoom(ReserveRoomRequest $request)
    {
        $roomId = $request->input("roomId");
        $reservationModel = new Reservation();
        $phone = $request->input("phone");
        $priceForRoom = Price::where("room_id", $roomId)->where('active', 1)->first();
        $price = $priceForRoom->price;
        $fullName = $request->input("fullName");
        $checkInDate = $request->input("checkInDate");
        $checkOutDate = $request->input("checkOutDate");
        $adults = $request->input("adults");
        $children = $request->input("children");
        $noOfPeople = $adults + $children;
        if($noOfPeople > Room::find($roomId)->type->capacity){
            return response()->json(["reservationError" => "Number of people exceeds room capacity"], 400);
        }
        $existingReservation = Room::checkIfRoomIsReserved($roomId, $checkInDate, $checkOutDate);
        if ($existingReservation) {
            return response()->json(["reservationError" => "Room is already reserved for this period. Please choose different dates"], 400);
        }
        $reservationModel->createReservation($fullName,$price, $phone, $noOfPeople, $checkInDate, $checkOutDate, $roomId, $request->session()->get("users")->id);
        $occupiedDates = [];
        $occupiedDates[] = $checkInDate;
        $checkInDate = strtotime($checkInDate);
        $checkOutDate = strtotime($checkOutDate);
        while ($checkInDate < $checkOutDate) {
            $checkInDate = strtotime("+1 day", $checkInDate);
            $occupiedDates[] = date("Y-m-d", $checkInDate);
        }
        foreach ($occupiedDates as $occupiedDate) {
            OccupiedRoom::create(["room_id" => $roomId, "occupied_date" => $occupiedDate]);
        }
        $this->logAction($request, "User reserved a room", session()->get("users")->id);
        return response()->json(["reservationSuccess" => "You have successfully reserved your room."], 201);
    }
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        if (Carbon::parse($reservation->check_in)->subDays(1)->gte(Carbon::now())) {
            $room_id = $reservation->room_id;
            $room_model = new Room();
            $room_model->deleteOccupiedDates($room_id, $reservation->check_in, $reservation->check_out);
            $reservation->delete();
            $this->logAction(request(), "User canceled a room", session()->get("users")->id);
            return redirect()->back()->with("reservation_cancel_success", "You have successfully canceled this reservations");
        } else {
            return redirect()->back()->with("reservation_error", "You are not authorized to cancel this reservations. If you have questions, please contact us.");
        }
    }

}
