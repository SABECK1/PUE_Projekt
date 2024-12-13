<div>
    <x-form wire:submit="resetpassword">
        <x-modal wire:model="passwordresetconfirmation" title="Passwort zurücksetzen"  separator>
            <div>Möchten Sie wirklich das Passwort des Nutzers zurücksetzen?</div>

            <x-slot:actions>
                <x-button label="Abbrechen" @click="$wire.passwordresetconfirmation = false" />
                <x-button label="Bestätigen" type="submit" class="btn-primary"  spinner="resetpassword"/>
            </x-slot:actions>
        </x-modal>

        <x-header title="Passwort zurücksetzen"  separator/>
        @if (session('success'))
            <x-alert class="alert-success">
                {{ session('success') }}
            </x-alert>
        @elseif (session('error'))
            <x-alert class="alert-error">
                {{ session('error') }}
            </x-alert>
        @endif
        <x-input label="Passwort" wire:model="password">
            <x-slot:prepend>
                <x-choices wire:model="selectedUser" class="rounded-e-none"
                           @change-selection="$wire.selectedUser = $event.detail.value"
                           :options="$usersSearchable" placeholder="Suchen..."
                           single searchable />
            </x-slot:prepend>
            <x-slot:append>
                    <x-button label="Passwort zurücksetzen" class="rounded-s-none btn-primary" @click="$wire.passwordresetconfirmation = true"/>
            </x-slot:append>
        </x-input>
    </x-form>
</div>
