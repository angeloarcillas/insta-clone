<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Profile $profile)
    {
        $follows = auth() ? $profile->user->following->contains($profile) : false;
        return view('profile.show', compact('profile', 'follows'));
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
