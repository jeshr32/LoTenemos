<?php
	/*
	|--------------------------------------------------------------------------
	| Controlador
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de eliminar una orden del sistema.
	|
	*/
	require __DIR__ . '/../../config/auth.php';
	require __DIR__ . '/../../config/config.php';
	require __DIR__ . '/../../clases/Orden_compra.php';
	

	$com = new Orden();


		$idc= ( isset($_GET['id']) && $_GET['id'] != "" ) ? $_GET['id'] : null;
		

		if($com->delete($idc)){
			$_SESSION['del_ord'] = true;
                        			      
		}else{
			$_SESSION['error_tmp'] = "Ha ocurrido un error, trate de nuevo!";
		}
	

header('Location: ' .ROOT_ADMIN. 'vistas/ListarOrdenes.php');
?>