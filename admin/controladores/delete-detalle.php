<?php
	/*
	|--------------------------------------------------------------------------
	| Controlador
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de eliminar un detalle del sistema.
	|
	*/
	require __DIR__ . '/../../config/auth.php';
	require __DIR__ . '/../../config/config.php';
	require __DIR__ . '/../../clases/Detalle_oc.php';
	

	$det = new Detalle();


		$oc= ( isset($_GET['id']) && $_GET['id'] != "" ) ? $_GET['id'] : null;
		$prod= ( isset($_GET['des']) && $_GET['des'] != "" ) ? $_GET['des'] : null;

		if($det->delete($oc,$prod)){
			$_SESSION['success_del'] = true;
                        			      
		}else{
			$_SESSION['error_tmp'] = "Ha ocurrido un error, trate de nuevo!";
		}
	

header('Location: ' .ROOT_ADMIN. 'vistas/ListarDetalle.php');
?>