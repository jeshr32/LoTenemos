<?php
/*
|--------------------------------------------------------------------------
| Controladores
|--------------------------------------------------------------------------
|
| Este archivo se encarga de guardar un nuevo usuario en el sistema.
|
 */
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../clases/Tipo_productos.php';

if (!empty($_POST['nombre'])) {
	$nombre = $_POST['nombre'];

	$tipo = new Tipo($nombre);
	var_dump($usuario);

	if ($tipo->insert()) {
		$_SESSION['tipoprod'] = $nombre;

	} else {
		$_SESSION['error_tmp'] = "Tipo no ingresado";
	}

} else {
	$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
}

header('Location: ' . ROOT_ADMIN . 'vistas/agregarTipoProductos.php');
?>