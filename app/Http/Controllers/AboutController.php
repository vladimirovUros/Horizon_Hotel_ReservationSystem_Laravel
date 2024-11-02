<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends BaseController
{
    public function index()
    {
        return view("pages.main.about", $this->data);
    }
}
