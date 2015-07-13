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

if (!empty($_POST['producto']) && !empty($_POST['cantidad'] ) && !empty($_POST['precio'] )) {
	$prod = $_POST['producto'];
	$cant = $_POST['cantidad'];
	$pre = $_POST['precio'];
	$estado = "enviado";
	$usuario = $_SESSION['usuario']['id'];
	$total = ($pre * $cant);
	
	$orden = new Orden($total, $estado, $usuario);

	if ($Producto->insert()) {
		$_SESSION['prod'] = $nombre;

	} else {
		$_SESSION['error_tmp'] = "Producto no ingresado";
	}

} else {
	$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
}

header('Location: ' . ROOT_ADMIN . 'vistas/agregarProducto.php');
?>