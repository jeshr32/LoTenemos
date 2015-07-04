<?php 
	/*Llamadas de archivos necesarios 
	por medio de require*/

	 /**
	 * Clase y su contenido
	 *
	 */
	class Perfil implements Crud  
	{
		private $id_perfil;
		private $descripcion;

		/*Construct*/
		function __construct($id=0,$desc="")
		{
			$this->id_perfil=$id;
			$this->descripcion=$desc;
		}

		/*Implementacion de metodos Crud*/
        public function crear();
        public function read($nombre);
        public function update($id);
        public function delete($id); 

		/*Getters*/
	    public function getId_perfil()
	    {
	        return $this->id_perfil;
	    }	

	    
	    public function getDescripcion()
	    {
	        return $this->descripcion;
	    }
	}	

 ?>