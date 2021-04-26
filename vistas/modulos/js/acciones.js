/*
FUNCION PARA ELEIMINAR ELEMENTO DE ARREGLO PARTICIPANTES
 */

$(".indicadorPremio").on("click",function(event){
	var idPremio = $(this).attr("idPremio");
	event.preventDefault();

	var datos = new FormData();
	datos.append('idPremio',idPremio);

	 $.ajax({
      url:"ajax/ruleta.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){ 
        	
        	var arreglo = JSON.stringify(respuesta);
        	localStorage.setItem("participantes",arreglo);
			location.href="premio"+idPremio+"";
        
      }
  
  
    })
	
})