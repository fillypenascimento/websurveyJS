<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
class Subject extends Model
{
    //

    protected $fillable = [
        'name', 'occupation', 'degree', 'age', 'experience', 'subject_id', 'question_id'
    ];

    public function questions(){
        return $this->belongsToMany('App\Question', 'subject_question')->withPivot('subject_time','subject_answer', 'order', 'is_correct');
    }
}
