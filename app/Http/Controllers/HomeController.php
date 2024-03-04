<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        // $users = User::query()->with("posts")->get();
        $posts = Post::query()->with("user")->paginate(2);
        return view("welcome", ["posts" => $posts]);
    }
}
