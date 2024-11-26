@extends('layout')

@section('content')
    @php

        // Retrieve and decode the 'survey' parameter from the URL
           $survey = null;
        if (request()->query('survey'))
        {
            // Retrieve and decode the 'survey' parameter from the URL
            $survey = json_decode(urldecode(request()->query('survey')), true); // Decode and convert to an array
        }
        include_once resource_path('helpers/diffRoleAction.php');
        $value = rand(1, 100);
        $colour = calculateBewertungColour($value);
    @endphp
    <!-- der value wert soll aus einer funktion gezogen werden, welche diesen aus den antworten der survey fragen berechnet.-->
    @if ($survey)
    <x-header title=" {{ $survey['class'] }}"></x-header>
    <!--foreach Fragen ergebnis in wert-->
        <x-card title="Frage: Nummer(ID)" class="shadow-md">
            <div class="flex flex-cols-2 space-y-4 md:flex-row md:items-center md:space-x-6 my-4">
            <div class="col-span-1 text-pretty">
                <!--Die Frage.  event. {{-- $survey['frageInhalt'] --}}-->
                Inhalt der Frage ############## ############ ####### ######## ########## ########### ################ ####### ################
            </div> 
            <x-progress id="ranking1" value="{{$value}}" max="100" class="h-6 {{$colour}}"/>
            <label for="ranking1" class="text-lg font-semibold text-gray-700">{{$value}}%</label>
            </div>

        </x-card>
    @endif
@endsection
