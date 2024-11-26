@extends('layout')

@section('content')
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/anchor@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <x-form wire:submit="save">
        <x-header title="Umfrage erstellen"  separator/>
        <div class="grid lg:grid-cols-4 gap-6 lg:gap-8 mt-6 flex-wrap " >
            <!--Klassen eingabe-->
            <x-input label="Klasse" wire:model="klasse" placeholder="Klasse angeben" clearable required
                 class="input input-bordered input-warning w-full max-w-xs"/>
                 <!--Jahrgang Auswahl-->
            <x-select label="Schuljahr" icon="s-academic-cap"  wire:model="selectedUser" placeholder="Jahrgang auswählen" clearable required
            class="select-warning"/>
            <!-- Fragenkatalog Auswahl-->
            <x-select label="Fragenkatalog" icon="s-document-text"  wire:model="selectedUser" placeholder="Fragenkatalog auswählen" clearable required
            class="select-warning"/>
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
            <x-button label="Abbrechen" type="cancel" icon-right="o-x-circle"/>
            <x-button label="Erstellen" type="submit" icon="o-check"/>
        </x-slot:actions>

    </x-form>
@endsection
