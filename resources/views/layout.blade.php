<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@php
    include_once resource_path('helpers/diffRoleAction.php');
    $link = getLinkByUserRole($userRole);
@endphp
<body class="overflow-hidden h-screen overflow-y-auto">
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
        <x-button class="btn-circle" link="{{ route('Loginwx') }}" icon="m-arrow-left-on-rectangle" tooltip-bottom="Logout" responsive/>
        <x-button class="btn-circle"  link="{{ route($link) }}" icon="o-user" tooltip-bottom="UserHome"/>
    </x-slot:actions>
</x-nav>

<x-main with-nav full-width>
    <x-slot:sidebar drawer="main-drawer"  class="bg-base-200">
        <x-menu activate-by-route>
            <x-menu-item title="Umfragen anzeigen" icon="c-rectangle-group" link="{{ route('showSurveys') }}"/>
            <x-menu-item title="Umfragen erstellen" icon="m-pencil" link="{{route('createSurveys') }}"/>
            <x-menu-item title="Umfragen auswerten" icon="o-calculator" link="{{ route('evaluateSurveys') }}"/>
            @if ($userRole == 3)
                <x-menu-sub title="Einstellungen" icon="o-cog-6-tooth">
                    <x-menu-item title="Benutzer-Verwaltung" icon="o-home" link="{{ route('userPage') }}"/>
                    <x-menu-item title="Fragenbogen-Verwaltung" icon="o-home" link="{{ route('questionnaire') }}"/>
                </x-menu-sub>
            @endif
        </x-menu>
    </x-slot:sidebar>
    <x-slot:content>
        @yield('content')
    </x-slot:content>
</x-main>
</body>
</html>
