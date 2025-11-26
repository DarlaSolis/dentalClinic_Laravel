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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .background-image {
            background-image: url('https://cdn.designcrowd.com/blog/2016/May/root-canal-day/GR_RootCanalAppreciationDay_Banner_828x300.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;



            /* Renderizado optimizado */
            image-rendering: optimizeQuality;
            -webkit-optimize-contrast: optimizeQuality;
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen background-image flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg background-overlay">
        {{ $slot }}
    </div>
</div>
</body>
</html>
