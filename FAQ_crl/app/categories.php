<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    public $timestamps = false;
    public $fillable = ['title', 'description'];

    public function questions(){
    	return $this->hasMany('App\questions');
    }
}
