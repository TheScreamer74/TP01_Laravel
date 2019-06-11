<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'description', 'location', 'prince', 'starts_at'];

    protected $casts = [
      'starts_at' => 'datetime',
        'prince' => 'float'
    ];

    public function isFree(){
        return $this->prince == 0;
    }
}
