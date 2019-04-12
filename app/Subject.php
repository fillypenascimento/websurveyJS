<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    protected $fillable = [
        'name', 'occupation', 'degree', 'age', 'experience'
    ];
}
