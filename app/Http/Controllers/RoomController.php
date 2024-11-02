<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveRoomRequest;
use App\Models\Bed;
use App\Models\Menu;
use App\Models\Reviews;
use App\Models\Room;
use App\Models\Service;
use App\Models\Social;
use App\Models\Type;
use Illuminate\Http\Request;

class RoomController extends BaseController
{
//    const ROOMS_PER_PAGE = 6;
    public function index(Request $request)
    {
        $roomModel = new Room();
        $rooms = $roomModel->getAll();

        $serviceModel = new Service();
        $services = $serviceModel->getCervices();

        $bedsModel = new Bed();
        $beds = $bedsModel->getAll();

        $typesModel = new Type();
        $types = $typesModel->getTypes();

        $this->data["rooms"] = $rooms["rooms"];
        return view("pages.rooms.room", ["rooms" => $rooms["rooms"], "countRooms" => $rooms["countRooms"], "services" => $services, "beds" => $beds, "types" => $types], $this->data);
    }
    public function show($id)
    {
        $roomModel = new Room();
        $room = $roomModel->getOne($id);
        if ($room == null) {
            return redirect()->route("rooms");
        }
        $reviewsModel = new Reviews();
        $reviews = $reviewsModel->getAllReviewsForRoom($room->id);
        $averageRating = $reviews->avg("rating");
        return view("pages.rooms.single-room", ["room" => $room, "reviews" => $reviews, "averageRating" => $averageRating], $this->data);
    }


    public function filters(Request $request)
    {
        $model = new Room();
        return $model->getSortFilterSearchAndPagination($request);
    }

    public function edit($id)
    {
        $roomModel = new Room();
        $room = $roomModel->getOne($id);
        return view("admin.pages.rooms.edit", ["room" => $room]);
    }
    public function update(int $id, Request $request)
        //Custom request
        //metoda updateRow u modelu
    {
        $roomModel = new Room();
        $room = $roomModel->getOne($id);
        $room->name = $request->input("name");
        $room->description = $request->input("description");
        $room->price_id = $request->input("price");
        $room->type_id = $request->input("type");
        $room->save();
        return redirect()->route("admin.rooms");
    }
}
