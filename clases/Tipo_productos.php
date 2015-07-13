2<?php
/*Llamadas de archivos necesarios
por medio de require*/
require __DIR__ . '/../libs/db/db.php';
require_once __DIR__ . '/interfaceCRUD.php';
/**
 * Clase y su contenido
 *
 */
class Tipo implements Crud {
	private $id_tipo;
	private $descripcion;
	private $db;

	function __construct($desc = null) {
		$this->descripcion = $desc;
		$this->db = new DB();
	}

	/*Implementacion de metodos Crud*/
	public function insert() {
		/*Definición del query que permitira ingresar un nuevo tipo*/
		$sqlins = "insert into tipo_producto values(null,:des)";
		/*Verifica que el tipo no exista*/
		if ($this->existe($this->descripcion)) {
			echo "El tipo $this->descripcion ya existe.";
			return false;
		}
		/*Preparación SQL*/
		try {
			$queryins = $this->db->conexion->prepare($sqlins);
		} catch (PDOException $Exception) {
			echo "Clase tipo:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		/*Asignación de parametros utilizando bindparam*/
		$queryins->bindParam(':des', $this->descripcion);

		try {
			$queryins->execute();
		} catch (PDOException $Exception) {
			echo "Clase tipo:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return true;
	}
	public function read() {
		/*Definicion de query*/
		$sql = "select * from tipo_producto ORDER BY ID_TIPO_PRODUCTO";
		/*Preparacion sql*/
		try {
			$query = $this->db->conexion->prepare($sql);
		} catch (PDOException $Exception) {
			echo "Clase tipo:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		try {
			$query->execute();
		} catch (PDOException $Exception) {
			echo "Clase tipo:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return $query;
	}
	public function update($id) {
		/*Definicion del query que permitira actualizar */
		$sqlupd = "update tipo_producto set DESCRIPCION_TIPO=:des where ID_TIPO_PRODUCTO=:id";

		/*Preparación SQL*/
		try {
			$queryup = $this->db->conexion->prepare($sqlupd);
		} catch (PDOException $Exception) {
			echo "Clase Tipo:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		/*Asignacion de parametros utilizando bindparam*/
		$queryup->bindParam(':id', $id);
		$queryup->bindParam(':des', $this->descripcion);

		try {
			$queryup->execute();
		} catch (PDOException $Exception) {
			echo "Clase Tipo:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return true;
	}
	public function delete($id) {
		/*Definición del query que permitira eliminar un registro*/
		$sqldel = "delete from tipo_producto where ID_TIPO_PRODUCTO=:id";

		/*Preparación SQL*/
		$querydel = $this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':id', $id);

		try {
			$querydel->execute();
		} catch (PDOException $Exception) {
			echo "Clase Tipo:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}
		return true;
	}
	public function existe($nombre) {
		/*Definición del query que permitira traer un nuevo registro*/
		$sqlsel = "select * from tipo_producto	where DESCRIPCION_TIPO=:desc";

		/*Preparación SQL*/
		$querysel = $this->db->conexion->prepare($sqlsel);

		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':desc', $nombre);

		$querysel->execute();

		if ($querysel->rowcount() == 1) {
			return true;
		} else {
			return false;
		}
	}

}
?>