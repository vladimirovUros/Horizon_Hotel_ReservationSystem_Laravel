<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'date_from',
        'date_to',
        'active',
        'room_id',
    ];
    public function room():BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
