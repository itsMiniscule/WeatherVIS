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

<x-main>
    <body class="bg-wind-farm bg-cover bg-center min-h-screen text-white">
    <main class="content-center">
        <h1 class="text-5xl font-bold mb-4">NextFrequency</h1>
        <p class="text-xl mb-8">Hoeveel procent hernieuwbare energie kunt u aan het stroomnet leveren?</p>
        <div class="space-x-4">
            <a href="{{ route('map') }}" class="px-6 py-3 bg-white text-purple-700 rounded hover:bg-gray-200">Get Started</a>
            <a href="{{ route('map') }}" class="px-6 py-3 bg-white text-purple-700 rounded hover:bg-gray-200">Learn More</a>
        </div>
    </main>
    </body>
</x-main>
