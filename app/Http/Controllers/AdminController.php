<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    public function admin()
    {
        return view("admin.pages.admin");
    }
}
