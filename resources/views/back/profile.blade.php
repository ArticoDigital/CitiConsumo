@extends('layoutBack')

@section('content')
    @if(Session::has('success'))
        <div class="success">
            <p>¡El usuario se ha actualizado!</p>
        </div>
    @endif

    <form action="{{route('updateUser')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" id="token">
        <input type="hidden" name="user_id" value="{{ $userprofile->id }}">
        <div class="row" style="padding: 30px 0px;">
            <div class="@if(isset($userprofile->provider) && $userprofile->provider->isActive) col-4 @endif medium-6 small-12 row"
                 style="flex-direction: column; align-items: center; padding: 0px 10px;">
                <div style="position:relative">
                    <div id="image_profile" class="image-cropper row middle center">
                        @if($userprofile->profile_image)
                            <img src="{{asset('uploads/profiles/'. $userprofile->profile_image)}}" class="img-profile"
                                 alt="">
                        @else
                            <svg width="160px" viewBox="567 256 100 83" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="noun_578263_cc" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                   transform="translate(567.000000, 256.000000)">
                                    <g id="profile" fill="#00508E">
                                        <path d="M53.4464945,55.0613812 C54.6217712,53.0094574 56.8649446,51.7424978 59.6841328,51.7369148 C60.2575646,51.7357982 60.8317343,51.7369148 61.4055351,51.7361704 C58.9383764,47.7864126 55.6084871,44.3938341 51.6649446,41.8033408 C50.5774908,41.1505067 49.4387454,40.5415919 48.2568266,39.9695247 C46.5107011,39.1264978 44.6487085,38.5079058 42.7568266,37.7530897 C45.7738007,34.3043094 47.6413284,30.4338296 48.8940959,26.2614978 C51.0527675,19.0795785 50.6642066,12.2780448 45.4339483,6.32065471 C41.4487085,1.7843139 36.4073801,-0.577650224 30.1682657,0.598121076 C22.3660517,2.06830045 16.0512915,9.55393274 15.7734317,17.2144978 C15.6088561,21.7564215 16.5261993,26.1025695 18.4450185,30.2026951 C19.702583,32.8899596 21.3542435,35.4048969 22.7575646,37.8680987 C20.3472325,38.9634753 17.8110701,39.928583 15.4815498,41.2368565 C15.2195572,41.38313 14.9612546,41.5334978 14.7066421,41.6846099 C7.13726937,46.5827265 1.78856089,54.419713 0.417712177,63.5002108 C0.188191882,65.0094709 0.0697416974,66.5570673 0.0697416974,68.1284843 C0.0697416974,80.6689283 33.6811808,84.2632377 52.9490775,78.9110404 C52.9439114,78.8142691 52.9332103,78.7186143 52.9332103,78.6207265 L52.9332103,57.3771928 C52.9335793,56.549426 53.1166052,55.7670673 53.4464945,55.0613812 Z"
                                              id="Shape"></path>
                                        <path d="M99.4077491,57.1520135 C99.3512915,57.024722 99.2896679,56.9000359 99.2254613,56.7809327 C98.1590406,54.7896771 96.401476,53.7735785 94.1361624,53.7531076 C91.8937269,53.7344978 89.6527675,53.7493857 87.3697417,53.7493857 C87.3686347,53.7441749 87.3671587,53.7393363 87.3671587,53.7344978 L86.2306273,53.7344978 L86.2306273,52.871 C86.2306273,50.1677309 84.1372694,47.9565067 81.49631,47.7994395 C81.4630996,47.7983229 81.4306273,47.7983229 81.395941,47.7983229 C80.004797,47.7938565 78.6099631,47.7908789 77.2177122,47.7908789 C75.904059,47.7908789 74.5911439,47.7938565 73.2774908,47.7998117 C73.0782288,47.8009283 72.8826568,47.8109776 72.6878229,47.8314484 L72.6804428,47.8321928 C70.204428,48.1537713 68.2922509,50.2872063 68.2922509,52.8706278 L68.2922509,53.7341256 L67.3512915,53.7341256 C67.3501845,53.7389641 67.3501845,53.7438027 67.3490775,53.7490135 C65.1616236,53.7490135 63.0051661,53.7452915 60.8472325,53.7490135 C58.4265683,53.7542242 56.501845,54.8924036 55.4929889,56.7347803 C55.2095941,57.3686323 55.0523985,58.0720852 55.0523985,58.8138744 L55.0523985,77.8949417 C55.0523985,78.6266816 55.2059041,79.3230628 55.4826568,79.9494709 C56.4863469,81.7650493 58.3878229,82.96613 60.6284133,82.967991 C66.2195572,82.9728296 71.8103321,82.975435 77.401107,82.975435 C82.9929889,82.975435 88.5837638,82.9728296 94.1741697,82.967991 C96.3269373,82.9642691 98.2110701,81.7732377 99.2243542,80.0153498 C99.5202952,79.370704 99.6837638,78.6516188 99.6837638,77.8949417 L99.6837638,58.8138744 C99.6845018,58.2317578 99.5878229,57.6727175 99.4088561,57.1523857 L99.4077491,57.1520135 Z M77.3752768,78.8511166 C71.6188192,78.8511166 66.9332103,74.1279327 66.9317343,68.3261211 C66.9306273,66.2380942 67.5560886,64.2810807 68.6306273,62.6359686 C70.5,59.7626054 73.7309963,57.8420673 77.3575646,57.8420673 C80.902952,57.8413229 84.0734317,59.6703004 85.9664207,62.4275381 C87.1236162,64.10987 87.802952,66.1383453 87.802952,68.3082556 C87.802952,74.1182556 83.1217712,78.8488834 77.3749077,78.8507444 L77.3752768,78.8511166 Z"
                                              id="Shape"></path>
                                        <ellipse id="Oval" stroke="#00508E" cx="77.3678967" cy="68.558" rx="7.999631"
                                                 ry="8.06886547"></ellipse>
                                    </g>
                                </g>
                            </svg>
                        @endif
                        {!!  $errors->first('profile_image', '<p class="error">:message</p>')  !!}
                    </div>
                    <output class="result"></output>

                    <div class="image-upload">
                        <span class="text_file"></span>
                        <label for="profile_image">
                            <img class="small-icon" src="{{url('img/lapiz-edicion.svg')}}" alt="">
                        </label>
                        <input type="file" name="profile_image" class="images drop-files-input" id="profile_image" id="ServicesFile" data-url="{{route('uploadProfileFile')}}" accept="image/jpeg, image/jpg, image/png">
                    </div>
                </div>
                <div class="name-profile">{{$userprofile->name . " " .$userprofile->last_name}}</div>
                
            </div>
            <div class="@if(isset($userprofile->provider) && $userprofile->provider->isActive) col-5 @endif medium-6 small-12">
                <p class="profile-title" style="position: relative;">Datos personales
                    <!--<img class="small-icon-2" src="{{url('img/lapiz-edicion.svg')}}" alt="">--></p>
                <div class="profile-item">
                    <label for="name" class="row middle">
                        <span class="col-5 small-5">Nombre(*)</span>
                        @if(count($errors))
                            <input class="col-7 small-7" name="name" id="name" value="{{old('name')}}" type="text">
                        @else
                            <input class="col-7 small-7" name="name" id="name" value="{{$userprofile->name}}"
                                   type="text">
                        @endif
                        <span>{!!  $errors->first('name', ':message')  !!}</span>
                    </label>
                </div>
                <div class="profile-item">
                    <label for="last_name" class="row middle">
                        <span class="col-5 small-5">Apellido(*)</span>
                        @if(count($errors))
                            <input class="col-7 small-7" name="last_name" value="{{ old('last_name')}}" id="last_name"
                                   type="text">
                        @else
                            <input class="col-7 small-7" name="last_name" value="{{ $userprofile->last_name}}"
                                   id="last_name" type="text">
                        @endif
                        <span>{!!  $errors->first('last_name', ':message')  !!}</span>
                    </label>
                </div>
                <div class="profile-item">
                    <label for="user_identification" class="row middle">
                        <span class="col-5 small-5">Número de identificación(*)</span>
                        @if(count($errors))
                            <input class="col-7 small-7" name="user_identification"
                                   value="{{ old('user_identification') }}" type="text">
                        @else
                            <input class="col-7 small-7" name="user_identification"
                                   value="{{ $userprofile->user_identification}}" type="text">
                        @endif
                        <span>{!!  $errors->first('user_identification', ':message')  !!}</span>
                    </label>
                </div>

                <div class="profile-item">
                    <label for="email" class="row middle">
                        <span class="col-5 small-5">Correo(*)</span>
                        @if(count($errors))
                            <input class="col-7 small-7" name="email" value="{{ old('email') }}" id="email" type="text">
                        @else
                            <input class="col-7 small-7" name="email" value="{{ $userprofile->email}}" id="email"
                                   type="text">
                        @endif
                        <span>{!!  $errors->first('email', ':message')  !!}</span>
                    </label>
                </div>

                <div class="profile-item">
                    <label for="birthday" class="row middle">
                        <span class="col-5 small-5">Fecha de nacimiento</span>
                        @if(count($errors))
                            <input class="col-7 small-7" name="birthday" alt="calendar" value="{{old('birthday')}}"
                                   readonly="true" id="birthday" type="text">
                        @else
                            <input class="col-7 small-7" name="birthday" alt="calendar"
                                   value="{{$userprofile->birthday}}" readonly="true" id="birthday" type="text">
                        @endif
                        <span>{!!  $errors->first('created_at', ':message')  !!}</span>
                    </label>

                </div>
                <div class="profile-item">
                    <label for="place" class="row middle">
                        <span class="col-5 small-5">Ciudad</span>
                        @if(count($errors))
                            <input class="col-7 small-7" id="autocomplete" name="location" value="{{ old('location')}}"
                                   type="text" placeholder="Lugar">
                        @else
                            <input class="col-7 small-7" id="autocomplete" name="location"
                                   value="{{ $userprofile->location}}" type="text" placeholder="Lugar">
                        @endif
                        <input class="field" id="lat" name="lat" type="hidden">
                        <input class="field" id="lng" name="lng" type="hidden">
                        <span>{!!  $errors->first('location', ':message')  !!}</span>
                    </label>
                </div>

                <div class="profile-item">
                    <label for="address" class="row middle">
                        <span class="col-5 small-5">Dirección(*)</span>
                        @if(count($errors))
                            <input class="col-7 small-7" name="address" value="{{ old('address') }}" id="address"
                                   type="text">
                        @else
                            <input class="col-7 small-7" name="address" value="{{ $userprofile->address}}" id="address"
                                   type="text">
                        @endif
                        <span>{!!  $errors->first('address',':message')  !!}</span>
                    </label>
                </div>

                <div class="profile-item">
                    <label for="cellphone" class="row middle">
                        <span class="col-5 small-5">Celular(*)</span>
                        @if(count($errors))
                            <input class="col-7 small-7" name="cellphone" value="{{ old('cellphone')}}" id="cellphone"
                                   type="text">
                        @else
                            <input class="col-7 small-7" name="cellphone" value="{{ $userprofile->cellphone}}"
                                   id="cellphone" type="text">
                        @endif
                        <span>{!!  $errors->first('cellphone', ':message')  !!}</span>
                    </label>
                </div>

                <div class="profile-item">
                    <label for="phone" class="row middle">
                        <span class="col-5 small-5">Teléfono</span>
                        @if(count($errors))
                            <input class="col-7 small-7" name="phone" value="{{ old('phone') }}" id="phone" type="text">
                        @else
                            <input class="col-7 small-7" name="phone" value="{{ $userprofile->phone}}" id="phone"
                                   type="text">
                        @endif
                        <span>{!!  $errors->first('phone', ':message')  !!}</span>
                    </label>
                </div>
                <div class="row center">
                    <button style="margin:25px auto 10px; padding: 9px 28px;font-size: 1.1em;" class="button">Guardar cambios</button>
                </div>
                <p class="profile-title">Seguridad</p>
                <div class="row profile-item border-bottom">
                    <div class="col-12 small-12">Cambiar contraseña <img id="password-option" class="small-icon-2"
                                                                src="{{url('img/lapiz-edicion.svg')}}" alt=""></div>
                </div>
                <div id="password-option-box" class="hidden">
                    <div class="profile-item">
                        <label for="password" class="row middle">
                            <span class="col-5 small-5">Nueva Contraseña</span>
                            <input class="col-7 small-7" name="password" value="" id="password" type="password">
                            <span>{!!  $errors->first('password', ':message')  !!}</span>
                        </label>
                    </div>
                    <div class="profile-item">
                        <label for="password_confirmation" class="row middle">
                            <span class="col-5 small-5">Repita la Contraseña</span>
                            <input class="col-7 small-7" name="password_confirmation" value=""
                                   id="password_confirmation" type="password">
                            <span>{!!  $errors->first('password_confirmation', ':message')  !!}</span>
                        </label>
                    </div>
                </div>
                <div class="row profile-item border-bottom">
                    <div class="col-12 small-12">Información de la cuenta <img id="account-option" class="small-icon-2"
                                                                      src="{{url('img/lapiz-edicion.svg')}}" alt="">
                    </div>
                </div>
                <div id="account-option-box" class="hidden">
                    <div class="profile-item">
                        <label for="bank_account_number" class="row middle">
                            <span class="col-5 small-5">Número de la cuenta</span>
                            @if(count($errors))
                                <input class="col-7 small-7" name="bank_account_number"
                                       value="{{ old('bank_account_number') }}" id="bank_account_number" type="text">
                            @else
                                <input class="col-7 small-7" name="bank_account_number"
                                       value="{{ $userprofile->bank_account_number}}" id="bank_account_number"
                                       type="text">
                            @endif
                            <span>{!!  $errors->first('bank_account_number', ':message')  !!}</span>
                        </label>
                    </div>
                    <div class="profile-item">
                        <label for="bank_type_account" class="row middle">
                            <span class="col-5 small-5">Tipo de cuenta</span>
                            <select class="col-7 small-7" id="bank_type_account" name="bank_type_account">
                                <option value="Ahorros" {{ ($userprofile->bank_type_account == "Ahorros") ? 'selected' : '' }}>
                                    Ahorros
                                </option>
                                <option value="Corriente" {{ ($userprofile->bank_type_account == "Corriente") ? 'selected' : '' }} >
                                    Corriente
                                </option>
                            </select>
                            <span>{!!  $errors->first('bank_type_account', ':message')  !!}</span>
                        </label>
                    </div>
                    <div class="profile-item">
                        <label for="bank_name" class="row middle">
                            <span class="col-5 small-5">Banco</span>
                            @if(count($errors))
                                <input class="col-7 small-7" name="bank_name" value="{{ old('bank_name') }}"
                                       id="bank_name" type="text">
                            @else
                                <input class="col-7 small-7" name="bank_name" value="{{ $userprofile->bank_name}}"
                                       id="bank_name" type="text">
                            @endif
                            <span>{!!  $errors->first('bank_name', ':message')  !!}</span>
                        </label>
                    </div>
                </div>
                <div class="row center">
                    <button style="margin:25px auto 10px; padding: 9px 28px;font-size: 1.1em;" class="button">Guardar cambios</button>
                </div>
            </div>

            @if(isset($userprofile->provider) && $userprofile->provider->isActive && isset($buysNotPayed))
                <div class=" col-3 medium-12 small-12">
                    <div class="Image-money row center" style="margin-top:10px">
                        <div class="circle-money">
                            <div class="front">
                                <img src="{{asset('img/blue.svg')}}" alt="azul">
                                <div id="inner-text" class="row center"
                                     style="flex-direction: column; align-items: center;">
                                    <span class="txt-value">Valor recaudado</span>
                                    <span class="profile-value">${{number_format($buysNotPayed['value'], 0, '.', '.')}}</span>
                                    @if($buysNotPayed['value'] > 0)
                                        <a href="#" id="insertOutlay" class="btn-charge">Cobrar</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </form>

     <div class="preload hidden" id="loader-wrapper">
            <div id="loader"></div>
        </div>
    @if($userprofile->role_id == 2)
        <div class="row border-bottom" style="margin-bottom: 30px">
            <div class="row profile-servicesquant">@if(isset($userprofile->provider) && $userprofile->provider->isActive)
                    Servicios ({{count($services)}})  <a href="{{route('addService')}}">  +Agregar servicio</a>@endif </div>
        </div>
        @if(isset($userprofile->provider))
            @if($userprofile->provider->isActive==1)
                @if(count($services))
                    <table class="rwd-table" style="margin-bottom: 30px">
                        <tr class="header-table">
                            <th width="80px">Editar</th>
                            <th width="50%">Servicio</th>
                            <th>Precio</th>
                            <th>Activar</th>
                        </tr>
                        @php
                            $today = date("Y-m-d");
                        @endphp
                        @foreach($services as $service)
                            @if($service->isValidate != 2)
                                <tr>
                                    <td data-th="Actions" class="row">
                                        <a href="{{route('editProduct', $service->id)}}" class="EditProduct"
                                           data_id="{{$service->id}}"><img class="small-icon-product"
                                                                           src="{{url('img/lapiz-edicion.svg')}}"
                                                                           alt=""></a>
                                        <a  class="DeleteProduct" data_id="{{$service->id}}"><img
                                                    class="small-icon-product"
                                                    src="{{url('img/x-eliminar-imagen.svg')}}" alt=""></a>
                                    </td>
                                    <td data-th="Service">
                                        <article class="row top Profile-productSection " style="align-items: stretch">
                                            <figure class="col-3 small-3">
                                            @if($service->serviceFiles->first())
                                            @php $locationimage = $service->serviceFiles->where("kind_file","imagen")->first()->name;
                                            @endphp
                                                <img src="{{asset('uploads/products/' . $locationimage)}}"
                                                     alt="">
                                                @endif
                                            </pre>

                                            </figure>
                                           
                                            @if($today > $service->date_end)
                                                <div class="Profile-productInfo col-9 small-9" style="background-color: #cf6f6f;">
                                            @else
                                                <div class="Profile-productInfo col-9 small-9">
                                            @endif
                                                <h3>{{$service->serviceType->name}}</h3>
                                                @if($service)
                                                    <?php $date = explode(' ', $service->date_start)[0] . ' - ' . explode(' ', $service->date_end)[0] ?>
                                                @endif
                                                
                                                <b>Fecha: {{$date}}</b>
                                            </div>
                                        </article>
                                    </td>
                                    <td data-th="Price" class="center"><b>${{$service->price}}</b></td>
                                    <td data-th="Enable">
                                        @if($service->isValidate)
                                            <div class="switch">
                                                <input id="cmn-toggle-{{$service->id}}"
                                                       class="cmn-toggle cmn-toggle-round-flat" type="checkbox"
                                                       @if($service->isActive) checked="checked" @endif>
                                                <label for="cmn-toggle-{{$service->id}}" data-service="{{$service->id}}"
                                                       data-action="{{route('updateStateService')}}"
                                                       class="Provider-updateStateService"></label>
                                            </div>
                                        @else
                                            <div style="text-align: center">Por aprobar</div>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                @else
                    <div class="div_box_center">
                        <a class="profile-btn-blue" href="{{route('addService')}}">¡Crea tu primer servicio!</a>
                    </div>
                @endif
            @else
                <div class="div_box_center">
                    <span>Estamos verificando tus documentos. Pronto prodrás crear tu primer producto.</span>
                </div>
            @endif
        @endif
    @elseif($userprofile->role_id == 1)
        @if(!isset($userprofile->provider->isActive)) 
        <div class="div_box_center">
            <a class="profile-btn-blue" href="{{route('uploadFiles',$userprofile->id)}}">¡Empieza a ofrecer tus
                servicios!</a>
        </div>
         @elseif($userprofile->provider->isActive==1)
         <div class="div_box_center">
            <a class="profile-btn-blue" href="{{route('uploadFiles',$userprofile->id)}}">¡Empieza a ofrecer tus
                servicios!</a>
        </div>
        @endif
        
    @endif
    <section id="ConfirmAlert" class="Alert confirm" style="display: none">
        <article class="Message">
            <h2>¡Eliminar!</h2>
            <p>¿Estás seguro que deseas eliminar el producto?</p>
            <a href="#" class="close">Cancelar</a>
            <a href="" class="close" id="accept">Aceptar</a>
        </article>
    </section>

    @if(isset($buysNotPayed['value']))
            <!--*********** Formulario de desembolso *****************-->
    <form method="POST" action="{{route('insertOutlay')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="buys_id" value="{{$buysNotPayed['buys']}}">
        <input type="hidden" name="value" value="{{$buysNotPayed['value']}}">
        <input type="submit" id="insertOutlaySubmit" style="display:none">
    </form>
    @endif
@endsection


@section('scripts')
    <script src="{{asset('js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/moment.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
    <script>
        $(".js-example-basic-single").select2({width: '100%'});


        var $date = $('#birthday');

        $date.daterangepicker({

            "singleDatePicker": true,
            "showDropdowns": true,
            "minDate": "1940/01/01",
            "maxDate": "2017/01/01",
            locale: {
                format: 'YYYY/MM/DD'
            }
        });

    </script>
    <script src="{{asset('js/services.js')}}"></script>
    <script src="{{asset('js/address.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&libraries=places&callback=initAutocomplete"
            async defer></script>

    <script>


        //Cuando la imagen de perfil es vertical
        $(window).load(function () {
            $('.img-profile').each(function () {
                if ($(this).width() < $(this).height()) {
                    $(this).css('width', '100%');
                    $(this).css('height', 'auto');
                }

            });

            $('#password-option').click(function () {

                $('#password-option-box').removeClass("hidden");

            });

            $('#account-option').click(function () {

                $('#account-option-box').removeClass("hidden");

            });
        });


        $('.DropFiles-inside').on('dragenter click', function (e) {
            $(this).addClass('Drag');
        }).on('dragleave dragend mouseout drop', function (e) {
            $(this).removeClass('Drag');
        });

        $('.DeleteProduct').on('click', function () {
            $('#ConfirmAlert').show();
            var productId = $(this).attr('data_id');

            $('#ConfirmAlert #accept').click(function () {

                var param = {
                    '_token': $('#token').val(),
                    'id': productId
                };

                $.ajax({
                    url: '{{route('deleteProductByProvider')}}',
                    data: param,
                    type: 'POST',
                    success: function (data) {
                        console.log(data.message);
                    },
                    //error: function () {
                     //   alert('Hubo un error al eliminar el producto.');
                    //}
                });
            });
        });

//        $(".images").change(function () {
  //          $(this).parent().find('.text_file').text("Guarda para actualizar");
   //     });

        $('#insertOutlay').click(function () {
            $('#insertOutlaySubmit').trigger('click');
        });
    </script>

    <script src="{{asset('js/uploadprofilefiles.js')}}"></script>



@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}"/>
    <style>
        .daterangepicker .calendar th, .daterangepicker .calendar td {
            white-space: nowrap;
            text-align: center;
            min-width: 23px;
        }

        .daterangepicker select.monthselect {
            margin-right: 6%;
            width: 45%;
        }

        .daterangepicker select.yearselect {
            width: 45%;
        }
    </style>
@endsection
