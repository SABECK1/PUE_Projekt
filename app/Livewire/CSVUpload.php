<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use http\Env\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
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
        $created_users = [];

        $page_controller = new PaginationController();
        foreach ($this->created_users as $user) {

                $db_user = User::find($user['id']);
                // Initialpassword ans Frontend geben
                $db_user->initial_password = $user['password'];
                $created_users[] = $db_user;
        }
        $users = $page_controller->index($created_users);
        return view('livewire.c-s-v-upload', compact('users'));
    }

    public function save()
    {
        //CSV auslesen und User erstellen
        if (($handle = fopen($this->file->path(), 'r')) !== false) {
            while (($row = fgetcsv($handle, null, ";")) !== false) {
                $initial_password = 'BBS_Einbeck'.Str::random(10);
                $created_user = User::create([
                    'nachname' => $row[0],
                    'vorname' => $row[1],
                    'email' => $row[2],
                    'name' => $row[0]." ".$row[1],
                    'role_id' => Role::ROLE_STANDARD,
                    'password' => $initial_password
                    // Andere Felder hier hinzufügen
                ]);
                $this->created_users[] = [
                    'id' => $created_user->id,
                    'password' => $initial_password // Verwendung des vollständigen Namens als Benutzernamen
                ];
            }
            fclose($handle);
        }

        //Ergebnistabelle anzeigen
        $this->table_hidden = false;

    }
}
