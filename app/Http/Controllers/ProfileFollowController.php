<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileFollowController extends Controller
{
    public function store(Profile $profile)
    {
        return $profile->user->following->toggle($profile);
    }
}
