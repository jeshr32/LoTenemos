<?php
/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
|
| Archivo encargado de cerrar la sesion de adminitracion
|
 */
require __DIR__ . '/../config/config.php';

session_destroy();
header('Location: ' . ROOT_ADMIN . 'login.php');
?>