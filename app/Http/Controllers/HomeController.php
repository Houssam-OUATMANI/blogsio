<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $name = "John";
        return view("welcome", ["name" => $name] );
    }
}
