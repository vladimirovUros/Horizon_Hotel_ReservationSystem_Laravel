<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
    ];
    public function rooms():HasMany
    {
        return $this->hasMany(Room::class);
    }
    public function getTypes(): object
    {
        return Type::all();
    }
    public function getTypesAdmin(): object{
        return Type::paginate(6);
    }
    public function storeTypeAdmin($name, $capacity): void
    {
        $type = new Type();
        $type->name = $name;
        $type->capacity = $capacity;
        $type->save();
    }
    public function getOne($id): object
    {
        return Type::find($id);
    }
    public function updateType($id, $name, $capacity): void
    {
        $type = Type::find($id);
        $type->name = $name;
        $type->capacity = $capacity;
        $type->save();
    }
    public function deleteType($id): void
    {
        $type = Type::find($id);
//        $type->rooms()->delete();
        $type->delete();
    }
}
