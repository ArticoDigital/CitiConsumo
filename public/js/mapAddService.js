function initMap() {
    var image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';
    var position = {lat: 4.60667, lng: -74.2363688};
    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function (position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            console.log(geolocation)
            map.setCenter(geolocation);
            marker.setPosition(geolocation);
            map.setZoom(16);
            /*var circle = new google.maps.Circle({
             center: geolocation,
             radius: position.coords.accuracy
             });
             autocomplete.setBounds(circle.getBounds());
             */
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
    /*var marker = new google.maps.Marker({
     position: position,
     map: map
     });*/
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
        {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
    autocomplete.bindTo('bounds', map);
    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        var positionLocation = place.geometry.location;
        map.setCenter(positionLocation);
        marker.setPosition(positionLocation);


        /*for (var component in componentForm) {
         document.getElementById(component).value = '';
         document.getElementById(component).disabled = false;
         }*/

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        /* for (var i = 0; i < place.address_components.length; i++) {
         var addressType = place.address_components[i].types[0];
         if (componentForm[addressType]) {
         var val = place.address_components[i][componentForm[addressType]];
         document.getElementById(addressType).value = val;
         }
         }*/
    }


}


// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};


// [START region_fillform]
function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    console.log(place)

    /*for (var component in componentForm) {
     document.getElementById(component).value = '';
     document.getElementById(component).disabled = false;
     }*/

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
    }
}
