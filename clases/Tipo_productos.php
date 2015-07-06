<?php
/*Llamadas de archivos necesarios
por medio de require*/
require __DIR__ . '/../libs/db/db.php';
require 'interfaceCRUD.php';
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
	public function insert() {}
	public function read() {}
	public function update($id) {}
	public function delete($id) {}
	public function existe($nombre) {}

	/**
	 * Getters
	 */
	public function getId_tipo() {
		return $this->id_tipo;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}
}
?>