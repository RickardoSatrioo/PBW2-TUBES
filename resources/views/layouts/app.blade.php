<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Toaster js --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            padding: 0;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        .main-container {
            max-height: 100vh;
            margin: 0 auto;
            overflow: auto;
            max-width: 100vw;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .main-container::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    <div class="main-container">
        {{ $slot }}
    </div>

    {{-- Toaster js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>
