<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function posts()
    // {
    //     return $this->hasMany(Post::class,'id');
    // }

    // public function follow()
    // {
    //     $this->increment('followers_count');
    // }
    //
    // public function unFollow()
    // {
    //     $this->decrement('followers_count');
    // }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function getPostCountAttribute()
    {
        return \Cache::remember(
            'count.posts.' . $this->user_id,
            now()->addSeconds(30),
            function () {
                return $this->user->posts->count();
            }
        );
    }

    public function getFollowersCountAttributes()
    {
        return \Cache::remember(
            'count.followers.' . $this->user_id,
            now()->addSeconds(1),
            function () {
                return $this->count();
            }
        );
    }
    public function getFollowingCountAttributes()
    {
        return \Cache::remember(
            'count.following.' . $this->user_id,
            now()->addSeconds(1),
            function () {
                return $this->following->count();
            }
        );
    }
}
