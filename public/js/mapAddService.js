function initMap() {
    var image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';
    var position = {lat: 4.60667, lng: -74.2363688};
    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function (position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            map.setCenter(geolocation);
            marker.setPosition(geolocation);
            map.setZoom(16);

        });
    }

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: position,
        scrollwheel: false
    });
    var marker = new google.maps.Marker({
        map: map,
        icon: image
    });

    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
        {types: ['geocode']});


    autocomplete.addListener('place_changed', fillInAddress);
    autocomplete.bindTo('bounds', map);
    function fillInAddress() {

        var place = autocomplete.getPlace(),
            positionLocation = place.geometry.location,
            lat = place.geometry.location.lat(),
            lng = place.geometry.location.lng();
            console.log(lat);
            $('#lat').val(lat);
            $('#lng').val(lng);
        map.setCenter(positionLocation);
        marker.setPosition(positionLocation);

    }

    google.maps.event.addDomListener(document.getElementById('autocomplete'), 'keydown', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
    });

}


