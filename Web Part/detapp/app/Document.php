<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    // Table Name
    protected $table = 'documents';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    // Assigning one to many relationship with registered user for uploaded document
    public function user(){
        return $this->belongsTo('App\User');
    }
}
