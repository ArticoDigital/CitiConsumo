<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Citiconsumo</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/front/style.css')}}">
    @yield('styles')
</head>
<body class="Platform">
<div id="Map"
     data-typeService="{{$typeService}}"
     data-image="{{asset('img/' . $icon)}}"
     data-imagesservice="{{asset('uploads/products/')}}"
></div>
<input type="hidden" value="{{$dataMap['lng']}}" id="lat">
<input type="hidden" value="{{$dataMap['lat']}}" id="lng">

<header class="Header">
    <div class="BarNav row middle between">

        <nav class="row col-12 end">
            <ul class="Menu row between">
                <li><a href="" class="orange-text">Postula tu servicio</a></li>
                @if(!Auth::check())
                    <li><a href="{{route('register')}}">Registrate</a></li>
                    <li><a href="{{route('login')}}">Entrar</a></li>
                @else
                    <li><a href="#" onclick="return false">Bienvenid@ {{Auth::user()->name}}</a></li>
                @endif
                <li>
                    <div class="Menu-fixed">
                        <a href="#" class="Hamburguer ">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <nav>
                            <ul class="col-4">
                                <li><a href="#">QUIENES SOMOS?</a></li>
                                <li><a href="#">PREGUNTAS FRECUENTES </a></li>
                                <li><a href="#">AYUDANOS A MEJORAR</a></li>
                                <li><a href="#">CONTACTANOS</a></li>
                                <li><a href="#">TESTIMONIOS</a></li>
                            </ul>
                        </nav>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div class="Platform-product">
    <figure class="Platform-Logo">
        <a href="{{url('/')}}">
            <svg width="150px" viewBox="0 0 566 331" xmlns="http://www.w3.org/2000/svg">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="logo-city-consumo-curvas">
                        <path d="M101.0205,83.9371 C96.6635,87.4351 90.3245,86.7501 86.8375,82.3551 C83.3555,77.9681 84.0905,71.5881 88.4695,68.1151 C92.8515,64.6381 99.2235,65.3801 102.7065,69.7691 C106.1905,74.1601 105.4025,80.4601 101.0205,83.9371 M103.2975,41.7571 L100.8675,54.2611 C100.8675,54.2611 73.4715,47.5271 69.1515,75.5971 L56.6665,73.0561 C56.6665,73.0561 58.5195,30.9651 103.2975,41.7571 M211.3955,29.5461 C178.4755,11.2301 141.3715,7.4471 107.5095,16.0841 L105.2905,27.9221 C105.2905,27.9221 90.3745,24.2361 75.0295,28.7711 C67.5785,32.7961 60.4645,37.5091 53.7845,42.8711 C48.7885,49.1951 44.9025,57.8511 43.1125,69.6631 L30.1675,67.0351 C25.9995,72.4811 22.1705,78.2921 18.7415,84.4681 C-19.3225,152.8881 5.2455,239.0671 73.6055,277.2441 C112.8165,298.9041 157.9095,300.1251 196.4645,284.3111 L236.8195,330.3991 C236.8195,330.3991 228.2185,300.3691 219.5085,272.4021 C238.2985,260.1981 254.6205,243.3201 266.4065,222.1331 C304.4425,154.0111 279.9235,67.5601 211.3955,29.5461"
                              id="Fill-1" fill="#004F8F"></path>
                        <path d="M10.4517,63.0308 L21.8827,65.7368 L34.7357,68.7788 C36.9017,57.0318 41.0637,48.5038 46.2607,42.3438 C53.1087,37.1988 60.3697,32.7148 67.9467,28.9308 C83.4297,24.8918 98.2187,29.0538 98.2187,29.0538 L100.8167,17.2948 L103.6047,4.6658 C16.6467,-19.2992 10.4517,63.0308 10.4517,63.0308"
                              id="Fill-3" fill="#EFA43A"></path>
                        <path d="M92.9541,55.2379 L95.7841,42.8179 C51.3731,30.5949 48.1721,72.6059 48.1721,72.6059 L60.5701,75.5449 C65.7881,47.6289 92.9541,55.2379 92.9541,55.2379"
                              id="Fill-5" fill="#EFA43A"></path>
                        <path d="M80.1182,68.6871 C75.6302,72.0171 74.6922,78.3711 78.0302,82.8691 C81.3752,87.3711 87.6882,88.2601 92.1552,84.9041 C96.6442,81.5681 97.6352,75.2971 94.2932,70.7961 C90.9542,66.2961 84.6092,65.3531 80.1182,68.6871"
                              id="Fill-7" fill="#EFA43A"></path>
                        <path d="M263.6641,295.5362 C259.6481,297.6842 256.2871,298.5242 251.9911,298.5242 C240.6911,298.5242 233.5011,290.9602 233.5011,279.1942 C233.5011,265.5602 244.1461,253.9802 260.6761,253.9802 C262.8231,253.9802 265.2511,254.2612 267.8661,254.7272 L266.8391,261.7322 C264.6911,261.2652 262.7301,261.0782 260.7691,261.0782 C249.0961,261.0782 241.6251,269.8562 241.6251,278.7272 C241.6251,286.6652 246.0151,291.4272 253.1111,291.4272 C257.3141,291.4272 260.6761,290.2142 264.5981,287.8782 L263.6641,295.5362 Z"
                              id="Fill-9" fill="#004f8f"></path>
                        <path d="M286.0781,291.7081 C292.7081,291.7081 298.1241,283.3951 298.1241,271.8171 C298.1241,264.8131 295.2291,260.2371 290.6531,260.2371 C283.8371,260.2371 278.7011,269.9491 278.7011,280.5951 C278.7011,287.3191 281.9691,291.7081 286.0781,291.7081 M286.3581,298.5241 C276.4591,298.5241 270.5761,291.5211 270.5761,279.7551 C270.5761,265.0931 279.2611,253.9801 290.6531,253.9801 C300.1791,253.9801 306.2491,261.2651 306.2491,272.2841 C306.2491,287.9721 297.3781,298.5241 286.3581,298.5241"
                              id="Fill-11" fill="#004f8f"></path>
                        <path d="M324.6475,262.6656 L324.8345,262.8526 C329.4105,257.2486 334.0795,254.6346 338.7495,254.6346 C347.6205,254.6346 349.8615,263.8796 348.7415,270.7896 L344.7255,297.2176 L336.8805,297.2176 L340.7095,270.5096 C341.7375,263.2266 338.5615,261.1716 336.1335,261.1716 C333.8925,261.1716 329.5035,262.7586 323.5275,270.5096 L319.6985,297.2176 L311.8545,297.2176 L317.7375,255.2886 L325.6745,255.2886 L324.6475,262.6656 Z"
                              id="Fill-13" fill="#004f8f"></path>
                        <path d="M383.0146,266.6812 C378.2526,263.0382 373.8636,261.1712 370.4086,261.1712 C367.1396,261.1712 364.7116,263.1322 364.7116,265.5602 C364.7116,271.5362 381.4276,274.4312 381.4276,286.0112 C381.4276,293.5752 375.8246,298.5242 368.4476,298.5242 C363.2176,298.5242 359.8566,297.2182 353.8796,293.0142 L355.2806,285.3582 C360.7896,289.7472 364.8056,291.6142 368.1666,291.6142 C371.3416,291.6142 373.5826,289.6532 373.5826,286.9442 C373.5826,279.9402 357.1476,277.4192 357.1476,266.0272 C357.1476,258.8362 362.2846,253.9802 370.3156,253.9802 C374.7036,253.9802 379.0926,255.6612 383.0146,258.3692 L383.0146,266.6812 Z"
                              id="Fill-15" fill="#004f8f"></path>
                        <path d="M420.6494,297.2179 L412.8054,297.2179 L413.7394,290.3079 L413.5524,290.1199 C410.2844,293.5749 405.4284,297.8699 399.7314,297.8699 C395.0624,297.8699 388.2454,294.5089 389.8334,282.9289 L393.7544,255.2879 L401.6924,255.2879 L397.7704,282.9289 C396.7434,290.3999 400.1054,291.8019 402.2534,291.8019 C405.3354,291.8019 409.1634,289.3719 414.8604,282.5559 L418.6884,255.2879 L426.6264,255.2879 L420.6494,297.2179 Z"
                              id="Fill-17" fill="#004f8f"></path>
                        <path d="M444.5576,262.5719 L444.7446,262.7589 C449.8806,256.9689 454.5496,254.6349 459.2196,254.6349 C462.6746,254.6349 467.6236,256.4089 468.7446,264.0659 C474.8146,256.5949 480.3246,254.6349 484.4326,254.6349 C490.5026,254.6349 495.6386,259.2099 494.0516,270.0429 L490.2226,297.2179 L482.2856,297.2179 L486.2066,269.6699 C487.0476,264.1599 485.3666,260.8909 481.9116,260.8909 C479.1106,260.8909 474.5346,262.9459 468.7446,270.6029 L464.9146,297.2179 L456.9776,297.2179 L460.7136,270.6969 C461.6476,264.6269 460.5266,260.8909 456.0436,260.8909 C452.9616,260.8909 447.8266,264.7199 443.4376,270.6029 L439.7026,297.2179 L431.7646,297.2179 L437.7416,255.2879 L445.6786,255.2879 L444.5576,262.5719 Z"
                              id="Fill-19" fill="#004f8f"></path>
                        <path d="M517.6807,291.7081 C524.3117,291.7081 529.7277,283.3951 529.7277,271.8171 C529.7277,264.8131 526.8327,260.2371 522.2567,260.2371 C515.4397,260.2371 510.3037,269.9491 510.3037,280.5951 C510.3037,287.3191 513.5727,291.7081 517.6807,291.7081 M517.9607,298.5241 C508.0627,298.5241 502.1787,291.5211 502.1787,279.7551 C502.1787,265.0931 510.8647,253.9801 522.2567,253.9801 C531.7827,253.9801 537.8517,261.2651 537.8517,272.2841 C537.8517,287.9721 528.9807,298.5241 517.9607,298.5241"
                              id="Fill-21" fill="#004f8f"></path>
                        <path d="M396.7471,89.004 L386.9251,89.004 C331.3311,89.004 315.0261,127.114 315.0261,152.651 C315.0261,177.01 328.7771,192.725 350.1901,192.725 C361.5831,192.725 378.2801,185.85 390.2641,176.224 L387.3171,197.833 C373.9591,205.494 359.8151,209.619 347.6361,209.619 C317.1871,209.619 295.9721,186.635 295.9721,153.83 C295.9721,107.077 330.5461,72.11 387.5141,72.11 L400.2821,72.11 L396.7471,89.004 Z"
                              id="Fill-23" fill="#004f8f"></path>
                        <path d="M432.6963,91.9508 C432.6963,97.2548 428.3743,101.5758 423.0703,101.5758 C417.7663,101.5758 413.4443,97.2548 413.4443,91.9508 C413.4443,86.6468 417.7663,82.3248 423.0703,82.3248 C428.3743,82.3248 432.6963,86.6468 432.6963,91.9508 L432.6963,91.9508 Z M415.9993,207.8508 L399.3003,207.8508 L411.6763,119.6488 L428.3743,119.6488 L415.9993,207.8508 Z"
                              id="Fill-25" fill="#004f8f"></path>
                        <path d="M485.9307,132.6138 L468.2507,132.6138 L459.8037,180.9388 C457.8397,192.1358 460.3937,195.6718 468.4477,195.6718 C473.3587,195.6718 477.2867,194.4928 484.5557,190.3678 L483.5737,206.6728 C476.5007,209.6188 471.7867,210.6008 465.3037,210.6008 C448.0177,210.6008 439.9637,199.6008 442.3217,186.0458 L451.5537,132.6138 L436.0347,132.6138 L437.9987,119.6488 L454.1077,119.6488 L457.4467,101.5758 L473.9487,101.5758 L470.8047,119.6488 L487.6987,119.6488 L485.9307,132.6138 Z"
                              id="Fill-27" fill="#004f8f"></path>
                        <polygon id="Fill-29" fill="#004f8f"
                                 points="502.2354 253.0328 484.5554 253.0328 508.5204 202.5478 491.4304 119.6488 508.1284 119.6488 519.9154 180.3488 520.3074 180.3488 548.0064 119.6488 565.4894 119.6488"></polygon>
                        <path d="M227.5791,228.044 C225.8321,230.854 223.3451,233.981 220.1191,237.423 C216.8911,240.866 213.8271,243.432 210.9281,245.119 L220.8281,231.766 L227.5791,228.044 Z M212.0711,234.908 L201.2391,249.248 C200.6161,249.902 199.9971,250.311 199.3781,250.47 C198.7581,250.626 198.0981,250.756 197.4001,250.854 C197.1181,250.893 196.6931,250.914 196.1271,250.923 C195.5571,250.929 195.1331,250.955 194.8541,250.994 L205.8661,236.415 C206.4861,235.759 207.1171,235.419 207.7571,235.403 C208.3951,235.385 209.0621,235.328 209.7641,235.231 L212.0711,234.908 Z M199.5741,237.292 L188.0781,253.006 L182.8341,253.736 L194.3291,238.023 L199.5741,237.292 Z M184.1991,93.178 L185.4571,93.002 C185.8771,92.943 186.4341,92.866 187.1361,92.769 C187.8341,92.671 188.3021,92.962 188.5401,93.641 L176.4741,109.862 L171.8941,109.219 L184.1991,93.178 Z M186.3251,240.421 C186.2031,240.578 186.0681,240.885 185.9171,241.333 C185.7661,241.781 185.6371,242.154 185.5391,242.455 L177.9561,252.492 C177.5961,252.971 176.9721,253.625 176.0931,254.462 C175.2101,255.297 174.6991,255.727 174.5611,255.745 C174.2981,255.923 173.9611,256.042 173.5411,256.101 L171.8631,256.334 C171.7221,256.354 171.2981,256.376 170.5901,256.405 C169.8791,256.431 169.3861,256.467 169.1071,256.505 L181.0801,241.151 L186.3251,240.421 Z M175.3361,92.487 C175.7561,92.429 176.3121,92.351 177.0141,92.253 C177.7121,92.156 178.1811,92.448 178.4191,93.127 L166.8651,108.422 L161.4111,109.182 L174.1071,92.872 L174.7361,92.784 C174.8741,92.766 174.9741,92.719 175.0361,92.635 C175.0951,92.558 175.1951,92.507 175.3361,92.487 L175.3361,92.487 Z M175.4521,240.652 L163.0241,257.353 L157.5711,258.112 L169.7881,241.441 L175.4521,240.652 Z M166.0431,94.851 C165.9221,95.012 165.7871,95.315 165.6361,95.764 C165.4841,96.212 165.3561,96.587 165.2581,96.885 C165.0151,97.206 164.5351,97.841 163.8131,98.797 C163.0911,99.753 162.3431,100.785 161.5711,101.889 C160.7971,102.995 160.0161,104.03 159.2251,104.995 C158.4301,105.962 157.9151,106.605 157.6751,106.922 C155.9881,109.155 153.8891,110.442 151.3721,110.793 C151.0901,110.832 150.6661,110.859 150.0991,110.864 C149.5291,110.874 149.1041,110.897 148.8261,110.935 L159.6581,96.597 C160.0181,96.118 160.7521,95.769 161.8631,95.541 C162.9711,95.315 163.9461,95.143 164.7851,95.026 L166.0431,94.851 Z M158.1641,242.419 L159.0031,242.303 C159.9791,242.166 161.2671,242.201 162.8661,242.406 L150.4391,259.106 L145.7071,258.909 L158.1641,242.419 Z M137.2111,256.245 L148.9751,240.92 L150.0231,240.773 C150.7211,240.677 151.2871,240.632 151.7161,240.646 C152.1451,240.656 152.6671,240.834 153.2871,241.176 L141.0391,257.635 L140.4101,257.723 C139.7091,257.82 139.0371,257.842 138.3891,257.791 C137.7401,257.737 137.3671,257.362 137.2691,256.663 L137.2111,256.245 Z M151.9501,99.594 L141.1181,113.934 C140.2791,114.05 139.5881,114.22 139.0501,114.436 C138.3681,114.674 137.7531,114.866 137.2061,115.013 C136.6551,115.163 136.1821,115.336 135.7811,115.532 L135.5721,115.562 L134.9421,115.648 L143.6081,104.178 C144.4871,103.345 145.6111,102.44 146.9721,101.464 C148.3331,100.492 149.7121,99.905 151.1111,99.711 L151.9501,99.594 Z M139.9411,237.475 L144.6391,238.959 L133.2651,254.015 C133.1431,254.172 132.8901,254.388 132.4991,254.655 C132.1091,254.924 131.7821,255.148 131.5231,255.326 L131.3131,255.356 C129.7731,255.57 128.5681,255.096 127.6941,253.936 L139.9411,237.475 Z M131.4741,235.02 L132.3131,234.903 C133.4311,234.747 134.4981,235.239 135.5131,236.382 L123.0261,252.661 L119.2561,251.69 L131.4741,235.02 Z M123.6121,230.77 L124.0311,230.711 L124.4511,230.652 C124.7491,230.755 125.1391,230.984 125.6161,231.345 C126.0941,231.707 126.4221,232.019 126.6011,232.278 L126.6311,232.487 L126.7181,233.116 L114.2031,249.187 L111.1261,247.05 L123.6121,230.77 Z M117.4911,225.208 C118.8471,225.733 119.6031,226.555 119.7591,227.672 C119.7781,227.813 119.7521,227.886 119.6831,227.895 C119.6111,227.905 119.5881,227.982 119.6071,228.119 L119.6661,228.539 L107.3901,244.789 L104.2831,242.442 L117.4911,225.208 Z M97.8651,236.281 L110.1121,219.821 C110.9901,219.985 111.5731,220.332 111.8601,220.859 C112.1481,221.392 112.3411,222.006 112.4381,222.704 L112.6131,223.962 L101.0591,239.257 C100.7581,239.159 100.2521,238.835 99.5351,238.294 C98.8181,237.752 98.3001,237.363 97.9821,237.119 C97.8411,237.14 97.7631,237.08 97.7431,236.939 L97.6841,236.52 L97.8651,236.281 Z M103.9911,214.259 C105.1871,214.663 105.8741,215.493 106.0491,216.751 L106.1661,217.591 L94.6121,232.885 L94.2221,233.153 L93.5631,233.031 L93.0851,232.67 C92.9251,232.552 92.8371,232.421 92.8171,232.28 C92.4961,232.041 92.1691,231.729 91.8321,231.349 C91.4921,230.969 91.4531,230.69 91.7151,230.51 L103.9911,214.259 Z M86.7121,222.226 L98.2661,206.931 L98.6561,206.662 C99.3541,206.565 99.8281,206.894 100.0761,207.642 C100.3201,208.392 100.4751,208.976 100.5341,209.395 L100.6211,210.024 L88.1361,226.305 C87.4191,225.264 86.9661,224.044 86.7701,222.645 L86.7121,222.226 Z M83.3521,145.93 C82.7871,141.876 82.7451,137.996 83.2281,134.293 C83.7081,130.592 84.2361,126.706 84.8111,122.633 C84.9771,120.76 85.3371,118.999 85.8921,117.351 C86.4451,115.707 87.0871,113.907 87.8131,111.951 C87.9121,111.653 88.1481,111.049 88.5231,110.142 C88.8941,109.235 89.2921,108.254 89.7161,107.195 C90.1381,106.141 90.5351,105.157 90.9101,104.249 C91.2811,103.343 91.5871,102.731 91.8291,102.411 C93.1771,99.801 94.8711,97.143 96.9191,94.433 C98.9641,91.725 100.8381,89.325 102.5441,87.233 C106.4331,82.414 110.5051,78.641 114.7591,75.909 C119.0091,73.179 123.7671,70.237 129.0311,67.079 C134.6911,63.725 140.0301,61.376 145.0491,60.036 C150.0641,58.696 155.8571,57.568 162.4321,56.652 C163.4091,56.516 164.6721,56.376 166.2221,56.231 C167.7691,56.089 169.3111,55.908 170.8511,55.693 C172.3891,55.479 173.7571,55.324 174.9561,55.228 C176.1521,55.135 176.8221,55.074 176.9631,55.055 C178.7791,54.802 180.6221,54.725 182.4901,54.819 C184.3541,54.917 186.1481,54.987 187.8661,55.033 C188.8811,55.178 190.3461,55.189 192.2531,55.063 C194.1611,54.94 195.7201,55.151 196.9381,55.692 C197.3771,55.775 198.1241,56.029 199.1821,56.45 C200.2361,56.873 201.4091,57.353 202.6961,57.884 C203.9801,58.421 205.1931,58.927 206.3301,59.41 C207.4661,59.892 208.3321,60.236 208.9321,60.437 C209.6881,60.759 210.0611,61.135 210.0511,61.564 C210.0371,61.994 210.0921,62.627 210.2091,63.466 L210.5011,65.564 C210.5411,65.845 210.4841,66.207 210.3331,66.656 C210.1821,67.106 210.0441,67.411 209.9261,67.569 C209.6831,67.89 209.3041,68.478 208.7811,69.331 C208.2591,70.189 207.7111,71.121 207.1391,72.126 C206.5651,73.135 206.0241,74.099 205.5121,75.025 C204.9991,75.953 204.6821,76.498 204.5631,76.655 C204.1191,77.572 203.5961,78.68 202.9941,79.975 C202.3901,81.272 201.7161,82.577 200.9741,83.891 C200.2281,85.207 199.3921,86.356 198.4611,87.341 C197.5291,88.327 196.4331,88.906 195.1751,89.082 C191.2591,89.627 187.2741,89.685 183.2251,89.249 C179.1721,88.818 175.1181,88.883 171.0641,89.447 L166.2391,90.119 C165.9571,90.159 165.2101,90.406 163.9911,90.861 C162.7711,91.317 162.0301,91.635 161.7711,91.812 C157.3911,93.137 153.1441,94.617 149.0261,96.259 C144.9051,97.903 141.2441,100.518 138.0371,104.099 C135.4331,106.888 133.2341,109.792 131.4481,112.82 C129.6581,115.851 127.7821,118.998 125.8141,122.266 C124.6681,124.279 123.9071,126.487 123.5301,128.893 C123.1501,131.297 122.9591,133.498 122.9531,135.494 C122.9931,135.776 123.0941,136.26 123.2631,136.947 C123.4301,137.639 123.5681,138.369 123.6751,139.136 C123.7821,139.906 123.8891,140.676 123.9961,141.443 C124.1031,142.213 124.0951,142.679 123.9761,142.836 C123.9961,142.977 123.9681,143.302 123.8981,143.809 C123.8261,144.32 123.6601,144.664 123.4001,144.841 L124.4521,152.392 C125.8361,162.323 128.8071,170.602 133.3661,177.237 C137.9261,183.871 144.2981,189.97 152.4861,195.528 C154.9951,197.177 157.6981,198.402 160.5901,199.21 C163.4821,200.02 166.4051,200.538 169.3601,200.768 C172.3121,200.998 175.3081,201.009 178.3461,200.799 C181.3801,200.59 184.2951,200.291 187.0941,199.9 L196.1131,198.645 C197.3331,198.19 198.7761,197.562 200.4481,196.757 C202.1171,195.957 203.4911,195.338 204.5721,194.899 C204.6911,194.742 205.1121,194.434 205.8331,193.975 C206.5521,193.522 207.2681,193.026 207.9801,192.501 C208.6881,191.975 209.3691,191.489 210.0221,191.04 C210.6711,190.595 211.1261,190.282 211.3881,190.101 C211.5251,190.082 211.9261,189.887 212.5881,189.506 C213.2471,189.13 213.7161,188.922 213.9971,188.882 L214.2071,188.853 C215.4661,188.678 216.6681,188.867 217.8141,189.42 C218.9611,189.975 220.0591,190.711 221.1161,191.633 C222.1701,192.555 223.1241,193.528 223.9811,194.548 C224.8361,195.571 225.5321,196.47 226.0691,197.25 C226.4261,197.772 227.0861,198.68 228.0511,199.968 C229.0131,201.26 230.0331,202.685 231.1061,204.246 C232.1791,205.808 233.2011,207.269 234.1761,208.631 C235.1471,209.991 235.8131,210.934 236.1731,211.452 L236.4071,213.13 C236.6411,214.808 236.2951,215.925 235.3771,216.481 C234.4551,217.037 233.2941,217.914 231.8931,219.105 C231.7721,219.265 231.4551,219.56 230.9471,219.985 C230.4351,220.413 229.9281,220.876 229.4301,221.372 C228.9281,221.869 228.4211,222.334 227.9121,222.76 C227.4001,223.189 227.0841,223.483 226.9661,223.64 C225.0431,225.19 222.8371,226.498 220.3481,227.556 C217.8561,228.614 215.4431,229.448 213.1061,230.061 C212.1451,230.336 210.7021,230.717 208.7741,231.199 C206.8441,231.682 204.8481,232.174 202.7791,232.676 C200.7111,233.179 198.8111,233.62 197.0841,234.003 C195.3531,234.386 194.2821,234.607 193.8621,234.666 L185.6821,235.806 L176.6621,237.063 C175.9611,237.16 174.8741,237.275 173.3961,237.411 C171.9181,237.543 170.3631,237.653 168.7381,237.74 C167.1091,237.823 165.5901,237.927 164.1841,238.054 C162.7751,238.176 161.7901,238.28 161.2331,238.358 C159.5161,238.31 157.5931,238.079 155.4701,237.664 C153.3441,237.248 151.4541,236.727 149.8001,236.102 C146.0891,235.052 142.6281,234 139.4181,232.951 C136.2041,231.901 132.9971,230.605 129.7871,229.054 C129.4671,228.814 128.6901,228.352 127.4561,227.668 C126.8371,227.326 126.3011,227.048 125.8421,226.824 C125.5211,226.584 124.9241,226.133 124.0491,225.47 C123.1721,224.811 122.2571,224.116 121.3011,223.394 C120.3451,222.671 119.4221,221.945 118.5381,221.212 C117.6511,220.481 117.0391,219.924 116.7021,219.545 C113.0551,216.918 109.7871,213.916 106.8941,210.54 C103.9991,207.168 101.6921,203.391 99.9701,199.21 C99.3171,197.59 98.3841,195.261 97.1791,192.221 C95.9711,189.182 94.7931,186.106 93.6471,182.985 C92.4971,179.867 91.4271,177.023 90.4271,174.452 C89.4281,171.886 88.8081,170.262 88.5721,169.579 C87.3251,165.764 86.2861,161.878 85.4531,157.933 C84.6151,153.985 83.9181,149.987 83.3521,145.93 L83.3521,145.93 Z M82.7001,213.376 L94.9751,197.126 L96.6671,201.595 L84.1821,217.875 C83.6841,217.375 83.3661,216.884 83.2281,216.402 C83.0881,215.925 82.9821,215.404 82.9041,214.845 L82.7001,213.376 Z M78.6281,204.107 L90.1531,188.604 L90.7831,188.516 L91.2021,188.457 C91.2221,188.597 91.3851,189.002 91.6921,189.672 C91.9991,190.344 92.2411,190.809 92.4211,191.067 L92.4791,191.487 L92.5671,192.115 L92.2651,193.014 L91.9621,193.91 L81.8521,207.293 L80.0811,208.396 C79.3451,207.216 78.8921,205.995 78.7161,204.736 L78.6281,204.107 Z M75.3671,194.512 L87.1311,179.188 L87.9701,179.071 L88.5551,183.267 L77.0001,198.561 C76.3621,198.081 75.9791,197.634 75.8511,197.224 C75.7221,196.815 75.6111,196.263 75.5131,195.561 L75.3671,194.512 Z M83.9041,168.305 C84.0811,168.566 84.3091,169.177 84.5861,170.135 C84.8601,171.095 85.0201,171.715 85.0591,171.993 L85.1471,172.622 L85.1761,172.832 L73.1391,189.263 L72.4081,184.019 L83.9041,168.305 Z M82.5061,113.761 C82.5451,114.042 82.5031,114.509 82.3811,115.167 C82.2591,115.826 82.1451,116.306 82.0461,116.605 C81.8431,117.203 81.6171,118.127 81.3631,119.372 C81.1091,120.62 80.9201,121.324 80.8021,121.481 L72.2871,132.504 C73.7961,129.016 75.2601,125.711 76.6801,122.591 C78.0961,119.473 80.0381,116.529 82.5061,113.761 L82.5061,113.761 Z M81.5751,157.725 L82.3341,163.178 L70.3901,178.741 L69.6011,173.077 L81.5751,157.725 Z M79.4191,131.51 C79.4771,131.929 79.5171,132.745 79.5451,133.952 C79.5701,135.161 79.5321,135.915 79.4331,136.213 C79.3311,136.514 79.1991,137.1 79.0371,137.979 C78.9551,138.417 78.9341,138.778 78.9741,139.057 L68.6541,152.468 L68.5081,151.419 C68.3911,150.58 68.3781,149.48 68.4751,148.109 C68.5681,146.743 68.9151,145.662 69.5191,144.863 L79.4191,131.51 Z M80.2301,148.076 C80.4251,149.476 80.5201,150.424 80.5201,150.923 C80.5171,151.424 80.0441,152.377 79.1021,153.793 L69.8951,165.981 L68.1241,167.081 L67.8611,165.193 C67.7841,164.637 67.7091,163.862 67.6441,162.872 C67.5781,161.887 67.6531,161.161 67.8771,160.702 L79.8211,145.14 L80.2301,148.076 Z"
                              id="Fill-31" fill="#FFFFFF"></path>
                    </g>
                </g>
            </svg>
        </a>
    </figure>

    {{--<form action="" class="row center ">

        <div class="col-4">
            <label for="">
                <select name="" id="">
                    <option value="">Selecione una opción</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </label>
        </div>
        <div class="col-4">
            <label for="">
                <select name="" id="">
                    <option value="">Selecione una opción</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </label>
        </div>
        <div class="col-4">
            <label for="">
                <select name="" id="">
                    <option value="">Selecione una opción</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </label>
        </div>
    </form>--}}

    <section>
        @foreach($services as $service)
            <a href="#" onclick="showInfoProduct({{$service}})">
                <article class="row top Platform-productSection "
                         data-lat="{{$service->lat}}"
                         data-lng="{{$service->lng}}"
                         data-service="{{$service}}"
                         style="align-items: stretch">
                    <figure class="col-3">
                        <img src="{{asset('uploads/products/' . $service->serviceFiles->first()->name)}}" alt="">
                    </figure>
                    <div class="Platform-productInfo col-9">
                        <h3>{{$service->name}}</h3>
                        <b>${{$service->price}}</b>
                    </div>
                </article>
            </a>
        @endforeach

    </section>
</div>

<aside class="InfoServices row middle center">
    <div class="InfoServices-content row">
        <div class="InfoServices-close">x</div>
        <figure id="imageService" class="col-6">
        </figure>
        <div class="col-6 InfoServices-info">
            <h2 id="NameService">Ensalada de frutas frescas</h2>
            <h3 id="availableService">5 platos disponibles</h3>
            <div class="InfoServices-stars row ">
                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
            </div>
            <p id="descriptionService">
                {{-- Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un
                 sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o
                 menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido
                 aquí". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y
                 editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de "Lorem
                 Ipsum" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de
                 desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras
                 veces a propósito (por ejemplo insertándole humor y cosas por el estilo).   --}}
            </p>
            {{--<a href="">Ver perfil del autor</a>--}}
            <div class="data-services">

            </div>
            <form action="{{route('buyAction')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="value" id="valueServiceInput" value="">
                <input type="hidden" name="idService" id="idServiceInput" value="">
                <div class="row between middle">
                    @if($typeService == "pet")
                        <label for="">
                            <span># de días</span>
                            <input type="number" name="quantity" placeholder="">
                        </label>
                    @endif
                    @if($typeService == "food")
                        <select name="quantity" id="">
                            <option value="">Selecione el número de platos</option>
                        </select>
                    @endif
                    @if($typeService == "general")
                        <div>
                            <input type="hidden" name="quantity"  value="1">
                        </div>
                    @endif
                    <val id="valueService">$12.000</val>
                </div>
                @if( Auth::user() && Auth::user()->role_id !=3 )
                    <div class="row center">
                        <button id="buyAction"> Comprar</button>
                    </div>
                @else
                    <p class="Message-register">Para poder realizar compras debes <a href="{{url('login')}}">iniciar</a>
                        <a href="{{url('registro')}}">registrarse</a></p>
                @endif
            </form>
        </div>
    </div>

</aside>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/maps.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&callback=initMap"
        async defer></script>
</body>
</html>