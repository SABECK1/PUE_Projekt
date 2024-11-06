@extends('layout')

@section('content')
        <x-card title="User"  shadow separator>
            <x-input label="Name" icon="o-user" disabled/>

            <x-input label="Email" type="email" disabled/>

            <x-input label="Role" disabled/>
        </x-card>
@endsection
