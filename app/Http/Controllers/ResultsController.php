<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
class ResultsController extends Controller
{
    public function index(){
        $subjects = Subject::with('questions')->get();
        
        return view('results', compact('subjects'));
    }
}
