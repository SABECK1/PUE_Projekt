@extends('layout')

@section('content')
<!--Nur zum testen.  Zumindes für die Automatische geenerierung der karten für jede frage einer Umfrage-->
<!--Abfrage welche survey hier angesprochen wird, eingegebener Umfragecode der vorherigen view-->
@php
    $Answers = [
        ['id' => 1, 'name' => 'Stimme Nicht zu'],
        ['id' => 2, 'name' => 'Stimme teilweise zu'],
        ['id' => 3, 'name' => 'Stimme zu'],
        ['id' => 4, 'name' => 'Stimme voll zu'],
    ];  
    $Umfrage = 0;
    if (isset($_GET['Umfrage'])) {
        $Umfrage = htmlspecialchars($_GET['Umfrage']);
    } else {
        $Umfrage = json_decode(urldecode(request()->Umfrage('Umfrage')), true);
    }
@endphp
<x-header title=" Umfrage: {{ $Umfrage }}"  separator/>
@foreach($Answers as $answer)
    <!--Answer[name] durch den Namen der Frage tauschen. event. {{-- $survey['frageTitel'] --}}-->
    <x-card title="{{ $answer['name'] }} || soll später Die Frage enthalten." class=" shadow-md mb-2 flex"  separator>
        <div class="grid lg:grid-cols-4 gap-6 lg:gap-8">
            <div class="col-span-3 text-pretty">
                <!--Die Frage.  event. {{-- $survey['frageInhalt'] --}}-->
                ############## ############ ####### ######## ########## ########### ################ ####### ################
            </div>      
            <x-radio label="Select one" :options="$Answers" wire:model="selectedUser{{ $answer['id'] }}" class=" w-12 mx-2 text-xs col-span-1"/><!-- Answer[id] durch id der Frage tauschen. event. {{-- $survey['id'] --}} oder hier direkt die zu der Frage hinterlegten antw. mögl. angeben-->
        </div>
    </x-card>
@endforeach

<x-button label="Abschließen" class="btn-warning" disabled /><!-- Soll erst mit der Beantwortung aller pflicht Fragen der Umfrage Freigeschaltet werden. Logic ist noch zu imlementieren.-->





@endsection