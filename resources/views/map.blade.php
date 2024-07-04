<x-main>
    <div id="map" style="width: 100%; height: 500px; margin-top: 20px;"></div>
</x-main>

<script>
    // Pass the coordinates to JavaScript
    var buses = @json($buses);
</script>
<script src="{{ asset('js/map.js') }}"></script>
