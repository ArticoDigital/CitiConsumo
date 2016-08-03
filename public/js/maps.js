/**
 * Created by juan2ramos on 15/07/16.
 */
var arrayMarkers = new Array;
var map;
var position;
var icon = $('#Map').data('image');
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

function initMap() {
    var myLatlng = new google.maps.LatLng($('#lng').val(), $('#lat').val());

    var mapOptions = {
        zoom: 17,
        center: myLatlng,
        disableDefaultUI: true,
        //scrollwheel: false,
        styles: styleMap
    };
    $('iframe').contents().find('.login-control').css('opacity','0');

    map = new google.maps.Map(document.getElementById("Map"), mapOptions);
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        function showPosition(position) {
            console.log(position.coords.latitude + " Longitud: " + position.coords.longitude) ;
        }
    }
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Hello World!'
    });
    var locations = [
        ['Daily Record Building', 55.861136, -4.257803],
        ['The Glasgow School of Art', 55.865958, -4.263405],
        ['The Hill House', 56.017421, -4.729455],
        ['House for an Art Lover', 55.847325, -4.313746],
        ['The Hunterian', 55.871751, -4.288360]
    ];

    /*infowindow = new google.maps.InfoWindow({
     size: new google.maps.Size(150,50)
     });*/

    function setMarkers(locations) {
        for (var i = 0; i < locations.length; i++) {
            var location = locations[i];

            var myLatLng = new google.maps.LatLng(parseFloat($('#lng').val()) + (.0005 * (i + 1)), parseFloat($('#lat').val())+ (.0005 * (i + 1)));
            var marker = new google.maps.Marker({
                position: myLatLng,
                animation: google.maps.Animation.DROP,
                map: map,
                title: location[0],
                icon:icon
            });

            // Standard markers - if not using infobox
            google.maps.event.addListener(marker, "click", function () {

            });

        }
    }
    setMarkers(locations);
}

function addMarker(n) {
    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map,
        animation: google.maps.Animation.DROP,
        draggable: true,
        identificador: n
    });

    arrayMarkers.push(marker);

    google.maps.event.addListener(marker, 'dblclick', function () {
        for (var a = 0; a < arrayMarkers.length; a++) {
            if (arrayMarkers[a]['identificador'] == this.identificador) {
                arrayMarkers[a].setMap(null);
                arrayMarkers.splice(a, 1);
            }
        }
    });
}


$('#addMaker').on('click', function () {
    addMarker(arrayMarkers.length, true);
});

function getPosition(position) {
    this.position = position;
}

function showMarkers(isDraggable) {
    var coord = this.position.split(';');
    for (var i = 0; i < coord.length; i++) {

        var lat = parseFloat(coord[i].split('&')[0]);
        var lng = parseFloat(coord[i].split('&')[1]);

        var marker = new google.maps.Marker({
            position: {lat: lat, lng: lng},
            map: map,
            draggable: isDraggable
        });

        arrayMarkers.push(marker);
    }
    setMapOnAll(map);
}

