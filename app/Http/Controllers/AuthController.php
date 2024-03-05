<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Mail\AuthConfirmation;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register() {
        return view("auth.register");
    }
    public function handleRegister(RegisterUserRequest $request ) {
        User::query()->create($request->validated());
        $email = $request->validated("email");
        $username = $request->validated("username");
        //Mail::to(new AuthConfirmation($email, $username))->send();
        Mail::send(new AuthConfirmation($email, $username));

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


    public function resetPassword() {
        return view('auth.forgot-password');
    }

    public  function forgotPassword(Request $request) {
        $request->validate(['email' => 'required|email']);


        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }


    public  function resetPasswordForm (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    public  function  handleResetPassword(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('auth.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
