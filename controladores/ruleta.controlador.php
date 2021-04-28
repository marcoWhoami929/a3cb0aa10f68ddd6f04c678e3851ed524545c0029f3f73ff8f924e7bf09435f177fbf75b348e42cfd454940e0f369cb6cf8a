<?php

class ControladorRuleta
{

	static public function ctrObtenerParticipantesPremios($parametros){

		$tabla = "participantes";

		$respuesta = ModeloRuleta::mdlObtenerParticipantesPremios($tabla,$parametros);

		return $respuesta;
	}
	static public function ctrObtenerEstadisticas(){

		$respuesta = ModeloRuleta::mdlObtenerEstadisticas();

		return $respuesta;
	}
	static public function ctrObtenerFoliosParticipantes($parametro){

		$respuesta = ModeloRuleta::mdlObtenerFoliosParticipantes($parametro);

		return $respuesta;


	}
	static public function ctrGuardarDescartados($tabla,$datos){

		$respuesta = ModeloRuleta::mdlGuardarDescartados($tabla,$datos);

		return $respuesta;


	}
	




}

?>		