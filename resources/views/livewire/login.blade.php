<div>
<div class="md:w-96 mx-auto mt-20">
    <div class="mb-10 flex justify-center items-center">
        <img src="{{ asset('logo_BBS_Einbeck.png') }}" alt="Logo" class="h-16 w-auto"/>
    </div>

    <x-form wire:submit="login">
        <x-input label="E-Mail" wire:model="email" icon="o-envelope" inline />
        <x-input label="Password" wire:model="password" type="password" icon="o-key" inline />

        <x-slot:actions>
{{--            <x-button label="Create an account" class="btn-ghost" link="/register" />--}}
            <x-button label="Login" type="submit" icon="o-paper-airplane" class="btn-primary" spinner="login" />
        </x-slot:actions>
    </x-form>
</div>
</div>
