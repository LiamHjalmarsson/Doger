<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [AuthController::class, "create"]);

Route::resource("auth", AuthController::class)->only("create", "store", "destroy");

Route::resource("user", UserController::class);
Route::put('user/{user}/avatar', [UserController::class, 'avatarUpdate'])->name('user.avatarUpdate');

Route::post("/user/{user:username}/follow", [FollowController::class, "store"]);
Route::post("/user/{user:username}/unfollow", [FollowController::class, "destroy"]);
