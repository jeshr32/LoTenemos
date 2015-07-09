<?php
/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
|
| Archivo encargado de crear el inicio de sesion
|
 */
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../clases/Usuario.php';

if (!empty($_POST['user']) && !empty($_POST['pass'])) {
	$usuario = new Usuario("", $_POST['user'], $_POST['pass'], "", "", "", "", "", "");

	if ($usuario->login()) {
		$_SESSION['usuario'] = [
			'id' => $usuario->getId_usuario(),
			'perfil' => $usuario->getCodigo_perfil(),
			'user' => $usuario->getLogin(),
			'nombre' => $usuario->getNombre(),
			'apellido' => $usuario->getApellido(),
			'email' => $usuario->getCorreo(),
			'fechaNacimiento' => $usuario->getFechaNac(),
		];
		header('Location: ' . ROOT_URL . 'index.php');
	} else {
		$_SESSION['error_tmp'] = "Credenciales de acceso incorrectas";
		header('Location: ' . ROOT_ADMIN . 'login.php');
	}
} else {
	$_SESSION['error_tmp'] = "Se requiren los datos de acceso";
	header('Location: ' . ROOT_ADMIN . 'login.php');
}

?>