<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = [
        'rating',
        'comment',
        'room_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function child(): HasMany
    {
        return $this->hasMany(Reviews::class, 'parent_id');
    }

    public function insertComment($array): bool
    {
        $existingComment = Reviews::where("user_id", $array["user_id"])->where("room_id", $array["room_id"])->first();
        if ($existingComment) {
            return false;
        }
        $this->rating = $array["rating"];
        $this->comment = $array["comment"];
        $this->room_id = $array["room_id"];
        $this->user_id = $array["user_id"];
        $this->created_at = date("Y-m-d");
        $this->save();
        $lastInsertedId = $this->id;
        return $lastInsertedId;
    }

    public function getAllReviewsForRoom($id): object
    {
        return Reviews::with("user")->where("room_id", $id)->get();
    }

    public function deleteComment($id): \Illuminate\Http\JsonResponse
    {
        $comment = Reviews::find($id);
        if($comment){
            if($comment->user_id == session()->get("users")->id){
                $comment->delete();
                return response()->json(['success' => 'Comment deleted successfully']);
            }
            else{
                return respone()->json(['success' => false]);
            }
        }
        return response()->json(['success' => false]);
    }
    public function updateComment($comment, $id): \Illuminate\Http\JsonResponse
    {
        $review = Reviews::find($id);
        if($comment != $review->comment){
            $review->comment = $comment;
            $review->save();
            return response()->json(['success' => 'Comment updated successfully']);
        }
        return response()->json(['success' => 'Comment updated successfully']);
    }

    public function getAllReviewsAdmin()
    {
        return Reviews::with("user", "room")->paginate(6);
    }
}
