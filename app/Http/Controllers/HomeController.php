<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index(Request $request): Response
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(20)->get();
        return response()->view('home.index', ['posts' => $posts]);
    }
}
