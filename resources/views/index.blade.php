<x-main>
    <div id="map"></div>
</x-main>

<script>
    // Pass the coordinates to JavaScript
    var buses = @json($buses);
</script>
<script src="{{ asset('js/map.js') }}"></script>

