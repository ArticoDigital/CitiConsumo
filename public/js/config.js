/****************** Select2 Config *********************/

$(".js-example-basic-single").select2({width: '100%'});
$selectBox = $('.select2-container--default .select2-selection--single');
$selectBox.css('height', '42px').css('padding-top', '5px');
$selectBox.children('.select2-selection__arrow').css('height', '100%');

/*************** DateTimePicker Config *********************/

$.datetimepicker.setLocale('es');
$('.datetimepicker_mask').datetimepicker();
$('.xdsoft_datetimepicker.xdsoft_noselect.xdsoft_').css('margin-top', '15px');