@extends('layoutAuth')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @if($errors->has())
            <div class="errors">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h3>Regístrate Ahora</h3>
        <span class="Register-social">
            <a href="{{route('facebook')}}" style="display:block; width:32px; margin:auto">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32px" height="100%" viewBox="0 0 16 16">
                    <path fill="#444" d="M14.5 0h-13c-0.825 0-1.5 0.675-1.5 1.5v13c0 0.825 0.675 1.5 1.5 1.5h6.5v-7h-2v-2h2v-1c0-1.653 1.347-3 3-3h2v2h-2c-0.55 0-1 0.45-1 1v1h3l-0.5 2h-2.5v7h4.5c0.825 0 1.5-0.675 1.5-1.5v-13c0-0.825-0.675-1.5-1.5-1.5z"></path>
                </svg>
            </a>
        </span>

        <div class="Register-label">
            <label for="name"> Nombre </label>
            <input type="text" id="name" value="{{ old('name') }}" name="name">
        </div>
        <div class="Register-label">
            <label for="email"> Tu Correo </label>
            <input type="text" id="email" value="{{ old('email') }}" name="email">
        </div>
        <div class="Register-label">
            <label for="password"> Contraseña </label>
            <input type="password" id="password" name="password">

            <svg id="Eye" viewBox="-1 0 102 57" version="1.1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">

                <g id="noun_421_cc" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                   transform="translate(-1.000000, 0.000000)">
                    <path d="M100.995,28.08 C100.993,28.038 100.989,27.998 100.986,27.957 C100.984,27.936 100.983,27.915 100.981,27.895 C100.978,27.865 100.973,27.835 100.969,27.806 C100.965,27.771 100.961,27.736 100.955,27.702 C100.954,27.698 100.953,27.693 100.953,27.689 C100.83,26.916 100.466,26.191 99.908,25.633 C96.718,21.852 92.923,18.487 89.064,15.414 C80.753,8.792 71.248,3.252 60.756,1.022 C54.692,-0.266 48.59,-0.321 42.494,0.769 C36.949,1.761 31.605,3.823 26.603,6.379 C18.774,10.379 11.624,15.894 5.394,22.077 C4.241,23.221 3.094,24.389 2.046,25.632 C0.65,27.286 0.65,29.245 2.046,30.899 C5.236,34.68 9.031,38.044 12.89,41.118 C21.202,47.74 30.707,53.279 41.199,55.509 C47.263,56.798 53.366,56.853 59.462,55.763 C65.006,54.771 70.35,52.709 75.353,50.153 C83.182,46.152 90.332,40.638 96.562,34.455 C97.715,33.31 98.862,32.143 99.91,30.9 C100.468,30.341 100.832,29.617 100.955,28.843 C100.955,28.839 100.956,28.834 100.957,28.83 C100.963,28.795 100.967,28.761 100.971,28.726 C100.975,28.697 100.98,28.667 100.983,28.637 C100.985,28.616 100.986,28.596 100.988,28.575 C100.991,28.535 100.995,28.495 100.997,28.453 C101,28.391 101.002,28.329 101.002,28.266 C101.002,28.203 100.998,28.142 100.995,28.08 L100.995,28.08 Z"
                          id="Shape" fill="#004f8f"></path>
                    <path d="M51,47.507 C40.373,47.507 31.759,38.893 31.759,28.266 C31.759,17.64 40.373,9.025 51,9.025 C61.627,9.025 70.241,17.639 70.241,28.266 C70.241,38.893 61.627,47.507 51,47.507 L51,47.507 Z"
                          id="Eye-white" fill="#004f8f"></path>
                    <circle id="Oval" fill="#004f8f" cx="51" cy="28.266" r="6.369"></circle>
                </g>
            </svg>
        </div>
        <button>REGISTRATE</button>
    </form>
@endsection

@section('scripts')
    <script>
        $('#preloader').addClass('hide');
        $('body').css('overflow', 'visible');

        $('.Hamburguer').click(function(){
            $(this).toggleClass('open');
            $(this).siblings().toggleClass('show');
            if($(this).hasClass('open'))
                $('body').css('overflow', 'hidden');
            else
                $('body').css('overflow', 'visible');
        });
    </script>
@endsection
