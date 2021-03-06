<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Shop extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'url' => 'required',
        'genre' => 'required',
        'image' => 'nullable',
        'address' => 'nullable',
        'latitude' => 'nullable',
        'longitube' => 'nullable',
        
        );
      public function user()
    {
        return $this->belongsTo('App\User');
    }
}
