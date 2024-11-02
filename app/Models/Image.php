<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'room_id',
    ];
    public function room():BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
    public function insertImages($path, $room_id): void
    {
        $this->path = $path;
        $this->room_id = $room_id;
        $this->save();
    }
}
