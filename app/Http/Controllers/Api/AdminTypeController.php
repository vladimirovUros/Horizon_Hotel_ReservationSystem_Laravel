<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class AdminTypeController extends BaseController
{
    public function index()
    {
        $typeModel = new Type();
        $types = $typeModel->getTypesAdmin();
        return view("admin.pages.types.index", ["types" => $types]);
    }
    public function create()
    {
        return view("admin.pages.types.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|regex:/^[A-Z][a-zA-Z\s]{2,50}$/",
            "capacity" => "required|numeric|min:1|max:10",
        ]);
        $typeModel = new Type();
        $name = $request->input("name");
        $capacity = $request->input("capacity");
        try {
            $typeModel->storeTypeAdmin($name, $capacity);
            return redirect()->route("admin.types.index")->with("success", "Type created successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.types.create")->with("error", "An error occurred. Please try again later.");
        }
    }
    public function show($id)
    {
        return view("admin.pages.types.show");
    }
    public function edit($id)
    {
        $typeModel = new Type();
        $type = $typeModel->getOne($id);
        return view("admin.pages.types.edit", ["type" => $type]);
    }
    public function update(Request $request, $id)
    {
        //validation for update types
        $request->validate([
            "name" => "required|regex:/^[A-Z][a-zA-Z\s]{2,50}$/",
            "capacity" => "required|numeric|min:1|max:10",
        ]);
        $typeModel = new Type();
        $name = $request->input("name");
        $capacity = $request->input("capacity");
        try {
            $typeModel->updateType($id, $name, $capacity);
            return redirect()->route("admin.types.index")->with("success", "Type updated successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.types.edit", ["id" => $id])->with("error", "An error occurred. Please try again later.");
        }
    }
    public function destroy($id)
    {
        $typeModel = new Type();
        $type = $typeModel::find($id);
        if($type->rooms->count() > 0){
            return redirect()->route("admin.types.index")->with("error", "Type cannot be deleted because it has rooms.");
        }
        try {
            $typeModel->deleteType($id);
            return redirect()->route("admin.types.index")->with("success", "Type deleted successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.types.index")->with("error", "An error occurred. Please try again later.");
        }
    }
}
