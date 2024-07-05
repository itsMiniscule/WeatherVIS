document.addEventListener('DOMContentLoaded', function () {

// Create a map object and set the view to a specific location and zoom level
    const map = L.map('map').setView([52.092876, 5.104480], 9);
    window.map = map;
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Define 16 different icons for markers
    const icons = [];
    for (let i = 1; i <= 16; i++) {
        icons.push(L.icon({
            iconUrl: `icon${i}.svg`, // Replace with actual icon URLs
            iconSize: [38, 95], // size of the icon
            shadowSize: [50, 64], // size of the shadow
        }));
    }

    // Array to hold markers for each group
    let markersByGroup = [];

    function addLegendItem(iconIndex, productionMultiplier) {
        const legend = document.getElementById('legend');
        const legendItem = document.createElement('div');
        legendItem.className = 'legend-item';
        legendItem.innerHTML = `
            <img src="icon${iconIndex + 1}.svg" class="legend-icon"> Production: ${productionMultiplier}
        `;
        legend.appendChild(legendItem);
    }

    // Function to add markers for a specific group with a given icon and production multiplier
    function addMarkersForGroup(group, iconIndex, productionMultiplier) {
        const icon = icons[iconIndex % icons.length];
        let groupMarkers = [];
        let groupProduction = 0;

        group.forEach(function (point) {
            let marker = L.marker([point.y, point.x], { icon: icon }).addTo(map);
            groupMarkers.push(marker);
            groupProduction += productionMultiplier; // Accumulate production
        });

        // Add legend item for the group
        addLegendItem(iconIndex, productionMultiplier);

        return { markers: groupMarkers, production: groupProduction };
    }





    // Function to remove all markers from map
    function removeMarkers(markers) {
        markers.forEach(function (marker) {
            map.removeLayer(marker);
        });
    }

    // Function to calculate distance between two points (in kilometers)
    function calcDistance(point1, point2) {
        const lat1 = point1.y;
        const lon1 = point1.x;
        const lat2 = point2.y;
        const lon2 = point2.x;

        const R = 6371; // Radius of the Earth in km
        const dLat = deg2rad(lat2 - lat1);
        const dLon = deg2rad(lon2 - lon1);
        const a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        const distance = R * c; // Distance in km
        return distance;
    }

    function deg2rad(deg) {
        return deg * (Math.PI / 180);
    }

    // Coastline coordinates
    const coastline = { x: 3.342378, y: 51.363689 };

    // Threshold distance for grouping (in kilometers)
    const thresholdDistance = 10.75;

    // Function to group points based on proximity
    function groupPoints(data) {
        let groups = [];
        let visited = new Set();

        for (let i = 0; i < data.length; i++) {
            if (!visited.has(i)) {
                let group = [data[i]];
                visited.add(i);

                for (let j = i + 1; j < data.length; j++) {
                    if (!visited.has(j)) {
                        const dist = calcDistance(data[i], data[j]);
                        if (dist <= thresholdDistance) {
                            group.push(data[j]);
                            visited.add(j);
                        }
                    }
                }

                groups.push(group);
            }
        }

        return groups;
    }

    const groups = groupPoints(buses);

    // Example production values (randomly generated between -100 and 100)
    const productionMultipliers = Array.from({ length: 16 }, () => Math.floor(Math.random() * 201) - 100); // Generates random numbers between -100 and 100
    let totalProduction = 0;

    // Add markers for each group with alternating icons
    groups.forEach((group, index) => {
        const productionMultiplier = productionMultipliers[index % productionMultipliers.length];
        const result = addMarkersForGroup(group, index, productionMultiplier);
        markersByGroup.push(result.markers);
        totalProduction += result.production; // Accumulate total production
    });

    // Display total production on the webpage
    const totalProductionElement = document.getElementById('totalProduction');
    totalProductionElement.textContent = totalProduction;

    // Checkbox event listener for toggling markers
    document.getElementById('toggleGroups').addEventListener('change', function () {
        if (this.checked) {
            markersByGroup.forEach(markers => markers.forEach(marker => marker.addTo(map)));
        } else {
            markersByGroup.forEach(removeMarkers);
        }
    });

    // Function to handle click event
    function onMapClick(e) {
        alert("You clicked the map at " + e.latlng.toString());
    }

    // Add click event listener to the map
    map.on('click', onMapClick);

});
