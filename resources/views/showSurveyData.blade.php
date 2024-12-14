@extends('layout')

@section('content')
    @php
        $questions = App\Models\SurveyQuestion::whereIn('id', function($query) {
            $query->select('survey_question_id')
                ->from('questionnaire_survey_question')
                ->whereIn('questionnaire_id', function($query) {
                    $query->select('questionnaire_id')
                        ->from('surveys')
                        ->where('id', $_GET['survey']);
                });
        })->get()->toArray();
        $survey = App\Models\Survey::Where('id', $_GET['survey'])->select('surveycode')->get();
        $i = 0;
    @endphp
    @foreach($survey as $surv)
    @endforeach
    @if ($questions)<!--Hier ein foreach um für jede frage in der survey eine card zu erstellen. Jetzt noch nicht eingebaut da noch keine Survey tabelle mit Question (Id) zeile existiert.-->
        <x-card title="{{$surv['surveycode']}}">
             Hier Werden die Fragen der Umfrage angezeigt. Um zur bewertung zu gelangen bitte zur auswertung wechseln.
            <x-button icon="c-arrow-turn-right-up" class="text-red-500" link="{{ route('evaluateSurveys') }}" />
        </x-card>     
    @endif

    @foreach($questions as $i => $question)       
    <x-card title=" Question Nr. {{ $i + 1 }}" class=" shadow-md mb-2 flex mx-10"  separator>
        <div class="grid lg:grid-cols-4 gap-6 lg:gap-8">
            <div class="col-span-3 text-pretty">
                <!--Die Frage.  event. {{-- $survey['frageInhalt'] --}}-->
                {{$question['question']}}
            </div>      
        </div>
    </x-card>
@endforeach
@endsection
