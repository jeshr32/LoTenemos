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
$titulo = "Consultas";

require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../templates/header.php';
require __DIR__ . '/../templates/menu.php';
require __DIR__ . '/../templates/sidebar.php';
require __DIR__ . '/../../clases/Tipo_productos.php';
require __DIR__ . '/../../clases/Orden_compra.php';

$tipos= new Tipo();
$vendido= $tipos->consultaTipo();
$orden= new Orden();
$fecha=$orden->consultaOrden();


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
<div class="content-wrapper">
	<!-- Header de la pagina -->
	<section class="content-header">
			<h1>
			Dashboard
			<small>Consultas</small>
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
			    		Tipo de Producto mas vendido
			    		<?php foreach ($vendido as $row ) {?>
			    			<span class="info-box-text"><?=$row['TIPO']?></span>
			      			<span class="info-box-number"><?=$row['CANTIDAD']?> Vendidos</span>	
			    		<?php break;} ?>
			    				      		
			    	</div>
				</div>
			</div>

			<!-- fix for small devices only -->

				<div class="col-md-4 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-green"><i class="fa fa-cart-arrow-down"></i></span>
			    	<div class="info-box-content">
			      		Fecha en que mas se vendio
			    		<?php foreach ($fecha as $row ) {?>
			    			<span class="info-box-text"><?=$row['TIPO']?></span>
			      			<span class="info-box-number"><?=$row['CANTIDAD']?> Ventas</span>	
			    		<?php break;} ?>
			    				 
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
require __DIR__ . '/../templates/footer.php';

?>