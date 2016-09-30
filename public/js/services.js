$('.Provider-updateStateService').on('click', function () {
       var id = $(this).data('service');
       var identifier="cmn-toggle-"+id;
       var valornuevochk="";

       if($('#'+identifier).is(':checked')){
            valornuevochk=0;

       }else{

            valornuevochk=1;
       }

       //



        var data = {
            identifier: identifier,
            idService: $(this).data('service'),
            _token: $('#token').val(),
            valor: valornuevochk
        };
        
        
        var send = $(this).data('action');
        $.post(send, data, function (e) {
            if(!(e.success)){
                if(valornuevochk==0){
                   $('#'+identifier).prop('checked', true);
                }
                else if(valornuevochk==1){
                    $('#'+identifier).prop('checked', false);
                }
                alert("Se presentó un error, inténtalo nuevamente");
            }
        });
});
