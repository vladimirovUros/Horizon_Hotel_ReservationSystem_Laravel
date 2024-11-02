<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccupiedRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'occupied_date',
    ];
    protected $table = 'occupied_rooms';

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function createOccupiedRoom($roomId, $checkInDate)
    {
        $this->room_id = $roomId;
        $this->occupied_date = $checkInDate;
        $this->save();
    }
}
