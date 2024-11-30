<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Survey;
use Illuminate\Http\Request;

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
        return view('evaluateSurveyData');
    }

    public function createSurveys() {
        return view('createSurveys');
    }

    public function showUser() {
        return view('userPage');
    }
}
