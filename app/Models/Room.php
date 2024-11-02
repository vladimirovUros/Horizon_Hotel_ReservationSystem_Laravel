<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        "description",
        "main_image_path",
        "type_id",
    ];

    public function price(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function beds(): BelongsToMany
    {
        return $this->belongsToMany(Bed::class, "room_beds", "room_id", "bed_id");
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, "room_services", "room_id", "service_id");
    }
    public function occupiedDates(): HasMany
    {
        return $this->hasMany(OccupiedRoom::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Reviews::class);
    }

    public function reservation(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function getAll()
    {
        $rooms = Room::with("price", "type", "beds", "images", "services")->paginate(6);
        $countRooms = Room::count();
        return ["rooms" => $rooms, "countRooms" => $countRooms];
    }

    public function getOne($id)
    {
        return Room::with("price", "type", "beds", "images", "services", "reviews", "reservation")->find($id);
    }

    public function getSortFilterSearchAndPagination(Request $request)
    {

        $queryRooms = Room::with("price", "type", "images", "beds", "services");
        if ($request->input("keyword") != null && $request->input("keyword") != "") {
            $queryRooms->where("name", "like", '%' . $request->input("keyword") . '%');
//                ->orWhere("description", "like", '%' . $request->input("keyword") . '%')
        };
        if ($request->input("type") != null && $request->input("type") != "0") {
            $queryRooms->where("type_id", $request->input("type"));
        };
        if ($request->has("beds") && $request->input("beds") != null && count($request->input("beds")) > 0) {

            $beds = $request->input("beds");
            $queryRooms->whereHas("beds", function ($queryRooms) use ($beds) {
                $queryRooms->whereIn("bed_id", $beds);
            });
        };
        if ($request->has("services") && $request->input("services") != null && count($request->input("services")) > 0) {

            $services = $request->input("services");
            $queryRooms->whereHas("services", function ($queryRooms) use ($services) {
                $queryRooms->whereIn("service_id", $services);
            });
        };
        if ($request->input("checkInDate") != null && $request->input("checkOutDate") != null && $request->input("checkInDate") != "" && $request->input("checkOutDate") != "") {

            $checkInDate = $request->input("checkInDate");
            $checkOutDate = $request->input("checkOutDate");
            if ($checkOutDate < $checkInDate) {
                return response()->json(["datesError" => "Check out date must be after check in date"], 400);
            }
            $queryRooms->whereDoesntHave("reservation", function ($queryRooms) use ($checkInDate, $checkOutDate) {
                $queryRooms->where("check_in", "<=", $checkOutDate)->where("check_out", ">=", $checkInDate);
            });
        };
        if ($request->input("adults") != null && $request->input("children") != null) {
            $adults = $request->input("adults");
            $children = $request->input("children");
            $queryRooms->whereHas('type', function ($queryRooms) use ($adults, $children) {
                $queryRooms->where("capacity", ">=", (int)$adults + (int)$children);
            });
        };
        if ($request->input("sort") != null && $request->input("sort") != "0") {
            switch ($request->input("sort")) {
                case "name-asc":
                    $queryRooms->orderBy("name");
                    break;
                case "name-desc":
                    $queryRooms->orderByDesc("name");
                    break;
                case "price-asc":
                    $queryRooms
                        ->join('prices', 'rooms.id', '=', 'prices.room_id')
                        ->orderBy("prices.price");
                    break;
                case "price-desc":
                    $queryRooms
                        ->join('prices', 'rooms.id', '=', 'prices.room_id')
                        ->orderByDesc("prices.price");
                    break;
                case "popular":
                    $queryRooms->withCount("reservation")->orderBy("reservation_count", "desc");
                    break;
            };
        };
        return $queryRooms->orderBy('rooms.id')->paginate(6);
    }
//    public function checkIfRoomIsReserved($roomId, $checkInDate, $checkOutDate)
//    {
//        return Room::whereHas("reservations", function ($query) use ($roomId, $checkInDate, $checkOutDate) {
//            $query->where("room_id", $roomId)->where("check_in", "<=", $checkOutDate)->where("check_out", ">=", $checkInDate);
//        })->first();
//    }
    public static function checkIfRoomIsReserved($roomId, $checkInDate, $checkOutDate)
    {
/*        dd($roomId, $checkInDate, $checkOutDate);*/
        $inDate = OccupiedRoom::where('room_id', $roomId)->where("occupied_date", "=", $checkInDate)->count();
        $outDate = OccupiedRoom::where('room_id', $roomId)->where("occupied_date", "=", $checkOutDate)->count();
        if ($inDate > 0 || $outDate > 0) {
            return true;
        }
    }
    public function getAllAdmin()
    {
        return Room::with("price", "type", "beds", "images", "services", 'reviews', 'reservation')->paginate(6);
    }
    public function insertRoom($name, $size, $description, $main_image_path, $type_id): Room
    {
        $room = new Room();
        $room->name = $name;
        $room->size = $size;
        $room->description = $description;
        $imageName = time() . '.' . $main_image_path->extension();
        $main_image_path->move(public_path('assets/img/rooms'), $imageName);
        $room->main_image_path = $imageName;
        $room->type_id = $type_id;
        $room->save();
        return $room;
    }
    public function updateRoom($id, $array): Room{
        $room = Room::find($id);
        $room->name = $array['name'];
        $room->size = $array['size'];
        $room->description = $array['description'];
        $room->type_id = $array['type'];
        if($array['main_image_path'] != null){
            $imageName = time() . '.' . $array['main_image_path']->extension();
            $array['main_image_path']->move(public_path('assets/img/rooms'), $imageName);
            $room->main_image_path = $imageName;
        }

        $room->price()->update(['price' => $array['price']]);

        if($array['room_images'] != null){
            foreach ($array['room_images'] as $image) {
                $imageName = time() . "_" . $image->getClientOriginalName();
                $image->move(public_path("assets/img/rooms"), $imageName);
                $room->images()->create(['path' => $imageName, 'room_id' => $room->id]);
            }
        }

        $room->beds()->sync($array['beds']);

        $room->services()->sync($array['services']);
        $room->save();
        return $room;
    }

    public function deleteRow(): void
    {
        if ($this->price) {
            $this->price()->delete();
        }
        $this->beds()->detach();
        $this->services()->detach();
        $this->images()->delete();
        $this->reviews()->delete();
        $this->reservation()->delete();
        $this->occupiedDates()->delete();

        // Delete the room
        $this->delete();
    }
    public function deleteOccupiedDates($id, $checkInDate, $checkOutDate): void
    {
        OccupiedRoom::where('room_id', $id)
            ->whereBetween('occupied_date', [$checkInDate, $checkOutDate])
            ->delete();
    }
}
