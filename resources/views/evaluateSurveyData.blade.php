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
    @endphp
    @if ($survey)
        <x-card title=" {{ $survey['class'] }}">
            <div class="flex flex-col space-y-4 md:flex-row md:items-center md:space-x-6 my-4">
                <label for="ranking1" class="text-lg font-semibold text-gray-700">Frage 1:</label>
                <x-rating id="ranking1" wire:model="ranking1" class="bg-warning" total="5" values="2" readonly />
            </div>

        </x-card>
    @endif
@endsection
