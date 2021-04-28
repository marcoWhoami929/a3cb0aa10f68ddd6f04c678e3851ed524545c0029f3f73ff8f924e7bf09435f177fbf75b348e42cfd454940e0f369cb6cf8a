/*
FUNCION PARA ELEIMINAR ELEMENTO DE ARREGLO PARTICIPANTES
 */

$(".indicadorPremio").on("click",function(event){
	var idPremio = $(this).attr("idPremio");
	localStorage.setItem("numeroPremio",idPremio);

	event.preventDefault();

	var datos = new FormData();
	datos.append('idPremio',idPremio);
	switch(idPremio) {
		case '1':
			var array = ['Kit Pintor','Playera','PISTOLA SAGOLA 4600 XTREME'];
			localStorage.setItem("premios",array);
			break;
		case '2':
			var array = ['Kit Pintor','Playera','PISTOLA ACUSPRAY 07HS-PRO'];
			localStorage.setItem("premios",array);
			break;
		case '3':
			var array = ['Kit Pintor','Playera','ESMERILADORA 3M FILE BELT SANDER 28366 6 HP MOTOR 14-9/16'];
			localStorage.setItem("premios",array);
			break;
	}
	
	 localStorage.setItem("vueltas",0);

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
        
			location.href="premios";
        
      }
  
  
    })
	
})