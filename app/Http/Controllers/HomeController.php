<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        // $users = User::query()->with("posts")->get();
        $posts = Post::query()
            ->with("user")
            ->orderBy("created_at", "DESC")
            ->paginate(2)
        ;

        return view("welcome", ["posts" => $posts]);
    }
}
