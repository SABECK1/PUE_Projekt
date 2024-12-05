<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class CSVUpload extends Component
{
    //Paginator aktivieren
    use WithPagination;
    public function render()
    {
        return view('livewire.c-s-v-upload');
    }
}
