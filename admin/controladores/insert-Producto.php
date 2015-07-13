<?php
/*
|--------------------------------------------------------------------------
| Controladores
|--------------------------------------------------------------------------
|
| Este archivo se encarga de guardar un nuevo Producto en el sistema.
|
 */
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../clases/Productos.php';

if (!empty($_POST['nombre']) && !empty($_POST['precio']) && !empty($_POST['unidad']) && !empty($_POST['tipo'])) {
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$unidad = $_POST['unidad'];
	$tipo = $_POST['tipo'];

	$Producto = new Productos($nombre, $precio, $unidad, $tipo);

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