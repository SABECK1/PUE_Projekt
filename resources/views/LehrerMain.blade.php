
@extends('layout')

@section('content')
@php

        $icon = 'm-minus-small'; 
        $anzahl = 4;
        $ranNum = [];
        for ($i = 0; $i < $anzahl; $i++) {
            $ranNum[] = rand(1, 10);
        }
        
        $value = $ranNum[0];
        if ($value > 5)
        {
            $icon = 'o-arrow-trending-up';
        } elseif ($value < 5)
        {
            $icon = 'o-arrow-trending-down';
        }

@endphp
<img src="{{ asset('Lehrer_Banner.png') }}" class="rounded-t-lg"/>
<div class="min-h-screen bg-gray-100 p-3 scroll-smooth overflow-y-auto">
    <!-- Main Content -->
    <div class="p-6" >
        <!-- Overview Cards -->
        <div class="grid lg:grid-cols-4 gap-6 lg:gap-8 mt-6 flex-wrap " >    
            <x-stat 
                class="min-w-56 shadow-md"
                id="L-Bewertng"
                title="Deine gesamt Bewertung "
                description="Seit Letzter Änderung"
                value="{{$value}}"
                icon="{{ $icon }}"/> 
            <x-stat 
                class="min-w-56 shadow-md"
                id="L-Bertung"
                title="Anzahl Umfragen"
                description="Bisher durchgefürt"
                value="{{$ranNum[1]}}"
                icon="o-document"/>  
            <x-stat 
                class="min-w-56 shadow-md"
                id="L-ertung"
                title="Offene Umfragen"
                description="Momentan"
                value="{{$ranNum[2]}}"
                icon="m-minus-small"/>  
            <x-stat 
                class="min-w-56 shadow-md"
                id="L-Bewert"
                title="Interresante statistik"
                description="Für die Lehrkraft"
                value="{{$ranNum[3]}}"
                icon=""/>    
            
            <!-- More cards here for Orders, New Customers, etc. -->
        </div>
        

        <!-- Charts and Lists -->
        <div class="mt-6 grid lg:grid-cols-3 gap-6 lg:gap-8">
            <!-- Gross Chart -->
            <x-card class="shadow-md col-span-2" title="Klassen vergleich" separator>
                <div class="h-40 bg-purple-50">
                    <div class=" h-40">
                        <canvas id="myChart" ></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

                    <script>
                        const ctx = document.getElementById('myChart');

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                            datasets: [{
                                data: [12, 19, 3, 5, 2, 3],
                                borderWidth: 2
                            }]
                            },
                            options: {  
                                responsive: true,        
                                maintainAspectRatio: false,                    
                            scales: {
                                y: {
                                beginAtZero: true  
                                                          
                                }
                            }
                            }
                        });
                    </script>
                    <!-- Placeholder for Chart -->

                </div>
            </x-card>

            <!-- Category Chart -->
            <x-card class="shadow-md w-full" title="Schwerpunkte" separator>
                <!-- Placeholder for Pie Chart -->  
                 <div class="h-40"></div>
            </x-card>
        </div>

        <!-- Tables -->
        <div class="mt-6 grid lg:grid-cols-2 gap-6 lg:gap-8">
            <!-- Top Customers -->
            <x-card class="shadow-md" title="Zufriedene Klassen">
                <ul>
                    <li class="flex justify-between items-center py-2 border-b">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white">C</div>
                            <span class="ml-3 font-semibold">ITO.C</span>
                        </div>
                        <span class="font-bold">97.5</span>
                    </li>
                    <!-- More Class entries -->
                </ul>
            </x-card>
            <!-- Bad Classes -->
            <!-- Should pull the item, in which the class and the overall 
                satisfaction value of the registered teacher is indicated. 
                Of course in the context that the teacher also teaches these classes-->
            <x-card class="shadow-md" title="Unzufriedene Klassen" >
                <x-list-item :item="$surveys" separator hover> 
                    <x-slot:value>
                        Klassen Name --------------- Bewertung
                    </x-slot:value>
                    <x-slot:add-value>                   
                    </x-slot:add-value>
                </x-list-item>               
            </x-card>
            
        </div>

        <!-- running surveys Table -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md" >
            <ul>
                <li class="flex justify-between items-center py-2">
                    <div class="flex items-center">
                        <span class="text-xl font-semibold mb-4">Recent Surveys</span>
                    </div>
                    <x-button Link="{{ route('showSurveys') }}" class="p-1 scale-100 text-black-400 bg-white border-white shadow-none hover:bg-primary focus:scale-90">view all</x-button>
                </li>
                <!-- More Class entries -->
            </ul>
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left">
                        <th class="py-2">#</th>
                        <th class="py-2">Start Date</th>
                        <th class="py-2">class</th>                        
                        <th class="py-2">Status</th>
                    </tr>
                </thead>
                <tbody >                 
                    @foreach($surveys as $survey)   
                        <tr class="border-t hover:bg-blue-100">  
                            <td class="py-2">1</td>                            
                            <td class="py-2" >{{ $survey['date'] }}</td>
                            <td class="py-2">{{ $survey['class'] }}</td>                       
                            <td class="py-2">{{ $survey['status'] }}</td>
                            
                                <button icon="c-arrow-turn-right-up" 
                                        link="{{ route('showSurveyData', [
                                            'survey' => urlencode(json_encode($survey))]) }}">
                            
                        </tr>
                    @endforeach
                    <!-- More order entries -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
