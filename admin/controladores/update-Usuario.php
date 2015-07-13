<?php
/*
|--------------------------------------------------------------------------
|Controlador
|--------------------------------------------------------------------------
|
| Este archivo se encarga de guardar los cambios de tipo en el sistema.
|
 */
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../clases/Usuario.php';

if (!empty($_POST['perfil']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['mail']) && !empty($_POST['logini']) && !empty($_POST['nac'])) {
	$idUsr = (isset($_GET['id']) && $_GET['id'] != "") ? $_GET['id'] : null;
	$tipo = $_POST['perfil'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$mail = $_POST['mail'];
	$login = $_POST['logini'];
	$nac = $_POST['nac'];

	$usuario = new Usuario($tipo, $login, "", $nombre, $apellido, $mail, $nac);


	if ($usuario->update($idUsr)) {
		var_dump($usuario);
		$_SESSION['success_update'] = true;
		$_SESSION['usrup'] = $login;
		$_SESSION['usuario'] = [
			'id' => $usuario->getId_usuario(),
			'perfil' => $usuario->getCodigo_perfil(),
			'user' => $usuario->getLogin(),
			'nombre' => $usuario->getNombre(),
			'apellido' => $usuario->getApellido(),
			'email' => $usuario->getCorreo(),
			'fechaNacimiento' => $usuario->getFechaNac(),
		];

	} else {
		$_SESSION['error_tmp'] = "Producto no actualizado";
	}

} else {
	$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
}
header('Location: ' . ROOT_ADMIN . 'vistas/ListarUsuarios.php');
?>