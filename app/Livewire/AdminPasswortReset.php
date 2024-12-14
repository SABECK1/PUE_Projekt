<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Nette\Utils\Random;

class AdminPasswortReset extends Component
{
    //Ausgewählter User
    #[Validate('required')]
    public ?int $selectedUser = null;

    //Übergebenes Passwort
    #[Validate('required')]
    public string $password;

    //Optionsliste
    public Collection $usersSearchable;

    //Soll Popup angezeigt werden?
    public bool $passwordresetconfirmation = false;

    public function mount()
    {
        //Beim Laden der Komponente die Suche ausführen
        $this->search();
    }


    public function render()
    {
        return view('livewire.admin-passwort-reset');
    }

    public function search(string $value = '')
    {

        $this->usersSearchable = User::query()
            ->where('name', 'like', "%$value%")
            ->take(5)
            ->orderBy('name')
            ->get();
    }

    public function resetpassword()
    {
        $this->validate();

        $user = User::where('id', $this->selectedUser)->first();

        if (!$user) {
            session()->flash('error', 'Nutzer konnte nicht gefunden werden');
        }

        $user->password = Hash::make($this->password);
        $user->save();

        $this->passwordresetconfirmation = false;

        session()->flash('success', 'Passwort von '.$user->name.' erfolgreich aktualisiert');
    }
}
