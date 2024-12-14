@extends('layout')

@section('content')

<x-card shadow separator>
    some dids, dodads and thingimagigs
    <x-slot:figure>
        <img src="{{ asset('Personaler_Banner.png') }}" />
    </x-slot:figure>
</x-card>


@endsection