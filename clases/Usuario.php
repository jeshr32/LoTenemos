<?php 
 
  	/*Llamadas de archivos necesarios 
    por medio de require*/

     /**
     * Clase y su contenido
     *
     */

 class Usuario implements Crud 
 {
 	private $id_usuario;
 	private $login;
 	private $pass;
 	private $nombre;
 	private $apellido;
 	private $correo;
 	private $edad;
 	private $fechaNac;

 	function __construct($log=null,$psw=null,$nom=null,$ape=null,$mail=null,$ed=null,$fen=null)
 	{
 		
 		$this->login=$log;
 		$this->pass=md5($psw);
 		$this->nombre=$nom;
 		$this->apellido=$ape;
 		$this->correo=$mail;
 		$this->edad=$ed;
 		$this->fechaNac=$fen;
 	}

 	/*Implementacion de metodos Crud*/
        public function crear();
        public function read($nombre);
        public function update($id);
        public function delete($id); 

    /**
    *Getters
     */
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function getFechaNac()
    {
        return $this->fechaNac;
    }
	
}
 ?>