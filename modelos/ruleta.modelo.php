<?php
require_once "conexion.php";

class ModeloRuleta
{

	static public function mdlObtenerParticipantesPremios($tabla,$parametros){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id) as total FROM $tabla WHERE $parametros");

		$stmt ->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt = null;

	}
	static public function mdlObtenerEstadisticas(){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id) as participantes FROM participantes WHERE id > 9 UNION SELECT COUNT(id) as boletos FROM boletos UNION SELECT COUNT(id) as facturas FROM facturas WHERE elegida = 1");

		$stmt ->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;

	}
	static public function mdlObtenerFoliosParticipantes($parametro){

		$stmt = Conexion::conectar()->prepare("SELECT bol.id as idBoleto,bol.folioBoleto,bol.idParticipante,CONCAT(part.nombre,' ',part.apellidoPaterno,' ',part.apellidoMaterno) as participante,part.montoAcumulado FROM boletos as bol INNER JOIN participantes as part ON bol.idParticipante = part.id WHERE bol.descartado = 0 and $parametro");

		$stmt ->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;

	}
	static public function mdlGuardarDescartados($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idParticipante, idBoleto, folioBoleto, numPremio, premio) VALUES(:idParticipante, :idBoleto, :folioBoleto, :numPremio, :premio)");

		
		$stmt->bindParam(":idParticipante", $datos["idParticipante"], PDO::PARAM_INT);
		$stmt->bindParam(":idBoleto", $datos["idBoleto"], PDO::PARAM_INT);
		$stmt->bindParam(":folioBoleto", $datos["folioBoleto"], PDO::PARAM_STR);
		$stmt->bindParam(":numPremio", $datos["numPremio"], PDO::PARAM_INT);
		$stmt->bindParam(":premio", $datos["premio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	
}

?>