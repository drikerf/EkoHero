// Onload.
$(function() {
    // Twitter popup.
    $('.btn-twitter').on('click', function() {
        window.open("https://twitter.com/intent/tweet?hashtags=EkoHero%2C&original_referer=http%3A%2F%2Flocalhost%2Fekohero%2F&text=Jag%20%C3%A4r%20en%20EkoHero%2C%20Bli%20en%20du%20med%3A%20&tw_p=tweetbutton&url=http%3A%2F%2Fwww.ekohero.se", "_blank", "width=500, height=500");
        return false;
    });
    // Facebook popup.
    $('.btn-facebook').on('click', function() {
        window.open('https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fekohero.se', '_blank', 'width=500, height=500');
    });
    //Set random background.
    randomBackground();
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
            // Empty?
            if ($('#locationSearch').val() == '') {
                return false;
            }
            // Disable button.
            $('#go').attr('disabled','');
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
                    if (key == 'status') {
                        return;
                    }
			        console.log(key);
                    console.log(value['googlelink']);
                    var idCO2 = '#' + key + CO2_SUFFIX;
                    var id = '#' + key;
                    // Icon.
                    var icon = '<span class="ls-icon-large ' + value['icon'] + '"></span>';
                    // Populate CO2.
                    console.log(value['altemission']); // Broken.
                    var dispCO2 = '<h1>' + value['altemission']['amount'] + '<span class="co2-unit">' + value['altemission']['unit'] + '</span></h1>';
                    $(idCO2).html(dispCO2);
                    // Map link.
                    var mapLink = '<a class="map-icon" href="' + value['googlelink'] + '" target="_blank"><span class="ls-icon-large ls-icon-map"></span></a>';
                    // Populate details.
                    var mode = id + ' td:nth-child(1)';
                    var dur = id + ' td:nth-child(2)';
                    var emi = id + ' td:nth-child(3)';
                    var map = id + ' td:nth-child(4)';
                    $(mode).html(icon);
                    $(dur).html(value['duration']);
                    $(emi).html(value['emission']);
                    $(map).html(mapLink);
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

    // Result events.
    $('tr').on('click', function() {
        // Get old CO2 display id.
        var oldId = $('.current-view').attr('id');
        oldId = '#' + oldId + 'CO2';
        // Remove current view from all tr.
        $('tr').removeClass('current-view');
        $('tr').removeClass('green')
        // Set current-view on clicked tr.
        $(this).addClass('current-view');
        // Get new display CO2 id.
        var newId = $(this).attr('id');
        var newId = '#' + newId + 'CO2';
        // If Walk or bike set green.
        if (newId == '#walkingCO2' || newId == '#bicyclingCO2') {
            $(newId).addClass('co2-green');
            $(this).addClass('green');
        }
        // Hide old and display new CO2.
        $(oldId).hide();
        $(newId).show();
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

//Random Background
function randomBackground() {
	// Backgrounds
	var images = ['bg.jpg','mountain_ocean.jpg'];
	// Choose random bg
	var bg = images[Math.floor(Math.random() * images.length)];
	// Set background
	$('body').css({'background-image' : 'url("resources/img/'+bg+'")'});
}
