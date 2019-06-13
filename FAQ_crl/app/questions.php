<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    public $timestamps = false;
    public $fillable = ['title', 'description', 'id_categorie'];

    public function categories(){
    	return $this->belongsTo('App\categories');
    }
}
