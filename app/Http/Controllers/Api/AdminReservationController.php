<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Reservation;

class AdminReservationController extends Controller
{
    public function index()
    {
        $reservationModel = new Reservation();
        $reservations = $reservationModel->getReservationsAdmin();
        return view("admin.pages.reservations.index", ["reservations" => $reservations]);
    }
    public function destroy($id)
    {
        $reservationModel = new Reservation();
        $reservationModel->deleteReservation($id);
        return redirect()->route("admin.reservations.index")->with("success", "Reservation deleted successfully");
    }

}
