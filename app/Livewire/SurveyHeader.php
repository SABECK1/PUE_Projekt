<?php

namespace App\Livewire;

use App\Http\Controllers\PDFController;
use App\Models\Survey;
use Livewire\Component;

class SurveyHeader extends Component
{
    public $survey;

    public function render()
    {
        return view('livewire.survey-header');
    }

    public function generateEvaluationPDF()
    {
        return redirect()->route('generateEvaluationPDF', ['survey' => $this->survey]);
    }
}
