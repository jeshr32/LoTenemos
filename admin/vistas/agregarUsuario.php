<?php
/*Llamadas de archivos necesarios
por medio de require*/

$titulo = "Agregar usuario";

require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../templates/header.php';
require __DIR__ . '/../templates/menu.php';
require __DIR__ . '/../templates/sidebar.php';
require __DIR__ . '/../../clases/Usuario.php';
require __DIR__ . '/../../clases/Perfil.php';

$modeloPerfil = new Perfil();
$listaPerfiles = $modeloPerfil->read();
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
			<li class="active"><i class="fa fa-shopping-cart"></i> Usuarios</li>
		</ol>
	</section>
	<!-- Contenido -->
	<section class="content">
		<!-- Otros Contenidos -->
		<div class="row">

		  	<!-- resultado postivo-->
		  	<div id="ok"></div>
		  	<?php if (array_key_exists('nameusuario', $_SESSION)) {
	?>
		  		<div class="col-md-12">
			        <div class="alert alert-info" role="alert">
			            <strong>Hey!</strong>
			            <br>
			            Se agrego correctamente el usuario <?=$_SESSION['nameusuario']?>!
			            <?php unset($_SESSION['nameusuario']);?>
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
						<h3 class="box-title">Nuevo Usuario</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">

						<form class="form-horizontal" method="post" action="<?=ROOT_ADMIN?>controladores/insert-user.php" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label for="nombre" class="col-lg-2 control-label">Nombres </label>
									<div class="col-lg-10">
										<input type="text" class="form-control" placeholder="Nombres" required patern="[A-Za-z]{50}" id="nombre" name="nombre"/>
									</div>
								</div>
								<div class="form-group">
									<label for="apellido" class="col-lg-2 control-label">Apellidos </label>
									<div class="col-lg-10">
										<input type="text" class="form-control" placeholder="Apellidos" required patern="[A-Za-z]{50}" id="apellido" name="apellido"/>
									</div>
								</div>
								<div class="form-group">
									<label for="mail" class="col-lg-2 control-label">Correo </label>
									<div class="col-lg-10">
										<input type="email" class="form-control" placeholder="Email" required maxleng="150" id="mail" name="mail"/>
									</div>
								</div>
								<div class="form-group">
									<label for="login" class="col-lg-2 control-label">Login </label>
									<div class="col-lg-10">
										<input type="text" class="form-control" placeholder="Login" name="login" id="login" maxleng="50" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="pass" class="col-lg-2 control-label">Password </label>
									<div class="col-lg-10">
										<input type="password" class="form-control" placeholder="Password" required id="pass" name="pass"/>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Fecha Nacimiento</label>
									<div class="col-lg-10">
										<input id="nac" name="nac" type="date" onClick="fechaHoy()" min="1900-01-01" class="form-control" placeholder="Fecha Nacimiento" required/>
									</div>
								</div>




								<label for="perfil" class="col-lg-2 control-label">Perfil </label>
									<div class="col-lg-10">
										<select class="form-control" id="perfil" name="perfil">
										<?php foreach ($listaPerfiles as $row) {?>
											<option value="<?=$row['ID_PERFIL']?>"><?=$row['DESCRIPCION_PERFIL']?> </option>
										<?php }
?>
										</select>
										<br>
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
