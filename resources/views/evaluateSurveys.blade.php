@extends('layout')

@section('content')

    @php
        // Bestimme das Icon basierend auf dem Wert von "Vorjahreswert"
        $icon = 'm-arrow-right'; // Standardwert bei Gleichheit

        if (2 > 1)
        {
            $icon = 'o-arrow-trending-up';
        } elseif (1 < 1)
        {
            $icon = 'o-arrow-trending-down';
        }
    @endphp
    <x-header title="Umfrage auswerten" separator/>

    <div class="flex justify-around mt-4 space-x-4">
        <x-stat title="Auswertungen letztes Jahr" value="10" icon="m-swatch"/>
        <x-stat title="Durchschnittswert" description="Letztes Jahr" value="3" icon="m-tv"/>
        <x-stat title="Auswertungen  dieses Jahr" value="44" icon="m-swatch"/>
        <x-stat title="Durchschnittswert" description="Dieses Jahr" value="4" icon="{{ $icon }}"  />
    </div>

    @foreach($surveys as $survey)
    <x-list-item :item="$survey">
        <x-slot:value>
            {{ $survey['surveycode']." - ".$survey->school_class->name }}
        </x-slot:value>
        <x-slot:sub-value>
            {{ $survey['created_at'] }}
        </x-slot:sub-value>
        <x-slot:actions>
            <x-button icon="c-arrow-turn-right-up" class="text-red-500"
                      link="{{ route('evaluateSurveyData', [
                              'survey' => $survey // Serialize and URL encode the survey
                          ]) }}" />
        </x-slot:actions>
    </x-list-item>
    @endforeach

@endsection
