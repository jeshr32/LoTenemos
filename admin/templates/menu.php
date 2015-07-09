	<header class="main-header">
    	<a href="<?=ROOT_URL?>" class="logo">
      		<!-- logo mini 50x50 pixels -->
      		<span class="logo-mini"><b>LT</b> T</span>
      		<!-- logo grande -->
      		<span class="logo-lg"><b>Lo Tenemos Todo</b> ADMIN</span>
    	</a>
    	<nav class="navbar navbar-static-top" role="navigation">
      		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
	            <span class="sr-only">Menu</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
      		</a>
      		<div class="navbar-custom-menu">
        		<ul class="nav navbar-nav">


          			<!-- Usuario Logeado -->
          			<li class="dropdown user user-menu">
            			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              				<!-- <img src="<?=ROOT_URL?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/> -->
                      <span class="hidden-m"><?=$_SESSION['usuario']['nombre']?></span>
            			</a>
            			<ul class="dropdown-menu">
              				<!-- User image -->
              				<li class="user-header">
                				<!-- <img src="<?=ROOT_URL?>assets/dist/img/user2-160x160.jpg" class="img-circle" /> -->
                				<p>
                  					<?=$_SESSION['usuario']['user']?>
                  					<small>Miembre desde <?=$_SESSION['usuario']['nombre']?></small>
                				</p>
              				</li>
              				<!-- Menu Footer-->
              				<li class="user-footer">
                				<div class="pull-left">
                  					<a href="<?=ROOT_ADMIN?>perfil.php" class="btn btn-default btn-flat">Perfil</a>
                				</div>
                				<div class="pull-right">
                  					<a href="<?=ROOT_ADMIN?>logout.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                				</div>
              				</li>
            			</ul>
          			</li>
        		</ul>
      		</div>
    	</nav>
  	</header>