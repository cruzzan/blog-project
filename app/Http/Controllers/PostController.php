<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    private ViewFactory $viewFactory;


    public function __construct(ViewFactory $factory)
    {
        $this->viewFactory = $factory;
    }

    public function create(): View
    {
        return $this->viewFactory->make('post.form');
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
}
