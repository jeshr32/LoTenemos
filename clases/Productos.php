<?php
/*Llamadas de archivos necesarios
por medio de require*/
require __DIR__ . '/../libs/db/db.php';
require 'interfaceCRUD.php';
/**
 * Clase y su contenido
 *
 */
class Productos implements Crud {
	private $id_prod;
	private $descrip;
	private $precio;
	private $unidad;
	private $tipo;
	private $db;

	function __construct($desc = null, $pre = null, $uni = null, $tip = null) {
		$this->descrip = $desc;
		$this->precio = $pre;
		$this->unidad = $uni;
		$this->tipo = $tip;
		$this->db = new DB();
	}

	/*Implementacion de metodos Crud*/
	public function insert() {
		/*Definición del query que permitira ingresar un nuevo producto*/
		$sqlins = "insert into productos values(null,:tip,:des,:pre,:uni)";
		/*Verifica que el nombre de usuario no exista*/
		if ($this->existe($this->descrip)) {
			echo "El producto $this->descrip ya existe.";
			return false;
		}
		/*Preparación SQL*/
		try {
			$queryins = $this->db->conexion->prepare($sqlins);
		} catch (PDOException $Exception) {
			echo "Clase Producto:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		/*Asignación de parametros utilizando bindparam*/
		$queryins->bindParam(':tip', $this->tipo);
		$queryins->bindParam(':des', $this->descrip);
		$queryins->bindParam(':pre', $this->precio);
		$queryins->bindParam(':uni', $this->unidad);

		try {
			$queryins->execute();
		} catch (PDOException $Exception) {
			echo "Clase Producto:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return true;
	}
	public function read() {
		/*Definicion de query*/
		$sql = "select * from productos ORDER BY ID_PRODUCTO";
		/*Preparacion sql*/
		try {
			$query = $this->db->conexion->prepare($sql);
		} catch (PDOException $Exception) {
			echo "Clase productos:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		try {
			$query->execute();
		} catch (PDOException $Exception) {
			echo "Clase Producto:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return $query;

	}
	public function update($id) {
		/*Definicion del query que permitira actualizar */
		$sqlupd = "update productos set ID_TIPO_PRODUCTO=:tip,DESCRIPCION=:desc
		,PRECIO=:pre,UNIDAD=:uni where ID_PRODUCTO=:id";

		/*Preparación SQL*/
		try {
			$queryup = $this->db->conexion->prepare($sqlupd);
		} catch (PDOException $Exception) {
			echo "Clase usuario:ERROR:Preparacion Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}

		/*Asignacion de parametros utilizando bindparam*/
		$queryup->bindParam(':id', $id);
		$queryup->bindParam(':tip', $this->tipo);
		$queryup->bindParam(':desc', $this->descrip);
		$queryup->bindParam(':pre', $this->precio);
		$queryup->bindParam(':uni', $this->unidad);

		try {
			$queryup->execute();
		} catch (PDOException $Exception) {
			echo "Clase Producto:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			die();
			return false;
		}
		return true;
	}
	public function delete($id) {
		/*Definición del query que permitira eliminar un registro*/
		$sqldel = "delete from productos where ID_PRODUCTO=:id";

		/*Preparación SQL*/
		$querydel = $this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':id', $id);

		try {
			$querydel->execute();
		} catch (PDOException $Exception) {
			echo "Clase Productos:ERROR:Ejecución Query " . $Exception->getMessage() . '/' . $Exception->getCode();
			return false;
		}
		return true;
	}
	public function existe($nombre) {
		/*Definición del query que permitira traer un nuevo registro*/
		$sqlsel = "select * from productos	where DESCRIPCION=:prod";

		/*Preparación SQL*/
		$querysel = $this->db->conexion->prepare($sqlsel);

		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':prod', $nombre);

		$querysel->execute();

		if ($querysel->rowcount() == 1) {
			return true;
		} else {
			return false;
		}
	}

}
?>
