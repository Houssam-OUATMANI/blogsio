<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::get('/', [HomeController::class, "index"])->name("home");


// Route::get("/auth/register", [AuthController::class, "register"])->name("auth.register");
// Route::post("/auth/register", [AuthController::class, "handleRegister"]);
// Route::get("/auth/login", [AuthController::class, "login"])->name("auth.login");
// Route::post("/auth/login", [AuthController::class, "handleLogin"]);
// Route::delete("/auth/logout", [AuthController::class, "logout"])->name("auth.logout");

// TODO FIX url prefix

Route::controller(AuthController::class)->prefix("/auth")->group(function () {
    Route::get("/register",  "register")->name("auth.register")->middleware("guest");
    Route::post("/register",  "handleRegister")->middleware("guest");
    Route::get("/login","login")->name("auth.login")->middleware("guest");
    Route::post("/login", "handleLogin")->middleware("guest");
    Route::delete("/logout",  "logout")->name("auth.logout")->middleware("auth");
    Route::get("/forgot-password", "resetPassword")->middleware("guest")->name("password.request");
    Route::post("/forgot-password", "forgotPassword")->middleware("guest");
    Route::get('/reset-password/{token}', "resetPasswordForm")->middleware('guest')->name('password.reset');
    Route::post('/reset-password', "handleResetPassword")->middleware('guest')->name('password.update');

});


Route::controller(PostController::class)->group( function (){
    Route::get("/posts/create", "create")->name("post.create")->middleware("auth");
    Route::post("/posts/create", "store")->middleware("auth");
    Route::get("/posts/{post}", "show")->name("post.show");
    Route::get("/posts/{post}/edit", "edit")->name("post.edit")->middleware("auth");
    Route::post("/posts/{post}/update", "update")->name("post.update")->middleware("auth");
    Route::delete("/posts/{post}/destroy", "destroy")->name("post.destroy")->middleware("auth");

});
