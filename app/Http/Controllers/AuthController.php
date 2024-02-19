<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register() {
        return view("auth.register");
    }
    public function handleRegister(RegisterUserRequest $request ) {
        User::query()->create($request->validated());
        return redirect()->route("auth.login")->with("success", "Inscription OK");
        // return redirect()->to("/auth/login")->with("success", "Inscription OK");
    }


    public  function  login() {
        return view("auth.login");
    }

    public function handleLogin(LoginRequest $request) {
        $isLoggedIn = Auth::attempt($request->validated());
        if(!$isLoggedIn) {
            return redirect()->route("auth.login")->with("error", "Identifiants invalide");
        }
            session()->regenerate();
            return  redirect()->route("home")->with("success", "Connexion Ok");
    }

    public function logout() {
        Auth::logout();
        return  redirect()->route("auth.login")->with("success", "Déconnexion Ok");
    }
}
