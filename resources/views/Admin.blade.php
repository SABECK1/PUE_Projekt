@extends('layout')

@section('content')

<x-card shadow separator>
    some dids, dodads and thingimagigs
    <x-slot:figure>
        <img src="{{ asset('Admin_Banner.png') }}" /> {{--  QRCode--}}
    </x-slot:figure>
</x-card>

@endsection