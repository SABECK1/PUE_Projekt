<div>
    <x-form wire:submit="save">
        <x-header title="Massenerstellung der Nutzer"  separator/>

        <x-file wire:model="file" label="CSV-Datei" hint="Zeilenstruktur: Nachname, Vorname, Mail" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />


        <x-slot:actions>
            <x-button label="Erstellen" type="submit"/>
        </x-slot:actions>

    </x-form>

    @php
        $users = App\Models\User::get();

        $headers = [
            ['key' => 'id', 'label' => '#'],
            ['key' => 'nachname', 'label' => 'Vorname'],
            ['key' => 'vorname', 'label' => 'Nachname'] # <---- nested attributes
        ];
    @endphp

    {{-- You can use any `$wire.METHOD` on `@row-click` --}}
    <x-table :headers="$headers" :rows="$users" striped @row-click="alert($event.detail.name)" />
</div>
