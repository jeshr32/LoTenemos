<?php
/*
|--------------------------------------------------------------------------
| Archivos y configuracion de Pagina
|--------------------------------------------------------------------------
|
| Aqui se hace "required" de archivos minimos de funcionamiento para armar
| cada pagina.
|
 */
/*$titulo = "Dashboard";*/

require __DIR__ . '/config/auth.php';
require __DIR__ . '/config/config.php';
/*require __DIR__.'/./templates/header.php';
require __DIR__.'/./templates/menu.php';
require __DIR__.'/./templates/sidebar.php';
require __DIR__.'/../clases/Producto.php';

$modeloProducto = new Producto();
$listaProducto = $modeloProducto->obtenerTodos();*/

/*
|--------------------------------------------------------------------------
| Contenido del Sitio
|--------------------------------------------------------------------------
|
| Aqui se agrega toda la funcionalidad de la pagina, especialmente deberia
| haber solo HTML cn algunos tags para PHP para acceder a variables.
|
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba</title>
</head>
<body>
	<a href="admin/vistas/usuarios.php" value="aqui"> Aqui</a>
</body>
</html>

