<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'url' => 'required',
        'genre' => 'required',
        'latitude' => 'required',
        'longitube' => 'required',
        );
}
