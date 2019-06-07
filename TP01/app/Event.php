<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'description', 'location', 'prince', 'starts_at'];

    protected $dates = ['starts_at'];

    public function isFree(){
        return $this->prince == 0;
    }
}
