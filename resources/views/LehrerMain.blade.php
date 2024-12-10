
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
                icon="o-document"/>    
            
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
                <div class="h-40">
                    <!-- Placeholder for Pie Chart -->  
                </div>
            </x-card>
        </div>

        <!-- Tables -->
        <div class="mt-6 grid lg:grid-cols-2 gap-6 lg:gap-8">
            <!-- Top Customers -->
            <x-card class="shadow-md" title="Zufriedene Klassen">
                <x-list-item :item="$surveys" separator hover> 
                        <x-slot:value>
                            Klassen Name
                        </x-slot:value>
                        <x-slot:sub-value>
                            Bewertung
                        </x-slot:sub-value>
                </x-list-item>
            </x-card>
            <!-- Bad Classes -->
            <!-- Should pull the item, in which the class and the overall 
                satisfaction value of the registered teacher is indicated. 
                Of course in the context that the teacher also teaches these classes-->
            <x-card class="shadow-md" title="Unzufriedene Klassen" >
                <x-list-item :item="$surveys" separator hover> 
                    <x-slot:value>
                            Klassen Name
                        </x-slot:value>
                        <x-slot:sub-value>
                            Bewertung
                    </x-slot:sub-value>
                </x-list-item>               
            </x-card>
            
        </div>

        <!-- running surveys Table -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md" >
            <x-card title="Recent Surveys" >
                <livewire:u-i-table></livewire:u-i-table>         
                <x-slot:menu>
                    <x-button Link="{{ route('showSurveys') }}" label="show all" />
                </x-slot:menu>
            </x-card>
        </div>
    </div>
</div>
@endsection
