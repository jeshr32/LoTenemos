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
	public function insert() {}
	public function read() {}
	public function update($id) {}
	public function delete($id) {}
	public function existe($nombre) {}

}

?>