@extends('layout')

@section('content')
    <x-header title="Umfragen anzeigen"  separator/>
    @foreach($surveys as $survey)
        <x-list-item :item="$survey">
            <x-slot:avatar>
                <x-badge value=" {{ $survey['status'] }}" class="badge-primary"/>
            </x-slot:avatar>
            <x-slot:value>
                {{ $survey['surveycode']." - ".$survey->school_class->name }}
            </x-slot:value>
            <x-slot:sub-value>
                {{ $survey['created_at'] }}
            </x-slot:sub-value>
            <x-slot:actions>
                <x-button icon="c-arrow-turn-right-up" class="text-red-500"
                          link="{{ route('showSurveyData', ['survey' => $survey]) }}" />
            </x-slot:actions>
        </x-list-item>
    @endforeach

@endsection
