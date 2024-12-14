<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\SurveyQuestion;


class QuestionController extends Controller
{
    public function questionnaire()
    {
        $questionnaires = Questionnaire::with('questions')->get();
        $questions = SurveyQuestion::all();
        return view('questionnaire.questionnaire', ['questionnaires' => $questionnaires, 'questions' => $questions]);
    }
}
