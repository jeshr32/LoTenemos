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
	private $db;

	function __construct($desc = null, $pre = null, $uni = null) {
		$this->descrip = $desc;
		$this->precio = $pre;
		$this->unidad = $uni;

		$this->db = new DB();
	}

	/*Implementacion de metodos Crud*/
	public function insert() {}
	public function read() {}
	public function update($id) {}
	public function delete($id) {}
	public function existe($nombre) {}

}
?>
