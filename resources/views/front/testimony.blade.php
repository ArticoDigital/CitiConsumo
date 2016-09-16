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
@endsection

@section('content')
    <section class="carrousel-container row col">  
    <div class="button-nav prev row"><img src="{{asset('img/arrow_left.svg')}}" alt=""></div>  

    <div id="owl-example" class="owl-carousel row">
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center" style="height:50%; width:50%; margin: 0 auto;">
            <img src="{{asset('img/mascota.png')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Marcela Gómez</span></div>
        <p class="row">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typese</p>
      </div>
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center" style="height:50%; width:50%; margin: 0 auto;">
            <img src="{{asset('img/mascota.png')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Marcela Gómez</span></div>
        <p class="row">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typese</p>
      </div>
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center" style="height:50%; width:50%; margin: 0 auto;">
            <img src="{{asset('img/mascota.png')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Marcela Gómez</span></div>
        <p class="row">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typese</p>
      </div>
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center" style="height:50%; width:50%; margin: 0 auto;">
            <img src="{{asset('img/mascota.png')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Marcela Gómez</span></div>
        <p class="row">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typese</p>
      </div>
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center" style="height:50%; width:50%; margin: 0 auto;">
            <img src="{{asset('img/mascota.png')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Marcela Gómez</span></div>
        <p class="row">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typese</p>
      </div>
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center" style="height:50%; width:50%; margin: 0 auto;">
            <img src="{{asset('img/mascota.png')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Marcela Gómez</span></div>
        <p class="row">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typese</p>
      </div>
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center" style="height:50%; width:50%; margin: 0 auto;">
            <img src="{{asset('img/mascota.png')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Marcela Gómez</span></div>
        <p class="row">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typese</p>
      </div>
      <div class="carrousel-item col middle center" style="color:white;">
        <div class="image-cropper row middle center" style="height:50%; width:50%; margin: 0 auto;">
            <img src="{{asset('img/mascota.png')}}" class="img-profile" alt="">
        </div> 
        <div class="row middle"><span >Marcela Gómez</span></div>
        <p class="row">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typese</p>
      </div>
    </div>
    <div class="button-nav  next row"><img src="{{asset('img/arrow_right.svg')}}" alt=""></div>
    
        
    </section>
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