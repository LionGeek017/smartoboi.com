<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function getQuestion(Request $request) {
        $questions = Question::select('questions.id', 'questions.name')
            ->with('answers')
            ->inRandomOrder()
            ->limit(16)
            ->get();
            
        if($questions) {
            $reply = ['response' => 'success', 'data' => $questions]; 
        } else {
            $reply = ['error']; 
        }    
        return response()->json($reply, 200);   
    }
}


