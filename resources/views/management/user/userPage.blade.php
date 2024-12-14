@extends('layout')

@section('content')
<!-- Nutzer muss noch gezogen werden-->
@php
    $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'role', 'label' => 'Role']
    ];
@endphp
    <!--{{--<x-table :headers="$headers" :rows="$person" striped @row-click="Routing zur page des users" />--}}-->

    <x-card title="User"  shadow separator>
        <x-input label="Name" icon="o-user" disabled/>

        <x-input label="Email" type="email" disabled/>

        <x-input label="Role" disabled/>
    </x-card>
    
    <x-card title="UserListe"  shadow separator>
        Liste der vorhandenen user und deren Rolle/Berechtigung
        
    </x-card>
    <!-- Hier ein modal zur erstellung eines nutzers verwenden Geht bei mir jedoch nicht da Fehler: Undefined variable $__livewire kommt. genauso wie bei der x-table Idee oben-->

    <x-button icon="s-plus" class="btn-square" tooltip-bottom="Hinzufügen" />

        
@endsection
