<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rating'
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

    /**
    * Get all posts this of this user
    */
    public function post()
    {
        return $this->hasMany('App\Post');
    }

    /**
    * Get all posts this of this user
    */
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }


    /**
    * Get all follows this of this user
    */
    public function follow()
    {
        return $this->hasMany('App\Follow');
    }

    /**
    * Get all favorites this of this user
    */
    public function favorite()
    {
        return $this->hasMany('App\Favorite');
    }
}
