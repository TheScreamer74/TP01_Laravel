<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    public $timestamps = false;
    public $fillable = ['name', 'desc'];
    
    public function questions(){
    	return $this->belongsToMany('App\questions');
    }
}
