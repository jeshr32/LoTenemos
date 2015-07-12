<?php
/*
|--------------------------------------------------------------------------
| Revisa username
|--------------------------------------------------------------------------
|
| Esta pagina es llamada mediante ajax para buscar si el usuario existe o no
 */
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../clases/Usuario.php';

$user = new Usuario;

if ($_REQUEST) {
	$username = $_REQUEST['username'];

	if ($user->existe($username)) {
		/*Si existe usuario genero un div con error*/
		echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
              <h4><i class='icon fa fa-ban'></i> Error!</h4>
              El usuario ya se encuentra registrado</div>";

	} else {
		/*Si no existe, devuelve falso que hace que todo vuelva a su lugar */
		echo false;
	}

}
?>