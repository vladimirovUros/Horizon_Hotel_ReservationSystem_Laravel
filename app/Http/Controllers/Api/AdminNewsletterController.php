<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;

class AdminNewsletterController extends Controller
{
    public function index()
    {
        $newsletterModel = new Newsletter();
        $newsletters = $newsletterModel->getNewslettersAdmin();
        return view("admin.pages.newsletters.index", ["newsletters" => $newsletters]);
    }
    public function destroy($id)
    {
        $newsletterModel = new Newsletter();
        $newsletterModel->deleteNewsletter($id);
        return redirect()->route("admin.newsletters.index")->with("success", "Newsletter deleted successfully");
    }
}
