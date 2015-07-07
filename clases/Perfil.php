<?php
/*Llamadas de archivos necesarios
por medio de require*/
require __DIR__ . '/../libs/db/db.php';
require 'interfaceCRUD.php';
/**
 * Clase y su contenido
 *
 */
class Perfil implements Crud {
	private $id_perfil;
	private $descripcion;
	private $db;

	/*Construct*/
	function __construct($id = 0, $desc = "") {
		$this->id_perfil = $id;
		$this->descripcion = $desc;

		$this->db = new DB();
	}

	/*Implementacion de metodos Crud*/
	public function insert() {
		/*Definición del query que permitira ingresar un nuevo perfil*/
		$sqlins = "insert into usuario values(null,:des)";
		/*Verifica que el tipo no exista*/
		if ($this->existe($this->descripcion)) {
			echo "El perfil $this->descripcion ya existe.";
			return false;
		}
		/*Preparación SQL*/
		try {
			$queryins = $this->db->conexion->prepare($sqlins);
		} catch (PDOException $Exception) {
			echo "Clase Perfil:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		/*Asignación de parametros utilizando bindparam*/
		$queryins->bindParam(':des', $this->descripcion);

		try {
			$queryins->execute();
		} catch (PDOException $Exception) {
			echo "Clase Perfil:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return true;
	}
	public function read() {
		/*Definicion de query*/
		$sql = "select * from perfil ORDER BY ID_PERFIL";
		/*Preparacion sql*/
		try {
			$query = $this->db->conexion->prepare($sql);
		} catch (PDOException $Exception) {
			echo "Clase Perfil:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		try {
			$query->execute();
		} catch (PDOException $Exception) {
			echo "Clase Usuario:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return $query;
	}
	public function update($id) {
		/*Definicion del query que permitira actualizar */
		$sqlupd = "update perfil set DESCRIPCION_PERFIL=:des where ID_PERFIL=:id";

		/*Preparación SQL*/
		try {
			$queryup = $this->db->conexion->prepare($sqlupd);
		} catch (PDOException $Exception) {
			echo "Clase Perfil:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		/*Asignacion de parametros utilizando bindparam*/
		$queryup->bindParam(':id', $id);
		$queryup->bindParam(':des', $this->$descripcion);

		try {
			$queryup->execute();
		} catch (PDOException $Exception) {
			echo "Clase Perfil:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return true;
	}
	public function delete($id) {
		/*Definición del query que permitira eliminar un registro*/
		$sqldel = "delete from perfil where ID_PERFIL=:id";

		/*Preparación SQL*/
		$querydel = $this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':id', $id);

		try {
			$querydel->execute();
		} catch (PDOException $Exception) {
			echo "Clase Perfil:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}
		return true;
	}

	public function existe($nombre) {
		/*Definición del query que permitira traer un nuevo registro*/
		$sqlsel = "select * from perfil	where DESCRIPCION_PERFIL=:desc";

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