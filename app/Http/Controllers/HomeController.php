<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        $roomModel = new Room();
        $rooms = $roomModel->getAll();
        $reviews = Reviews::where('rating', 5)
            ->limit(5)
            ->get();
        if (session()->has("users")) {
            $user = User::find(session()->get("users")->id);
        }
        else{
            $user = null;
        }
        return view("pages.main.home", ["rooms" => $rooms["rooms"], "reviews" => $reviews, "user" => $user], $this->data);
    }
}
