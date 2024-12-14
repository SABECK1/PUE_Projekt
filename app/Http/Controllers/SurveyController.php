<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Survey;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function showSurveys()
    {
        $surveys = Survey::with('school_class')->get();
        return view('surveys.show.showSurveys', ['surveys' => $surveys, 'user' => Auth::user()]);
    }

    public function showSurvey(Survey $survey)
    {
        return view('surveys.show.showSurveyData', ['survey' => $survey, 'user' => Auth::user()]);
    }

    public function evaluateSurveys()
    {
        $surveys = Survey::all();
        return view('surveys.evaluate.evaluateSurveys', ['surveys' => $surveys, 'user' => Auth::user()]);
    }

    public function evaluateSurvey(Survey $survey)
    {

        $questionnaire = $survey->questionnaire()->with('questions')->first();
        $questions = $questionnaire->questions()->with('answers')->get();
//        $answers = $questions->answers()->get();
        return view('surveys.evaluate.evaluateSurveyData', ['survey' => $survey,
            'questionnaire' => $questionnaire,
            'questions' => $questions,
            'user' => Auth::user()]);
    }

    public function createSurveys()
    {
        return view('surveys.create.createSurveys', ['classes' => SchoolClass::all(), 'user' => Auth::user()]);
    }

}
