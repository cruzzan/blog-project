<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index(Request $request): Response
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(20)->get();
        return response()->view('home.index', ['posts' => $posts]);
    }

    public function post(Request $request, $user_slug, $post_id): Response
    {
        $user = User::findOrFailByVanityTag($user_slug);
        $post = Post::whereBelongsTo($user)->findOrFail($post_id);

        return response()->view('home.post', ['author' => $user, 'post' => $post]);
    }
}
