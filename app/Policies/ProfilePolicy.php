<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Profile $profile)
    {
        return $user->id == $profile->user_id;
    }
}
