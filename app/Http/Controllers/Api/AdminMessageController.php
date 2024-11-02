<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Message;

class AdminMessageController extends BaseController
{
    public function index()
    {
        $messageModel = new Message();
        $messages = $messageModel->getAll();
        return view("admin.pages.messages.index", ["messages" => $messages]);
    }
    public function show($id)
    {
        return view("admin.pages.messages.show");
    }
    public function destroy($id)
    {
        $messageModel = new Message();
        $messageModel->deleteMessage($id);
        return redirect()->route("admin.messages.index")->with("success", "Message deleted successfully");
    }
}
