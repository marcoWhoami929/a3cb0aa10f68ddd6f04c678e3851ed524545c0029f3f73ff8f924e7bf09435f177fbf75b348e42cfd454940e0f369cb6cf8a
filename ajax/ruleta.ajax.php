<?php
require_once "../controladores/ruleta.controlador.php";
require_once "../modelos/ruleta.modelo.php";

class AjaxRuleta{

	public $idPremio;
	public function ajaxObtenerFoliosParticipantes(){

		$premio = $this->idPremio;

		switch ($premio) {
			case '1':
				$parametro = "part.montoAcumulado >= 10000";
				break;
			case '2':
				$parametro  = "part.montoAcumulado >=5000 and part.montoAcumulado <= 9999";
				break;
			case '3':
				$parametro = "part.montoAcumulado > 0 and part.montoAcumulado <= 4999";
				break;

		}

		$respuesta = ControladorRuleta::ctrObtenerFoliosParticipantes($parametro);

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