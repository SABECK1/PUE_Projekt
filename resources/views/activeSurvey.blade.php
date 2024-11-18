@extends('layout')

@section('content')
@php
    $Answers = [
        ['id' => 1, 'name' => 'Stimme Nicht zu'],
        ['id' => 2, 'name' => 'Stimme teilweise zu'],
        ['id' => 3, 'name' => 'Stimme zu'],
        ['id' => 4, 'name' => 'Stimme voll zu'],
    ];
@endphp
 
<x-card title="Code Für das offene Umfragedocument" shadow separator>
    <x-checkbox label="Bist du zufrieden mit der Lehrkraft" wire:model="item1" right />
    
</x-card>

<x-card title="Question 1" shadow separator>
    Bist du zufrieden mit der Schule?
    <x-radio label="Select one" :options="$Answers" wire:model="selectedUser" class=" w-12 text-xs"/>
</x-card>





@endsection