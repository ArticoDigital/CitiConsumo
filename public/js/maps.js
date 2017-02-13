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
    var lng = $('#lng').val(),
        lat = $('#lat').val();

    if (!lng || !lat) {
        lat = pos.lat;
        lng = pos.lng;
    }

    var myLatlng = new google.maps.LatLng(lat, lng);

    var mapOptions = {
        zoom: 13,
        center: myLatlng,

        //disableDefaultUI: true,
        //scrollwheel: false,
        //styles: styleMap
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
            var service = $(this).data('service');

            var myLatLng = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));
            marker = new google.maps.Marker({
                position: myLatLng,
                animation: google.maps.Animation.DROP,
                map: map,
                title: "asasd",
                icon: icon
            });

            google.maps.event.addListener(marker, "click", function () {
                showInfoProduct(service)
            });
        });


    }
}
$('.InfoServices-close').on('click', function () {
    var payForm = $('#PayForm');
    payForm.hasClass('show')
        ? payForm.removeClass('show')
        : $('.InfoServices').removeClass('show')
});

$('#quantity').on('change', function(){
    var quantity = $(this).val() ? $(this).val() : 1;
    var total = quantity * $('#valueServiceInput').val();
    $('#valueService').text('$' + thousand(total));
    $('#valueTotal').val(total);
});

function showInfoProduct(data) {
    var
        elements = {
            $imageService: $('#imageService'),
            $nameService: $('#NameService'),
            $availableService: $('#availableService'),
            $descriptionService: $('#descriptionService'),
            $valueService : $('#valueService'),
            $valueServiceInput : $('#valueServiceInput'),
            $idServiceInput: $('#idServiceInput'),
            $valueTotal: $('#valueTotal'),
            $quantity: $('#quantity')
        },
        dataMap = $('#Map'),
        routeImageServices = dataMap.data('imagesservice'),
        typeService = dataMap.data('typeservice'),
        imageService = routeImageServices + '/' + data.service_files[0].name;


    elements.$imageService.css("background-image", "url('" + imageService + "')");
    elements.$nameService.html(data.name);
    elements.$availableService.html();
    elements.$descriptionService.html(data.description);
    elements.$valueServiceInput.val(data.price.replace('.', ''));
    elements.$valueTotal.val(elements.$valueServiceInput.val() * elements.$quantity.val());
    elements.$valueService.html('$' + thousand(elements.$valueTotal.val()));
    elements.$idServiceInput.val(data.id);

    $('#PayForm').prepend('<input type="hidden" name="description" value="' + data.description +'">');
    $('.InfoServices').addClass('show');

    if(data.pet.date_end !== undefined)
        setMaxDate(data.pet.date_end);
}

function setMaxDate(maxDate){
    var $date = $('#date'),
        $dateRange = $('#dateRange').val(),
        dates = $dateRange.split('-'),
        changeValues = function(dateStart, dateEnd){

            var dif = dateDiference(dateStart, dateEnd),
                total = dif * $('#valueServiceInput').val();

            $('#valueService').text('$' + thousand(total));
            $('#valueTotal').val(total);
            $('#petQuantity').val(dif);
            $('#nItems').text('# de días : ' + dif);
            return dateStart + ' - ' + dateEnd;
        };

    $date.val(changeValues(dates[0], dates[1]));
    $date.daterangepicker(getConfig('multiple', maxDate));

    $date.on('apply.daterangepicker', function(ev, picker) {
        var start = picker.startDate.format('MM/DD/YYYY'),
            end = picker.endDate.format('MM/DD/YYYY');
        $(this).val(changeValues(start, end));
    });
}

function initMap() {
    if (navigator.geolocation) {
        getIpCoords();
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            succesfull(pos);
        }, function (error) {
            if (error.code == error.PERMISSION_DENIED)
                console.log(error);
        });

    } else {
        handleLocationError(false, infoWindow, map.getCenter());
    }
}


function setIsMultiple(bool) {
    isMultiple = bool;
    $('form.StepsForm').on('submit', function (e) {
        $('#lat').val(marker.getPosition().lat());
        $('#lng').val(marker.getPosition().lng());
    })
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
