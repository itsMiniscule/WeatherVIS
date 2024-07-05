<!-- resources/views/components/main.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'WeatherVIS' }}</title>

    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/css/styles.css'])
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <!-- JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <style>
        .content-center {
            align-items: center;
            height: 100vh;
            text-align: center;
            color: white;
        }
        .navbar-transparent {
            background-color: rgba(45, 55, 72, 0.6); /* Apply a semi-transparent background */
        }
    </style>
</head>

<body class="bg-wind-farm bg-cover bg-center min-h-screen text-white">
<x-navbar />
<main class="content-center">
    {{ $slot }}
</main>
<x-footer />
</body>
</html>
