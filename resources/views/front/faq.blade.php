@extends('layoutFront')


@section('Services')
    <section class="section-content row between">
        <h1>Preguntas frecuentes</h1>
        
<div class="accordion-container">
    <button class="accordion">¿Cuál es el nivel de seguridad que emplea cityconsumo.com para efectos de pagos electrónicos?</button>
    <div class="panel">
      <p>Cityconsumo.com contrata los servicio de la pasareal de pagos mas grande de America latina: PAYULATAM. Una vez clockeas en pagar, eres redirigido a los servidores de esta plataforma que garantuza la seguridad en tus pagos electrónicos</p>
    </div>

    <button class="accordion">¿Cuáles son los filtros de seguridad que emplea cityconsumo.com para los proveedores de servicios que trabajan a través del sitio web?</button>
    <div class="panel">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <button class="accordion">Si realizo un pago a través de cityconsumo.com pero el servicio no es prestado, ¿Qué debo hacer?</button>
    <div id="foo" class="panel">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <button class="accordion">En caso tal de que tanto el cliente como el proveedor de servicios presente alguna anomalía y/o comportamiento extraño respecto de las sanas normas de relación social, ¿Qué puedo hacer?</button>
    <div id="foo" class="panel">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <button class="accordion">Si yo trabajo a través de cityconsumo, ¿Cómo puedo recibir mis pagos por efecto de comisiones ganadas por mi trabajo a través de la página?</button>
    <div id="foo" class="panel">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    
</div>


    </section>
@endsection



@section('styles')
@endsection


@section('scripts')
<script>
var acc = document.getElementsByClassName("accordion");
var i;
var lastelement="";
for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
      if(lastelement==this){
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
            lastelement="";
       }else if(lastelement==""){
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
            lastelement=this;
       }
        else{
            lastelement.classList.toggle("active");
            lastelement.nextElementSibling.classList.toggle("show");

            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
            lastelement=this;
       }
}
}

</script>

@endsection