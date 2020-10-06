<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function index()
    {
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Profile $profile)
    {
        // if use logged in  //if user is following else false
        // check if following contains $profile
        $follows = (auth()->user()) ? auth()->user()->following->contains($profile) : false;

        return view('profile.show', compact('profile', 'follows'));
    }

    public function edit(Profile $profile)
    {
        $this->authorize('update', $profile);
        return view('profile.edit', compact('profile'));
    }

    public function update(Profile $profile)
    {
        // ->push()
        $this->authorize('update', $profile);
        $validated = request()->validate([
          'title' => 'required',
          'description' => 'required',
          'url' => 'nullable|url',
          'profile_img' => 'nullable|image'
        ]);

        if (request('profile_img')) {
            $imagePath = request('profile_img')->store('uploads', 'public');
            $validated['profile_img'] = $imagePath;
        }
        $profile->update($validated);
        return redirect('/profile/'.auth()->user()->id);

        /* merge multiple array */
        // array_merge($data,[
        //   'key' => 'value'
        // ])
    }

    public function destroy(Profile $profile)
    {
        //
    }
}
