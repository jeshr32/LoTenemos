<?php 
	/*Llamadas de archivos necesarios 
	por medio de require*/

	 /**
	 * Clase y su contenido
	 *
	 */
	class Tipo implements Crud
	{
		private $id_tipo;
		private $descripcion;

		function __construct($desc=null)
		{
			$this->descripcion = $desc;
		}

		/*Implementacion de metodos Crud*/
        public function crear();
        public function read($nombre);
        public function update($id);
        public function delete($id); 
	
    /**
     * Getters 
     */
    public function getId_tipo()
    {
        return $this->id_tipo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
 ?>