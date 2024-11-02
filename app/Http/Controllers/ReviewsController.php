<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertCommentRequest;
use App\Http\Requests\ReviewRequest;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewsController extends BaseController
{
    public function store(InsertCommentRequest $request)
    {
        $userId = session()->get("users")->id;
        $roomId = $request->input("room_id");
        $comment = new Reviews();
        $array = [
            "comment" => $request->input("comment"),
            "rating" => $request->input("rating"),
            "room_id" => $request->input("room_id"),
            "user_id" => session()->get("users")->id,
        ];
        $user = User::find($userId);
        if (!$comment->insertComment($array)) {
            return response()->json(["msgError" => "You have already commented this room"], 400);
        }
        return response()->json(["msgSuccess" => "You have successfully commented this room", "user" => $user, "reviewID" => $comment], 201);
    }

    public function destroy($id, Request $request)
    {
        $reviewModel = new Reviews();
        try {
            $review = $reviewModel->deleteComment($id);
            if ($review) {
                return response()->json(["msgSuccess" => "You have successfully deleted this comment"], 200);
            } else {
                return response()->json(["msgError" => "You are not authorized to delete this comment"], 400);
            }
        } catch (\Exception $e) {
            return response()->json(["msgError" => "You are not authorized to delete this comment"], 400);
        }
    }
    public function update(ReviewRequest $request, $id)
    {
        $reviewModel = new Reviews();
        $result = $reviewModel->updateComment($request->input("comment"), $id);
        return response()->json(["msgSuccess" => "You have successfully updated this comment"], 200);
    }
}
