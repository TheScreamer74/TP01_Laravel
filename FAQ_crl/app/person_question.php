<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person_question extends Model
{
    public $timestamps = false;
    public $fillable = ['questions_id', 'person_id'];
}
