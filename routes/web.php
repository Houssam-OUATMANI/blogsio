<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get("/register",  "register")->name("auth.register");
    Route::post("/register",  "handleRegister");
    Route::get("/login","login")->name("auth.login");
    Route::post("/login", "handleLogin");
    Route::delete("/logout",  "logout")->name("auth.logout");
})->prefix("auth");

