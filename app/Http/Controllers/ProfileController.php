<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
    }
    public function show(Profile $profile)
    {
        $following = $profile->user->following;
        $follows = auth() ? $following->contains($profile) : false;
        $posts = Post::whereIn('user_id', [...$following->pluck('user_Id'), $profile->id])->with('user')->latest()->paginate(10);
        return view('profile.show',
        compact('profile', 'posts', 'following', 'follows'));
    }

    public function edit(Profile $profile)
    {
        $this->authorize('update', $profile);
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $this->authorize('update', $profile);
        $attributes = $request->validate([
          'username' => 'required',
          'bio' => 'required',
          'url' => 'nullable|url',
          'avatar' => 'nullable|image'
        ]);

        if ($request->avatar) {
            $attributes['avatar'] = $request->file('avatar')->store('uploads');
        }

        $profile->update($attributes);
        return redirect('/profile/'.auth()->user()->id);
    }
}
