<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Bed;
use Illuminate\Http\Request;

class AdminBedController extends BaseController
{
    public function index()
    {
        $bedModel = new Bed();
        $beds = $bedModel->getAllBedsAdmin();
        return view("admin.pages.beds.index", ["beds" => $beds]);
    }
    public function create()
    {
        return view("admin.pages.beds.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|regex:/^[A-Z][a-zA-Z\s]{2,50}$/",
        ]);
        $bedModel = new Bed();
        $name = $request->input("name");
        try {
            $bedModel->storeBedAdmin($name);
            return redirect()->route("admin.beds.index")->with("success", "Bed created successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.beds.create")->with("error", "An error occurred. Please try again later.");
        }
    }
    public function show($id)
    {
        return view("admin.pages.beds.show");
    }
    public function edit($id)
    {
        $bedModel = new Bed();
        $bed = $bedModel->getOne($id);
        return view("admin.pages.beds.edit", ["bed" => $bed]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|regex:/^[A-Z][a-zA-Z\s]{2,50}$/",
        ]);
        $bedModel = new Bed();
        $name = $request->input("name");
        try {
            $bedModel->updateBed($id, $name);
            return redirect()->route("admin.beds.index")->with("success", "Bed updated successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.beds.edit", ["bed" => $id])->with("error", "An error occurred. Please try again later.");
        }
    }
    public function destroy($id)
    {
        $bedModel = new Bed();
        $bed = $bedModel->find($id);
        if($bed->rooms->count() > 0) {
            return redirect()->route("admin.beds.index")->with("error", "Bed cannot be deleted as it is associated with a room.");
        }
        try {
            $bedModel->deleteBed($id);
            return redirect()->route("admin.beds.index")->with("success", "Bed deleted successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.beds.index")->with("error", "An error occurred. Please try again later.");
        }
    }
}
