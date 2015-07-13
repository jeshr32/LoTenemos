<?php
/*
|--------------------------------------------------------------------------
| Controladores
|--------------------------------------------------------------------------
|
| Este archivo se encarga de agregar una orden con valores por defecto para que la pagina tenga un id_orden
|
 */
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../clases/Orden_compra.php';

	
	$estado = "enviado";
	$usuario = $_SESSION['usuario']['id'];
	$total = 0;
	
	$orden = new Orden($total, $estado, $usuario);

	if($orden->insert()){
		$maximo=$orden->maximoID();
		$_SESSION['total']=0;
		foreach ($maximo as $key ) {
			$_SESSION['idorden'] = $key['max(ID_OC)'];
		}
		
	}

	
header('Location: ' . ROOT_ADMIN . 'vistas/agregarOC.php');
?>