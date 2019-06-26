<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions_notes extends Model
{
    public $timestamps = false;
    public $fillable = ['question_id', 'note_id'];

}