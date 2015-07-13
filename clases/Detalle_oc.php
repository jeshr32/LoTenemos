<?php
/*Llamadas de archivos necesarios
por medio de require*/
require __DIR__ . '/../libs/db/db.php';
/**
 * Clase y su contenido
 *
 */

class Detalle {
	private $orden;
	private $producto;
	private $cantidad;
	private $sub_total;
	private $db;

	function __construct($oc = null, $prod = null, $cant = null, $sub = null) {
		$this->orden = $oc;
		$this->producto = $prod;
		$this->cantidad = $cant;
		$this->sub_total = $sub;

		$this->db = new DB();
	}

	/*metodos Crud*/
	public function insert() {
		/*Definición del query que permitira ingresar un nuevo detalle*/
		$sqlins = "insert into detalle_oc values(:oc,:prod,:cant,:sub)";

		/*Preparación SQL*/
		try {
			$queryins = $this->db->conexion->prepare($sqlins);
		} catch (PDOException $Exception) {
			echo "Clase Detalle:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		/*Asignación de parametros utilizando bindparam*/
		$queryins->bindParam(':oc', $this->orden);
		$queryins->bindParam(':prod', $this->producto);
		$queryins->bindParam(':cant', $this->cantidad);
		$queryins->bindParam(':sub', $this->sub_total);

		try {
			$queryins->execute();
		} catch (PDOException $Exception) {
			echo "Clase Detalle:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return true;
	}
	public function read($id_oc = null) {
		/*Definicion de query*/
		$sql = "select * from detalle_oc d INNER JOIN productos p ON d.ID_PRODUCTO = p.ID_PRODUCTO where id_oc=:id";
		/*Preparacion sql*/
		try {
			$query = $this->db->conexion->prepare($sql);
		} catch (PDOException $Exception) {
			echo "Clase Detalle:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}
		/*Asignacion de parametros utilizando bindparam*/
		$query->bindParam(':id', $id_oc);

		try {
			$query->execute();
		} catch (PDOException $Exception) {
			echo "Clase Detalle:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return $query;
	}
	public function update($idorden, $idproduc) {
		/*Definicion del query que permitira actualizar */
		$sqlupd = "update detalle_oc set ID_OC=:ord,ID_PRODUCTO=:pro,CANTIDAD=:can,SUB_TOTAL=:sub
		 where ID_OC=:idc AND ID_PRODUCTO=:idp";

		/*Preparación SQL*/
		try {
			$queryup = $this->db->conexion->prepare($sqlupd);
		} catch (PDOException $Exception) {
			echo "Clase detalle:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		/*Asignacion de parametros utilizando bindparam*/
		$queryup->bindParam(':idc', $idorden);
		$queryup->bindParam(':idp', $idproduc);
		$queryup->bindParam(':ord', $this->orden);
		$queryup->bindParam(':pro', $this->producto);
		$queryup->bindParam(':can', $this->cantidad);
		$queryup->bindParam(':sub', $this->sub_total);

		try {
			$queryup->execute();
		} catch (PDOException $Exception) {
			echo "Clase Detalle:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return true;
	}
	public function delete($idorden, $idproduc) {
		/*Definición del query que permitira eliminar un registro*/
		$sqldel = "delete from detalle_oc where ID_OC=:idc AND ID_PRODUCTO=:idp";

		/*Preparación SQL*/
		$querydel = $this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':idc', $idorden);
		$querydel->bindParam(':idp', $idproduc);

		try {
			$querydel->execute();
		} catch (PDOException $Exception) {
			echo "Clase Detalle:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}
		return true;
	}

}
?>