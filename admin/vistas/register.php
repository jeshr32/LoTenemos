<?php
/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
|
| Esta pagina es especial por que no se basa en los otros layouts, solo
| importa el archivo de entorno para definicion de constantes
| crea un usuario para evitar que el usuario ya exista
 */

require __DIR__ . '/../../config/config.php';
require __DIR__ . '/../../clases/Usuario.php';

$user = new Usuario();
$perfil = $user->traeid();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=ROOT_URL?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=ROOT_URL?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?=ROOT_URL?>assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="<?=ROOT_URL?>index.php"><b>Lo Tenemos</b>LT</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Registro de nuevo Usuario</p>
        <form id="frmregistro" action="<?=ROOT_ADMIN?>controladores/insert-user.php?perfil=<?=$perfil?>" onsubmit="false" method="post">
          <div id="ok"></div>
          <?php if (array_key_exists('error_tmp', $_SESSION)) {?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <?=$_SESSION['error_tmp']?>
                        <?php unset($_SESSION['error_tmp']);?>
                    </div>
          <?php }
?>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nombres" required patern="[A-Za-z]{50}" id="nombre" name="nombre"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Apellidos" required patern="[A-Za-z]{50}" id="apellido" name="apellido"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" required maxleng="150" id="mail" name="mail"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div name="lgn" id="lgn" class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Login" name="login" id="login" maxleng="50" required/>
            <span  name="logon" id="logon" class="glyphicon glyphicon-fire form-control-feedback"></span>

          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" required id="pass" name="pass"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div name="psw" id="psw" class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retype password" required id="repass" name="repass"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label>Fecha de nacimiento:</label>
            <input id="nac" name="nac" type="date" onClick="fechaHoy()" min="1900-01-01" class="form-control" placeholder="Fecha Nacimiento" required/>
            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
          </div>
          <div class="row">
           <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" id="btnrg" class="btn btn-primary btn-block btn-flat">Registrar</button>
            </div><!-- /.col -->
          </div>
        </form>

         <a href="<?=ROOT_ADMIN?>login.php" class="text-center">Ya tengo un usuario</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=ROOT_URL?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Aqui van las funciones ,solamente de esta pagina a modo de exepcion -->
    <!-- funcion que revisa si el usuario existe -->
    <script type="text/javascript">
    $(document).ready(function() {
      $('#login').blur(function(){

        var username = $(this).val();
        var dataString = 'username='+username;
        $.ajax({
          type: "POST",
          url: "../controladores/check_username_availablity.php",
          data: dataString,
          success: function(data) {
             $("#ok").html(data);
             $('#lgn').removeClass("has-feedback").addClass("has-warning"),
              $('#btnrg').attr("disabled","true");

             if(!data){
              //Todo vuelve a su lugar
              $('#lgn').removeClass("has-warning").addClass("has-feedback"),
              $('#btnrg').removeAttr("disabled");
             }
          }

        });
      });
      //funcion para las contraseñas
      $('#repass').blur(function(){
        var passone = document.getElementById('pass').value;
        var passtwo = document.getElementById('repass').value;
        if(passone==passtwo){
          //si coinciden solo removera las restricciones que se hayan hecho por un anterior no coincide
          $('#psw').removeClass("has-error").removeClass("has-feedback").addClass("has-success");
          $('#btnrg').removeAttr("disabled");
          $('#ok').html(false);
        }else{
          //si no coinciden marcara con rojo el input,mostrara un mensaje en el div 'ok', desabilitara el boton enviar y borrara la contraseña escrita
          $('#psw').removeClass("has-feedback").removeClass("has-success").addClass("has-error");
          $("#ok").html("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon fa fa-ban'></i> Error!</h4>Las contraseñas no coinciden</div>");
          $('#btnrg').attr("disabled","true");
          $('#pass').val("");
          $('#repass').val("");
        }
      });
    });
    </script>
    <!-- funcion para que la fecha de nacimiento no sea mayor a la fecha de hoy -->
    <script type=text/javascript>
    function fechaHoy(){
        var f = new Date();
        var day=f.getDate()
        var month=f.getMonth()+1
        var year=f.getFullYear()

          var str_day = new String (day)
            if (str_day.length == 1){
                day = "0" + day}

            var str_month = new String (month)
            if (str_month.length == 1){
                month = "0" + month}

            var str_year = new String (year)
            if (str_year.length == 1){
                year = "0" + year}

         fc=year+ "-" + month + "-" + day;
         var fet = document.querySelector('#nac');
         fet.setAttribute("max", fc);

      };
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=ROOT_URL?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=ROOT_URL?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

  </body>
</html>