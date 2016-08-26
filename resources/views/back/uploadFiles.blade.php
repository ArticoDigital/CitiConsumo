@extends('layoutBack')

@section('content')
<section class="row">
@if (count($errors) > 0)

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
            
            <input type="hidden" class="required" name="RutFileName" id="RutFileName" value="">
            <input type="hidden" class="required" name="CCFileName" id="CCFileName" value="">
            <input type="hidden" class="required" name="BankFileName" id="BankFileName" value="">
            <input type="hidden" class="required" name="ServicesFileName" id="ServicesFileName" value="">
            <input type="hidden" class="required" name="HistoryFileName" id="HistoryFileName" value="">
            
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
    </section>
</section>
@endsection

@section('scripts')
    <script src="{{asset('js/uploadfiles.js')}}"></script>
    
@endsection



@section('styles')

@endsection