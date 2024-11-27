@extends('layout')

@section('content')

<x-card shadow separator>
    some dids, dodads and thingimagigs
    <x-slot:figure>
        <img src="{{ asset('Admin_Banner.png') }}" />
    </x-slot:figure>
</x-card>
<x-card title="Userliste Erstellen" shadow>
    <x-slot:actions>
        <x-button label="create" icon="s-plus" class=" btn-warning" />
    </x-slot:actions>
</x-card>

@endsection