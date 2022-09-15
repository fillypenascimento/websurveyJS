<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subject;



class StartController extends Controller
{
    
    function createUser(Request $data){
        $ref = base64_decode($data->ref);
        if($ref != 'unb' &&  $ref != 'testing' && $ref != 'unb-ed' && $ref != 'node' && $ref != 'workplace' && $ref != 'reddit' && $ref != 'community'){
            error_log($ref);
            error_log($data->ref);
            error_log('controller');
            return view('error');
        }
        return view('create-user', compact('ref'));
    }
    function saveUser(Request $data){
        $data->validate([
            'degree' => 'required',
            'age' => 'required'
            
        ]);
        $data['ip'] = $data->ip();
        if($data['ref'] == 'reddit' || $data['ref'] == 'community'){
            $subjects = Subject::where('ip', $data['ip']);
            if($subjects->count())
                return view('rejected');
        }
        try{
            Subject::create($data->all());
            error_log('subject_create');
        }
        catch(\Illuminate\Database\QueryException $e){
            error_log('subject_rejected');
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
