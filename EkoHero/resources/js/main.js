// Onload.
$(function() {
    // Return click counter.
    var clickCounter = 0;
    // Initialize autocomplete.
    initialize();
    // Focus.
    $('#locationSearch').focus();
    // Geolocate user.
    geoLocate(function(coords) {
        // Remove disabled.
        $('#locationSearch').removeAttr('disabled');
        $('#go').removeAttr('disabled');
        // Remove loading.
        $('.notice').html('Knappa in din destination och bli en #EkoHero');
        // On button click get data.
        $('#go').on('click', function() {
            // Clickcounter solves double return click bug.
            clickCounter++;
            if (clickCounter > 1) {
                return false;
            }
            // Get data.
            var destination = $('#locationSearch').val();
            var originCords = coords.lat + ',' + coords.lon;
            data = {origin: originCords, dest: destination}
            // Ajax get.
            $.getJSON('api.php', data, function(data) {
                console.log('api');
                // Co2 id suffix.
                var CO2_SUFFIX = 'CO2';
                // Iterate modes.
                $.each(data, function(key, value) {
                    var idCO2 = '#' + key + CO2_SUFFIX;
                    var id = '#' + key;
                    // Populate CO2.
                    var dispCO2 = '<h1>' + value['emission'] + '<span class="co2-unit">kg CO2</span></h1>';
                    $(idCO2).html(dispCO2);
                    // Populate details.
                    var mode = id + ' td:nth-child(1)';
                    var dur = id + ' td:nth-child(2)';
                    var emi = id + ' td:nth-child(3)';
                    var icon = '<span class="glyphicon ' + value['icon'] + '"></span>'
                    $(mode).html(icon);
                    $(dur).html(value['duration']);
                    $(emi).html(value['emission']);
                });
                // Hide start view.
                $('#start').hide();
                // Show result.
                $('#result').show();
                $('#drivingCO2').show();
                $('').show();
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
        $('.notice').html('Laddar din plats ...');
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
