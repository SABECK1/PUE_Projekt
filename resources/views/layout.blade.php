<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <title>MainSite</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
{{--    Header--}}
<x-nav sticky full-width>
    <x-slot:brand>
        <label for="main-drawer" class="lg:hidden mr-3">
            <x-icon name="o-bars-3" class="cursor-pointer"/>
        </label>
        <img src="{{ asset('logo_BBS_Einbeck.png') }}" alt="Logo" class="h-9 w-auto"/>
    </x-slot:brand>
    <x-slot:actions>
        <x-button icon="o-user" class="btn-circle" link="###" responsive/>
    </x-slot:actions>
</x-nav>

<div class="w-full h-screen">
    @yield('content')
</div>

{{--Footer--}}
<footer class="bg-gray-900 text-white p-6 mt-auto">
    <div class="container mx-auto text-center">
        <h2 class="text-2xl font-bold mb-2">Kontakt</h2>
        <p class="mb-1">Berufsbildende Schulen Einbeck</p>
        <p class="mb-1">Hullerser Tor 4</p>
        <p class="mb-1">37574 Einbeck</p>
        <p class="mb-1">Tel: <a href="tel:05561949350" class="text-blue-400 hover:underline">05561 / 9493-50</a></p>
        <p>Fax: <a href="fax:05561949399" class="text-blue-400 hover:underline">05561 / 9493-99</a></p>

        <div class="mt-4 flex justify-center space-x-4">
            <a href="https://www.bbs-einbeck.de/privacy-policy/" class="text-blue-400 hover:underline">Datenschutz</a>
            <span class="text-gray-500">|</span>
            <a href="https://www.bbs-einbeck.de/impressum/" class="text-blue-400 hover:underline">Impressum</a>
        </div>

        <p class="mt-6 text-sm text-gray-400">© 2024 Berufsbildende Schulen Einbeck. Alle Rechte vorbehalten.</p>
    </div>
</footer>
</body>
</html>
