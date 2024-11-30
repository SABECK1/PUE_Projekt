<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\SchoolClass;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function showSurveys() {
        $surveys = Survey::with('school_class')->get();
        return view('showSurveys', ['surveys' => $surveys]);
    }

    public function showSurveyData() {
        return view('surveyData');
    }

    public function showSurvey(Survey $survey) {
        return view('survey', ['survey' => $survey]);
    }

    public function evaluateSurveys() {
        $surveys = Survey::all();
        return view('evaluateSurveys', ['surveys' => $surveys]);
    }

    public function evaluateSurvey(Survey $survey) {
        return view('evaluateSurvey', ['survey' => $survey]);
    }

    public function evaluateSurveyData(Survey $survey) {

        $questionnaire = $survey->questionnaire()->with('questions')->first();
        $questions = $questionnaire->questions()->with('answers')->get();
//        $answers = $questions->answers()->get();
        return view('evaluateSurveyData', ['survey' => $survey,
                                                'questionnaire' => $questionnaire,
                                                'questions' => $questions]);
    }

    public function createSurveys() {
        return view('createSurveys', ['classes' => SchoolClass::all()]);
    }

    public function showUser() {
        return view('userPage'. ['user' => Auth::user()]);
    }

    public function showUsers() {
        return view('allUsers', ['users' => User::all()]);
    }

    public function dashboard() {
        return view('dashboard');
    }

    public function questionnaire() {
        $questionnaires = Questionnaire::with('questions')->get();
        $questions = SurveyQuestion::all();
        return view('questionnaire', ['questionnaires' => $questionnaires, 'questions' => $questions]);
    }
}
