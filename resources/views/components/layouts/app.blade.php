<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Favicon -->

    <link rel="icon" type="image/svg" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" type="image/svg" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon-precomposed" type="image/svg" href="{{ asset('favicon.svg') }}">

    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
</head>
<body x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode === true }" class="antialiased">
@livewire('header')
{{ $slot }}
@livewire('delete-modal')
@livewire('edit-transaction')
@livewire('create-fund')
@livewire('exist')
@livewire('confirm-draw')
@livewire('empty-draw')
@livewireScripts
{{--@livewire('create-transaction')--}}
</body>
</html>
