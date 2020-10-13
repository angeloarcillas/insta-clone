<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileFollowController extends Controller
{
    public function store(Profile $profile)
    {
        return auth()->user()->following()->toggle($profile);
    }
}
