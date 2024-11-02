<?php

namespace App\Models;

use App\Mail\SendMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'message',
    ];
    public function getAll()
    {
        return Message::paginate(6);
    }
    public function storeMessage($full_name, $email, $message_text):void{
        $this->full_name = $full_name;
        $this->email = $email;
        $this->message = $message_text;
//        dd($full_name, $email, $message_text);
        $this->save();
        Mail::to(env("DEFAULT_SENDER_EMAIl"))->send(new SendMail($full_name, $email, $message_text));
    }
    public function deleteMessage($id):void{
        $message = Message::find($id);
        $message->delete();
    }
}
