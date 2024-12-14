@extends('layout')

@section('content')
    @php
        $survey = App\Models\Survey::Where('id', $_GET['survey'])->get()->toArray();
        $value = rand(1, 100);
        $colour = calculateBewertungColour($value);
    @endphp
    <!-- der value wert soll aus einer funktion gezogen werden, welche diesen aus den antworten der survey fragen berechnet.-->
    @if ($survey)
    <x-header title=" {{ $survey['surveycode'] }}"></x-header>
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
    <x-button label="Als PDF drucken" class="btn-warning mx-10" icon="o-check" disabled />
@endsection