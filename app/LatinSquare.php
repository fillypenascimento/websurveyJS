<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatinSquare extends Model
{
    protected $fillable = [
        'first_square','second_square','third_square','fourth_square',
        'first_row_subject_id', 'second_row_subject_id'
    ];
}
