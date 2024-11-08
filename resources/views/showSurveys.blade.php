@extends('layout')

@section('content')

    @foreach($surveys as $survey)
        <x-list-item :item="$survey">
            <x-slot:avatar>
                <x-badge value=" {{ $survey['status'] }}" class="badge-primary"/>
            </x-slot:avatar>
            <x-slot:value>
                {{ $survey['class'] }}
            </x-slot:value>
            <x-slot:sub-value>
                {{ $survey['date'] }}
            </x-slot:sub-value>
            <x-slot:actions>
                <x-button icon="c-arrow-turn-right-up" class="text-red-500"
                          link="{{ route('showSurveyData', [
                              'survey' => urlencode(json_encode($survey)) // Serialize and URL encode the survey
                          ]) }}" />
            </x-slot:actions>
        </x-list-item>
    @endforeach

@endsection
