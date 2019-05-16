<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LatinSquare;
use App\Subject;
use App\Question;
class SurveyController extends Controller
{
    function begin(Request $data){
        $subject_id = $data['subject_id'];
        $latinSquare = LatinSquare::orderBy('created_at', 'desc')->first();
        if(!$latinSquare || ($latinSquare->first_row_subject_id && $latinSquare->second_row_subject_id))
            $latinSquare = $this->create_square();
        if($latinSquare->first_row_subject_id == null){
            $questions = array_merge(json_decode($latinSquare->first_square),json_decode($latinSquare->second_square));
            $latinSquare->first_row_subject_id = $subject_id;
        }
        elseif($latinSquare->second_row_subject_id == null){
            $questions = array_merge(json_decode($latinSquare->third_square),json_decode($latinSquare->fourth_square));
            $latinSquare->second_row_subject_id = $subject_id;
        }
        $info = new \stdClass();
        $info->questions = $questions;
        $info->subject_id = $subject_id;
        $latinSquare->save();
        return view('questions', compact('info'));
        

    }
    function thanks(){
        return view('thanks');
    }
    function survey(){
        return view('questions');
    }
    function submitAnswer(Request $request){
        try{
            $data = $request->all();
            $data['is_correct'] = 0;
            unset($data['_token']);
            $subject = Subject::find($request->subject_id);
            $subject->questions()->attach($data['subject_id'], $data);
            return "success";
        }
        catch(Exception $e){
            abort(500);
        }
        catch(\Illuminate\Database\QueryException $e){
            abort(500);
        }
    }
    function array_10($array){
        foreach($array as &$val){
            $val = $val + 10;

        }
        return $array;
    }
    private function create_square(){
        $array = [1,2,3,4,5,6,7,8,9,10];
        $isAtom = rand(0,1) == 1;
        $fourthSubSquare = $firstSubSquare = array_rand(array_flip($array),5);
        $thirdSubSquare = $secondSubSquare = array_values(array_diff($array,$firstSubSquare));
        if($isAtom){
            $firstSubSquare = $this->array_10($firstSubSquare);
            $thirdSubSquare = $this->array_10($thirdSubSquare);
        }
        else{
            $secondSubSquare = $this->array_10($secondSubSquare);
            $fourthSubSquare = $this->array_10($fourthSubSquare);
        }

        return LatinSquare::create([
            'first_square' => json_encode($firstSubSquare),
            'second_square'=> json_encode($secondSubSquare),
            'third_square'=> json_encode($thirdSubSquare),
            'fourth_square'=> json_encode($fourthSubSquare),
        ]
        );
    }
}
