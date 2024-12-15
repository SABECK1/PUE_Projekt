<div>
    @php
    $headers = [
    ['key' => 'chosen_answer', 'label' => 'Gewählte Option'],
    ['key' => 'answer_count', 'label' => 'Anzahl'],
    ];
    @endphp

    <div class="col-span-1 text-pretty">
        Anzahl der Antworten: {{$answers_count}}
    </div>

    <div>
        <x-table :headers="$headers" :rows="$counts" no-hover />
    </div>
</div>
