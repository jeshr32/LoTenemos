<?php

/*
|--------------------------------------------------------------------------
| Definicion de Entorno
|--------------------------------------------------------------------------
|
| Variables utiles para definir entorno en la app, usadas como constantes.
|
 */
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

/*Variables de configuracion de ubicaciones*/
if (!defined('ROOT_URL')) {
	define('ROOT_URL', '/LoTenemos/');
}
if (!defined('ROOT_ADMIN')) {
	define('ROOT_ADMIN', '/LoTenemos/admin/');
}
/*Variables usadas para la conexion a la BD.*/
if (!defined('MYSQL_SERVER')) {
	define("MYSQL_SERVER", "mysql:host=localhost");
}
if (!defined('MYSQL_USER')) {
	define("MYSQL_USER", "root");
}
if (!defined('MYSQL_PASS')) {
	define("MYSQL_PASS", "");
}
if (!defined('MYSQL_DB')) {
	define("MYSQL_DB", "dbname=lotenemostodo");
}

?>