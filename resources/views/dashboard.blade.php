<x-main>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .dashboard {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .statistics {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-bottom: 20px;
        }

        .map-container {
            width: 100%;
            height: 500px;
            margin-bottom: 20px;
        }

        .table-container {
            width: 100%;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>

    <div class="dashboard">
        <div class="statistics">
            <div>Total Buses: <span id="totalBuses">0</span></div>
            <div>Total Offshore Wind Production: <span id="totalOffshore">0</span></div>
            <div>Total Onshore Wind Production: <span id="totalOnshore">0</span></div>
            <div>Total PV Production: <span id="totalPv">0</span></div>
            <div>Total Unified Production: <span id="totalUnified">0</span></div>
        </div>

        <div id="map" class="map-container"></div>

        <div class="table-container">
            <h3>Offshore Wind Data</h3>
            <table id="offshoreTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Production</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div class="table-container">
            <h3>Onshore Wind Data</h3>
            <table id="onshoreTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Production</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div class="table-container">
            <h3>Photovoltaic Data</h3>
            <table id="pvTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Production</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div class="table-container">
            <h3>Unified Generation Data</h3>
            <table id="unifiedTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Production</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        fetch('/dashboard', {
            headers: {
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                let totalProduction = 0;
                data.buses.forEach(bus => {
                    L.marker([bus.x, bus.y]).addTo(map)
                        .bindPopup(`Bus: ${bus.name}<br>Nominal Voltage: ${bus.v_nom} V<br>Random Production: ${bus.random_production}`);
                    totalProduction += bus.random_production;
                });
                document.getElementById('totalBuses').innerText = data.buses.length;
                document.getElementById('totalUnified').innerText = totalProduction;

                function displayData(items, tableId, totalId) {
                    let tableBody = document.querySelector(`#${tableId} tbody`);
                    tableBody.innerHTML = '';
                    let totalProduction = 0;

                    items.forEach(item => {
                        let row = document.createElement('tr');
                        row.innerHTML = `<td>${item.id}</td><td>${item.production}</td><td>${item.date}</td>`;
                        tableBody.appendChild(row);
                        totalProduction += item.production;
                    });

                    document.getElementById(totalId).innerText = totalProduction;
                }

                displayData(data.offshore, 'offshoreTable', 'totalOffshore');
                displayData(data.onshore, 'onshoreTable', 'totalOnshore');
                displayData(data.pv, 'pvTable', 'totalPv');
            });
    </script>
</x-main>
