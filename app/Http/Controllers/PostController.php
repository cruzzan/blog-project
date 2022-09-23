<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    public function create(): View
    {
        return view()->make('post.form');
    }

    public function store(Request $request)
    {
        $post = new Post([
            'heading' => $request->get('heading'),
            'content' => $request->get('content'),
        ]);

        $post->saveOrFail();
        dd(DB::table('posts')->first());
    }

    public function show(int $id)
    {
        $post = Post::findOrFail($id);
        return view()->make(
            'post.show',
            [
                'content' => $post->content,
                'heading' => $post->heading,
                'published' => sprintf('Created: %s Updated: %s', $post->created_at, $post->updated_at),
            ]
        );
    }
}
