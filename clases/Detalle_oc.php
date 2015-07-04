<?php 
		/*Llamadas de archivos necesarios 
    por medio de require*/

     /**
     * Clase y su contenido
     *
     */

	class Detalle implements Crud
	{
		private $cantidad;
		private $sub_total;

		function __construct($cant=null,$sub=null)
		{
			$this->cantidad=$cant;
			$this->sub_total=$sub;
		}

		/*Implementacion de metodos Crud*/
        public function crear();
        public function read($nombre);
        public function update($id);
        public function delete($id); 

	
    /**
     * Getters 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    
    public function getSub_total()
    {
        return $this->sub_total;
    }
}
 ?>