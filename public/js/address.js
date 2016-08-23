var placeSearch, autocomplete;


function initAutocomplete() {

    var autocompleteInput = $('[id*="address"]');
    autocomplete = [];

    for(var i = 0; i < autocompleteInput.length; i++){
        autocomplete[i] = new google.maps.places.Autocomplete(
            (document.getElementById('address' + (i+1))),
            {types: ['geocode']});
        autocomplete[i].addListener(autocomplete[i], 'place_changed', fillInAddress);
    }
}

function fillInAddress() {
    var place = autocomplete.getPlace();

    document.getElementById('lat').value = place.geometry.location.lat();
    document.getElementById('lng').value = place.geometry.location.lng();
}
function geolocate() {

}