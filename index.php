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
$titulo = "Bienvenido";

require __DIR__ . '/config/auth.php';
require __DIR__ . '/config/config.php';
require __DIR__ . '/admin/templates/header.php';
require __DIR__ . '/admin/templates/menu.php';
require __DIR__ . '/admin/templates/sidebar.php';
require __DIR__ . '/clases/Usuario.php';
require __DIR__ . '/clases/Tipo_productos.php';
require __DIR__ . '/clases/Productos.php';
require __DIR__ . '/clases/Orden_compra.php';
require __DIR__ . '/clases/Detalle_oc.php';

/*Usuario*/
$modeloUsers = new Usuario();
$listaUsers = $modeloUsers->read();
/*Tipo Producto*/
$modeloTipo = new Tipo();
$listaTipo = $modeloTipo->read();
/*Producto*/
$modeloProd = new Productos();
$listaprod = $modeloProd->read();
/*Orden de compra*/
$modeloOC = new Orden();
$listaOC = $modeloOC->read();
/*detalle*/
$modeloDet = new Detalle();
$listaDet = $modeloDet->read();

/*$modeloProducto = new Producto();
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
<div class="content-wrapper" onLoad="simple_reloj();" onUnload="stop();">
	<!-- Header de la pagina -->
	<section class="content-header">
			<h1>
			Dashboard
			<small>Algunas estadisticas</small>
			</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
	</section>



	<!-- Contenido -->
	<section class="content">





		<!-- Indicadores -->
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Usuarios</span>
			      		<span class="info-box-number"><?=$listaUsers->rowcount()?></span>
			    	</div>
				</div>
			</div>

			<!-- fix for small devices only -->

				<div class="col-md-4 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-green"><i class="fa fa-cart-arrow-down"></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Ordenes de compra</span>
			      		<span class="info-box-number"><?=$listaOC->rowcount()?></span>
			    	</div>
			  	</div>
			</div>
				<div class="col-md-4 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-purple"><i class="fa fa-shopping-cart"></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Productos</span>
			      		<span class="info-box-number"><?=$listaprod->rowcount()?></span>
			    	</div>
			  	</div>
			</div>
				<div class="col-md-4 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-red"><i class="fa fa-eyedropper"></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Tipos Productos</span>
			      		<span class="info-box-number"><?=$listaTipo->rowcount()?></span>
			    	</div>
			  	</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-black"><i class="fa fa-tasks"></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Detalle OC</span>
			      		<span class="info-box-number"><?=$listaDet->rowcount()?></span>
			    	</div>
			  	</div>
			</div>

		</div>

		<!-- Otros Contenidos -->
		</section>
</div>

<?php
/*
|--------------------------------------------------------------------------
| Footer
|--------------------------------------------------------------------------
|
| Solo se hace un require del footer de la pagina de admin.
|
 */
require __DIR__ . '/admin/templates/footer.php';
?>

