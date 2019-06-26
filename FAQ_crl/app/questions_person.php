<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions_person extends Model
{
    public $timestamps = false;
    public $fillable = ['question_id', 'person_id'];
}
