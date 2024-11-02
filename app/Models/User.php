<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccVerification;
use Illuminate\Testing\Fluent\Concerns\Has;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'full_name',
        'email',
        'active',
        'acc_locked',
        'profile_image',
        'role_id',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
    ];
    public function role():BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function reviews():HasMany
    {
        return $this->hasMany(Reviews::class);
    }
    public function reservation():HasMany
    {
        return $this->hasMany(Reservation::class);
    }
    public function registerUser($username, $email, $password, $fullname):int{
        $this->username = $username;
        $this->email = $email;
        $this->password = md5($password);
        $this->full_name = $fullname;
        $this->role_id = 2;
        $this->active = 0;
        $this->acc_locked = 0;
        $this->profile_image = "default.jpg";
        $token = bin2hex(random_bytes(32));
        while(User::where('token', $token)->exists()){
            $token = bin2hex(random_bytes(32));
        }
        $this->token = $token;
        $this->save();
        Mail::to($email)->send(new AccVerification($token));
        return $this->id;
    }
    public function activate($token){
        $user = User::where('token', $token)->first();
        if($user){
            $user->token = null;
            $user->active = 1;
            $user->save();
            return true;
        }
        return false;
    }
    public function login($email, $password, $request):bool|int{
        $user = User::where("email", $email)->first();
        if($user){
            if($user->acc_locked == 1){
                return "Your account is locked. Please contact the administrator.";
            }
            if($user->active == 0){
                return "Your account is not activated. Please check your email for activation link.";
            }
            if($user->password == md5($password)){
                $request->session()->put("users", $user);
//                dd($user->id);
                return $user->id;
            }
            return false;
        }
        return false;
    }
    public function updateUser($user_id, $username, $email, $fullname, $password){
        $user = User::find($user_id);
        $user->username = $username;
        $user->email = $email;
        $user->full_name = $fullname;
        if(!empty($password)){
            $hashed_password = md5($password);
            if ($hashed_password === $user->password) {
                return response()->json(["msgError" => "New password must be different from the old one."], 422);
            }
            $user->password = $hashed_password;
        }
        $user->save();
    }
    public function getAllUsersAdmin(){
        return User::with("role", "reservation", "reviews")->paginate(6);
    }
    public function registerUserAdmin($username, $email, $password, $full_name, $role_id, $profile_image){
        $this->username = $username;
        $this->email = $email;
        $this->password = md5($password);
        $this->full_name = $full_name;
        $this->role_id = $role_id;
        $this->active = 1;
        $this->acc_locked = 0;
        $this->profile_image = $profile_image;
        $this->save();
    }
    public function updateUserAdmin($user_id, $username, $email, $full_name, $role_id, $profile_image, $active, $acc_locked, $password = null){
        $user = User::find($user_id);
        $user->username = $username;
        $user->email = $email;
        $user->full_name = $full_name;
        $user->role_id = $role_id;
        $user->profile_image = $profile_image;
        $user->active = $active;
        $user->acc_locked = $acc_locked;
        if($password){
            $user->password = md5($password);
        }
        $user->save();
    }
    public function deleteRow(){
        $this->delete();
        $this->reservation()->delete();
        $this->reviews()->delete();
    }
}
