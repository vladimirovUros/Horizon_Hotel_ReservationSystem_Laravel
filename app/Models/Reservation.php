<?php

namespace App\Models;

use App\Http\Requests\ReserveRoomRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'price',
        'phone',
        'no_of_persons',
        'check_in',
        'check_out',
        'room_id',
        'user_id',
    ];
    public function room():BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function createReservation($fullName,$price, $phone, $noOfPeople, $checkInDate, $checkOutDate, $roomId, $user_id): void
    {
        $stayDays = (strtotime($checkOutDate) - strtotime($checkInDate)) / 86400;
        $this->room_id = $roomId;
        $this->full_name = $fullName;
        $this->price = $price * $stayDays;
        $this->check_in = $checkInDate;
        $this->check_out = $checkOutDate;
        $this->no_of_people = $noOfPeople;
        $this->phone = $phone;
        $this->user_id = $user_id;
        $this->save();
    }
    public function getReservationsAdmin()
    {
        return Reservation::with("room", "user")->paginate(6);
    }
    public function deleteReservation($id): void
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
    }
}
