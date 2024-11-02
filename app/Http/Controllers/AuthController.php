<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends BaseController
{
    public function showRegisterForm()
    {
        return view("pages.auth.register", $this->data);
    }

    public function register(RegistrationRequest $request)
    {
        try{
            $user = new User();
            $username = $request->input("username");
            $email = $request->input("email");
            $password = $request->input("password");
            $fullname = $request->input("fullname");
            $user->registerUser($username, $email, $password, $fullname);
            $this->logAction($request, "User registered successfully", $user->id);
            return redirect()->route("login")->with("success", "You have successfully registered. Please check your email for verification.");
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return redirect()->route("register")->with("error", "An error occurred. Please try again later.");
        }
    }
    public function activate ($token)
    {
        $user = new User();
        if($user->activate($token)){
            return redirect()->route("login")->with("success", "You have successfully activated your account. You can now login.");
        }
        return redirect()->route("login")->with("error", "Invalid activation link.");
    }
    public function showLoginForm()
    {
        return view("pages.auth.login",$this->data);
    }
    public function login(LoginRequest $request)
    {
        try {
            $user = new User();
            $email = $request->input("email");
            $password = $request->input("password");
            $login = $user->login($email, $password, $request);
            if($login){
                $this->logAction($request, "User logged in", $login, );
                return redirect()->route("home");
            }
            return redirect()->route("login")->with("error", "Invalid email or password.");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route("login")->with("error", "An error occurred. Please try again later.");
        }
    }
    public function logout(Request $request)
    {
        $this->logAction($request, "User logged out" , $request->session()->get("users")->id);
        $request->session()->forget("users");
        return redirect()->route("home")->with("success", "You have successfully logged out.");
    }
}
