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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <style>
        #map {
            height: 600px;
            width: 100%;
        }
        .surplus {
            background-color: #d4edda;
        }
        .shortage {
            background-color: #f8d7da;
        }
    </style>
</head>
<body>
<h1>WeatherVIS</h1>
<input type="text" name="daterange" id="daterange" />

<div id="map"></div>
<table border="1">
    <thead>
    <tr>
        <th>Time</th>
        <th>Offshore Wind (MWh)</th>
        <th>Onshore Wind (MWh)</th>
        <th>Sun (MWh)</th>
        <th>Total Supply (MWh)</th>
        <th>Demand (MWh)</th>
        <th>Surplus/Shortage (MWh)</th>
    </tr>
    </thead>
    <tbody id="data-table">
    </tbody>
</table>

<script src="{{ asset('js/test.js') }}"></script>
</body>
</html>
