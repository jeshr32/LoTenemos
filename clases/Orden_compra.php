
<?php 
	
	/*Llamadas de archivos necesarios 
	por medio de require*/

	 /**
	 * Clase y su contenido
	 *
	 */
	class Orden implements Crud  
	{
		private $id;
		private $fec_emision;
		private $total_oc;
		private $estado;

		function __construct($tot=null,$est=null)
		{
			$this->fec_emision = date('Y-m-d h:i:s');
			$this->total_oc = $tot;
			$this->estado = $est;
		}

		/*Implementacion de metodos Crud*/
        public function crear();
        public function read($nombre);
        public function update($id);
        public function delete($id); 
	
	    /**
	     * Getters.
	     */
	    public function getId()
	    {
	        return $this->id;
	    }

	    
	    public function getFec_emision()
	    {
	        return $this->fec_emision;
	    }

	    
	    public function getTotal_oc()
	    {
	        return $this->total_oc;
	    }

	    
	    public function getEstado()
	    {
	        return $this->estado;
	    }
}

 ?>
