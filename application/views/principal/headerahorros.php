<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>FINANCIERA EMPRENDER</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
  <link rel="stylesheet" href="<?php echo base_url() ?>activos/css/miestilo.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>activos/css/bootstrap-switch.min.css">  
  <link rel="stylesheet" href="<?php echo base_url() ?>activos/bootstrap3/css/bootstrap.min.css">
</head>
<body background="<?php echo base_url() ?>activos/images/textah.jpg">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="<?php echo base_url() ?>activos/images/logo.ico" class="img-responsive" alt=""></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="<?php echo base_url() ?>index.php/ahorros">&nbsp;Ahorros<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li><a href="<?php echo base_url() ?>index.php/ahorros/crearclienteform">Crear Cliente</a></li>
            <li><a href="<?php echo base_url() ?>index.php/ahorros/listaclientes">Lista de Clientes</a></li>
          </ul>     
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ahorro <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url() ?>index.php/ahorros/seleccliente">Crear cuenta</a></li>
            <li><a href="<?php echo base_url() ?>index.php/ahorros/generarcalform">Generar Calendario</a></li>
            <li><a href="<?php echo base_url() ?>index.php/ahorros/listaapagar">Realizar Pago</a></li>
          </ul>  
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">USUARIO : <?php echo $this->session->userdata('idusuario'); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url() ?>index.php/inicio/perfil">Perfil</a></li>
            <li><a href="<?php echo base_url() ?>index.php/inicio/cambclaveform">Cambiar de Clave</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url() ?>index.php/inicio/logout">Cerrar Session</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>