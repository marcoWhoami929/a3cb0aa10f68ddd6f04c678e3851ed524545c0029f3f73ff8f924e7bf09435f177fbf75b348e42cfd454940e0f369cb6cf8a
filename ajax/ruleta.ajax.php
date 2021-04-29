<?php
require_once "../controladores/ruleta.controlador.php";
require_once "../modelos/ruleta.modelo.php";

class AjaxRuleta{

	public $idPremio;
	public function ajaxObtenerFoliosParticipantes(){

		$respuesta = ControladorRuleta::ctrObtenerFoliosParticipantes();

		echo json_encode($respuesta);

	}
	public $idParticipanteDescartado;
	public $numPremioDescartado;
	public $premioDescartado;
	public $idBoletoDescartado;
	public $folioBoletoDescartado;

	public function ajaxGuardarDescartados(){

		$tabla = "descartados";
		$datos  = array('idParticipante' => $this->idParticipanteDescartado,
						'idBoleto' => $this->idBoletoDescartado,
						'folioBoleto' => $this->folioBoletoDescartado,
						'numPremio' => $this->numPremioDescartado,
						'premio' => $this->premioDescartado);
		$respuesta = ControladorRuleta::ctrGuardarDescartados($tabla,$datos);

		echo json_encode($respuesta);



	}

}
/*
OBTENER FOLIOS PARTICPANTES
 */
if (isset($_POST["idPremio"])) {
	$obtenerParticipantes = new AjaxRuleta();
	$obtenerParticipantes -> idPremio = $_POST["idPremio"];
	$obtenerParticipantes -> ajaxObtenerFoliosParticipantes();
}
/*
AGREGAR AL DESCARTADO
 */
if (isset($_POST["idParticipanteDescartado"])) {
	$obtenerDescartado = new AjaxRuleta();
	$obtenerDescartado -> idParticipanteDescartado = $_POST["idParticipanteDescartado"];
	$obtenerDescartado -> numPremioDescartado = $_POST["numPremioDescartado"];
	$obtenerDescartado -> premioDescartado = $_POST["premioDescartado"];
	$obtenerDescartado -> idBoletoDescartado = $_POST["idBoletoDescartado"];
	$obtenerDescartado -> folioBoletoDescartado = $_POST["folioBoletoDescartado"];
	$obtenerDescartado -> ajaxGuardarDescartados();
}


?>