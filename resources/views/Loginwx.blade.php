<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-hidden h-screen">
<div class="hero bg-yellow-100 min-h-screen flex justify-center">
  <div class="hero-content text-center w-96 mt-10">
    <div class="max-w-md">          
        @if ($userRole == 2)
            <body class="flex items-center justify-center min-h-screen bg-gray-50">
                    <div class="w-full max-w-sm p-8 bg-white rounded-lg shadow-md">
                        <div class="flex flex-col items-center mb-8">
                            <h1 class="text-3xl font-semibold text-black">Login</h1>
                        </div>
                        <form action="{{ route('evaluateSurveys') }}">
                            <div class="mb-6">
                                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                                <input type="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="random@random.com" required>
                            </div>
                            <div class="mb-6">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="********" required>
                            </div>
                            <button type="submit" class="w-full px-4 py-2 text-black bg-yellow-400 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-black-700 focus:ring-offset-2">
                                Login
                            </button>
                        </form>
                        <div class="flex items-center justify-between mt-4 text-sm text-gray-500">
                            <!-- Elemends to be put underneath the login but still inside the card -->
                        </div>
                    </div>
                </body>
            @elseif ($userRole == 1)
                <body class="flex items-center justify-center min-h-screen bg-gray-50 ">
                    <div class="w-full max-w-sm p-8 bg-white rounded-lg shadow-md">
                        <div class="flex flex-col items-center mb-8">
                            <h1 class="text-3xl font-semibold text-black">Login</h1>
                        </div>
                        <form action="{{ route('LehrerMain') }}">
                            <div class="mb-6">
                                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                                <input type="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="random@random.com" required>
                            </div>
                            <div class="mb-6">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="********" required>
                            </div>
                            <button type="submit" class="w-full px-4 py-2 text-black bg-yellow-400 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-black-700 focus:ring-offset-2">
                                Login
                            </button>
                        </form>
                        <div class="flex items-center justify-between mt-4 text-sm text-gray-500">
                            <!-- Elemends to be put underneath the login but still inside the card -->
                        </div>
                    </div>
                </body>
            @else
            <body class="flex items-center justify-center min-h-screen bg-gray-50">
                    <div class="w-full max-w-sm p-8 bg-white rounded-lg shadow-md">
                        <div class="flex flex-col items-center mb-8">
                            <h1 class="text-3xl font-semibold text-black">Umfrage</h1>
                        </div>
                        <form action="{{ route('userPage') }}">
                            <div class="mb-6">
                                <input type="text" id="number-field" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="Umfragecode" required>
                            </div>
                            <button type="submit" class="w-full px-4 py-2 text-black bg-yellow-400 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-black-700 focus:ring-offset-2">
                                Start
                            </button>
                        </form>
                        <div class="flex items-center justify-between mt-4 text-sm text-gray-500">
                            <!-- Elemends to be put underneath the login but still inside the card -->
                        </div>
                    </div>
                </body>
            @endif
            <!-- Login Formular -->
            
        </div>
</div>
</div>
</body>
</html>