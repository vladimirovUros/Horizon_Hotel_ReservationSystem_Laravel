<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reviews;

class AdminReviewsController extends Controller
{
    public function index()
    {
        $reviewModel = new Reviews();
        $reviews = $reviewModel->getAllReviewsAdmin();
        return view("admin.pages.reviews.index", ["reviews" => $reviews]);
    }
}
