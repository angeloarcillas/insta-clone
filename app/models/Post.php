<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path($append = 'index')
    {
      return route("posts.{$append}", $this->id);
    }

    public function getImagePathAttribute()
    {
      return 'http://127.0.0.1:8000/' . $this->image;
    }
}