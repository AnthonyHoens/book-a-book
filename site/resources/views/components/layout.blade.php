<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Title -->
    <title>{{ $title }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/paginate.css') }}">

</head>
<body>
    <h1 class="sr-only" role="heading" aria-level="1">
        {{ config('app.name') }} - Plateforme de livre à prix réduis proposé par Xavier Spirlet
    </h1>

    @auth
        <!-- Header -->
        <header>
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                <x-admin-header></x-admin-header>
            @else
                <x-header></x-header>
            @endif
        </header>
    @endauth

    <!-- Content -->
    <main  @guest() class="auth_main" @endguest>
        {{ $content }}
    </main>
    @livewireScripts
</body>
</html>
