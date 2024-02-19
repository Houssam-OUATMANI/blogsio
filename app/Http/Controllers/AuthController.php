<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register() {
        return view("auth.register");
    }
    public function handleRegister(RegisterUserRequest $request ) {
        User::query()->create($request->validated());
        return "weqqweqwe";
    }
}
