<?php 
	interface Crud{
		public function crear();
		public function read($nombre);
		public function update($id);
		public function delete($id); 
	}
?>