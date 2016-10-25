/* REMOVER CLASE "DISABLED" */

nextStep($('#toStep1'), 1);
enableNext();

$("#Step2").on('keyup', 'input, textarea', function(){
    enableNext();
});

$("#Step3 #files").on('change', function(){
    $('#toStep4, .gray4').removeClass('disabled');
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
        enableNext();
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
        $form = $('.StepsForm'),
        height = $('#Step' + step).height();

    if(!element.hasClass('disabled')){
        $all.removeClass('active');
        $form.css('left', -(step * 100 - 100) + '%');
/*             .parent().css('height', (60 + $('#Steps').height() + height) + 'px');
        if(step == 3)
            $form.parent().css('height', 'auto');*/

        for(var i = 2; i <= step; i++){
            $('.gray' + i).addClass('active');
        }
    }

    $("html, body").animate({ scrollTop: $('main').position().top }, 500);
}

$('[name="service"]').each(function () {
    if(this.checked)
        getServiceChecked($('#' +  this.id));
});

$('[name="service"]').on('change', function(){
    getServiceChecked($(this));
});

function getServiceChecked($this){
    var element;
    $('#toStep2, .gray2').removeClass('disabled');
    $('.changeInputs label').removeClass('required').hide().children('input').removeAttr('name').removeAttr('id');
    $('#toStep3, .gray3').addClass('disabled');

    if($this.attr('id') == 'foods')
        element = 'foodsInputs';
    else if($this.attr('id') == 'pets')
        element = 'petsInputs';
    else
        element = 'servicesInputs';

    element = $('#' + element + ' label').addClass('required').show();

    var inputs = element.children('input');
    for(var i = 0; i < inputs.length; i++){
        var input = inputs.eq(i),
            fakeName = input.attr('fakeName');
        input.attr('name', fakeName).attr('id', fakeName);
    }
}


$('.datetimepicker_mask, [id*="address"]').on('click keydown', function(){
    $("html, body").animate({ scrollTop: $(document).height() }, 500);
});

function enableNext(){
    var $StepItems = $('#Step2 input');
    var flag = true;
    for(var i = 0; i < $StepItems.length; i++){
        var $StepItem = $StepItems.eq(i);
        if(!$StepItem.val() && $StepItem.parent().hasClass('required'))
            flag = false;
    }
    if(flag) $('#toStep3, .gray3').removeClass('disabled');
}