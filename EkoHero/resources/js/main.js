// Onload.
$(function() {
    // Initialize autocomplete.
    initialize();
    // Focus.
    $('#locationSearch').focus();
    // Geolocate user.
    geoLocate(function(coords) {
        // Remove loading.
        $('.notice').html('');
        $('.notice').html('Random text.')
        // On button click get data.
        $('.btn').click(function() {
            // Get data.
            var destination = $('#locationSearch').val();
            var originCords = coords.lat + ',' + coords.lon;
            data = {origin: originCords, dest: destination}
            // Ajax get.
            $.get('api.php', data, function(data) {
                alert(data);
            });
            return false;
        });
    });
});

// Initialize autocomplete.
function initialize() {
  autocomplete = new google.maps.places.Autocomplete(document.getElementById('locationSearch'));
  autocomplete.setComponentRestrictions({'country': 'se'});
}

// Geolocate user.
function geoLocate(callback) {
    // Get geolocation
    if (navigator.geolocation) {
        // Print loading.
        $('.notice').html('Laddar din plats');
        navigator.geolocation.getCurrentPosition(function (position) {
            var coords = {'lat': position.coords.latitude,
                'lon': position.coords.longitude};
            callback(coords);
        });
    // Not supported
    } else {
        $('body').append('Geolocation is not supported');
    }
}
