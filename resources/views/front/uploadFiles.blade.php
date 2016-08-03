@extends('layoutLoggedIn')

@section('content')
<div class="content-form">
        <div class="left-block"><img src="{{url('img/bg-formulario.svg')}}" alt="">
        <p class="text-over">Para ser parte de cityconsumo y puedas ofrecer tus servicios , necesitamos que llenes el siguiente formulario, el cual pasará por un proceso de certificación, si todo está en orden te enviaremos un mensaje para que puedas empezar a publicar tus servcios.</p>
        </div>
        <div class="block-form">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="fileUpload">
            RUT:<br>
            
            <input type="file" name="RUTFile" id="RutFile">
            <br><br>
            Cédula de ciudadania escaneada:<br>
            <input type="file" name="CCFile" id="CCFile">
            <br><br>
            Certificado bancario:<br>
            <input type="file" name="BankFile" id="BankFile">
            <br><br>
            Recibo servicios públicos:<br>
            <input type="file" name="ServicesFile" id="ServicesFile">
            <br><br>
            Antecedentes procuraduría:<br>
            <input type="file" name="HistoryFile" id="HistoryFile">
            <br><br>
            <input type="submit" value="Enviar" name="submit">
            </div>
            
            
        </form>
        

       <!-- <div class="">
            <a class="btn_blue" href="#">VER VIDEO</a>
        </div>
        -->
        </div>
        
        <div style="clear:both;"></div>
        
        
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/moment.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
    <script>
        $(".js-example-basic-single").select2({width: '100%'});

        var $date = $('#date');
        $date.daterangepicker(getConfig('multiple'));
        $date.on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });
    </script>
    <script src="{{asset('js/address.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
@endsection