<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends BaseController
{
    public function index() {
        return view("pages.main.author", $this->data);
    }
}
