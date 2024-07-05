<x-main>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .control-panel {
            padding: 20px;
            background-color: #f4f4f4;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .control-panel h3 {
            margin: 0 0 10px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
        }

        .checkbox-label input[type="checkbox"] {
            margin-right: 10px;
        }

        .date-selector {
            padding: 10px 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .date-selector label {
            margin-right: 10px;
            font-weight: bold;
        }

        .date-selector input[type="date"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        #totalProduction {
            font-weight: bold;
        }

        #legend, #map {
            margin-top: 20px;
        }

        #map {
            height: 500px;
            background-color: #eaeaea;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>

    <div class="control-panel">
        <h3>Toggle Markers</h3>
        <label class="checkbox-label">
            <input type="checkbox" id="toggleGroups" checked />
            Show All Groups
        </label>
    </div>

    <div class="date-selector">
        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date">
    </div>

    <div>Total Production: <span id="totalProduction">0</span></div>
    <div id="legend"></div>
    <div id="map"></div>
</x-main>

<script>
    // Pass the coordinates to JavaScript
    var buses = @json($buses);

    document.getElementById('date').addEventListener('change', function() {
        var selectedDate = this.value;
        if (selectedDate) {
            // Reload the page with the selected date as a query parameter
            window.location.href = '?date=' + selectedDate;
        }
    });

    // If a date is already selected in the URL, set it in the date input
    window.addEventListener('DOMContentLoaded', (event) => {
        var urlParams = new URLSearchParams(window.location.search);
        var dateParam = urlParams.get('date');
        if (dateParam) {
            document.getElementById('date').value = dateParam;
        }
    });
</script>
