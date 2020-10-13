<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Mail\CreatedUserMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
      parent::boot();

      static::created(function ($user) {
          $user->profile()->create([
          'username' => Str::slug($user->name, '.')
        ]);
          //   \Mail::to($user->email)->send(new CreatedUserMail());
      });
    }

    public function profile()
    {
      return $this->hasOne(Profile::class);
    }

    public function posts()
    {
      return $this->hasMany(Post::class)->latest();
    }
    public function following()
    {
      return $this->belongsToMany(Profile::class)->withTimestamps();
    }
}
