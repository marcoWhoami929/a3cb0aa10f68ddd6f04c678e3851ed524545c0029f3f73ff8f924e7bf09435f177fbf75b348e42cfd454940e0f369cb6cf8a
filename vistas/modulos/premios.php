
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