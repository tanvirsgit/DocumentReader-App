<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    protected $fillable = ['provider_id', 'provider'];

    // A user has many logins using different social providers
    public function user(){
        return $this->belongsTo('App\User');
    }
}
