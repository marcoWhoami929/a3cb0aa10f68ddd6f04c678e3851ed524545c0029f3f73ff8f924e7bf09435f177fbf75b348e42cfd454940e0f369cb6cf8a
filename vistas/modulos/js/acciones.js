/*
FUNCION PARA ELEIMINAR ELEMENTO DE ARREGLO PARTICIPANTES
 */

$("#indicadorPremio").on("click",function(event){
	var idPremio = $(this).attr("idPremio");
	localStorage.setItem("numeroPremio",idPremio);

	event.preventDefault();
	
	var datos = new FormData();
	datos.append('idPremio',idPremio);

	let premio1 = ['Playera','Mochila','PISTOLA SAGOLA 4600 XTREME'];
	let premio2 = ['Playera','Mochila','PISTOLA ACUSPRAY 07HS-PRO'];
	let premio3 = ['Playera','Mochila','ESMERILADORA 3M FILE BELT SANDER 28366 6 HP MOTOR 14-9/16'];
	
	let premiosData = [premio3,premio2,premio1];
	localStorage.setItem("premios",premiosData);


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