<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller{
    private $questions=[
        [
            "question"=>"what is capital of india",
            "options"=>["delhi","rajkot","pune","ahemdabad"],
            "answer"=>"delhi"
        ],
        [
            "question"=>"what is the largest planet in our solar system",
            "options"=>["earth","mars","jupiter","venus"],
            "answer"=>"jupiter"
        ],
        [
            "question"=>"who wrote 'Romeo and Juliet'",
            "options"=>["mark twain","william shakespeare","j.k. rowling","ernest hemingway"],
            "answer"=>"william shakespeare"
        ],
        [
            "question"=>"what is the chemical symbol for water",
            "options"=>["h2o","co2","o2","na"],
            "answer"=>"h2o"
        ],
        [
            "question"=>"what is the tallest mountain in the world",
            "options"=>["k2","kangchenjunga","mount everest","lhotse"],
            "answer"=>"mount everest"
        ],
        [
            "question"=>"who is known as the father of computers",
            "options"=>["alan turing","charles babbage","john von neumann","bill gates"],
            "answer"=>"charles babbage"
        ],
        [
            "question"=>"what is the hardest natural substance on Earth",
            "options"=>["gold","iron","diamond","platinum"],
            "answer"=>"diamond"
        ],
        [
            "question"=>"what is the smallest country in the world",
            "options"=>["monaco","vatican city","san marino","liechtenstein"],
            "answer"=>"vatican city"
        ],
        [
            "question"=>"who painted the Mona Lisa",
            "options"=>["vincent van gogh","pablo picasso","leonardo da vinci","claude monet"],
            "answer"=>"leonardo da vinci"
        ],
        [
            "question"=>"what is the main ingredient in guacamole",
            "options"=>["tomato","onion","avocado","pepper"],
            "answer"=>"avocado"
        ],
    ];

    public function index(){
        $questions=$this->questions;
        return view('quiz_question',compact('questions'));        
    }

    public function QuizCheck(Request $req){
        $answers = $req->input('answers');
    $score = 0;

    foreach ($this->questions as $index => $question) {
        if (isset($answers[$index]) && $answers[$index] == $question['answer']) {
            $score++;
        }
    }
                return view('quiz_score', compact('score'));
        }
    
    }
