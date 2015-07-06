<?php
/*Llamadas de archivos necesarios
por medio de require*/
require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../clases/Usuario.php';

$modeloUsers = new Usuario();
$listaUsers = $modeloUsers->read();
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

<table>
	<thead>
		<tr>
			<th>id</th>
			<th>perfil</th>
			<th>login</th>
			<th>pass</th>
			<th>nombre</th>
			<th>apellido</th>
			<th>correo</th>
			<th>edad</th>
			<th>nac</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($listaUsers as $row) {?>
		<tr>
			<td><?=$row['ID_USUARIO']?></td>
			<td><?=$row['ID_PERFIL']?></td>
			<td><?=$row['LOGIN_USUARIO']?></td>
			<td><?=$row['PASS_USUARIO']?></td>
			<td><?=$row['NOMBRE_USUARIO']?></td>
			<td><?=$row['APELLIDO_USUARIO']?></td>
			<td><?=$row['CORREO_USUARIO']?></td>
			<td><?=$row['EDAD_USUARIO']?></td>
			<td><?=$row['FECHANACIMIENTO_USUARIO']?></td>

		</tr>
		<?php }
?>
	</tbody>
</table>