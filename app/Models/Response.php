<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [ 
        'username' ,  
        'message' ,  
        'join',          
        'weddingId',           
        'email'
    ];
}
