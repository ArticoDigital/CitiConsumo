/**
 * Created by juan2ramos on 15/07/16.
 */
var arrayMarkers = new Array,
    map,
    marker,
    icon = $('#Map').data('image'),
    isMultiple = true;

styleMap = [{
    "featureType": "landscape",
    "elementType": "labels",
    "stylers": [{"visibility": "off"}]
}, {"featureType": "transit", "elementType": "labels", "stylers": [{"visibility": "off"}]}, {
    "featureType": "poi",
    "elementType": "labels",
    "stylers": [{"visibility": "off"}]
}, {"featureType": "water", "elementType": "labels", "stylers": [{"visibility": "off"}]}, {
    "featureType": "road",
    "elementType": "labels.icon",
    "stylers": [{"visibility": "off"}]
}, {"stylers": [{"hue": "#00aaff"}, {"saturation": -100}, {"gamma": 2.15}, {"lightness": 12}]}, {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [{"visibility": "on"}, {"lightness": 24}]
}, {"featureType": "road", "elementType": "geometry", "stylers": [{"lightness": 57}]}]

function succesfull(pos) {
    var lng = $('#lat').val(),
        lat = $('#lng').val();

    if (!lng || !lat) {
        lat = pos.lat;
        lng = pos.lng;
    }

    var myLatlng = new google.maps.LatLng(lat, lng);

    var mapOptions = {
        zoom: 17,
        center: myLatlng,
        disableDefaultUI: true,
        //scrollwheel: false,
        styles: styleMap
    };

    map = new google.maps.Map(document.getElementById("Map"), mapOptions);

    marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Hello World!',
        draggable: !isMultiple
    });

    if (isMultiple) {
        $('.Platform-productSection').each(function (e) {
            lat = $(this).data('lat');
            lng = $(this).data('lng');
            var myLatLng = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));
            marker = new google.maps.Marker({
                position: myLatLng,
                animation: google.maps.Animation.DROP,
                map: map,
                title: 'asdas',
                icon: icon
            });

            google.maps.event.addListener(marker, "click", function () {
                showInfoProduct(this.title)
            });
        });




    }

}
$('.InfoServices-close').on('click', function () {
    $('.InfoServices').removeClass('show')
});
function showInfoProduct(data) {
    $('.InfoServices').addClass('show')
}

function initMap() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {

            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            succesfull(pos);
        }, function (error) {
            getIpCoords();
            if (error.code == error.PERMISSION_DENIED)
                console.log(error);
        });

    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function setIsMultiple(bool) {
    isMultiple = !bool;
    if (isMultiple) {
        $('form').on('submit', function () {
            $('#lat').val(marker.getPosition().lat());
            $('#lng').val(marker.getPosition().lng());
        })
    }
}

function getIpCoords() {
    $.getJSON('//freegeoip.net/json/?callback=?', function (data) {
        var pos = {
            lat: data.latitude,
            lng: data.longitude
        };
        succesfull(pos);
    });
}