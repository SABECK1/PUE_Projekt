@extends('layout')

@section('content')
@php
    $questionnaire = App\Models\Questionnaire::get();
    $classes = App\Models\SchoolClass::get();
@endphp
@foreach($classes as $class)
@endforeach
    <x-form wire:submit="save">
        <x-header title="Umfrage erstellen"  separator/>
        <div class="grid lg:grid-cols-4 gap-6 lg:gap-8 mt-6 flex-wrap " >
            <!--Klassen eingabe-->
            <x-select label="Klasse" wire:model="Klasse" :options="$classes" icon="o-user" class="select-warning" placeholder="Klasse angeben"  clearable required />
                 <!--Jahrgang Auswahl-->
            <x-select label="Schuljahr" wire:model="year" icon="s-academic-cap" class="select-warning"  placeholder="Jahrgang auswählen" clearable required />
            <!-- Fragenkatalog Auswahl-->
            <x-select label="Fragenkatalog" wire:model="questionnaire" :options="$questionnaire" icon="s-document-text" class="select-warning"  placeholder="Fragenkatalog auswählen" clearable required />
        </div>

        <x-textarea label="Notizen" wire:model="notizen" hint="Max. 1000 Zeichen (Optional)" rows="5"/>
        <div class="grid lg:grid-cols-3 gap-6 lg:gap-8 mt-6 flex-wrap">
            <!-- Auswahl zur Freigabe an Schulleitung-->
            <x-popover>
                <x-slot:trigger>
                    <x-checkbox label="Einsehbar durch Schulleitung" wire:model="item1"/>             
                </x-slot:trigger>
                <x-slot:content class="w-60">
                    Auf Wunsch der Schulleitung können zur Einsichtnahme durch die Schulleitung freigegebene Umfragen nicht mehr gelöscht werden.
                </x-slot:content>
            </x-popover>
            <!-- Auswahl zur änderung von Schüler zu Kollegiums Umfrage -->
            <x-popover>
                <x-slot:trigger class="text-pretty">             
                    <x-checkbox label="Kollegium Umfrage" wire:model="item2" />
                </x-slot:trigger>
                <x-slot:content class="w-60">
                    Kollegiumsumfragen sind solche Umfragen, die sich an Ihr Kollegium richten 
                    und für die sich die Kollegen zwecks Teilnahme mit Ihren Zugangsdaten zur PUE anmelden müssen.
                </x-slot:content>
            </x-popover>
            <!-- Ob ein QR-Code erstellt werden soll oder nicht-->
            <x-checkbox label="QR-Code erstellen" wire:model="qrcode"/>
        </div>
        
        <x-slot:actions>
            <x-button class="btn-error" label="Abbrechen" type="cancel" icon-right="o-x-circle"/>
            <x-button class="btn-success" label="Erstellen" type="submit" icon="o-check"/>
        </x-slot:actions>

    </x-form>
@endsection
