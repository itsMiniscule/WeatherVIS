<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WeatherVIS</title>

    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <!-- JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="{{ asset('js/test.js') }}"></script>

</head>

<body>
<x-navbar></x-navbar>
{{ $slot }}
</body>

<x-footer></x-footer>

</html>
