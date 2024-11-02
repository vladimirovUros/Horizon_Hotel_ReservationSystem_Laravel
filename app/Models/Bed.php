<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bed extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function rooms():BelongsToMany
    {
        return $this->BelongsToMany(Room::class, "room_beds", "bed_id", "room_id");
    }
    public function getAll()
    {
        return Bed::all();
    }
    public function getAllBedsAdmin()
    {
        return Bed::paginate(6);
    }
    public function storeBedAdmin($name): void
    {
        $bed = new Bed();
        $bed->name = $name;
        $bed->save();
    }
    public function getOne($id): object
    {
        return Bed::find($id);
    }
    public function updateBed($id, $name): void
    {
        $bed = Bed::find($id);
        $bed->name = $name;
        $bed->save();
    }
    public function deleteBed($id): void
    {
        $bed = Bed::find($id);
        $bed->delete();
    }
}
