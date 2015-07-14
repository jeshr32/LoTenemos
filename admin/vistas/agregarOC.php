<?php
/*Llamadas de archivos necesarios
por medio de require*/

$titulo = "Agregar OC";

require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../templates/header.php';
require __DIR__ . '/../templates/menu.php';
require __DIR__ . '/../templates/sidebar.php';
require __DIR__ . '/../../clases/Productos.php';

require __DIR__ . '/../../clases/Detalle_oc.php';

$prod = new Productos();
$listaprod = $prod->read();

$modeloDetalle = new Detalle();
$idoc=(isset($_GET['id']) && $_GET['id'] != "") ? $_GET['id'] : $_SESSION['idorden'];
$listaDetalle = $modeloDetalle->read($idoc);





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
		<h1>Ordenes de Compra</h1>
		<ol class="breadcrumb">
			<li><a href="<?=ROOT_ADMIN?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active"><i class="fa fa-shopping-cart"></i> Orden de Compra N <?=$idoc?></li>
		</ol>
	</section>
	<!-- Contenido -->
	<section class="content">
		<!-- Otros Contenidos -->
		<div class="row">

		  	<!-- resultado postivo-->
		  	<div id="ok"></div>
		  	<?php if (array_key_exists('susses_Orden', $_SESSION)) {
	?>
		  		<div class="col-md-12">
			        <div class="alert alert-info" role="alert">
			            <strong>Hey!</strong>
			            <br>
			            Se guardo correctamente la Orden !
			            <?php unset($_SESSION['susses_Orden']);?>
			        </div>
			    </div>
		    <?php }
?>
			<!-- resultado negativo segun corresponda -->
			<?php if (array_key_exists('error_tmp', $_SESSION)) {?>
			    <div class="col-md-12">
			        <div class="alert alert-danger" role="alert">
			            <strong><span class="glyphicon glyphicon-exclamation-sign"></span>  D'oh!</strong>
			            <br>
			            <?=$_SESSION['error_tmp']?>
			            <?php unset($_SESSION['error_tmp']);?>
			        </div>
		       	</div>
		    <?php }
?>

			<div class="col-md-offset-2 col-md-8">
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Orden de Compra N <?=$idoc?></h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">

						<form class="form-horizontal" method="post" action="<?=ROOT_ADMIN?>controladores/insert-detalle.php" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
								<label for="producto" class="col-lg-2 control-label">Producto </label>
									<div class="col-lg-10">
										<select class="form-control" id="producto" name="producto">
										<?php foreach ($listaprod as $row) {?>
											<option value="<?=$row['ID_PRODUCTO']?>"><?=$row['DESCRIPCION']?> </option>
										<?php }?>
										</select>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="cantidad" class="col-lg-2 control-label">Cantidad </label>
									<div class="col-lg-10">
										<input class="form-control" id="cantidad" placeholder="Cantidad" type="number" name="cantidad" required="true" min="1" >
									</div>
								</div>
													


								<div class="form-group">
									<div class="col-lg-10 col-lg-offset-2 text-right">
										<button id="btnrg" type="submit" class="btn btn-success">Agregar  <span class="glyphicon glyphicon-send"></span></button>
									</div>
								</div>

							</fieldset>
						</form>

					</div>

				</div>
			</div>
		</div>
	</section>
		<!-- Contenido -->
	<section class="content">

		<!-- Otros Contenidos -->
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="box box-solid">
					<div class="box-header with-border">
			  			<h3 class="box-title">Detalle de la orden N <?=$idoc?></h3>
			  			<div class="box-tools pull-right">
			    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
			  			</div>
					</div>
					<div class="box-body">
			  			<table id="dataTablesTable" class="table table-striped table-bordered" width="100%">
		  			        <thead>
		  			            <tr>
		  			            	<th>Nombre de Producto</th>
		  			                <th>Cantidad</th>
		  			                <th>Sub total</th>
		  			                <th>Acciones</th>
		  			            </tr>
		  			        </thead>
		  			        <tfoot>
		  			            <tr>
		  			            	<th>Nombre de Producto</th>
		  			                <th>Cantidad</th>
		  			                <th>Sub total</th>
		  			                <th>Total <?php if (array_key_exists('total', $_SESSION)) {?>
			    				     <?=$_SESSION['total']?>
			                         <?php }?></th>
		  			            </tr>
		  			        </tfoot>
		  			        <tbody>
							<?php foreach ($listaDetalle as $row) {
	?>
							<tr>
								<td><?=$row['DESCRIPCION']?></td>
								<td><?=$row['CANTIDAD']?></td>
								<td><?=$row['SUB_TOTAL']?></td>
								<td>
									<div class="form-group">
										<div class="col-md-2 col-sm-4 col-xs-8" >
											<a href="<?=ROOT_ADMIN?>controladores/delete-detalleOrden.php?id=<?=$idoc?>&des=<?=$row['ID_PRODUCTO']?>"
													class="btn btn-danger"
											  		onClick="return confirmation()">
											 		<span class="glyphicon glyphicon-trash"></span>
											</a>
										</div>
									</div>
									

								</td>
							</tr>
		  			        <?php }
?>
		  			        </tbody>
		  			    </table>
		  			    <div class="form-group">
									<div class="col-lg-10 col-lg-offset-2 text-right">
										<a href="<?=ROOT_ADMIN?>controladores/agregar-Orden.php?id=<?=$row['ID_OC']?>" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Orden Terminada</a>
									</div>
						</div>								
					</div>
				</div>
			</div>
		</div>

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
