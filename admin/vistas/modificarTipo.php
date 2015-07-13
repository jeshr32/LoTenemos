<?php
/*
|--------------------------------------------------------------------------
| Archivos y configuracion de Pagina
|--------------------------------------------------------------------------
|
| Aqui se hace "required" de archivos minimos de funcionamiento para armar
| cada pagina, mas declaraion de variables para el header, menu, sidebar.
|
 */
$titulo = "Modificar Tipo Producto";

require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../templates/header.php';
require __DIR__ . '/../templates/menu.php';
require __DIR__ . '/../templates/sidebar.php';

$idtipo = (isset($_GET['id']) && $_GET['id'] != "") ? $_GET['id'] : null;
$nombr = (isset($_GET['nom']) && $_GET['nom'] != "") ? $_GET['nom'] : null;

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
		<h1>Modificar Tipo de productos</h1>
		<ol class="breadcrumb">
			<li><a href="<?=ROOT_ADMIN?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active"><i class="fa fa-shopping-cart"></i> Modificar Tipo de productos</li>
		</ol>
	</section>
	<!-- Contenido -->
	<section class="content">
		<!-- Otros Contenidos -->
		<div class="row">


		  	<div id="ok"></div>

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
						<h3 class="box-title">Modificar Tipo</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">

						<form class="form-horizontal" method="post" action="<?=ROOT_ADMIN?>controladores/update-tipo.php?id=<?=$idtipo?>" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label for="nombre" class="col-lg-2 control-label">Descripcion Tipo </label>
									<div class="col-lg-10">
										<input type="text" class="form-control" placeholder="Descripcion" required patern="[A-Za-z]{50}" id="nombre" name="nombre" value=<?=$nombr?>>
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