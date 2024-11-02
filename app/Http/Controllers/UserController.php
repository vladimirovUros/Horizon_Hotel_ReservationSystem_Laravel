<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfilePictureRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends BaseController
{
    public function index()
    {
        $user = User::find(session()->get("users")->id);
        return view("pages.users.profile", ["user" => $user, "profile_image" => $user->profile_image], $this->data);
    }

    public function update(UpdateUserRequest $request)
    {
        try {
            $user = new User();
            $user_id = $request->session()->get("users")->id;
            $username = $request->input("username_user");
            $email = $request->input("email_user");
            $fullname = $request->input("username_fullname");
            $password = $request->input("username_password");

            $user->updateUser($user_id, $username, $email, $fullname, $password);
            $updatedUser = User::find($user_id);
            $request->session()->put("users", $updatedUser);
            return \response()->json(["msgSuccess" => "You have successfully updated your profile"], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "An error occurred. Please try again later.");
        }
    }

    public function uploadProfilePicture(UpdateProfilePictureRequest $request)
    {
        try {
            $user_id = $request->session()->get('users')->id;
            $this->updatePicture($user_id, $request->file('profile_image'));
            return redirect()->route('profile');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating picture');
        }
    }

    public function updatePicture($user_id, $image)
    {
        $user = User::find($user_id);
        $image_name = $this->resizeAndUploadImage($image, 150, 150);
        if ($user->profile_image != 'default.jpg') {
            unlink(public_path('assets/img/users/' . $user->profile_image));
        }
        $user->profile_image = $image_name;
        $user->save();
        session()->get('users')->profile_image = $image_name;
    }

    public function resizeAndUploadImage($image, int $width, int $height): string
    {
        $tmpPath = $image->getPathname();
        $type = $image->getMimeType();
        $extension = $image->getClientOriginalExtension();
        list($imgWidth, $imgHeight) = getimagesize($tmpPath);
        if ($type == "image/jpeg") {
            $originalImage = imagecreatefromjpeg($tmpPath);
        } elseif ($type == "image/png") {
            $originalImage = imagecreatefrompng($tmpPath);
            imagesavealpha($originalImage, true);
        }
        $imageName = time() . '.' . $extension;
        $resizeImagePath = public_path("assets/img/users/") . $imageName;

        $resizedImage = imagecreatetruecolor($width, $height);
        if ($type == "image/png") {
            $transparentColor = imagecolorallocatealpha($resizedImage, 0, 0, 0, 127);
            imagefill($resizedImage, 0, 0, $transparentColor);
            imagesavealpha($resizedImage, true);
        }
        imagecopyresampled($resizedImage, $originalImage, 0, 0, 0, 0, $width, $height, $imgWidth, $imgHeight);
        move_uploaded_file($tmpPath, $resizeImagePath);
        if ($type == 'image/jpeg') {
            imagejpeg($resizedImage, $resizeImagePath);
        }
        if ($type == 'image/png') {
            imagepng($resizedImage, $resizeImagePath);
        }
        imagedestroy($originalImage);
        imagedestroy($resizedImage);
        return $imageName;
    }
}
