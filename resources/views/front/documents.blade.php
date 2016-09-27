@extends('layoutFront')


@section('Services')
    <section class="section-content row between">
        <h1>Documentos</h1>
        
<div class="documentos-container">
    <p>
      

      Como filtro de seguridad, <a href="www.cityconsumo.com">www.cityconsumo.com</a> adscrito a City Consumo S.A.S, tiene a bien requerir los siguientes documentos imprescindibles al momento de querer postularte como proveedor de servicios para poder de esta manera generar un entorno de interaccion sano entre clientes y los mismos proveedores.
      <br />
      <br />

Toma una foto o escanea los siguientes documentos para postular tus servicios a través de nuestra web:
<br>
<ul>
  <li>
  <span class="subtitle">Registro Unico Tributario  RUT.</span>  Lo puedes obtener en este enlace: <a href="https://muisca.dian.gov.co/WebRutMuisca/DefInscripRutCamNatPortal.faces" target="_blank">https://muisca.dian.gov.co/WebRutMuisca/DefInscripRutCamNatPortal.faces</a> <br>
  Asi mismo, encontraras ayuda sobre como obtener tu RUT en este <a href="https://www.youtube.com/watch?v=Diaxybx6on4" target="_blank">video</a> 
  </li>

  <li><span class="subtitle">Cedula de Ciudadanía</span></li>

  <li><span class="subtitle">Certificado Bancario de tu Cuenta de Ahorros</span></li>

  <li><span class="subtitle">Recibo de Servicios Públicos </span></li>

  <li><span class="subtitle">Certificado Antecedentes Procuraduría:</span> <a href="http://siri.procuraduria.gov.co:8086/CertWEB/Certificado.aspx?tpo=2" target="_blank">http://siri.procuraduria.gov.co:8086/CertWEB/Certificado.aspx?tpo=2</a></li>

  <li><span class="subtitle">Certificado Antecedentes Contraloría </span><a href="http://www.contraloria.gov.co/web/guest/certificados-persona-natural" target="_blank">http://www.contraloria.gov.co/web/guest/certificados-persona-natural</a> </li>

  <li>
    <span class="subtitle">Certificado Antecedentes Policía </span><a href="https://antecedentes.policia.gov.co:7005/WebJudicial/" target="_blank">https://antecedentes.policia.gov.co:7005/WebJudicial/</a>
  </li>
</ul>

<br><br>
Recuerda que puedes postular tus servicios una vez se apruebe tu perfil, no es estrictamente necesario que subas el certificado de tu cuenta de ahorros por ahora, pero si es importante que lo hagas para cuando quieras solicitar un pago a cityconsumo.com, pues sin este certificado no podemos consignar el dinero por concepto de tus comisiones ganadas a través de nuestro sitio web.

    </p>
    
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