<?php
$titulo = (!empty($titulo)) ? $titulo : 'Admin';
?>
<!DOCTYPE html>
<html>
  	<head>
    	<meta charset="UTF-8">
    	<title><?=$titulo?> | Administración | Lo Tenemos Todo</title>
    	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    	<link href="<?=ROOT_URL?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=ROOT_URL?>assets/bootstrap/css/reloj.css" rel="stylesheet" type="text/css" />
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?=ROOT_URL?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=ROOT_URL?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?=ROOT_URL?>assets/dist/css/custom_admin.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="<?=ROOT_URL?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>


        <script src="<?=ROOT_URL?>assets/plugins/datatables/jquery.dataTables.min.css" type="text/javascript"></script>
        <script src="<?=ROOT_URL?>assets/plugins/datatables/dataTables.bootstrap.css" type="text/javascript"></script>

    	<!--[if lt IE 9]>
        	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
        <!-- incluir fecha en documento-->
        <script language="JavaScript">
        function mueveReloj(){
            momentoActual = new Date()
            hora = momentoActual.getHours()
            minuto = momentoActual.getMinutes()
            segundo = momentoActual.getSeconds()

            str_segundo = new String (segundo)
            if (str_segundo.length == 1)
                segundo = "0" + segundo

            str_minuto = new String (minuto)
            if (str_minuto.length == 1)
                minuto = "0" + minuto

            str_hora = new String (hora)
            if (str_hora.length == 1)
                hora = "0" + hora

            horaImprimible = hora + " : " + minuto + " : " + segundo

            document.getElementById('reloj').innerHTML = horaImprimible

            setTimeout("mueveReloj()",1000)

            /*Fecha*/
            var mydate=new Date()
            var year=mydate.getYear()
            if (year < 1000)
                year+=1900
            var day=mydate.getDay()
            var month=mydate.getMonth()
            var daym=mydate.getDate()
            if (daym<10)
                daym="0"+daym
            var dayarray=new Array("Domingo,","Lunes,","Martes,","Miércoles,","Jueves,","Viernes,","Sábado,")
            var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")
            document.getElementById('dia').innerHTML =dayarray[day]+" "+daym+" de "+montharray[month]+" de "+year

        }  </script>
  	</head>
    <body class="sidebar-mini <?=ADMIN_COLOR?> " onload="mueveReloj()">
        <div class="wrapper">