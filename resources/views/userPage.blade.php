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
        <a href="/">
            <img src="{{ asset('logo_BBS_Einbeck.png') }}" alt="Logo" class="h-9 w-auto"/>
        </a>
    </x-slot:brand>
    <x-slot:actions>
        {{--        Wird nur fürs Testen benötigt--}}
        <x-theme-toggle class="btn btn-circle"
                        onclick="document.documentElement.setAttribute('data-theme',
                        document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');"
                        responsive/>
        <x-button icon="o-user" class="btn-circle" link="/user" responsive/>
    </x-slot:actions>
</x-nav>

        <x-card title="User"  shadow separator>
            <x-input label="Name" icon="o-user" disabled/>

            <x-input label="Email" type="email" disabled/>

            <x-input label="Role" disabled/>
        </x-card>


</body>
</html>
