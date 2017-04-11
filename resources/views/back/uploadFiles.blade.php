@extends('layoutBack')

@section('content')
<section class="row">

    <figure class="TextOver col-5 medium-6 small-12" style="background-color: #040A0B;">
        <img class="menu-item-out-movile" src="{{url('img/bg-formulario.svg')}}" alt="">
        <figcaption class="texto-imagen-subir">Para ser parte de cityconsumo y puedas ofrecer tus servicios, necesitamos que llenes el siguiente formulario, el cual pasará por un proceso de certificación, si todo está en orden te enviaremos un mensaje para que puedas empezar a publicar tus servicios.</figcaption>
    </figure>
    <section class="col-7 medium-6 small-12">
        <form action="{{route('uploadUserFileFields')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside @if(old('type3')) active @endif" for="RutFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span>
                    <span class="text_file">@if(old('type3')) {{ old('type3') }} @else Arrastra aquí el RUT @endif</span>
                    <input type="file" id="RutFile" data-url="{{route('uploadFile')}}" class="drop-files-input" accept="image/jpeg, image/jpg, image/png, application/pdf">
                    <input type="hidden" name="type3" id="type3" value="{{old('type3')}}">
                </label>
                @if(count($errors))
                    <span style="color: red; margin-top: 10px;">{!! $errors->first('type3') !!}</span>
                @endif
            </section>
            <section class="DropFilesSmall">
                <label class="DropFiles-inside @if(old('type1')) active @endif" for="CCFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span>
                    <span class="text_file">@if(old('type1')) {{ old('type1') }} @else Arrastra aquí la CC escaneada @endif</span>
                    <input type="file" id="CCFile" data-url="{{route('uploadFile')}}" class="drop-files-input" accept="image/jpeg, image/jpg, image/png, application/pdf">
                    <input type="hidden" name="type1" id="type1" value="{{old('type1')}}">
                </label>
                @if(count($errors))
                    <span style="color: red; margin-top: 10px;">{!! $errors->first('type1') !!}</span>
                @endif
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside @if(old('type5')) active @endif" for="BankFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span>
                    <span class="text_file">@if(old('type5')) {{ old('type5') }} @else Arrastra aquí el Certificado bancario @endif</span>
                    <input type="file" id="BankFile" data-url="{{route('uploadFile')}}" class="drop-files-input" accept="image/jpeg, image/jpg, image/png, application/pdf">
                    <input type="hidden" name="type5" id="type5" value="{{old('type5')}}">
                </label>
                @if(count($errors))
                    <span style="color: red; margin-top: 10px;">{!! $errors->first('type5') !!}</span>
                @endif
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside @if(old('type4')) active @endif" for="ServicesFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span>
                    <span class="text_file">@if(old('type4')) {{ old('type4') }} @else Arrastra aquí el Recibo servicios públicos @endif </span>
                    <input type="file" id="ServicesFile" data-url="{{route('uploadFile')}}" class="drop-files-input" accept="image/jpeg, image/jpg, image/png, application/pdf">
                    <input type="hidden" name="type4" id="type4" value="{{old('type4')}}">
                </label>
                @if(count($errors))
                    <span style="color: red; margin-top: 10px;">{!! $errors->first('type4') !!}</span>
                @endif
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside @if(old('type2')) active @endif" for="HistoryFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span>
                    <span class="text_file col-7 medium-7 small-7">@if(old('type2')) {{ old('type2') }} @else Arrastra aquí el antecedente de procuraduría @endif </span>
                    <a class="ayudaenlace col-2 medium-2 small-2" href="http://siri.procuraduria.gov.co:8086/CertWEB/Certificado.aspx?tpo=2" target="_blank">Obtenga el documento</a>
                    <input type="file" id="HistoryFile" data-url="{{route('uploadFile')}}" class="drop-files-input" accept="image/jpeg, image/jpg, image/png, application/pdf">
                    <input type="hidden" name="type2" id="type2" value="{{old('type2')}}">
                </label>
                @if(count($errors))
                    <span style="color: red; margin-top: 10px;">{!! $errors->first('type2') !!}</span>
                @endif
            </section>

            <section class="DropFilesSmall">
                <label class="DropFiles-inside @if(old('type6')) active @endif" for="ContraloriaFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span>
                    <span class="text_file col-7 medium-7 small-7">@if(old('type6')) {{ old('type6') }} @else Arrastra aquí el certificado de contraloría @endif </span>
                    <a class="ayudaenlace col-2 medium-2 small-2" href="http://www.contraloria.gov.co/web/guest/certificados-persona-natural" target="_blank">Obtenga el documento</a>
                    <input type="file" id="ContraloriaFile" data-url="{{route('uploadFile')}}" class="drop-files-input" accept="image/jpeg, image/jpg, image/png, application/pdf">
                    <input type="hidden" name="type6" id="type6" value="{{old('type6')}}">
                </label>
                @if(count($errors))
                    <span style="color: red; margin-top: 10px;">{!! $errors->first('type6') !!}</span>
                @endif
            </section>
            
            <section class="DropFilesSmall">
                <label class="DropFiles-inside @if(old('type7')) active @endif" for="PoliciaFile">
                    <span class="rectangle col-3 medium-3 small-3">Selecciona el archivo</span>
                    <span class="text_file col-7 medium-7 small-7"> @if(old('type7')) {{ old('type7') }} @else Arrastra aquí el antecedente de la policía Nacional @endif </span>
                    <a class="ayudaenlace col-2 medium-2 small-2" href="https://antecedentes.policia.gov.co:7005/WebJudicial" target="_blank">Obtenga el documento</a>
                    <input type="file" id="PoliciaFile" data-url="{{route('uploadFile')}}" class="drop-files-input" accept="image/jpeg, image/jpg, image/png, application/pdf">
                    <input type="hidden" name="type7" id="type7" value="{{old('type7')}}">
                </label>
                @if(count($errors))
                    <span style="color: red; margin-top: 10px;">{!! $errors->first('type7') !!}</span>
                @endif
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