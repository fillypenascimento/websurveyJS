<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LatinSquare;
class SurveyController extends Controller
{
    function begin(Request $data){
        $subject_id = $data['subject_id'];
        $latinSquare = $this->create_square();
        $latinSquare = LatinSquare::orderBy('created_at', 'desc')->first();
        if(!$latinSquare || ($latinSquare->first_row_subject_id && $latinSquare->second_row_subject_id))
            $latinSquare = $this->create_square();
        if($latinSquare->first_row_subject_id == null){
            dd("Preenchendo no primeiro row do quadrado ".$latinSquare->id. "c om ".$subject_id );
            $latinSquare->first_row_subject_id = $subject_id;
        }
        elseif($latinSquare->second_row_subject_id == null){
            dd("Preenchendo no segundo row do quadrado ".$latinSquare->id." com ".$subject_id );
            $latinSquare->first_row_subject_id = $subject_id;
        }
        

    }
    function survey(){
        return view('questions');
    }
    function submitAnswer(Request $request){
        return "oi foi";
    }
    function array_10($array){
        foreach($array as &$val){
            $val = $val + 10;

        }
        return $array;
    }
    private function create_square(){
        $array = [0,1,2,3,4,5,6,7,8,9];
        $isAtom = rand(0,1) == 1;
        $fourthColumn = $firstColumn = array_rand(array_flip($array),5);
        $thirdColumn = $secondColumn = array_diff($array,$firstColumn);
        
        if($isAtom){
            $firstColumn = $this->array_10($firstColumn);
            $thirdColumn = $this->array_10($thirdColumn);
        }
        else{
            $secondColumn = $this->array_10($secondColumn);
            $fourthColumn = $this->array_10($fourthColumn);
        }

        return LatinSquare::create([
            'first_square' => '{1,2,3,4,5}',
            'second_square'=> '{11,12,13,14,15}',
            'third_square'=> '{6,7,8,9,10}',
            'fourth_square'=> '{16,17,18,19,20}'
        ]
        );
    }
}
