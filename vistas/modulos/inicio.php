<?php

$obtenerEstadisticas = ControladorRuleta::ctrObtenerEstadisticas();
$participantes = $obtenerEstadisticas[0][0];
$boletos = $obtenerEstadisticas[1][0];
$facturas = $obtenerEstadisticas[2][0];
?>
<section class="hero-area bg-primary" id="parallax">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mx-auto text-center" id="textInicio">
        <center><h2 class="text-white font-tertiary" >LA GRAN RIFA ESTA POR COMENZAR<span>&#160;</span></h2></center>
       
      </div>
    
    </div>
  </div>
  <div class="layer-bg w-100">
    <img class="img-fluid w-100" src="vistas/modulos/images/pintura.png" alt="bg-shape">
  </div>
  
  <div class="layer" id="l3">
    <img src="vistas/modulos/images/pistola-acuspray.png" alt="bg-shape">
  </div>
  
  <div class="layer" id="l5">
    <img src="vistas/modulos/images/pistola-sagola.png" alt="bg-shape">
  </div>
  <div class="layer" id="l6">
    <img src="vistas/modulos/images/pistola-sagola-2.png" alt="bg-shape">
  </div>
  <div class="layer" id="l9">
    <img src="vistas/modulos/images/esmeriladora.png" alt="bg-shape">
  </div>
 
</section>


<section  id="sectionTimer">
  <div class="container">
    <div class="row">

       <div class="col-12 text-center">
        <h1 class="section-title text-white mb-5" id="tiempo"></h1>
          <a class="button" id="indicadorPremio" idPremio="3" style="display: none;margin-top: -160px" href="#">COMENZAR</a>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    
    </div>
  </div>
</section>


<section class="section position-relative">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-title">Estadísticas</h2>
      </div>
      <div class="col-lg-6 col-md-6 mb-80">
        <div class="d-flex">
          <div class="mr-lg-5 mr-3">
            <i class="ti-medall icon icon-light icon-bg bg-white shadow rounded-circle d-block"></i>
          </div>
          <div>
            <h2 class="text-dark mb-1"><?php echo $participantes ?></h2>
            <h4>Participantes</h4>
            <p class="mb-0 text-light">Registrados</p>
          </div>
        </div>
      </div>
        <div class="col-lg-6 col-md-6 mb-80">
        <div class="d-flex">
          <div class="mr-lg-5 mr-3">
            <i class="ti-wallet icon icon-light icon-bg bg-white shadow rounded-circle d-block"></i>
          </div>
          <div>
            <h2 class="text-dark mb-1"><?php echo $boletos ?></h2>
            <h4>Boletos</h4>
            <p class="mb-0 text-light">Generados</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 mb-80">
        <div class="d-flex">
          <div class="mr-lg-5 mr-3">
            <i class="ti-wallet icon icon-light icon-bg bg-white shadow rounded-circle d-block"></i>
          </div>
          <div>
            <h2 class="text-dark mb-1"><?php echo $facturas ?></h2>
            <h4>Facturas</h4>
            <p class="mb-0 text-light">Registradas</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>

  <img class="img-fluid edu-bg-image " src="vistas/modulos/images/background.png" alt="bg-image">
</section>

<!--
<div class="modal fade" id="iniciarRifa" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
          
              <div class="col-lg-6 col-md-6 col-sm-6">
                
                          <div class='ticket'>
                            <div class='datas'>
                              <a class='link'>
                                <div class='ribbon'>
                                  <div class='label'>3</div>
                                </div>
                                <h4>Premio</h4>
                                 <a href="premios" class="indicadorPremio" idPremio="3"><img src="vistas/modulos/images/esmeriladora.png" alt="bg-shape" width="50%"></a>
                                <strong></strong>
                                <em></em>
                              </a>
                            </div>
                            <a class='button'></a>
                          </div>
                 
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
               
                          <div class='ticket'>
                            <div class='datas'>
                              <a class='link'>
                                <div class='ribbon'>
                                  <div class='label'>2</div>
                                </div>
                                <h4>Premio</h4>
                                  <a href="premios" class="indicadorPremio" idPremio="2"><img src="vistas/modulos/images/pistola-acuspray.png" alt="bg-shape" width="50%"></a>
                                <strong></strong>
                                <em></em>
                              </a>
                            </div>
                            <a class='button'></a>
                          </div>
               
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                
                          <div class='ticket'>
                            <div class='datas'>
                              <a class='link'>
                                <div class='ribbon'>
                                  <div class='label'>1</div>
                                </div>
                                <h4>Premio</h4>
                                <a href="premios" class="indicadorPremio" idPremio="1"><img src="vistas/modulos/images/pistola-sagola.png" alt="bg-shape" width="50%"></a>
                                <strong></strong>
                                <em></em>
                              </a>
                            </div>
                            <a class='button'></a>
                          </div>
                 
              </div>
              
           
            
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Minimizar</button>
        
      </div>
    </div>
  </div>
</div>

<style type="text/css" media="screen">


/*  ================================================
            TICKET STYLING & COUPON EFFECT
    ================================================  */
.ticket {
position: relative;
display: table;
width: 300px;
height: 150px;
margin-top:20px;
padding-bottom: 57px;
background: #F4F4F4;
text-align: center;
}

.ticket::before {
  content:"";
  position: absolute;
  top: 54.5%;
  left: 0;
  border-top: 20px solid transparent;
  border-bottom: 20px solid transparent;
  border-left: 20px solid #a52958;
}

.ticket::after {
  content:"";
  position: absolute;
  top: 54.5%;
  right: 0;
  border-top: 20px solid transparent;
  border-bottom: 20px solid transparent;
  border-right: 20px solid #185661;
}

/*  ================================================
                    RIBBON EFFECT
    ================================================  */
.ribbon {
position: absolute;
display: block;
top: -4px;
right: -4px;
width: 110px;
height: 110px;
overflow: hidden;
}

.ribbon .label {
position: relative;
display: block;
left: -10px;
top: 23px;
width: 158px;
padding: 10px 0;
font-size: 15px;
text-align: center;
color: #fff;
background-color: #e85e68;
-webkit-box-shadow: 0px 0px 4px rgba(0,0,0,0.3);
-moz-box-shadow: 0px 0px 4px rgba(0,0,0,0.3);
-ms-box-shadow: 0px 0px 4px rgba(0,0,0,0.3);
box-shadow: 0px 0px 4px rgba(0,0,0,0.3);
-webkit-transform: rotate(45deg) translate3d(0,0,0);
-moz-transform: rotate(45deg) translate3d(0,0,0);
-ms-transform: rotate(45deg) translate3d(0,0,0);
transform: rotate(45deg) translate3d(0,0,0);
}

.label:before, .label:after {
content: '';
position: absolute;
bottom: -4px;
border-top: 4px solid #a71c26;
border-left: 4px solid transparent;
border-right: 4px solid transparent;
}

.label:before {
left: 0;
}

.label:after {
right: 0;
}



/*  ================================================
                        CONTENT
    ================================================  */


/*  ================================================
              ACTION CALL & ARROW UP EFFECT
    ================================================  */
.button {
  display: block;
  color: white;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 57px;
  padding: 0;
  line-height: 58px;
  text-align: center;
  border-radius: 0;
  background-color: #86db78;
}

.button::before {
  content:"";
  position: absolute;
  top: -10px;
  left: calc(50% - 20px);
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;
  border-bottom: 10px solid #86db78;
}



/*  ================================================
                    INSIDE TICKET
    ================================================  */
.ticket-in {
  width: 450px;
  height: 280px;
  position: absolute;
  background: #a52958;
  top: 55px;
  left: calc(50% - 280px);
  z-index: -1;
  transition: left 2s;
}

.ticket-in.active {
  left: calc(50% - 585px);
  transition: left 1.5s;
}

.content {
  height: 260px;
  margin: 8px;
  border: 2px dashed #e0c68e;
  border-radius: 10px;
}

.content h1 {
  font-size: 29px;
  color: #4c483b;
  text-align: center;
  margin: 0;
  padding: 0;
  font-family: 'Berkshire Swash', cursive;
}

.pass {
  display: block;
  color: white;
  position: absolute;
  top: 0;
  left: 0;
  width: 420px;
  height: 57px;
  margin: 15px 0 0 15px; 
  padding: 0;
  line-height: 58px;
  text-align: center;
  border-radius: 10px 10px 0 0;
  background: #eadbb8;
  border: 1px solid #82113c;
}

.pass::before {
  content:"";
  position: absolute;
  bottom: -10px;
  left: calc(50% - 20px);
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;
  border-top: 10px solid #eadbb8;
}

.content span {
  margin: 85px 0 0 0;
  text-align: center;
  color: #82113c;
}

.content em {
  border: none;
  text-align: center;
  font-size: 89px;
  color: #eadbb8;
  text-shadow: 1px 1px 0 rgba(0,0,0,.7);
}

.check{
  
  opacity: 0.8;
    
}
  </style>
-->
