/* REMOVER CLASE "DISABLED" */

$('#Step1 label').on('click', function(){
    $('#toStep2, .gray2').removeClass('disabled');
});

$("#Step2").on('keyup', 'input, textarea', function(){
    var $StepItems = $('#Step2 input');
    var flag = true;
    for(var i = 0; i < $StepItems.length; i++){
        if(!$StepItems.eq(i).val())
            flag = false;
    }
    if(flag) $('#toStep3, .gray3').removeClass('disabled');
});

$("#Step3 #files").on('change', function(){
    $('#toStep4, .gray3').removeClass('disabled');
});

/* CLIC EN BOTON SIGUIENTE*/

$('#toStep2').click(function(){
    nextStep($(this), 2);
});

$('#toStep3').click(function(){
    nextStep($(this), 3);
});

$('#toStep4').click(function(){
    nextStep($(this), 4);
});

/* CLIC EN SVG PASO A PASO*/

$('#Steps').on('click', '[class*="gray"]', function(){

    if($(this).hasClass('gray1')){
        nextStep($(this), 1);
    }
    else if($(this).hasClass('gray2')){
        nextStep($(this), 2);
    }
    else if($(this).hasClass('gray3')){
        nextStep($(this), 3);
    }
    else if($(this).hasClass('gray4')){
        nextStep($(this), 4);
    }
});

/* EJECUTAR PASO A PASO */
function nextStep(element, step){
    var $all = $('[class*="gray"]'),
        $form = $('.StepsForm');

    if(!element.hasClass('disabled')){
        $all.removeClass('active');
        $form.css('left', -(step * 100 - 100) + '%');
        for(var i = 2; i <= step; i++){
            $('.gray' + i).addClass('active');
        }
    }
}