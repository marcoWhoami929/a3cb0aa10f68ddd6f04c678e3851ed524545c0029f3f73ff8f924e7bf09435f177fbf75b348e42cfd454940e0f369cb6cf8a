
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
<div class="modal fade" id="ganadoresRifa" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
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