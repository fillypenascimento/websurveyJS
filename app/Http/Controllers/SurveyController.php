<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LatinSquare;
use App\Subject;
use App\Question;
use Error;

class SurveyController extends Controller
{
    function begin(Request $data){
        // associates the survey to a subject that has just been created
        $subject_id = $data['subject_id'];

        // fetches all the latin squares in the database, ordered by creation timestamp in descending order
        // then gets the first in the list, i.e., the most recent square
        $latinSquare = LatinSquare::orderBy('created_at', 'desc')->first();
        
        // if(!$latinSquare->check_first_subject()){
        //     $latinSquare->first_row_subject_id = null;
        // }
        // if(!$latinSquare->check_second_subject()){
        //     $latinSquare->second_row_subject_id = null;
        // }

        // creates new replica if a square does not exist yet (first respondent) or
        // if it already exists and is completely filled (has two subjects associated to it)
        if(!$latinSquare || ($latinSquare->first_row_subject_id && $latinSquare->second_row_subject_id))
            $latinSquare = $this->create_square($latinSquare);

        // if a subject_id associated to a row is null, then it means that no subject has been associated to the respective squares in a replica row
        // so, it builds the questions array for each subject by merging the questions array of each row in a replica, then associated the subject
        // to the replica row (and as a result, to those row squares and questions)
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
            $data['is_correct'] = $this->checkIsCorrect($data['subject_answer'], $data['question_id']);
            unset($data['_token']);
            error_log($data['subject_id']);
            error_log($data['question_id']);
            error_log($data['subject_answer']);
            error_log($data['is_correct']);
            error_log($data['order']);
            error_log($data['has_changed_page']);
            error_log($data['subject_time']);
            $subject = Subject::find($request->subject_id);
            $subject->questions()->attach($data['subject_id'], $data);
            return "success";
        }
        catch(Exception $e){
            error_log('unknown error here');
            abort(500);
        }
        catch(\Illuminate\Database\QueryException $e){
            error_log($e->getMessage());
            error_log('database error here');
            dd($e->getMessage());
            abort(500);
        }
    }

    function checkIsCorrect($answer, $question_id) {
        $subject_answer_clean = strtolower(str_replace(' ', '', $answer));

        $question = Question::where('id', $question_id)->get()->first();
        $correct_answer = $question->answer;

        $correct_answer_clean = strtolower(str_replace(' ', '', $correct_answer));

        $answerIsCorrect = $subject_answer_clean == $correct_answer_clean ? 1 : 0;

        return $answerIsCorrect;
    }

    function array_24($array){
        foreach($array as &$val){
            $val = $val + 24;

        }
        return $array;
    }

    // private function must_build_new_square($square){
    //     return (!$square) || ($square->first_row_subject_id && $square->second_row_subject_id);
    // }

    private function create_square($referenceSquare){
        $first_array = [];
        $second_array = [];

        if(!$referenceSquare || $this->last_square_was_even_square($referenceSquare->first_square)){
            for($i = 1; $i <= 24; $i += 4) {
                array_push($first_array, $i);
                array_push($second_array, $i+2);
            };
        } else {
            for($i = 2; $i <= 24; $i += 4) {
                array_push($first_array, $i);
                array_push($second_array, $i+2);
            };
        };

        $isAtom = rand(0,1) == 1;
        $fourthSubSquare = $firstSubSquare = $first_array;
        $thirdSubSquare = $secondSubSquare = $second_array;
        
        if($isAtom){
            $firstSubSquare = $this->array_24($firstSubSquare);
            $thirdSubSquare = $this->array_24($thirdSubSquare);
        }
        else{
            $secondSubSquare = $this->array_24($secondSubSquare);
            $fourthSubSquare = $this->array_24($fourthSubSquare);
        }

        return LatinSquare::create([
            'first_square' => json_encode($firstSubSquare),
            'second_square'=> json_encode($secondSubSquare),
            'third_square'=> json_encode($thirdSubSquare),
            'fourth_square'=> json_encode($fourthSubSquare),
        ]
        );
    }

    private function last_square_was_even_square($square_questions_array){
        $new_array = json_decode($square_questions_array, TRUE);
        return $new_array[0] % 2 == 0;
    }
}
