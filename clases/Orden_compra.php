
<?php

/*Llamadas de archivos necesarios
por medio de require*/
require __DIR__ . '/../libs/db/db.php';
require 'interfaceCRUD.php';
/**
 * Clase y su contenido
 *
 */
class Orden implements Crud {
	private $id;

	private $fec_emision;
	private $total_oc;
	private $estado;
	private $usuario;
	private $db;

	function __construct($tot = null, $est = null, $usr = null) {
		$this->fec_emision = date('Y-m-d h:i:s');
		$this->total_oc = $tot;
		$this->estado = $est;
		$this->usuario = $usr;

		$this->db = new DB();
	}

	/*Implementacion de metodos Crud*/
	public function insert() {
		/*Definición del query que permitira ingresar una nueva orden*/
		$sqlins = "insert into orden_compras values(null,:usr,:fech,:tot,:est)";

		/*Preparación SQL*/
		try {
			$queryins = $this->db->conexion->prepare($sqlins);
		} catch (PDOException $Exception) {
			echo "Clase Orden Compra:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		/*Asignación de parametros utilizando bindparam*/
		$queryins->bindParam(':usr', $this->usuario);
		$queryins->bindParam(':fech', $this->fec_emision);
		$queryins->bindParam(':tot', $this->total_oc);
		$queryins->bindParam(':est', $this->estado);

		try {
			$queryins->execute();
		} catch (PDOException $Exception) {
			echo "Clase OrdenCompra:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return true;
	}
	public function read() {
		/*Definicion de query*/
		$sql = "select * from orden_compras o INNER JOIN usuario u ON o.ID_USUARIO=u.ID_USUARIO";
		/*Preparacion sql*/
		try {
			$query = $this->db->conexion->prepare($sql);
		} catch (PDOException $Exception) {
			echo "Clase OrdenCompra:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		try {
			$query->execute();
		} catch (PDOException $Exception) {
			echo "Clase OrdenCompra:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return $query;
	}
	public function update($id) {
		/*Definicion del query que permitira actualizar */
		$sqlupd = "update  orden_compras set ID_USUARIO=:usr,FECHA_EMISION=:fech,TOTAL_OC=:tot,ESTADO=:est
		 where ID_OC=:id";

		/*Preparación SQL*/
		try {
			$queryup = $this->db->conexion->prepare($sqlupd);
		} catch (PDOException $Exception) {
			echo "Clase OrdenCompra:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		/*Asignacion de parametros utilizando bindparam*/
		$queryup->bindParam(':id', $id);
		$queryup->bindParam(':usr', $this->usuario);
		$queryup->bindParam(':fech', $this->fec_emision);
		$queryup->bindParam(':tot', $this->total_oc);
		$queryup->bindParam(':est', $this->estado);

		try {
			$queryup->execute();
		} catch (PDOException $Exception) {
			echo "Clase OrdenCompra:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return true;
	}
	public function delete($id) {
		/*Definición del query que permitira eliminar un registro*/
		$sqldel = "delete from orden_compras where ID_OC=:id";

		/*Preparación SQL*/
		$querydel = $this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':id', $id);

		try {
			$querydel->execute();
		} catch (PDOException $Exception) {
			echo "Clase OrdenCompra:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}
		return true;
	}
	public function existe($nombre) {
		return null;
	}

}

?>
