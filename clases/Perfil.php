<?php
/*Llamadas de archivos necesarios
por medio de require*/
require __DIR__ . '/../libs/db/db.php';
require_once __DIR__ . '/interfaceCRUD.php';
/**
 * Clase y su contenido
 *
 */
class Perfil {
	private $id_perfil;
	private $descripcion;
	private $db;

	/*Construct*/
	function __construct($id = 0, $desc = "") {
		$this->id_perfil = $id;
		$this->descripcion = $desc;

		$this->db = new DB();
	}
	/*Esta clase solo leera ya que el sistema tiene sus perfiles definidos*/
	public function read() {
		/*Definicion de query*/
		$sql = "select * from perfil ";
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

}

?>