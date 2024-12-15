<?php

namespace App\Livewire;

use Livewire\Component;

class TableAnswerCount extends Component
{
    //Anzahl der Antworten auf die Frage
    public ?int $answers_count = null;
    //Anzahl der Antworten auf jede Antwortmöglichkeit
    public $counts;
    public function render()
    {
        return view('livewire.table-answer-count');
    }
}
