<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

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

    public function listings() {
        return $this->hasMany('App\Listing');
    }

    public function todos() {
        return $this->hasMany('App\Todo');
    }

    public function messagesGet() {
        return $this->hasMany('App\Message', 'user_id_to', 'id');
    }

    public function messagesSend() {
        return $this->hasMany('App\Message', 'user_id_from', 'id');
    }
}