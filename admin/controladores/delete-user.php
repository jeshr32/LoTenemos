<?php
	/*
	|--------------------------------------------------------------------------
	| Controlador
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de eliminar un usuario del sistema.
	|
	*/
	require __DIR__ . '/../../config/auth.php';
	require __DIR__ . '/../../config/config.php';
	require __DIR__ . '/../../clases/Usuario.php';
	

	$user = new Usuario();


		$idusr= ( isset($_GET['id']) && $_GET['id'] != "" ) ? $_GET['id'] : null;
		$nombre= ( isset($_GET['per']) && $_GET['per'] != "" ) ? $_GET['per'] : null;

		if($user->delete($idusr)){
			$_SESSION['success_contact'] = true;
            $_SESSION['delusr'] = $nombre;
            			      
		}else{
			$_SESSION['error_tmp'] = "Ha ocurrido un error, trate de nuevo!";
		}
	

header('Location: ' .ROOT_ADMIN. 'vistas/ListarUsuarios.php');
?>