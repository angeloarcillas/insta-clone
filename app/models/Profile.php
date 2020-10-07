<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function path($append = 'index')
    {
        return route("profile.{$append}", $this->id);
    }

    public function getAvatarPathAttribute()
    {
        return "http://127.0.0.1:8000/{$this->avatar}";
    }
    public function getPostCountAttribute()
    {
        return Cache::rememberForever(
            "posts.count.{$this->user_id}",
            function () {
                return $this->user->posts->count();
            }
        );
    }

    public function getFollowersCountAttribute()
    {
        return Cache::rememberForever(
            "count.followers.{$this->user_id}",
            function () {
                return $this->followers->count();
            }
        );
    }
    public function getFollowingCountAttribute()
    {
        return Cache::rememberForever(
            "count.following.{$this->user_id}",
            function () {
                return $this->user->following->count();
            }
        );
    }
}
