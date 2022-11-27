<?php

namespace App\Http\Controllers;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function home(string $vanity_tag): Response
    {
        $user = User::findOrFailByVanityTag($vanity_tag);
        return \response(view('user/index', ['posts' => $user->posts()->get()]));
    }
}
