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
    if(size < 800) nChars.css('color', 'red');
    else nChars.css('color', 'green');
}