<?php 
require_once "controladores/ruleta.controlador.php";
require_once "modelos/ruleta.modelo.php";
?>
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

<section class="section" style="background: white;margin-top: -170px;">
  <div class="container">
    <div class="row justify-content-around" >

      <div class='enter-names'>

        <button onclick="process();" id="button-success" class="btn btn-primary"></button>
      </div>


    </div>
  </div>
</section>
<div class="modal fade modal-fullscreen" id="ganadoresRifa" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document"> 
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
              <div class="col-lg-12"><span id="textoModal">FELICIDADES A TODOS LOS GANADORES</span></div>
              <div class="col-lg-12">
                <?php
                $obtenerGanadores =  ControladorRuleta::ctrMostrarGanadores();
                
                foreach ($obtenerGanadores as $key => $value) {
                  echo "<h4 style='color:#001D7E'>".$value["nombre"]."</h4><h5 style='color:#BA007C'>".$value["premio"]."</h5>";
                }
                ?>
              </div>
              
           
            
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Finalizar</button>
        
      </div>
    </div>
  </div>
</div>
<style  type="text/css">
  /*
Full screen Modal 
*/
.fullscreen-modal .modal-dialog {
  margin: 0;
  margin-right: auto;
  margin-left: auto;
  width: 100%;
}
@media (min-width: 768px) {
  .fullscreen-modal .modal-dialog {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .fullscreen-modal .modal-dialog {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .fullscreen-modal .modal-dialog {
     width: 1170px;
  }
}
</style>

<script>

  $(document).ready(function(){
         document.getElementById("iniciarRifa").style.display = "none";
    $('#button-success').trigger('click');
    $('.navigation').addClass('nav-bg');

    $(window).scroll(function () {
        if ($('.navigation').offset().top > 0) {
            $('.navigation').addClass('nav-bg');
        } else {
            $('.navigation').addClass('nav-bg');
        }
    });
  })
</script>
