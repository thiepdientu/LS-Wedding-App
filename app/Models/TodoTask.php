<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoTask extends Model
{
    protected $fillable = [ 
        'name' ,  
        'describe' ,  
        'done',
        'date',          
        'time',           
        'email'
    ];
}
