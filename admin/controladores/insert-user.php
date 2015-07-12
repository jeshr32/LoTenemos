<?php
/*
|--------------------------------------------------------------------------
| Controladores
|--------------------------------------------------------------------------
|
| Este archivo se encarga de guardar un nuevo usuario en el sistema.
|
 */
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../clases/Usuario.php';

if (!isset($_GET['perfil'])) {
	if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['mail']) && !empty($_POST['login']) && !empty($_POST['pass']) && !empty($_POST['nac']) && !empty($_POST['perfil'])) {
		$tipo = $_POST['perfil'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$mail = $_POST['mail'];
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		$nac = $_POST['nac'];

		$usuario = new Usuario($tipo, $login, $pass, $nombre, $apellido, $mail, $nac);
		var_dump($usuario);

		if ($usuario->insert()) {
			$_SESSION['nameusuario'] = $nombre;

		} else {
			$_SESSION['error_tmp'] = "Usuario no ingresado";
		}

	} else {
		$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
	}

	header('Location: ' . ROOT_ADMIN . 'vistas/agregarUsuario.php');

} else {
	if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['mail']) && !empty($_POST['login']) && !empty($_POST['pass']) && !empty($_POST['nac'])) {
		/*tipo equivale a perfil de privilegios, al ser registrado obtendra el minimo de privilegios
		"consultas" , luego el administrador tendra la opcion de cambiar su perfil*/
		$tipo = (isset($_GET['perfil']) && $_GET['perfil'] != "") ? $_GET['perfil'] : null;
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$mail = $_POST['mail'];
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		$nac = $_POST['nac'];

		/*En este caso el usuario se generara con el perfil por defecto */
		$usuario = new Usuario($tipo, $login, $pass, $nombre, $apellido, $mail, $nac);
		var_dump($usuario);

		if ($usuario->insert()) {
			$_SESSION['success_contact'] = true;
			$_SESSION['usuario'] = $nombre;

		} else {
			$_SESSION['error_tmp'] = "Usuario no ingresado";
		}

	} else {
		$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
	}

	header('Location: ' . ROOT_ADMIN . 'login.php');
}
?>