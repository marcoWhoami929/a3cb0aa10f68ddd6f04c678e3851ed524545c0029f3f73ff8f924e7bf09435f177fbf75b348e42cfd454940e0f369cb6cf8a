
<section class="page-title-alt bg-primary position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-white font-tertiary" id="nombrePremio"></h1>
      </div>
    </div>
  </div>

  <img src="vistas/modulos/images/leaf-bg-top.png" alt="illustrations" class="bg-shape-1 w-100">
  <img src="vistas/modulos/images/dots-group-sm.png" alt="illustrations" class="bg-shape-2">
  <img src="vistas/modulos/images/pistola-sagola-2.png" alt="illustrations" class="bg-shape-4">
  <img src="vistas/modulos/images/dots-group-cyan.png" alt="illustrations" class="bg-shape-5">
  <img src="vistas/modulos/images/pistola-sagola.png" alt="illustrations" class="bg-shape-6">
</section>

<section class="section pt-5">
  <div class="container">
    <div class="row">
      
      <div class="col-md-4 text-center drag-lg-top" id="panchoPintor">
        <div class="shadow-down mb-4">
          <img src="vistas/modulos/images/panchoPintor.png" alt="author" class="img-fluid w-100">
        </div>
       
      </div>
    </div>
  </div>
</section>

<section class="section" style="background: white;margin-top: -128px;">
  <div class="container">
    <div class="row justify-content-around">
      <div class="col-lg-12 text-center">
        <h2 class="section-title">Folios Participantes: <b id="participant-number"></b><button  class="btn2 btn-primary" id="iniciarRifa" style="display: none">Iniciar Rifa</button></h2>
     
      </div>
      
  <div class='enter-names'>
    <span>Ingrese los folios a participar:</span>
    <textarea class='form-control name-text-field' id="areaBoletos" disabled></textarea>
        <div>

          <input class="form-control remove-winners-input" id="remove-winners-input" type="checkbox" onclick="toggleRemoveWinners();" checked="checked"/>

          <span><label for="remove-winners-input">Descartar ganadores después de cada sorteo</label></span>
        </div>
        <div><input class="form-control" id="number-of-winners-input" type="number" value="1" min="1" max="999" required/><span><label for="number-of-winners-input">Número de ganadores por sorteo</label></span></div>
    <button onclick="process();" id="button-success" class="btn btn-primary">Cargar participantes</button>
  </div>
    
    
    </div>
  </div>
</section>
<script>
  jQuery(document).ready(function($) {
      var boletos = JSON.parse(localStorage.participantes);
      
      boletosCargados = [];

        boletos.forEach(function (boleto) {
     
          boletosCargados.push(boleto.folioBoleto);
           
      });
      $("textarea#areaBoletos").val(boletosCargados);
      $("#nombrePremio").html("Premio "+localStorage.numeroPremio+"");
  });
</script>