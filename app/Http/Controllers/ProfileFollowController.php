<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileFollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function store(Profile $profile)
    {
        // toggle - attach/detach
        return auth()->user()->following()->toggle($profile);
        // $profile->follow();
        // return back();
    }

    // public function destroy($id, Profile $profile)
    // {
    //     $temp = $profile->findOrFail($id);
    //     if ($temp->followers_count > 0) {
    //         $profile->unFollow();
    //     }
    //     return back();
    // }
}
