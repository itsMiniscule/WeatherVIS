<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WeatherVIS</title>

        @vite(['resources/js/app.js'])
        @vite(['resources/css/app.css'])
        <!-- CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

        <!-- JavaScript -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    </head>

    <body>
    <div id="map"></div>
    </body>

</html>
