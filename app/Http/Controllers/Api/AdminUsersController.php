<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends BaseController
{
    public function index()
    {
        $model = new User();
        $users = $model->getAllUsersAdmin();
        return view("admin.pages.users.index", ["users" => $users]);
    }

    public function create()
    {
        $userModel = new User();
        $users = $userModel->getAllUsersAdmin();
        $roleModel = new Role();
        $roles = $roleModel->getRoles();
        return view("admin.pages.users.create", ["roles" => $roles, "users" => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "full_name" => "required|regex:/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/",
            "username" => "required|regex:/^[a-zA-Z0-9]{3,100}$/|unique:users,username",
            "email" => "required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|unique:users,email",
            "password" => "required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
            "role" => "required|exists:roles,id",
            "profile_image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
        $userModel = new User();
        $full_name = $request->input("full_name");
        $username = $request->input("username");
        $email = $request->input("email");
        $password = $request->input("password");
        $role_id = $request->input("role");
        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image');
            $profile_image_name = time() . '.' . $profile_image->getClientOriginalExtension();
            $profile_image->move(public_path('assets/img/users'), $profile_image_name);
            $profile_image_path = $profile_image_name;
        } else {
            $profile_image_path = 'default.jpg';
        }
        try {
            $userModel->registerUserAdmin($username, $email, $password, $full_name, $role_id, $profile_image_path);
            return redirect()->route("admin.users.index")->with("success", "User created successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.users.create")->with("error", "An error occurred. Please try again later.");
        }

    }

    public function show($id)
    {
        return view("admin.pages.users.show");
    }

    public function edit($id)
    {
        $user = User::with("role")->find($id);
        $roles = Role::all();
        return view("admin.pages.users.edit", ["user" => $user, "roles" => $roles]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "full_name" => "required|regex:/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/",
            "username" => "required|regex:/^[a-zA-Z0-9]{3,100}$/|unique:users,username,$id",
            "email" => "required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|unique:users,email,$id",
            "role" => "required|exists:roles,id",
            "profile_image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
        $userModel = new User();
        $full_name = $request->input("full_name");
        $username = $request->input("username");
        $email = $request->input("email");
        $role_id = $request->input("role");
        $active = $request->input("active") ? 1 : 0;
        $acc_locked = $request->input("acc_locked") ? 1 : 0;
        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image');
            $profile_image_name = time() . '.' . $profile_image->getClientOriginalExtension();
            $profile_image->move(public_path('assets/img/users'), $profile_image_name);
            $profile_image_path = $profile_image_name;
        } else {
            $profile_image_path = 'default.jpg';
        }
        if ($request->has("password")) {
            $password = $request->input("password");
        }
        try {
            $userModel->updateUserAdmin($id, $username, $email, $full_name, $role_id, $profile_image_path, $active, $acc_locked, $password,);
            return redirect()->route("admin.users.index")->with("success", "User updated successfully");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route("admin.users.edit", $id)->with("error", "An error occurred. Please try again later.");
        }
    }
    public function destroy(int $id){
        try{
            $user = User::findOrFail($id);
            $user->deleteRow();
            return redirect()->route("admin.users.index")->with("success", "User deleted successfully");
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return redirect()->route("admin.users.index")->with("error", "An error occurred. Please try again later.");
        }
    }
}
