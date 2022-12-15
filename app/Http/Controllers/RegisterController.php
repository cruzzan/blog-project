<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view()->make('register.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'vanity_tag' => 'alpha_dash|unique:users|max:255',
        ]);

        $user = new User($validated);
        $user->password = Hash::make($user->password);
        $user->save();

        return redirect('login')
            ->with('info-message', 'Congratz, you can now log in with the account you just created!');
    }
}
