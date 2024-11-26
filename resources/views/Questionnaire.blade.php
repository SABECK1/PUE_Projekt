@extends('layout')

@section('content')

<x-card title="Fragenkatalog" subtitle="something" shadow separator>
    <x-input label="Jahrgang" wire:model="Jahrgang" placeholder="Jahrgang angeben" clearable required
    class="input input-bordered input-warning max-w-xs"/>
</x-card>
<x-card title="Welchen Fragentyp verwenden Sie in der Umfrage überwiegend?" shadow separator>   
        <input type="radio" value="0" name="fragentyp" required>Offene fragen</input> <br>
        <input type="radio" value="1" name="fragentyp" required>ja/nein/Enthaltung</input> <br>
        <input type="radio" value="2" name="fragentyp" required>trifft voll zu/trifft überwiegend zu/trifft weniger zu/trifft nicht zu/Enthaltung</input> <br>
        <input type="radio" value="3" name="fragentyp" required>1/2/3/4</input>    
</x-card>
<x-card title="Welchen Darstellungsart der Fragen verwenden Sie in der Umfrage überwiegend?" shadow separator>   
        <input type="radio" value="0" name="fragen" required>Select-Auswahl</input> <br>
        <input type="radio" value="1" name="fragen" required>Radiobuttons</input> <br>
        <input type="radio" value="2" name="fragen" required>Radiobuttons mit Angabe von - bis</input>         
</x-card>
<x-button type="submit" label="create" class="btn-outline" icon="o-check"/>

@endsection