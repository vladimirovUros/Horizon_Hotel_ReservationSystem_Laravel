<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateRoomRequest;
use App\Http\Requests\RoomRequest;
use App\Models\Bed;
use App\Models\Image;
use App\Models\Room;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Http\Request;

class AdminRoomsController extends BaseController
{
    public function index()
    {
        $model = new Room();
        $rooms = $model->getAllAdmin();
        $modelType = new Type();
        $types = $modelType->getTypes();
        return view("admin.pages.rooms.index", ["rooms" => $rooms, "types" => $types]);
    }

    public function create()
    {
        $bedsModel = new Bed();
        $beds = $bedsModel->getAll();
        $serviceModel = new Service();
        $service = $serviceModel->getCervices();
        return view("admin.pages.rooms.create", ["types" => Type::all(), "beds" => $beds, "services" => $service]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:rooms,name|max:255|min:3|regex:/^[A-Z][a-zA-Z]*(?:\s[A-Z][a-zA-Z]*)*$/",
            "size" => "required|numeric|min:10|max:1000",
            'description' => 'required|min:10|max:1000|regex:/^[A-Z][a-zA-Z]*($|\s[A-Za-z][a-z]*)/',
            "type_id" => "required|exists:types,id|",
            "main_image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "price" => "required|numeric|min:10|max:1000",
            "room_images" => "required|array|min:1|max:5",
            "beds" => "required|array|min:1|max:5|exists:beds,id",
            "services" => "required|array|min:3|max:10|exists:services,id",
            "quantity_1" => "required",
            "quantity_2" => "required",
            "quantity_3" => "required",
            "quantity_4" => "required",
            "quantity_5" => "required",
        ]);
        $roomModel = new Room();
        $name = $request->input("name");
        $size = $request->input("size");
        $description = $request->input("description");
        $type_id = $request->input("type_id");
        $main_image_path = $request->file("main_image");
        $price = $request->input("price");
        $images = $request->file("room_images");
        $beds = $request->input("beds");
        $services = $request->input("services");
        $quantities = [
            "1" => $request->input("quantity_1"),
            "2" => $request->input("quantity_2"),
            "3" => $request->input("quantity_3"),
            "4" => $request->input("quantity_4"),
            "5" => $request->input("quantity_5"),
        ];
        $bedsForInsert = [];
        foreach ($beds as $bed) {
            $bedsForInsert[] = ["bed_id" => $bed, "quantity" => $quantities[$bed]];
        }
//        dd($main_image_path);
        try {
//            dd($images);
            $room = $roomModel->insertRoom($name, $size, $description, $main_image_path, $type_id);
            foreach ($images as $image) {
                $imageName = time() . "_" . $image->getClientOriginalName();
                $image->move(public_path("assets/img/rooms"), $imageName);
                $room->images()->create(['path' => $imageName, 'room_id' => $room->id]);
            }
            $room->price()->create([
                'price' => $price,
                'date_from' => now(),
                'date_to' => null,
                'active' => 1,
            ]);
            $room->beds()->attach($bedsForInsert);
            $room->services()->attach($services);

            return redirect()->route("admin.rooms.index")->with("success", "Room has been successfully added.");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.rooms.create")->with("error", "An error occurred. Please try again later.");
        }
    }

    public function show($id)
    {
        return view("admin.pages.rooms.show");
    }


    public function edit($id)
    {
        $room = Room::with("type", "beds", "services", "price", "images")->find($id);
        $types = Type::all();
        $bedsModel = new Bed();
        $beds = $bedsModel->getAll();
        $serviceModel = new Service();
        $service = $serviceModel->getCervices();
        return view("admin.pages.rooms.edit", ["room" => $room, "types" => $types, "beds" => $beds, "services" => $service]);
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            "name" => "required|unique:rooms,name,$id|max:255|min:3|regex:/^[A-Z][a-zA-Z]*(?:\s[A-Z][a-zA-Z]*)*$/",
            "size" => "required|numeric|min:10|max:1000",
            'description' => 'required|min:10|max:1000|',
            "type" => "required|exists:types,id|",
            "main_image_path" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "price" => "required|numeric|min:10|max:100000",
            "room_images" => "nullable|array|min:1|max:5",
            "beds" => "required|array|min:1|max:5|exists:beds,id",
            "services" => "required|array|min:3|max:10|exists:services,id",
            "quantity_1" => "required",
            "quantity_2" => "required",
            "quantity_3" => "required",
            "quantity_4" => "required",
            "quantity_5" => "required",
        ]);

        $roomModel = new Room();
//        dd($request->all());
        try {
            $array = [
                "name" => $request->input("name"),
                "size" => $request->input("size"),
                "description" => $request->input("description"),
                "price" => $request->input("price"),
                "type" => $request->input("type"),
                "main_image_path" => $request->file("main_image_path"),
                "room_images" => $request->file("room_images"),
                "beds" => $request->input("beds"),
                "services" => $request->input("services"),
            ];
            $roomModel->updateRoom($id, $array);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return redirect()->route("admin.rooms.edit", ["room" => $id])->with("error", "An error occurred. Please try again later.");

        }
        return redirect()->route("admin.rooms.index")->with("success", "Room has been successfully updated.");
    }
    public function destroy($id)
    {
        $roomModel = new Room();
        $room = $roomModel->find($id);
        if($room->reservation->count() > 0){
            return redirect()->route("admin.rooms.index")->with("error", "Room cannot be deleted as it is associated with a reservation.");
        }
        if($room->images->count() > 0){
            return redirect()->route("admin.rooms.index")->with("error", "Room cannot be deleted as it is associated with a image.");
        }
        if($room->services->count() > 0){
            return redirect()->route("admin.rooms.index")->with("error", "Room cannot be deleted as it is associated with a service.");
        }
        if($room->price->count() > 0){
            return redirect()->route("admin.rooms.index")->with("error", "Room cannot be deleted as it is associated with a price.");
        }
        if ($room->occupiedDates->count() > 0){
            return redirect()->route("admin.rooms.index")->with("error", "Room cannot be deleted as it is associated with a occupied date.");
        }
        if ($room->reviews->count() > 0){
            return redirect()->route("admin.rooms.index")->with("error", "Room cannot be deleted as it is associated with a review.");
        }
        try {
            $room = Room::findOrFail($id);
            $room->deleteRow();

            return redirect()->route("admin.rooms.index")->with("success", "Room has been successfully deleted.");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.rooms.index")->with("error", "Failed to delete room.");
        }
    }
}
