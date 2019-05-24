<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatinSquare extends Model
{
    protected $fillable = [
        'first_square','second_square','third_square','fourth_square',
        'first_row_subject_id', 'second_row_subject_id'
    ];

    public function first_subject(){
        return $this->belongsTo('App\Subject', 'first_row_subject_id');
    }
    public function second_subject(){
        return $this->belongsTo('App\Subject', 'second_row_subject_id');
    }
    public function check_first_subject(){
        if($this->first_subject()->exists()){
            return $this->first_subject->questions->count() == 10;
        }
        return false;
    }
    public function check_second_subject(){
        if($this->second_subject()->exists()){
            return $this->second_subject->questions->count() == 10;
        }
        return false;
    }
}
