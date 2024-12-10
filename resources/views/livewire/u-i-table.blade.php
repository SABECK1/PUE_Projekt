@php

$surveys = [
        ['id'=> 1,'class' => 'Customer Satisfaction', 'date' => '2024-01-15', 'status' => 'Completed'],
        ['id'=> 1,'class' => 'Employee Feedback', 'date' => '2024-02-10', 'status' => 'In Progress'],
        ['id'=> 1,'class' => 'Market Research', 'date' => '2024-03-05', 'status' => 'Pending'],
    ];

    $headers = [
        ['key' => 'id', 'label' => 'Nr.'],
        ['key' => 'class', 'label' => 'Table'],
        ['key' => 'date', 'label' => 'date'],
        ['key' => 'status', 'label'=> 'status'],     
        ];

@endphp
<div>
    @foreach($surveys as $survey)
    @endforeach
    <x-table :headers="$headers" :rows="$surveys" link="{{ route('evaluateSurveyData', [
        'survey' => urlencode(json_encode($survey)) // Serialize and URL encode the survey 
            ]) }}" no-hover />
</div>
