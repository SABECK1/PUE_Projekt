@extends('layout')

@section('content')
    <!-- der value wert soll aus einer funktion gezogen werden, welche diesen aus den antworten der survey fragen berechnet.-->
    @if ($survey)
    <x-header title=" {{ $survey->surveycode }}"></x-header>
    <!--foreach Fragen ergebnis in wert-->
    @foreach($questions as $question)
        <x-card title="Frage: {{$question->question}}" class="shadow-md">
            <div class="flex flex-cols-2 space-y-4 md:flex-row md:items-center md:space-x-6 my-4">
{{--                Anzahl Antworten--}}

                @php
//              Anzahl Antworten für jede Option
                $counts = $question->answers()
                  ->groupBy(['chosen_answer'])
                  ->select('chosen_answer', DB::raw('count(*) as answer_count'))
                  ->get();
//              Durchschnittswert der Fragen für die Balkenanzeige
                $average = $question->answers()
                  ->select(DB::raw('(avg(chosen_answer)-1) as avg_answer'))
                  ->first()
                  ->avg_answer;
//                Setzen des Balkenwertes und -Farbe
                $value = round(33.33 * $average, 2);
                $color = App\Http\Controllers\SurveyController::calculateRatingColor($value);
                @endphp

                <livewire:table-answer-count :answers_count="$question->answers_count" :counts="$counts"></livewire:table-answer-count>
            <x-progress id="ranking1" value="{{$value}}" max="100" class="{{$color}} h-6"/>
            <label for="ranking1" class="text-lg font-semibold text-gray-700">{{$value}}%</label>
            </div>

        </x-card>
    @endforeach
    @endif
    <x-button label="Als PDF drucken" class="btn-warning mx-10" icon="o-check" disabled />
@endsection
