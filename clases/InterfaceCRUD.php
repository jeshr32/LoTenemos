<?php
interface Crud {
	public function insert();
	public function read();
	public function update($id);
	public function delete($id);
	public function existe($nombre);
}
?>