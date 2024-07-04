document.addEventListener("DOMContentLoaded", function() {
    // Initialize Leaflet Map
    const map = L.map('map').setView([51.4352, 3.72866], 10); // Centered on Zeeland coordinates

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Initialize Date Range Picker
    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        fetchData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD')).then(data => {
            renderDataOnMap(data);
            renderTable(data);
        });
    });

    // Fetch data from API
    async function fetchData(startDate = null, endDate = null) {
        let url = '/api/power-data';
        if (startDate && endDate) {
            url += `?start_date=${startDate}&end_date=${endDate}`;
        }
        const response = await fetch(url);
        const data = await response.json();
        return data;
    }

    // Render Data on Map
    function renderDataOnMap(data) {
        map.eachLayer(layer => {
            if (layer instanceof L.CircleMarker) {
                map.removeLayer(layer);
            }
        });

        const markedPlacesList = document.getElementById('marked-places');
        markedPlacesList.innerHTML = '';

        data.forEach(item => {
            const color = item.surplus_shortage >= 0 ? 'green' : 'red';
            const marker = L.circleMarker([item.latitude, item.longitude], {
                color: color,
                radius: 10,
                fillOpacity: 0.5
            }).addTo(map);

            marker.bindPopup(`
                <b>Time:</b> ${item.time}<br>
                <b>Offshore Wind:</b> ${item.offshore_mwh} MWh<br>
                <b>Onshore Wind:</b> ${item.onshore_mwh} MWh<br>
                <b>Sun:</b> ${item.sun_mwh} MWh<br>
                <b>Total Supply:</b> ${item.total_supply} MWh<br>
                <b>Demand:</b> ${item.demand_mwh} MWh<br>
                <b>Surplus/Shortage:</b> ${item.surplus_shortage} MWh
            `);

            const listItem = document.createElement('li');
            listItem.textContent = `${item.time} - ${item.latitude}, ${item.longitude}`;
            markedPlacesList.appendChild(listItem);
        });
    }

    // Render Data in Table
    function renderTable(data) {
        const tableBody = document.getElementById('data-table');
        tableBody.innerHTML = '';
        data.forEach(item => {
            const row = document.createElement('tr');
            row.className = item.surplus_shortage >= 0 ? 'surplus' : 'shortage';
            row.innerHTML = `
                <td>${item.time}</td>
                <td>${item.offshore_mwh}</td>
                <td>${item.onshore_mwh}</td>
                <td>${item.sun_mwh}</td>
                <td>${item.total_supply}</td>
                <td>${item.demand_mwh}</td>
                <td>${item.surplus_shortage}</td>
            `;
            tableBody.appendChild(row);
        });
    }

    fetchData().then(data => {
        renderDataOnMap(data);
        renderTable(data);
    });
});
