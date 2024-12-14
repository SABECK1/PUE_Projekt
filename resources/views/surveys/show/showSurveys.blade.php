@extends('layout')

@section('content')
    <x-header title="Umfragen anzeigen"  separator/>
    @foreach($surveys as $survey)
        <x-list-item :item="$survey">
            <x-slot:avatar>
                <x-badge value="{{ $survey->status }}" class="badge-primary"/> <!-- Use object syntax here -->
            </x-slot:avatar>
            <x-slot:value>
                {{ $survey->surveycode . ' - ' . $survey->school_class->name }} <!-- Use object syntax here -->
            </x-slot:value>
            <x-slot:sub-value>
                {{ $survey->created_at }} <!-- Use object syntax here -->
            </x-slot:sub-value>
            <x-slot:actions>
                <x-button icon="c-arrow-turn-right-up" class="text-red-500"
                          :link="route('showSurvey', $survey)" /> <!-- Passing Survey object as parameter -->
            </x-slot:actions>
        </x-list-item>
    @endforeach

@endsection
