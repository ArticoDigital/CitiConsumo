@extends('layoutBack')

@section('content')
<section class="row">
    @if (count($errors) > 0)
        <ul class="col-12">
        @foreach ($errors->all() as $error)
            <li>{!!  $error  !!}</li>
        @endforeach
        </ul>
    @endif
              @if(Session::has('success'))
                <div class="success col-12">
                    <p>¡Se han subido los archivos!</p>
                </div>
            @endif

    <figure class="TextOver col-5 medium-6 small-12" style="background-color: #040A0B;">
        <img class="menu-item-out-movile" src="{{url('img/bg-formulario.svg')}}" alt="">
        <figcaption class="texto-imagen-subir">Para ser parte de cityconsumo y puedas ofrecer tus servicios, necesitamos que llenes el siguiente formulario, el cual pasará por un proceso de certificación, si todo está en orden te enviaremos un mensaje para que puedas empezar a publicar tus servicios.</figcaption>
    </figure>
    <section class="col-7 medium-6 small-12">
        <form action="{{route('uploadUserFileFields')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            
            <input type="hidden" class="required" name="RutFileName" id="RutFileName" value="{{ old('RutFileName') }}">
            <input type="hidden" class="required" name="CCFileName" id="CCFileName" value="{{ old('CCFileName') }}">
            <input type="hidden" class="required" name="BankFileName" id="BankFileName" value="{{ old('BankFileName') }}">
            <input type="hidden" class="required" name="ServicesFileName" id="ServicesFileName" value="{{ old('ServicesFileName') }}">
            <input type="hidden" class="required" name="HistoryFileName" id="HistoryFileName" value="{{ old('HistoryFileName') }}">
            <input type="hidden" class="required" name="ContraloriaFileName" id="ContraloriaFileName" value="{{ old('ContraloriaFileName') }}">
            <input type="hidden" class="required" name="PoliciaFileName" id="PoliciaFileName" value="{{ old('PoliciaFileName') }}">
            


            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="RutFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span> <span class="text_file">
                    Arrastra aquí el RUT</span>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="RutFile" id="RutFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                </label>
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="CCFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span><span class="text_file">Arrastra aquí la CC escaneada</span>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="CCFile" id="CCFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                </label>
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="BankFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span><span class="text_file">Arrastra aquí el Certificado bancario</span>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="BankFile" id="BankFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                </label>
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="ServicesFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span><span class="text_file">Arrastra aquí el Recibo servicios públicos</span>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="ServicesFile" id="ServicesFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                </label>
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="HistoryFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span><span class="text_file col-7 medium-7 small-7">Arrastra aquí el antecedente de procuraduría</span><a class="ayudaenlace col-2 medium-2 small-2" href="http://siri.procuraduria.gov.co:8086/CertWEB/Certificado.aspx?tpo=2" target="_blank">Obenga el documento</a>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="HistoryFile" id="HistoryFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                </label>
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="ContraloriaFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span><span class="text_file col-7 medium-7 small-7">Arrastra aquí el certificado de contraloría</span><a class="ayudaenlace col-2 medium-2 small-2" href="http://www.contraloria.gov.co/web/guest/certificados-persona-natural" target="_blank">Obenga el documento</a>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="ContraloriaFile" id="ContraloriaFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                </label>
            </section>
            
            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="PoliciaFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span><span class="text_file col-7 medium-7 small-7">Arrastra aquí el antecedente de la policía Nacional</span><a class="ayudaenlace col-2 medium-2 small-2" href="https://antecedentes.policia.gov.co:7005/WebJudicial" target="_blank">Obenga el documento</a>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="PoliciaFile" id="PoliciaFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                </label>
            </section>

            <div style="text-align:center">
                <input type="submit" id="boton-enviar" value="" name="submit">
            </div>
        </form>
        <div class="preload hidden" id="loader-wrapper">
                        <div id="loader"></div>
         </div>
    </section>
</section>
@endsection

@section('scripts')
    <script src="{{asset('js/uploadfiles.js')}}"></script>

@endsection


