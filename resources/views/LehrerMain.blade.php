
@extends('layout')

@section('content')
<div class="min-h-screen bg-gray-100 p-6 scroll-smooth overflow-y-auto">
    <!-- Sidebar -->
    <!--<aside collapsible class="w-64 h-full bg-white fixed shadow-md">
        <div class="p-6">
            <div class="text-yellow-500 text-2xl font-semibold">PUE</div>
            <div class="my-4 flex items-center space-x-4">
                <img class="w-10 h-10 rounded-full" src="profile-picture-url" alt="Profile Picture">
                <div class="font-semibold">Name of Teacher???</div>
            </div>
            <nav class="mt-6">
                <a href="{{ route('showSurveys') }}" class="block py-2 px-4 rounded hover:bg-gray-100">Show Surveys</a>
                <a href="{{route('createSurveys') }}" class="block py-2 px-4 rounded hover:bg-gray-100">Create Surveys</a>
                <a href="{{ route('evaluateSurveys') }}" class="block py-2 px-4 rounded hover:bg-gray-100">Evaluate Surveys</a>
                <div class="mt-4">
                    <span class="block py-2 px-4 text-gray-600">Warehouse</span>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-100">Option 1</a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-100">Option 2</a>
                </div>
            </nav>
            <div class="mt-6">
                <input type="text" placeholder="Search" class="w-full py-2 px-4 border rounded-md">
            </div>
        </div>
    </aside>-->

    <!-- Main Content -->
    <div class="p-6">
        <!-- Overview Cards -->
        <div class="grid lg:grid-cols-4 gap-6 lg:gap-8 mt-6">
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center ">
                <div class="flex items-center justify-center">      
                    <svg class="text-gray-500 h-9 w-9 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <!-- SVG Path for Icon -->
                        @svg('fluentui-data-trending-16-o')
                    </svg>                   
                    <div class="ml-4">                                               
                        <p class="text-gray-500">your Overal rating</p>           
                        <p class="text-2xl font-bold">95.3</p>
                    </div>
                </div>                
            </div>
            
            <!-- More cards here for Orders, New Customers, etc. -->
        </div>

        <!-- Charts and Lists -->
        <div class="mt-6 grid lg:grid-cols-3 gap-6 lg:gap-8">
            <!-- Gross Chart -->
            <div class="col-span-2 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Class comparison</h2>
                <div class="h-40 bg-purple-50 flex items-center ">
                    <div class="relative h-40">
                        <canvas id="myChart" style="display: block; box-sizing: border-box"></canvas>
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
                                borderWidth: 1
                            }]
                            },
                            options: {                              
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
            </div>

            <!-- Category Chart -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Schwerpunkte</h2>
                <div class="h-40">
                    
                    <!-- Placeholder for Pie Chart -->
                </div>
            </div>
        </div>

        <!-- Tables -->
        <div class="mt-6 grid lg:grid-cols-2 gap-6 lg:gap-8">
            <!-- Top Customers -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">pleased classes</h2>
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
            </div>

            <!-- Bad Classes -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">displeased classes</h2>
                <ul>
                    <li class="flex justify-between items-center py-2 border-b">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center text-white">A</div>
                            <span class="ml-3 font-semibold">ITO.A</span>
                        </div>
                        <span class="font-bold">85</span>
                    </li>
                    <!-- More Class entries -->
                </ul>
            </div>
        </div>

        <!-- running surveys Table -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <ul>
                <li class="flex justify-between items-center py-2">
                    <div class="flex items-center">
                        <span class="text-xl font-semibold mb-4">Recent Surveys</span>
                    </div>
                    <x-button Link="{{ route('showSurveys') }}" class="p-1 scale-100 text-lg text-gray-400 block mb-4 hover:underline hover:text-black focus:scale-90">view all</x-button>
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
                <tbody>
                    <tr class="border-t hover:bg-blue-100">
                        <td class="py-2">8</td>
                        <td class="py-2">Oct 14, 2024</td>
                        <td class="py-2">ITO.B</td>                       
                        <td class="py-2 text-green-500">On Going</td>
                    </tr>
                    <tr class="border-t hover:bg-blue-100">
                        <td class="py-2">1</td>
                        <td class="py-2">Oct 16, 2024</td>
                        <td class="py-2">ITO.A</td>                       
                        <td class="py-2 text-green-500">On Going</td>
                    </tr>
                    <!-- More order entries -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
