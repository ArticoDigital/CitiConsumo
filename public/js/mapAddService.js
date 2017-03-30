function initMap(lat, lng) {
    var image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';


    if(lat == undefined || lng == undefined )
    {

        if (navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(function (p) {
                var geolocation = {
                    lat: p.coords.latitude,
                    lng: p.coords.longitude
                };
                map.setCenter(geolocation);
                marker.setPosition(geolocation);
                map.setZoom(16);

            });
        }
    }
    lat = (lat == undefined)? 4.60667:lat;
    lng = (lng == undefined)? -74:lng;
    var position = {lat: Number(lat), lng: Number(lng)};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: position,
        scrollwheel: false
    });
    var marker = new google.maps.Marker({
        map: map,
        icon: image
    });
    marker.setPosition(position);
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


