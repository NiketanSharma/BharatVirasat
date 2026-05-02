<?php

namespace App\Http\Controllers;

use App\Models\TriviaQuestion;

class TriviaController extends Controller
{
    /**
     * Show the trivia quiz interface.
     */
    public function index()
    {
        // Get up to 10 random trivia questions for the quiz
        $questions = TriviaQuestion::inRandomOrder()->limit(10)->get();
        return view('trivia.index', compact('questions'));
    }
}
