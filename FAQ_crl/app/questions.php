<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    public $timestamps = false;
    public $fillable = ['title', 'description', 'categories_id'];

    public function categories(){
    	return $this->belongsTo('App\categories');
    }

    public function people(){
    	return $this->belongsToMany('App\person');
    }

    public function notes(){
    	return $this->belongsToMany('App\note');
    }
}
