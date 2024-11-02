<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'link',
    ];
    public static function getSocials(): object
    {
        return Social::all();
    }
    public function getSocialsAdmin(): object
    {
        return Social::paginate(6);
    }
    public function storeSocialAdmin($icon, $link): void
    {
        $social = new Social();
        $social->icon = $icon;
        $social->link = $link;
        $social->save();
    }
    public function getOne($id): object
    {
        return Social::find($id);
    }
    public function updateSocial($id, $icon, $link): void
    {
        $social = Social::find($id);
        $social->icon = $icon;
        $social->link = $link;
        $social->save();
    }
    public function deleteSocial($id): void
    {
        $social = Social::find($id);
        $social->delete();
    }

}
