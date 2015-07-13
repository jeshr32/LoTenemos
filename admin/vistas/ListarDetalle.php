<?php
/*Llamadas de archivos necesarios
por medio de require*/

$titulo = "Detalle de Compra";

require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../templates/header.php';
require __DIR__ . '/../templates/menu.php';
require __DIR__ . '/../templates/sidebar.php';
require __DIR__ . '/../../clases/Detalle_oc.php';

$idoc = (isset($_GET['id']) && $_GET['id'] != "") ? $_GET['id'] : null;

$modeloDetalle = new Detalle();
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
		<li><a href="<?=ROOT_URL?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-shopping-cart"></i> Detalle de la Orden</li>
		</ol>
	</section>
	<!-- Resultado positivo modificar-->
	<?php if (array_key_exists('success_update', $_SESSION)) {
	?>
            <div class="alert alert-info" role="alert">
                <strong>Hey!</strong>
                <br>
                Se modifico correctamente el Producto !
                <?php unset($_SESSION['success_update']);
	?>
            </div>
    <?php }
?>

    <!-- resultado negativo segun corresponda -->
	<?php if (array_key_exists('error_tmp', $_SESSION)) {?>
                <div class="alert alert-danger" role="alert">
                    <strong><span class="glyphicon glyphicon-exclamation-sign"></span>  D'oh!</strong>
                    <br>
                    <?=$_SESSION['error_tmp']?>
                    <?php unset($_SESSION['error_tmp']);?>
                </div>
    <?php }
?>
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
		  			                <th>Acciones</th>
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
											<a href=""
													class="btn btn-danger"
											  		onClick="return confirmation()">
											 		<span class="glyphicon glyphicon-trash"></span>
											</a>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-2 col-sm-4 col-xs-8">
											<a href="<?=ROOT_ADMIN?>vistas/modificarDetalle.php?id=<?=$row['ID_OC']?>&des=<?=$row['ID_PRODUCTO']?>&
											 can=<?=$row['CANTIDAD']?>&tot=<?=$row['SUB_TOTAL']?>" class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span></a>

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
										<a href="<?=ROOT_ADMIN?>vistas/ListarOrdenes.php" class="btn btn-sm btn-primary">Volver  <span class="glyphicon glyphicon-send"></span></a>
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