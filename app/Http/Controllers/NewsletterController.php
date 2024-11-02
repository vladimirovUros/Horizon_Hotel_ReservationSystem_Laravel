<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends BaseController
{
    public function subscribe(Request $request)
    {
        $newsletter = new Newsletter();
        $request->validate([
            'emailNews' => 'required|email|unique:newsletters,email'
        ]);
        $email = $request->input('emailNews');
        return $newsletter->insert($email);
    }
}
