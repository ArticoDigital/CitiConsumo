@extends('layoutFront')

{{--
@section('Video')
    <source src="http://cache.yoyodesign.com/media/137385/2014-09-08.mp4" type="video/mp4">
    <source src="http://cache.yoyodesign.com/media/137386/2014-09-08.webm" type="video/webm; codecs=&quot;vp8, vorbis&quot;">
@endsection
--}}

@section('Services')
    <section class="section-content row between">
        <h1 class="center">Testimonios</h1>
    </section>


     <section class="carrousel-container row col">  
    <div class="button-nav prev row"><img src="{{asset('img/arrow_left.svg')}}" alt=""></div>  

    <div id="owl-example" class="owl-carousel row">
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center">
            <img src="{{asset('img/image1.jpg')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Viviana Marin</span></div>
        <p class="row">“City Consumo es una forma diferente de consumir,
Es interactuar con tus vecinos y encontrar la solución
a tus problemas y satisfacer las necesidades en tu
misma comunidad, Me encanta! #CityConsumo”
</p>
      </div>
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center">
            <img src="{{asset('img/image2.jpg')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Jhonny Ocampo</span></div>
        <p class="row">“Lo mejor de todo fue que pude encontrar hospedaje para mi mascota en un verdadero hogar, tan calido como el mio, con la mejor atención y el precio ni se diga! #CityConsumo”</p>
      </div>
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center">
            <img src="{{asset('img/image3.jpg')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Andrea Alfonso</span></div>
        <p class="row">“Es maravilloso como pude encontrar un plato 
de comida a menos de 3 casas de la mia, no 
tuve tiempo de preparar algo y mi vecina 
me vendio uno de los platos que preparo para 
su almuerzo, adivinen que? Estaba delicioso! 
#CityConsumo"
</p>
      </div>
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center">
            <img src="{{asset('img/image4.jpg')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Zully Lopez</span></div>
        <p class="row">“Jamas dejo a mi tommy en ningún lado que no sea la casa de un familiar, pero cuando entre a www.cityconsumo.com encontré que mi vecina de toda la vida trabajaba cuidando perritos! Ahora tommy tiene su segundo hogar cuando salgo de viaje!!! #CityConsumo”</p>
      </div>
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center">
            <img src="{{asset('img/image5.jpg')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Wilder Chaparro</span></div>
        <p class="row">“Jamas había tenido una experiencia como esta! Encontré alguien en mi propio barrio que me arreglara el problema de plomería que tenía! Llego al instante y soluciono mi día de terror en casa jejejeje #CityConsumo”</p>
      </div>
      
    </div>
    <div class="button-nav  next row"><img src="{{asset('img/arrow_right.svg')}}" alt=""></div>
    
        
    </section>
@endsection

@section('content')
   
@endsection


@section('styles')

<link rel="stylesheet" href="{{asset('css/owl-carousel/owl.carousel.css')}}">
 
<!-- Default Theme -->
<link rel="stylesheet" href="{{asset('css/owl-carousel/owl.theme.css')}}">

@endsection


@section('scripts')
<!-- Include js plugin -->
<script src="{{asset('js/owl-carousel/owl.carousel.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
     
      //$("#owl-example").owlCarousel();
      var owl = $("#owl-example");
 
  owl.owlCarousel({itemsCustom : [
        [0, 1],
        [450, 1],
        [500, 2],
        [700, 3],
        [1000, 4],
        [1200, 4],
        [1400, 5],
        [1600, 7]
      ],
      //navigation : true
  });
 

   $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })
     
    });
</script>

@endsection