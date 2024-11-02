<?php

use App\Http\Controllers\Api\AdminRoomsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminUsersController;
use App\Http\Controllers\Api\AdminServiceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get("/", [App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get("/home", [App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get("/about", [App\Http\Controllers\AboutController::class, "index"])->name("about");
Route::get("/rooms", [App\Http\Controllers\RoomController::class, "index"])->name("rooms");
Route::get("/room/filters", [App\Http\Controllers\RoomController::class, "filters"])->name("rooms.filters");
Route::get("/room/check", [App\Http\Controllers\ReservationController::class, "checkAvailability"])->name("room.check");
Route::post("/room/reserve", [App\Http\Controllers\ReservationController::class, "reserveRoom"])->name("room.reserve");
Route::delete("/room/reserve/{id}", [App\Http\Controllers\ReservationController::class, "destroy"])->name("reservations.destroy")->whereNumber("id");
//Route::get("/room/reserve/{id}/edit", [App\Http\Controllers\ReservationController::class, "edit"])->name("reservations.edit")->whereNumber("id");
Route::get("/contact", [App\Http\Controllers\ContactController::class, "index"])->name("contact");
Route::post("/contact", [App\Http\Controllers\ContactController::class, "store"])->name("contact.store");
Route::get("/author", [App\Http\Controllers\AuthorController::class, "index"])->name("author");
Route::get("/room/{id}", [App\Http\Controllers\RoomController::class, "show"])->name("room.show")->whereNumber
("id");
Route::post("/newsletter", [App\Http\Controllers\NewsletterController::class, "subscribe"])->name("newsletter");
Route::middleware(\App\Http\Middleware\IsGuest::class)->group(function () {
    Route::get("/register", [App\Http\Controllers\AuthController::class, "showRegisterForm"])->name("register");
    Route::post("/register", [App\Http\Controllers\AuthController::class, "register"])->name("register.register");
    Route::get("/activate/{token}", [App\Http\Controllers\AuthController::class, "activate"])->name("activate");
    Route::get("/login", [App\Http\Controllers\AuthController::class, "showLoginForm"])->name("login");
    Route::post("/login", [App\Http\Controllers\AuthController::class, "login"])->name("login.login");
});
Route::middleware(\App\Http\Middleware\IsLoggedIn::class)->group(function () {
    Route::get("/logout", [App\Http\Controllers\AuthController::class, "logout"])->name("logout");
    Route::get("/profile", [App\Http\Controllers\UserController::class, "index"])->name("profile");
    Route::put("/updateProfile", [App\Http\Controllers\UserController::class, "update"])->name("profile.update");
Route::post("/profilePicture", [App\Http\Controllers\UserController::class, "uploadProfilePicture"])->name("profilePicture");
    Route::post("/comment", [App\Http\Controllers\ReviewsController::class, "store"])->name("comment");
    Route::delete("/comment/{id}", [App\Http\Controllers\ReviewsController::class, "destroy"])->name("comment.destroy")->whereNumber("id");
    Route::get("/comment/{id}/edit", [App\Http\Controllers\ReviewsController::class, "edit"])->name("comment.edit")->whereNumber("id");
    Route::put("/comment/{id}", [App\Http\Controllers\ReviewsController::class, "update"])->name("comment.update")->whereNumber("id");
});

Route::middleware(\App\Http\Middleware\IsAdmin::class)->group(function () {
   Route::prefix('/admin')->name('admin.')->group(function () {
       Route::get("/", [App\Http\Controllers\AdminController::class, "admin"])->name("admin");
       Route::resource("rooms", \App\Http\Controllers\Api\AdminRoomsController::class);
       Route::resource("users", \App\Http\Controllers\Api\AdminUsersController::class);
       Route::resource("services", \App\Http\Controllers\Api\AdminServiceController::class);
         Route::resource("types", \App\Http\Controllers\Api\AdminTypeController::class);
         Route::resource("beds", \App\Http\Controllers\Api\AdminBedController::class);
         Route::resource("messages", \App\Http\Controllers\Api\AdminMessageController::class);
            Route::resource("reservations", \App\Http\Controllers\Api\AdminReservationController::class);
            Route::resource("socials", \App\Http\Controllers\Api\AdminSocialController::class);
            Route::resource("reviews", \App\Http\Controllers\Api\AdminReviewsController::class);
            Route::resource("newsletters", \App\Http\Controllers\Api\AdminNewsletterController::class);
            Route::resource("activity", \App\Http\Controllers\Api\AdminActivityController::class);
   });
});


