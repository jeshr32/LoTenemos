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
$titulo = "Modificar Usuario";

require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../templates/header.php';
require __DIR__ . '/../templates/menu.php';
require __DIR__ . '/../templates/sidebar.php';
require __DIR__ . '/../../clases/Usuario.php';
require __DIR__ . '/../../clases/Perfil.php';


$modeloPerfil = new Perfil();
$listaPerfiles = $modeloPerfil->read();

$ida = (isset($_GET['id']) && $_GET['id'] != "") ? $_GET['id'] : null;
$per = (isset($_GET['per']) && $_GET['per'] != "") ? $_GET['per'] : null;
$log = (isset($_GET['log']) && $_GET['log'] != "") ? $_GET['log'] : null;
$nom = (isset($_GET['nom']) && $_GET['nom'] != "") ? $_GET['nom'] : null;
$ape = (isset($_GET['ape']) && $_GET['ape'] != "") ? $_GET['ape'] : null;
$ema = (isset($_GET['ema']) && $_GET['ema'] != "") ? $_GET['ema'] : null;
$nac = (isset($_GET['nac']) && $_GET['nac'] != "") ? $_GET['nac'] : null;


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
		<h1>Usuarios</h1>
		<ol class="breadcrumb">
			<li><a href="<?=ROOT_ADMIN?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active"><i class="fa fa-shopping-cart"></i> Modificar Usuarios</li>
		</ol>
	</section>
	<!-- Contenido -->
	<section class="content">
		<!-- Otros Contenidos -->
		<div class="row">

		  	<!-- resultado postivo-->
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
						<h3 class="box-title">Modificar Usuario</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">

						<form class="form-horizontal" method="post" action="<?=ROOT_ADMIN?>controladores/update-Usuario.php?id=<?=$ida?>" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label for="nombre" class="col-lg-2 control-label">Nombres </label>
									<div class="col-lg-10">
										<input type="text" class="form-control" placeholder="Nombres" required patern="[A-Za-z]{50}" id="nombre" name="nombre" value=<?=$nom?> >
									</div>
								</div>
								<div class="form-group">
									<label for="apellido" class="col-lg-2 control-label">Apellidos </label>
									<div class="col-lg-10">
										<input type="text" class="form-control" placeholder="Apellidos" required patern="[A-Za-z]{50}" id="apellido" name="apellido" value=<?=$ape?> >
									</div>
								</div>
								<div class="form-group">
									<label for="mail" class="col-lg-2 control-label">Correo </label>
									<div class="col-lg-10">
										<input type="email" class="form-control" placeholder="Email" required maxleng="150" id="mail" name="mail" value=<?=$ema?>>
									</div>
								</div>
								<div class="form-group">
									<label for="login" class="col-lg-2 control-label">Login </label>
									<div class="col-lg-10">
										<input type="text" class="form-control" placeholder="Login" name="logini" id="logini" maxleng="50" required value=<?=$log?>>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Fecha Nacimiento</label>
									<div class="col-lg-10">
										<input id="nac" name="nac" type="date" onClick="fechaHoy()" min="1900-01-01" class="form-control" placeholder="Fecha Nacimiento" required value=<?=$nac?>>
									</div>
								</div>



								<div class="form-group">
								<label for="perfil" class="col-lg-2 control-label">Perfil </label>
									<div class="col-lg-10">
										<select class="form-control" id="perfil" name="perfil">
										<?php foreach ($listaPerfiles as $row) {
											$aux;
											$aux = $row['ID_PERFIL'];
											if ($aux == $per) {?>
											<option selected value="<?=$row['ID_PERFIL']?>"><?=$row['DESCRIPCION_PERFIL']?> </option>
											<?php } else {?>
											<option value="<?=$row['ID_PERFIL']?>"><?=$row['DESCRIPCION_PERFIL']?> </option>
											<?php }}
?>

										</select>
										<br>
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
