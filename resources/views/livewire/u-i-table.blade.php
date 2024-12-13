@php

    $surveys = App\Models\Survey::get();
    

    $headers = [
        ['key' => 'id', 'label' => 'Nr.'],
        ['key' => 'surveycode', 'label' => 'Survey'],
        ['key' => 'created_at', 'label' => 'date'],
        ['key' => 'status', 'label'=> 'status'],     
        ];
        
@endphp
<div>
    @foreach($surveys as $survey)
    @endforeach
    <x-table :headers="$headers" :rows="$surveys" link="show\data?survey={id}" no-hover />
</div>
