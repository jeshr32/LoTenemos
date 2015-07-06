
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
	private $db;

	function __construct($tot = null, $est = null) {
		$this->fec_emision = date('Y-m-d h:i:s');
		$this->total_oc = $tot;
		$this->estado = $est;

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
