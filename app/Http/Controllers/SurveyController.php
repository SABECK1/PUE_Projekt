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
        $questionnaire = $survey->questionnaire()->with('questions')->first();
        $questions = $questionnaire->questions()->get();
        return view('surveys.show.showSurveyData', ['survey' => $survey,
                                                            'user' => Auth::user(),
                                                            'questionnaire' => $questionnaire,
                                                            'questions' => $questions,]);
    }

    public function evaluateSurveys()
    {
        $surveys = Survey::all();
        return view('surveys.evaluate.evaluateSurveys', ['surveys' => $surveys, 'user' => Auth::user()]);
    }

    public function evaluateSurvey(Survey $survey)
    {

        $questionnaire = $survey->questionnaire()->with('questions')->first();
        $questions = $questionnaire->questions()->with('answers')->withCount('answers')->get();
//        $answers = $questions->answers()->get();
        return view('surveys.evaluate.evaluateSurveyData', ['survey' => $survey,
            'questionnaire' => $questionnaire,
            'questions' => $questions,
//            'answers' => $answers,
            'user' => Auth::user()]);
    }

    public function createSurveys()
    {
        return view('surveys.create.createSurveys', ['classes' => SchoolClass::all(), 'user' => Auth::user()]);
    }

    public static function calculateRatingColor(int $value)
    {
        //Übernommen von Juris Code -> Benötigt u.a. für die View evaluateSurveyData
        if (0 <= $value && $value < 33) {
            return 'progress-error';
        } elseif (33 < $value && $value < 66) {
            return 'progress-warning';
        } else {
            return 'progress-success';
        }
    }

}
