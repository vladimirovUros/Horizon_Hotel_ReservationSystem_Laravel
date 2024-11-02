<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
    ];

    public function rooms():BelongsToMany
    {
        return $this->BelongsToMany(Room::class, "room_services", "service_id", "room_id");
    }
    public function getCervices(): object
    {
        return Service::all();
    }
    public function getCervicesAdmin(): object
    {
        return Service::paginate(6);
    }
    public function storeServiceAdmin($name, $path): void
    {
        $service = new Service();
        $service->name = $name;
        $service->path = $path;
        $service->save();
    }
    public function getOne($id): object
    {
        return Service::find($id);
    }
    public function updateService($id, $name, $path): void
    {
        $service = Service::find($id);
        $service->name = $name;
        if($path != null){
            $service->path = $path;
        }
        $service->save();
    }
    public function deleteService($id): void
    {
        $service = Service::find($id);
        $service->delete();
    }
}
