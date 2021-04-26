<?php
$parametros = "montoAcumulado > 0 and montoAcumulado <=4999";
$clasificacion3 = ControladorRuleta::ctrObtenerParticipantesPremios($parametros);
$total = $clasificacion3["total"];
?>
<section class="page-title-alt bg-primary position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-white font-tertiary">PREMIO 3</h1>
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
        <h2 class="section-title">Folios Participantes: <?php echo $total ?></h2>
      </div>
     
    
    
    </div>
  </div>
</section>