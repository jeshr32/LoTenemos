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
require __DIR__ . '/../../clases/Orden_compra.php';

	$idord = (isset($_GET['id']) && $_GET['id'] != "") ? $_GET['id'] : null;
	$total = $_SESSION['total'];
	$estado = "enviado";
	$usr = $_SESSION['usuario']['id'];

	$orden= new Orden();

		

	if ($orden->update($idor)) {
		$_SESSION['susses_Orden'] = true;

	} else {
		$_SESSION['error_tmp'] = "Orden no ingresado";
	}



header('Location: ' . ROOT_ADMIN . 'vistas/agregarOC.php');
?>