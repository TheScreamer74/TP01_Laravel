<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class note_question extends Model
{
    public $timestamps = false;
    public $fillable = ['questions_id', 'note_id'];
}
