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
            Das hier ist der Code für die Umfrage. Hier Werden die Fragen der Umfrage angezeigt. Um zur bewertung zu gelangen bitte zur auswertung wechseln.
            <x-slot:figure>
              <img src="https://picsum.photos/500/200" /> {{--  QRCode--}}
            </x-slot:figure>
        </x-card>
    @endif
@endsection
