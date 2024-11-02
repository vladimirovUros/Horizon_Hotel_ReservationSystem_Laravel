<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class AdminSocialController extends Controller
{
    public function index()
    {
        $socialModel = new Social();
        $socials = $socialModel->getSocialsAdmin();
        return view("admin.pages.socials.index", ["socials" => $socials]);
    }
    public function create()
    {
        return view("admin.pages.socials.create");
    }
    public function store(Request $request)
    {
        $request->validate([
//            "icon" => "required|regex:/^[A-Z][a-zA-Z\s]{2,50}$/",
            'icon' => ['required', 'regex:/^(fa\sfa-[a-z\-]+)$/'],
            "link" => "required|url",
        ]);
        $socialModel = new Social();
        $icon = $request->input("icon");
        $link = $request->input("link");
        try {
            $socialModel->storeSocialAdmin($icon, $link);
            return redirect()->route("admin.socials.index")->with("success", "Social created successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.socials.create")->with("error", "An error occurred. Please try again later.");
        }
    }
    public function show($id)
    {
        return view("admin.pages.socials.show");
    }
    public function edit($id)
    {
        $socialModel = new Social();
        $social = $socialModel->getOne($id);
        return view("admin.pages.socials.edit", ["social" => $social]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => ['required', 'regex:/^(fa\sfa-[a-z\-]+)$/'],
            "link" => "required|url",
        ]);
        $socialModel = new Social();
        $icon = $request->input("icon");
        $link = $request->input("link");
        try {
            $socialModel->updateSocial($id, $icon, $link);
            return redirect()->route("admin.socials.index")->with("success", "Social updated successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.socials.edit", ["id" => $id])->with("error", "An error occurred. Please try again later.");
        }
    }
    public function destroy($id)
    {
        $socialModel = new Social();
        $socialModel->deleteSocial($id);
        return redirect()->route("admin.socials.index")->with("success", "Social deleted successfully");
    }
}
