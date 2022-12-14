<?php

namespace App\Http\Controllers;

use App\Models\Enums\CapabilityTag;
use App\Models\User;
use App\Models\UserCapabilityTag;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'post');
    }

    public function home(string $vanity_tag): Response
    {
        $user = User::findOrFailByVanityTag($vanity_tag);
        return response()->view('user/home', ['posts' => $user->posts()->get()]);
    }

    public function index(): Response
    {
        $users = User::all();
        return response()->view('user/index', ['users' => $users]);
    }

    public function toggleCapability(Request $request, User $user, $capability): RedirectResponse
    {
        $this->authorize('update', $user);

        $capabilityTag = CapabilityTag::from($capability);
        if ($user->hasCapability($capabilityTag)) {
            $user->capabilityTags()->where('capability', '=', $capabilityTag->value)->delete();
        } else {
            $user->capabilityTags()->save(new UserCapabilityTag(['capability' => $capabilityTag]));
        }
        return redirect()->back();
    }
}
