<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@php
    include_once resource_path('helpers/diffRoleAction.php');
    $link = getLinkByUserRole($userRole);
@endphp
<body class="overflow-hidden h-screen">
<div class="hero bg-yellow-100 min-h-screen flex justify-center">
    <div class="hero-content text-center w-96">     
        <body class="flex items-center justify-center min-h-screen bg-gray-50">
            <div class="w-full max-w-sm p-8 bg-white rounded-lg shadow-md">              
                @if ($userRole == 3 || $userRole == 2 || $userRole == 1)
                    <div class="flex flex-col items-center mb-8">
                        <h1 class="text-3xl font-semibold text-black">Login</h1>
                        </div>
                            <form action="{{ route( $link ) }}"><!-- Anmeldung des Admins-->
                                <div class="mb-6">
                                    <x-input type="email" label="E-mail" wire:model="email" class="border-black" required/>
                                </div>
                                <div class="mb-6">
                                    <x-password label="Password" wire:model="password" only-password class="border-black" required/>
                                </div>
                                <button type="submit" icon="o-check" class="w-full px-4 py-2 text-black bg-yellow-400 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-black-700 focus:ring-offset-2">
                                    Login
                                </button>
                            </form>
                            <div class="flex items-center justify-between mt-4 text-sm text-gray-500">
                                    <!-- Elemends to be put underneath the login but still inside the card -->
                                </div>
                @else
                    <div class="flex flex-col items-center mb-8">
                        <h1 class="text-3xl font-semibold text-black">Umfrage</h1>
                        </div>
                            <form method="GET" action="{{ route('activeSurvey') }}"><!--- Hier muss Später noch ein Filter nach dem eingegebenen Umfragecode implementiert werden-->
                                <div class="mb-6">
                                    <input name="Umfrage" type="text" id="numberfield" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="Umfragecode" required>
                                </div :item ="numberfield">
                                <button type="submit" class="w-full px-4 py-2 text-black bg-yellow-400 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-black-700 focus:ring-offset-2">
                                    Start
                                </button>
                            </form>
                            <div class="flex items-center justify-between mt-4 text-sm text-gray-500">
                                    <!-- Elemends to be put underneath the login but still inside the card -->
                                </div>                                                 
                @endif
            </div>
        </body>           
    </div>
</div>
</body>
</html>