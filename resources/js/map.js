document.addEventListener('DOMContentLoaded', function () {

// Create a map object and set the view to a specific location and zoom level
    const map = L.map('map').setView([52.092876, 5.104480], 9);
    window.map = map;
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Create markers for buses
    buses.forEach(function(bus) {
      var marker = L.marker([bus.y, bus.x]).addTo(map);
    });

});


