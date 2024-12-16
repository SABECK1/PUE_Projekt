@extends('layout')

@section('content')
   <!--Hier ein foreach um für jede frage in der survey eine card zu erstellen. Jetzt noch nicht eingebaut da noch keine Survey tabelle mit Question (Id) zeile existiert.-->
        <x-card title="{{$survey->surveycode}}">
             Hier werden die Fragen der Umfrage angezeigt. Um zur Bewertung zu gelangen, bitte zur Auswertung wechseln.
            <x-button icon="c-arrow-turn-right-up" class="text-red-500" link="{{ route('evaluateSurvey', $survey) }}" />
        </x-card>

    @foreach($questions as $index => $question)
    <x-card title="Frage Nr. {{ $index + 1 }}" class="shadow-md mb-2 flex mx-10"  separator>
        <div class="grid lg:grid-cols-4 gap-6 lg:gap-8">
            <div class="col-span-3 text-pretty">
                <!--Die Frage.  event. {{-- $survey['frageInhalt'] --}}-->
                {{$question['question']}}
            </div>
        </div>
    </x-card>
@endforeach
@endsection
