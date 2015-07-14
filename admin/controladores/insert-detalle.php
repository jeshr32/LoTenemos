<?php
/*
|--------------------------------------------------------------------------
| Controladores
|--------------------------------------------------------------------------
|
| Este archivo se encarga de guardar una nueva orden en el sistema.
|
 */
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../clases/Detalle_oc.php';
require __DIR__ . '/../../clases/Productos.php';

if (!empty($_POST['producto']) && !empty($_POST['cantidad'] ) ) {
	$id = $_SESSION['idorden'];
	$prod = $_POST['producto'];
	$cant = $_POST['cantidad'];

	$product= new Productos();
	$precio = $product->precio($prod);
	foreach ($precio as $row) {
		$subtot= ($cant * $row['PRECIO']);
		break;
	}
	
	$det= new Detalle($id,$prod,$cant,$subtot);	

	if ($det->insert()) {
		$_SESSION['susses_det'] = true;
		$_SESSION['total']= $_SESSION['total']+$subtot;

	} else {
		$_SESSION['error_tmp'] = "Detalle no ingresado";
	}

} else {
	$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
}

header('Location: ' . ROOT_ADMIN . 'vistas/agregarOC.php');
?>