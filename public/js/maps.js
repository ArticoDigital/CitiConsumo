/**
 * Created by juan2ramos on 15/07/16.
 */
var arrayMarkers = new Array,
    map,
    marker,
    icon = $('#Map').data('image'),
    isMultiple = true,
    booleanValue = false;

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
$('.ViewMore').on('click', function (e) {
    e.preventDefault();
});
$('.InfoServices-close').on('click', function () {
    var payForm = $('#PayForm');
    payForm.hasClass('show')
        ? payForm.removeClass('show')
        : $('.InfoServices').removeClass('show')
});

$('#quantity').on('change', function () {
    var total = Math.ceil($(this).val() * $('#PriceFixed').text().replace('.', '')).toString()
        .replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
    $('#Price').html('$' + total);
    $('#RateType').html('Total');

});

function showInfoProduct(data) {
    var
        elements = {
            $imageService: $('#imageService'),
            $nameService: $('#NameService'),
            $availableService: $('#availableService'),
            $descriptionService: $('#descriptionService'),
            $valueService: $('#valueService'),
            $valueServiceInput: $('#valueServiceInput'),
            $idServiceInput: $('#idServiceInput'),
            $valueTotal: $('#valueTotal'),
            $quantity: $('#quantity'),
            $LocationService: $('#LocationService'),
            $InfoServices: $('#InfoServices-infoInclude'),
            $Price: $('#Price'),
            $PriceFixed: $('#PriceFixed'),
            $RateType: $('#RateType'),
            $ResponseType: $('#ResponseType'),
            $RateTypeForm: $('#RateTypeForm'),
            $DateI: $('#DateI'),
            $DateF: $('#DateF'),
            $hourI: $('#HourI'),
            $hourF: $('#HourF'),
            $ModalExperience: $('#ModalExperience'),
            $ModalExperienceName: $('#ModalExperienceName'),
            $certifications: $('#certifications'),

        },
        dataMap = $('#Map'),
        routeImageServices = dataMap.data('imagesservice'),
        typeService = dataMap.data('typeservice'),
        imageService = routeImageServices + '/' + data.service_files[0].name;

    console.log(data.experience_type_id);
    elements.$imageService.css("background-image", "url('" + imageService + "')");
    elements.$nameService.html(data.provider.user.name + ' ' + data.provider.user.last_name);
    elements.$LocationService.html(data.provider.user.location)
    elements.$Price.html(data.price)
    elements.$PriceFixed.html(data.price)
    elements.$RateType.html('X ' + data.rate_type)
    elements.$RateTypeForm.html(data.rate_type + ("(s)"))
    elements.$DateI.html(data.date_start)
    elements.$DateF.html(data.date_end)
    elements.$hourI.html(data.hour1)
    elements.$hourF.html(data.hour2)
    elements.$ModalExperience.html(data.experience_type.id - 1)
    elements.$ModalExperienceName.html(data.experience_type.name)
    var response = (data.inmediate_response) ? 'Inmediata' : data.response_type.name,
        sizes = data.pet ? data.pet.sizes : null;
    elements.$ResponseType.html(response)

    if (data.service_files.filter(checkCertificate).length > 0) {
        elements.$certifications.show();
    } else {
        elements.$certifications.hide();
    }



    function checkCertificate(item) {
        return item.kind_file == "certificado";
    }
    var daysArray = data.days.split(',');
    $('#Date span').removeClass('active');
    for (var i = 0; i < daysArray.length; i++) {
        $('#Date').find("span:nth-of-type(" + daysArray[i] + ")").addClass('active')
    }
    $('#Pets li').hide();
    if (sizes) {
        for (var i = 0; i < sizes.length; i++) {
            $('#Pets .size-' + sizes[i].id).show();

        }
    }

    $('.pets-data').hide()
    if (data.pet) {
        $('.puppy').show()
        $('.adult').show()
        $('.elderly').show()
        $('.smoke_free').show()
        $('.home_service').show()
    }

    console.log(data)
    elements.$InfoServices.find('span').remove();
    data.service_addition.split(',').forEach(
        function myFunction(item, index) {
            elements.$InfoServices.append('<span>' + item + '</span>');
        }
    )
    $("#owl-carousel").html('');
    var content = "";

    data.service_files.forEach(function (item, index) {

        if (item.kind_file == 'imagen') {
            var img = $("#owl-carousel").data('url') + '/uploads/products/' + item.name;
            var alt = item.name;
            content += " <figure class='col-12 small-12 ' style='margin: 0;'>" +
                "<img src=\"" + img + "\" alt=\"" + alt + "\">" +
                "</figure>"
        }


    });
    $("#owl-carousel").html(content);

    $("#owl-carousel").owlCarousel({

        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        navigationText: ["<", ">"],
    });
    var owl = $(".owl-carousel").data('owlCarousel');
    owl.reinit({

        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        navigationText: ["<", ">"],
    })


    /*foreach($service->serviceFiles as $file)
     <figure class='col-12 small-12 ' style='margin: 0;'>
     <img src="{{asset('uploads/products/'.$file->name)}}" alt="">
     </figure>
     @endforeach*/


    elements.$availableService.html();
    elements.$descriptionService.html(data.description);
    elements.$valueServiceInput.val(data.price.replace('.', ''));
    elements.$valueTotal.val(elements.$valueServiceInput.val() * elements.$quantity.val());
    elements.$valueService.html('$' + thousand(elements.$valueTotal.val()));
    elements.$idServiceInput.val(data.id);

    $('#PayForm').prepend('<input type="hidden" name="description" value="' + data.description + '">');
    $('.InfoServices').addClass('show');


}

function setMaxDate(maxDate) {
    var $date = $('#date'),
        $dateRange = $('#dateRange').val(),
        dates = $dateRange.split('-'),
        changeValues = function (dateStart, dateEnd) {

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

    $date.on('apply.daterangepicker', function (ev, picker) {
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

