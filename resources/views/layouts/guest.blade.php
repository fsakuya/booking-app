<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&family=Noto+Sans+JP&display=swap" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/recet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="font-noto">
    <div class="min-h-screen bg-gray-100">
        <div class="text-gray-900 antialiased">
            <div class="px-20 py-4">
                {{ $slot }}
            </div>
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
