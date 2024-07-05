<x-main>
    <div class="control-panel">
        <h3>Toggle Markers</h3>
        <label class="checkbox-label">
            <input type="checkbox" id="toggleGroups" checked />
            Show All Groups
        </label>
    </div>
    <div>Total Production: <span id="totalProduction">0</span></div>
    <div id="legend"></div>
    <div id="map"></div>
</x-main>

<script>
    // Pass the coordinates to JavaScript
    var buses = @json($buses);
</script>
