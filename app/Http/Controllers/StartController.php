<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subject;

class StartController extends Controller
{
    
    function createUser(){
        return view('create-user');
    }
    function saveUser(Request $data){
        Subject::create($data->all());
        $subject_id = Subject::orderBy('created_at', 'desc')->first()->id;
        return view('start', compact('subject_id'));

    }

    function subjects(){
        $subjects = Subject::all();
        return view('subjects', compact('subjects'));
    }
}
