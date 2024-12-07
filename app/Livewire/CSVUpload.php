<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use http\Env\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\PaginationController;

class CSVUpload extends Component
{
    //Paginator aktivieren
    use WithPagination;

    //FileUpload aktivieren
    use WithFileUploads;

    //Validation der Datei einschalten
    #[Validate('required')]
    public $file;

    public $table_hidden = true;
    public $created_users = [];


    public function render()
    {

        $page_controller = new PaginationController();
        $created_users = User::find($this->created_users);
        $users = $page_controller->index($created_users);
        return view('livewire.c-s-v-upload', compact('users'));
    }

    public function save()
    {
        //CSV auslesen und User erstellen
        if (($handle = fopen($this->file->path(), 'r')) !== false) {
            while (($row = fgetcsv($handle, null, ";")) !== false) {
                $created_user = User::create([
                    'nachname' => $row[0],
                    'vorname' => $row[1],
                    'email' => bin2hex(random_bytes(5 / 2)),#$row[2],
                    'name' => $row[0]." ".$row[1],
                    'role_id' => Role::ROLE_STANDARD,
                    'password' => 'TEST'#bin2hex(random_bytes(5 / 2))
                    // Add other fields as needed
                ]);
                $this->created_users[] = $created_user->id;
            }
            fclose($handle);
        }

        //Ergebnistabelle anzeigen
        $this->table_hidden = false;

    }
}
