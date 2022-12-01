<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(): Response
    {
        return response([], Response::HTTP_NOT_IMPLEMENTED );
    }

    public function create(): Response
    {
        return response()->view('post.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $post = new Post([
            'heading' => $request->get('heading'),
            'content' => $request->get('content'),
        ]);

        $post->user()->associate($user);

        $post->saveOrFail();

        return redirect()->route('user_home', ['user_slug' => $user->vanity_tag]);
    }

    public function show(Post $post): Response
    {
        return response()
            ->view('post.show',
            [
                'content' => $post->content,
                'heading' => $post->heading,
                'published' => sprintf('Created: %s Updated: %s', $post->created_at, $post->updated_at),
            ]
        );
    }

    public function edit(Post $post): Response
    {
        return response([], Response::HTTP_NOT_IMPLEMENTED );
    }

    public function update(Request $request, Post $post)
    {
        return response([], Response::HTTP_NOT_IMPLEMENTED );
    }

    public function destroy(Post $post)
    {
        return response([], Response::HTTP_NOT_IMPLEMENTED );
    }
}
