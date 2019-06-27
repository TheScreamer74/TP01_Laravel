<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    public $timestamps = false;
    public $fillable = ['title', 'desc'];

    public function questions(){
    	return $this->belongsToMany('App\questions');
    }
}
