<?php
/*
|--------------------------------------------------------------------------
|Controlador
|--------------------------------------------------------------------------
|
| Este archivo se encarga de guardar los cambios de tipo en el sistema.
|
 */
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../clases/Tipo_productos.php';

if (!empty($_POST['nombre'])) {
	$idtipo = (isset($_GET['id']) && $_GET['id'] != "") ? $_GET['id'] : null;
	$nomTipo = $_POST['nombre'];
	$tipo = new Tipo($nomTipo);

	if ($tipo->update($idtipo)) {
		$_SESSION['success_update'] = true;
		$_SESSION['tipup'] = $nomTipo;

	} else {
		$_SESSION['error_tmp'] = "Producto no ingresado";
	}

} else {
	$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
}
header('Location: ' . ROOT_ADMIN . 'vistas/ListarTipoProducto.php');
?>