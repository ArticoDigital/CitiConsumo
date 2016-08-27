@extends('layoutBack')

@section('content')
<section class="row">
    @if (count($errors) > 0)
        <ul>
        @foreach ($errors->all() as $error)
            <li>{!!  $error  !!}</li>
        @endforeach
        </ul>
    @endif
              @if(Session::has('success'))
                <div class="success">
                    <p>¡Se han subido los archivos!</p>
                </div>
            @endif

    @if (isset($providerfiles) > 0)
    <p>Archivos: {{$providerfiles}}</p>
    @endif
    <figure class="TextOver col-6">
        <img src="{{url('img/bg-formulario.svg')}}" alt="">
        <figcaption>Para ser parte de cityconsumo y puedas ofrecer tus servicios, necesitamos que llenes el siguiente formulario, el cual pasará por un proceso de certificación, si todo está en orden te enviaremos un mensaje para que puedas empezar a publicar tus servcios.</figcaption>
    </figure>
    <section class="col-6">
        <form action="{{route('uploadUserFileFields')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            
            <input type="hidden" class="required" name="RutFileName" id="RutFileName" value="{{ old('RutFileName') }}">
            <input type="hidden" class="required" name="CCFileName" id="CCFileName" value="{{ old('CCFileName') }}">
            <input type="hidden" class="required" name="BankFileName" id="BankFileName" value="{{ old('BankFileName') }}">
            <input type="hidden" class="required" name="ServicesFileName" id="ServicesFileName" value="{{ old('ServicesFileName') }}">
            <input type="hidden" class="required" name="HistoryFileName" id="HistoryFileName" value="{{ old('HistoryFileName') }}">
            
            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="RutFile">
                    <span class="rectangle">Selecciona el archivo</span> <span class="text_file">
                    Arrastra aquí el RUT</span>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="RutFile" id="RutFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                </label>
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="CCFile">
                    <span class="rectangle">Selecciona el archivo</span><span class="text_file">Arrastra aquí la CC escaneada</span>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="CCFile" id="CCFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                </label>
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="BankFile">
                    <span class="rectangle">Selecciona el archivo</span><span class="text_file">Arrastra aquí el Certificado bancario</span>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="BankFile" id="BankFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                </label>
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="ServicesFile">
                    <span class="rectangle">Selecciona el archivo</span><span class="text_file">Arrastra aquí el Recibo servicios públicos</span>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="ServicesFile" id="ServicesFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                </label>
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside" for="HistoryFile">
                    <span class="rectangle">Selecciona el archivo</span><span class="text_file">Arrastra aquí el antecedente de procuraduría</span>
                    <input type="file" data-url="{{route('uploadFile')}}" class="drop-files-input" name="HistoryFile" id="HistoryFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
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



@section('styles')
<style type="text/css">
.hidden{
    display:none;

}
#loader-wrapper {
    background-color: rgba(0, 0, 0, 0.76);
    z-index: 100000;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
}
#loader {

    display: block;
    position: relative;
    left: 50%;
    top: 50%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #3498db;
    -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
}
 
#loader:before {
    content: "";
    position: absolute;
    top: 5px;
    left: 5px;
    right: 5px;
    bottom: 5px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #e74c3c;
    -webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
      animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
}
 
#loader:after {
    content: "";
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #f9c922;
    -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
      animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
}
 
@-webkit-keyframes spin {
    0%   {
        -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(0deg);  /* IE 9 */
        transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
    }
    100% {
        -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(360deg);  /* IE 9 */
        transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
    }
}
@keyframes spin {
    0%   {
        -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(0deg);  /* IE 9 */
        transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
    }
    100% {
        -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: rotate(360deg);  /* IE 9 */
        transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
    }
}



</style>
@endsection