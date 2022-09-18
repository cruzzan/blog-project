<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\View\View;

class PostController extends Controller
{
    private ViewFactory $viewFactory;


    public function __construct(ViewFactory $factory)
    {
        $this->viewFactory = $factory;
    }

    public function create(): View {

        return $this->viewFactory->make('post.form');
    }


}
