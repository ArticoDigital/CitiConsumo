@extends('layoutRegister')

@section('content')
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
