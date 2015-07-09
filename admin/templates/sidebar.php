<?php
/*
|--------------------------------------------------------------------------
| Archivos y configuracion de Pagina
|--------------------------------------------------------------------------
|
| Aqui se hace "required" de archivos minimos de funcionamiento para armar
| cada pagina, mas declaraion de variables para el header, menu, sidebar.
|
 */
/*require __DIR__.'/../../clases/Producto.php';

$modeloProducto = new Producto();
$listaProducto = $modeloProducto->obtenerTodos();*/

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
<aside class="main-sidebar">

	<section class="sidebar">
			<!-- Info Usuario -->
			<!--
			<div class="user-panel">
				<div class="pull-left image">
		  			<img src="<?=ROOT_URL?>assets/dist/img/user2-160x160.jpg" class="img-circle" />
				</div>
				<div class="pull-left info">
		  			<p><?=$_SESSION['usuario']['nombre']?></p>
				</div>
			</div>
			-->

			<!-- Items del menu -->


			<ul class="sidebar-menu">


			<li class="treeview">
				<a href="">
				  	<i class="fa fa-clock-o"></i> <span id='reloj'></span>
				</a>
			</li>
			<li class="treeview">
				<a href="">
				  	<i class="fa fa-calendar"></i> <span id='dia'></span>
				</a>
			</li>
			<li class="header">SITIO</li>


			<li class="treeview">
				<a href="#">
				  	<i class="fa fa-coffee"></i> <span>Mantenedores</span> <small class="label pull-right bg-green">6</small>
				</a>
				<ul class="treeview-menu ">
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Usuarios<i class="fa fa-angle-left pull-right"></i></a>
                      	<ul class="treeview-menu">
                       	 	<li><a href="#"><i class="fa fa-plus-circle"></i> Agregar Nuevo</a></li>
                       		<li><a href="#"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                      </ul>
                    </li>
                 </ul>
			</li>

			<li>
	  			<a href="<?=ROOT_ADMIN?>contactos.php">
	    			<i class="fa fa-binoculars"></i> <span>Consultas</span>
	  			</a>
			</li>

			<li>
	  			<a href="<?=ROOT_ADMIN?>contactos.php">
	    			<i class="fa fa-credit-card"></i> <span>Agregar Orden de Compra</span>
	  			</a>
			</li>

			<!-- Accessos Rapidos -->
			<li class="header">ATAJOS</li>
			<li><a href="<?=ROOT_ADMIN?>contactos.php?filter=Comprar"><i class="fa fa-circle-o text-green"></i> <span>Futuro Cliente</span></a></li>
			<li><a href="<?=ROOT_ADMIN?>contactos.php?filter=Reclamos"><i class="fa fa-circle-o text-red"></i> <span>Reclamos</span></a></li>
			<li><a href="<?=ROOT_ADMIN?>contactos.php?filter=Sugerencias"><i class="fa fa-circle-o text-yellow"></i> <span>Sugerencias</span></a></li>
			<li><a href="<?=ROOT_ADMIN?>contactos.php?filter=ContactoEmpresarial"><i class="fa fa-circle-o text-aqua"></i> <span>Consultas Empresa</span></a></li>
			<li><a href="<?=ROOT_ADMIN?>perfil.php"><i class="fa fa-user"></i> <span>Mi Perfil</span></a></li>
			<li><a href="<?=ROOT_ADMIN?>logout.php"><i class="fa fa-sign-out"></i> <span>Cerrar Sesión</span></a></li>
			</ul>
	</section>
</aside>