@extends('layout')

@section('content')
    <x-form wire:submit="save">
        <x-header title="Umfrage erstellen"  separator/>



        <x-input label="Klasse" wire:model="klasse" clearable required
                 class="input input-bordered input-warning w-full max-w-xs"/>

        <x-textarea label="Notizen" wire:model="notizen" hint="Max. 1000 Zeichen (Optional)" rows="5"/>

        <x-checkbox label="QR-Code erstellen" wire:model="qrcode"/>

        <x-slot:actions>
            <x-button label="Abbrechen" type="cancel"/>
            <x-button label="Erstellen" type="submit"/>
        </x-slot:actions>

    </x-form>
@endsection
