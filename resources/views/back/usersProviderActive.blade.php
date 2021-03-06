@extends('layoutBack')

@section('content')

    @include('back.partial.menuAdmin')
    <h1>Proveedores por aprobar</h1>
    <table class="rwd-table" id="tableUsers" data-route="{{asset('uploads/provider')}}">
        <tr class="header-table">
            <th>Editar</th>
            <th width="100px">Foto</th>
            <th>Usuario</th>
            <th>email</th>
            <th>Celular</th>
            <th>Fecha Solicitud</th>
            <th>Ver Archivos</th>
            <th>Activar/Denegar</th>
        </tr>

        @foreach($providers as $provider)
            <tr>
                <td data-th="Actions" class="row">
                    <a href="{{route('profile', $provider->user->id)}}">
                        <img class="small-icon-product" src="{{url('img/lapiz-edicion.svg')}}" alt="">
                    </a>
                </td>
                <td data-th="Service">
                    <article class="row top Profile-productSection " style="align-items: stretch">
                        <figure>
                            @if($provider->user->profile_image)
                                <img src="{{asset('uploads/profiles/' . $provider->user->profile_image)}}" alt="">
                            @else
                                <svg width="70px" viewBox="567 256 100 83" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="noun_578263_cc" stroke="none" stroke-width="1" fill="none"
                                       fill-rule="evenodd" transform="translate(567.000000, 256.000000)">
                                        <g id="profile" fill="#00508E">
                                            <path d="M53.4464945,55.0613812 C54.6217712,53.0094574 56.8649446,51.7424978 59.6841328,51.7369148 C60.2575646,51.7357982 60.8317343,51.7369148 61.4055351,51.7361704 C58.9383764,47.7864126 55.6084871,44.3938341 51.6649446,41.8033408 C50.5774908,41.1505067 49.4387454,40.5415919 48.2568266,39.9695247 C46.5107011,39.1264978 44.6487085,38.5079058 42.7568266,37.7530897 C45.7738007,34.3043094 47.6413284,30.4338296 48.8940959,26.2614978 C51.0527675,19.0795785 50.6642066,12.2780448 45.4339483,6.32065471 C41.4487085,1.7843139 36.4073801,-0.577650224 30.1682657,0.598121076 C22.3660517,2.06830045 16.0512915,9.55393274 15.7734317,17.2144978 C15.6088561,21.7564215 16.5261993,26.1025695 18.4450185,30.2026951 C19.702583,32.8899596 21.3542435,35.4048969 22.7575646,37.8680987 C20.3472325,38.9634753 17.8110701,39.928583 15.4815498,41.2368565 C15.2195572,41.38313 14.9612546,41.5334978 14.7066421,41.6846099 C7.13726937,46.5827265 1.78856089,54.419713 0.417712177,63.5002108 C0.188191882,65.0094709 0.0697416974,66.5570673 0.0697416974,68.1284843 C0.0697416974,80.6689283 33.6811808,84.2632377 52.9490775,78.9110404 C52.9439114,78.8142691 52.9332103,78.7186143 52.9332103,78.6207265 L52.9332103,57.3771928 C52.9335793,56.549426 53.1166052,55.7670673 53.4464945,55.0613812 Z"
                                                  id="Shape"></path>
                                            <path d="M99.4077491,57.1520135 C99.3512915,57.024722 99.2896679,56.9000359 99.2254613,56.7809327 C98.1590406,54.7896771 96.401476,53.7735785 94.1361624,53.7531076 C91.8937269,53.7344978 89.6527675,53.7493857 87.3697417,53.7493857 C87.3686347,53.7441749 87.3671587,53.7393363 87.3671587,53.7344978 L86.2306273,53.7344978 L86.2306273,52.871 C86.2306273,50.1677309 84.1372694,47.9565067 81.49631,47.7994395 C81.4630996,47.7983229 81.4306273,47.7983229 81.395941,47.7983229 C80.004797,47.7938565 78.6099631,47.7908789 77.2177122,47.7908789 C75.904059,47.7908789 74.5911439,47.7938565 73.2774908,47.7998117 C73.0782288,47.8009283 72.8826568,47.8109776 72.6878229,47.8314484 L72.6804428,47.8321928 C70.204428,48.1537713 68.2922509,50.2872063 68.2922509,52.8706278 L68.2922509,53.7341256 L67.3512915,53.7341256 C67.3501845,53.7389641 67.3501845,53.7438027 67.3490775,53.7490135 C65.1616236,53.7490135 63.0051661,53.7452915 60.8472325,53.7490135 C58.4265683,53.7542242 56.501845,54.8924036 55.4929889,56.7347803 C55.2095941,57.3686323 55.0523985,58.0720852 55.0523985,58.8138744 L55.0523985,77.8949417 C55.0523985,78.6266816 55.2059041,79.3230628 55.4826568,79.9494709 C56.4863469,81.7650493 58.3878229,82.96613 60.6284133,82.967991 C66.2195572,82.9728296 71.8103321,82.975435 77.401107,82.975435 C82.9929889,82.975435 88.5837638,82.9728296 94.1741697,82.967991 C96.3269373,82.9642691 98.2110701,81.7732377 99.2243542,80.0153498 C99.5202952,79.370704 99.6837638,78.6516188 99.6837638,77.8949417 L99.6837638,58.8138744 C99.6845018,58.2317578 99.5878229,57.6727175 99.4088561,57.1523857 L99.4077491,57.1520135 Z M77.3752768,78.8511166 C71.6188192,78.8511166 66.9332103,74.1279327 66.9317343,68.3261211 C66.9306273,66.2380942 67.5560886,64.2810807 68.6306273,62.6359686 C70.5,59.7626054 73.7309963,57.8420673 77.3575646,57.8420673 C80.902952,57.8413229 84.0734317,59.6703004 85.9664207,62.4275381 C87.1236162,64.10987 87.802952,66.1383453 87.802952,68.3082556 C87.802952,74.1182556 83.1217712,78.8488834 77.3749077,78.8507444 L77.3752768,78.8511166 Z"
                                                  id="Shape"></path>
                                            <ellipse id="Oval" stroke="#00508E" cx="77.3678967" cy="68.558"
                                                     rx="7.999631" ry="8.06886547"></ellipse>
                                        </g>
                                    </g>
                                </svg>
                            @endif
                        </figure>
                <td>
                    <div class="Profile-productInfo col-9">
                        <h3 >{{$provider->user->name}}</h3>
                        <b>{{$provider->user->last_name}}</b>
                    </div>
                </td>
                <td>
                    {{$provider->user->email}}
                </td>
                <td class="center">{{$provider->user->cellphone}}</td>
                <td class="center">{{$provider->created_at}}</td>
                <td class="center">
                    <a href="#" data-id="{{$provider->id}}" data-name="{{$provider->user->name}}" class="Button-table viewFiles">Ver</a>
                    @foreach($provider->providerFiles as $key => $files)
                        <input type="hidden" data-type=" {{$files->fileType->name}}"
                               class="files-{{$provider->id}}" value="{{$files->name}}">
                        @endforeach
                </td>
                <td data-th="Price" class="center">
                    <a href="#" data-user="{{$provider->id}}" data-action="{{route('enabledProvider')}}"
                       class="Admin-updateStateProvider">Activar</a>
                    <a href="#" data-user="{{$provider->id}}" data-action="{{route('disableProvider')}}"
                       class="Admin-updateStateProvider">Denegar</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="preload hidden" id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    <div class="Files-container row center middle">
        <div class="Files">
            <span class="close">X</span>
            <h2>Listado de archivos para <span id="nameUser"></span></h2>
            <div class="Files-data">

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/users.js')}}"></script>
@endsection