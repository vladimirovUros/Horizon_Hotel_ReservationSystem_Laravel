<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends BaseController
{
    public function index()
    {
        $serviceModel = new Service();
        $services = $serviceModel->getCervicesAdmin();
        return view("admin.pages.services.index", ["services" => $services]);
    }
    public function create()
    {
        return view("admin.pages.services.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|regex:/^[A-Z][a-zA-Z\s]{2,50}$/",
            "icon" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
        $serviceModel = new Service();
        $name = $request->input("name");
        $path = $request->file("icon");
        try {
            $icon_name = time() . '.' . $path->getClientOriginalExtension();
            $path->move(public_path('assets/img/services'), $icon_name);
            $path = $icon_name;
            $serviceModel->storeServiceAdmin($name, $path);
            return redirect()->route("admin.services.index")->with("success", "Service created successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.services.create")->with("error", "An error occurred. Please try again later.");
        }
    }
    public function show($id)
    {
        return view("admin.pages.services.show");
    }
    public function edit($id)
    {
        $serviceModel = new Service();
        $service = $serviceModel->getOne($id);
        return view("admin.pages.services.edit", ["service" => $service]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|regex:/^[A-Z][a-zA-Z\s]{2,50}$/",
            "icon" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
        $serviceModel = new Service();
        $name = $request->input("name");
        $path = $request->file("icon");
        try {
            if($path != null){
                $icon_name = time() . '.' . $path->getClientOriginalExtension();
                $path->move(public_path('assets/img/services'), $icon_name);
                $path = $icon_name;
            }
            $serviceModel->updateService($id, $name, $path);
            return redirect()->route("admin.services.index")->with("success", "Service updated successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.services.edit", ["id" => $id])->with("error", "An error occurred. Please try again later.");
        }
    }
    public function destroy($id)
    {
        $serviceModel = new Service();
        $service = $serviceModel->find($id);
        if($service->rooms->count() > 0){
            return redirect()->route("admin.services.index")->with("error", "Service cannot be deleted as it is associated with a room.");
        }
        $serviceModel = new Service();
        $serviceModel->deleteService($id);
        return redirect()->route("admin.services.index")->with("success", "Service deleted successfully");
    }
}
