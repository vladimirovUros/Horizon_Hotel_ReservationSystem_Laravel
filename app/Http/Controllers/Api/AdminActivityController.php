<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LogActions;

class AdminActivityController extends Controller
{
    public function index()
    {
        $activityModel = new LogActions();
        $activities = $activityModel->getAll();
        return view("admin.pages.activity.index", ["activities" => $activities]);
    }
}
