<div>
    <x-form wire:submit="save">
        <x-header title="Massenerstellung der Nutzer"  separator/>

        <x-file wire:model="file" label="CSV-Datei" hint="Zeilenstruktur: Nachname, Vorname, Mail" accept=".xlsx, .xls, .csv" />


        <x-slot:actions>
            <x-button label="Erstellen" type="submit"/>
        </x-slot:actions>

    </x-form>

    @php
        $headers = [
            ['key' => 'id', 'label' => '#'],
            ['key' => 'nachname', 'label' => 'Vorname'],
            ['key' => 'vorname', 'label' => 'Nachname'],
            ['key' => 'initial_password', 'label' => 'Initialpasswort']
        ];
    @endphp

    @if($users and !$table_hidden)
        <x-table :headers="$headers" :rows="$users" with-pagination />
    @endif
</div>
