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
require __DIR__ . '/../../clases/Productos.php';

if (!empty($_POST['nombre']) && !empty($_POST['precio']) && !empty($_POST['unidad']) && !empty($_POST['tipo'])) {
	$idProd = (isset($_GET['id']) && $_GET['id'] != "") ? $_GET['id'] : null;
	$nomProd = $_POST['nombre'];
	$preProd = $_POST['precio'];
	$uniProd = $_POST['unidad'];
	$tipoProd = $_POST['tipo'];

	$prod = new Productos($nomProd, $preProd, $uniProd, $tipoProd);


	if ($prod->update($idProd)) {
		$_SESSION['success_update'] = true;
		$_SESSION['produp'] = $nomProd;

	} else {
		$_SESSION['error_tmp'] = "Producto no ingresado";
	}

} else {
	$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
}
header('Location: ' . ROOT_ADMIN . 'vistas/ListarProductos.php');
?>