<?php
/*Llamadas de archivos necesarios
por medio de require*/

$titulo = "Listado de Ordenes de Compra";

require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../templates/header.php';
require __DIR__ . '/../templates/menu.php';
require __DIR__ . '/../templates/sidebar.php';
require __DIR__ . '/../../clases/Orden_compra.php';


$modeloOrden = new Orden();
$listaOrden = $modeloOrden->read();

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
		<li class="active"><i class="fa fa-shopping-cart"></i> Ordenes de Compra</li>
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
<!-- Resultado positivo eliminar-->
	<?php if (array_key_exists('del_ord', $_SESSION)) {
	?>
            <div class="alert alert-info" role="alert">
                <strong>Hey!</strong>
                <br>
                Se elimino correctamente la Orden !
                <?php unset($_SESSION['del_ord']);
	unset($_SESSION['producto']);?>
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
			  			<h3 class="box-title">Ordenes de Compra</h3>
			  			<div class="box-tools pull-right">
			    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
			  			</div>
					</div>
					<div class="box-body">
			  			<table id="dataTablesTable" class="table table-striped table-bordered" width="100%">
		  			        <thead>
		  			            <tr>
		  			            	<th>#</th>
		  			                <th>Usuario</th>
		  			                <th>Fecha Emisión</th>
		  			                <th>Total OC</th>
		  			                <th>Estado</th>
		  			                <th>Acciones</th>
		  			            </tr>
		  			        </thead>
		  			        <tfoot>
		  			            <tr>
		  			            	<th>#</th>
		  			                <th>Usuario</th>
		  			                <th>Fecha Emisión</th>
		  			                <th>Total OC</th>
		  			                <th>Estado</th>
		  			                <th>Acciones</th>
		  			            </tr>
		  			        </tfoot>
		  			        <tbody>
							<?php foreach ($listaOrden as $row) {
	?>
							<tr>
								<td><?=$row['ID_OC']?></td>
								<td><?=$row['NOMBRE_USUARIO']?> <?=$row['APELLIDO_USUARIO']?></td>
								<td><?=$row['FECHA_EMISION']?></td>
								<td><?=$row['TOTAL_OC']?></td>
								<td><?=$row['ESTADO']?></td>
								<td>

									<div class="form-group">
										<div class="col-md-2 col-sm-4 col-xs-8">
											<a href="<?=ROOT_ADMIN?>controladores/delete-orden.php?id=<?=$row['ID_OC']?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-trash"></span></a>

										</div>
									</div>
									<div class="form-group">
										<div class="col-md-2 col-sm-4 col-xs-8">
											<a href="<?=ROOT_ADMIN?>vistas/agregarOC.php?id=<?=$row['ID_OC']?>" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-refresh"></span></a>

										</div>
									</div>
									<div class="form-group">
										<div class="col-md-2 col-sm-4 col-xs-8">
											<a href="<?=ROOT_ADMIN?>vistas/ListarDetalle.php?id=<?=$row['ID_OC']?>" class="btn btn-sm btn-primary">Detalle  <span class="glyphicon glyphicon-th-list"></span></a>

										</div>
									</div>

								</td>
							</tr>
		  			        <?php }
?>
		  			        </tbody>
		  			    </table>

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