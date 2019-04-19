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
        $data->validate([
            'email' => 'email',
            'degree' => 'required',
            'age' => 'required',
        ]);
        $data['ip'] = $data->ip();
        try{

            Subject::create($data->all());
        }
        catch(\Illuminate\Database\QueryException $e){
            return view('rejected');
        }
        $subject_id = Subject::orderBy('created_at', 'desc')->first()->id;
        return view('start', compact('subject_id'));

    }

    function subjects(){
        $subjects = Subject::all();
        return view('subjects', compact('subjects'));
    }
}
