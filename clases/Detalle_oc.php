<?php
/*Llamadas de archivos necesarios
por medio de require*/
require __DIR__ . '/../libs/db/db.php';
/**
 * Clase y su contenido
 *
 */

class Detalle {
	private $cantidad;
	private $sub_total;
	private $db;

	function __construct($cant = null, $sub = null) {
		$this->cantidad = $cant;
		$this->sub_total = $sub;

		$this->db = new DB();
	}

	/*metodos Crud*/
	public function insert() {}
	public function read() {}
	public function update($id) {}
	public function delete($id) {}
	public function existe($nombre) {}

}
?>