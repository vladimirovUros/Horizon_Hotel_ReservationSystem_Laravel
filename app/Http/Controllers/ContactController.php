<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    public function index()
    {
        return view("pages.main.contact", $this->data);
    }
    public function store(ContactRequest $request)
    {
        try{
            $message = new Message();
            $full_name = $request->input("full_name");
            $email = $request->input("email");
            $message_text = $request->input("message");
            $message->storeMessage($full_name, $email, $message_text);
            return response()->json(["msgSuccess" => "You have successfully sent a message"], 200);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return response()->json(["msgError" => "An error occurred. Please try again later."], 500);
        }
    }
}
