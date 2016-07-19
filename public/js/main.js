$(window).load(function(){
    setTimeout(function(){
        $('#preloader').addClass('hide');
        $('body').css('overflow', 'visible');
    }, 2000);
});

$('.Hamburguer').click(function(){
    $(this).toggleClass('open');
    $(this).siblings().toggleClass('show');
    if($(this).hasClass('open'))
        $('body').css('overflow', 'hidden');
    else
        $('body').css('overflow', 'visible');
});