<?php 
	/*Llamadas de archivos necesarios 
	por medio de require*/

	 /**
	 * Clase y su contenido
	 *
	 */
	class Productos implements Crud
	{
		private $id_prod;
		private $descrip;
		private $precio;
		private $unidad;

		function __construct($desc=null,$pre=null,$uni=null)
		{
			$this->descrip=$desc;
			$this->precio=$pre;
			$this->unidad=$uni;
		}

		/*Implementacion de metodos Crud*/
        public function crear();
        public function read($nombre);
        public function update($id);
        public function delete($id); 
	
    /**
     * Getters
     */
    public function getId_prod()
    {
        return $this->id_prod;
    }

    
    public function getDescrip()
    {
        return $this->descrip;
    }

    
    public function getPrecio()
    {
        return $this->precio;
    }

   
    public function getUnidad()
    {
        return $this->unidad;
    }
}
 ?>
