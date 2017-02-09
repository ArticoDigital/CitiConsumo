$(window).load(function(){
    setTimeout(function(){
        $('#preloader').addClass('hide');
        $('body').css('overflow', 'visible');
    }, 1000);
});
    
$('.Hamburguer').click(function(){
    $(this).toggleClass('open');
    $(this).siblings().toggleClass('show');
    if($(this).hasClass('open'))
        $('body').css('overflow', 'hidden');
    else
        $('body').css('overflow', 'visible');
});

$('.Hamburguer2').click(function(){
    $(this).toggleClass('open');
    $('#fullmenu').toggleClass('show');
    if($(this).hasClass('open'))
        $('body').css('overflow', 'hidden');
    else
        $('body').css('overflow', 'visible');
});

$('.Header .Arrow').on('click', function(){
    var position = $('body > section').eq(0).position().top;
    $('body, html').stop(true, true).animate({scrollTop:position}, '1000', 'swing');
});

$('.Alert .Message .close').on('click', function(){
    $(this).parent().parent().hide();
});

function setCharsLength(){
    var size = $('#description').val().length;
    var nChars = $('#nChars');

    nChars.children('span').text(size);
    if(size > 800) nChars.css('color', 'red');
    else nChars.css('color', 'green');
}

$('#PlaceIcon').on('click', function(){
    if (navigator.geolocation) {
        var $this = $(this);
        $this.children('svg').toggleClass('blue');
        navigator.geolocation.getCurrentPosition(function(position) {

            if($this.children('svg').hasClass('blue')){
                $('#lat').val(position.coords.latitude);
                $('#lng').val(position.coords.longitude);
                $('#autocomplete').val('Posición actual');
            } else {
                $('#lat').val('');
                $('#lng').val('');
                $('#autocomplete').val('');
            }


        }, function(error) {
            $this.children('svg').toggleClass('blue');
            if(error.code == 1){
                alert('Debes habilitar permisos de Geolocalización para este sitio web.');
            }
        });
    }
    else{
        alert('No es posible obtener su ubicación actual');
    }
});

function thousand(n) {
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function dateDiference(start, end){
    start = start.split('/');
    end = end.split('/');

    start = Date.UTC(start[2],start[0],start[1]-1);
    end = Date.UTC(end[2],end[0],end[1]-1);

    var dif = end - start;
    return Math.floor(dif / (1000 * 60 * 60 * 24)) + 1;
}

function getLessDate(a, b){
    var t1 = a.split('/'),
        t2 = b.split('/');

    t1 = Date.UTC(t1[2],t1[0],t1[1]-1);
    t2 = Date.UTC(t2[2],t2[0],t2[1]-1);

    if(t1 <= t2)
        return a;
    return b;
}