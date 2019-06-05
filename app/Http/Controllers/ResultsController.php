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
    public function createCsv(){
        $subjects = Subject::with('questions')->get();
        $fp = fopen('results.csv', 'w');
        $linhas = [[]];
        $counter = 0;
        foreach ($subjects as $subject) {
            foreach($subject->questions as $question){
                if($subject->square()){ // checking if user at least started to answer
                    $linhas[$counter][0] = $subject->square->id;
                    $linhas[$counter][1] = $subject->id;
                    $linhas[$counter][2] = $question->id;
                    $linhas[$counter][3] = $question->isAtom ? "YES" : "NO";
                    $linhas[$counter][4] = $question->pivot->subject_time;
                    $correct = strtolower($question->answer) == strtolower($question->pivot->subject_answer) ? "CORRECT" : "WRONG";
                    $linhas[$counter][5] = $correct;
                    $counter = $counter + 1;
                }
            }
        }
        foreach($linhas as $linha){
            fputcsv($fp, $linha);
        }
        fclose($fp);

        return response()->download("results.csv")->deleteFileAfterSend();


    }
}
