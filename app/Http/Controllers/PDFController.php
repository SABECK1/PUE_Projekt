<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function generateEvaluationPDF(Survey $survey){
        $questionnaire = $survey->questionnaire()->with('questions')->first();
        $questions = $questionnaire->questions()->with('answers')->withCount('answers')->get();
        $data = [
            'survey' => $survey,
            'questionnaire' => $questionnaire,
            'questions' => $questions,
            'user' => Auth::user()
        ];
//        dd($survey);
        $pdf = Pdf::loadView('pdf.evaluateSurveyPDF', $data);
        return $pdf->stream('invoice.pdf');
    }
}
