<?php

/*
|--------------------------------------------------------------------------
| Definicion de Entorno
|--------------------------------------------------------------------------
|
| Variables utiles para definir entorno en la app, usadas como constantes.
|
*/
if(session_status() == PHP_SESSION_NONE){
	session_start();
}


if(!defined('MYSQL_SERVER')){
	define("MYSQL_SERVER","mysql:host=localhost");
}
if(!defined('MYSQL_USER')){
	define("MYSQL_USER","root");
}
if(!defined('MYSQL_PASS')){
	define("MYSQL_PASS","");
}
if(!defined('MYSQL_DB')){
	define("MYSQL_DB","dbname=lotenemostodo");
}

?>