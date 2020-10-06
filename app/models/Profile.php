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
}
