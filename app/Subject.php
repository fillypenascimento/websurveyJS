<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
class Subject extends Model
{
    //

    protected $fillable = [
        'ip', 'name', 'occupation', 'degree', 'age', 'experience', 'subject_id', 'question_id'
    ];

    public function questions(){
        return $this->belongsToMany('App\Question', 'subject_question')->withPivot('subject_time','has_changed_page', 'subject_answer', 'order', 'is_correct');
    }
}
