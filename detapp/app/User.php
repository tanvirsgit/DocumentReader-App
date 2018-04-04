<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    // Assigning one to many relationship with user for uploaded document
    public function documents(){
        return $this->hasMany('App\Document');
    }

    // Assigning one to many relationship with user for fed IDs
    public function socialProvider(){
        return $this->hasMany('App\SocialProvider');
    }
}
