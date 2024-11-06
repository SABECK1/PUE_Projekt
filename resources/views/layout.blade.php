<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-hidden h-screen">
{{--    Header--}}
<x-nav sticky full-width>
    <x-slot:brand>
        <label for="main-drawer" class="lg:hidden mr-3">
            <x-icon name="o-bars-3" class="cursor-pointer"/>
        </label>
        <a href="{{ route('showSurveys') }}">
            <img src="{{ asset('logo_BBS_Einbeck.png') }}" alt="Logo" class="h-9 w-auto"/>
        </a>
    </x-slot:brand>
    <x-slot:actions>
        {{--        Wird nur fürs Testen benötigt--}}
        <x-theme-toggle class="btn btn-circle"
                        onclick="document.documentElement.setAttribute('data-theme',
                        document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');"
                        responsive/>
        <x-button class="btn-circle" link="{{ route('userPage') }}" icon="m-power" responsive/>
    </x-slot:actions>
</x-nav>

<x-main with-nav full-width>
    <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">
        <x-menu activate-by-route>
            <x-menu-item title="Umfragen anzeigen" icon="o-home" link="{{ route('showSurveys') }}"/>
            <x-menu-item title="Umfragen erstellen" icon="m-plus-small" link="{{route('createSurveys') }}"/>
            <x-menu-item title="Umfragen Auswerten" icon="o-document" link="{{ route('evaluateSurveys') }}"/>
            @if ($userRole == 1)
                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="User" icon="o-user" link="{{ route('userPage') }}"/>
                    <x-menu-item title="User-Verwaltung" icon="o-home" link="{{ route('userPage') }}"/>
                </x-menu-sub>
            @else
                <x-menu-item title="User" icon="o-user" link="{{ route('userPage') }}"/>
            @endif
        </x-menu>
    </x-slot:sidebar>
    <x-slot:content>
        @yield('content')
    </x-slot:content>
</x-main>
</body>
</html>
