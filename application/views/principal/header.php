<!-- asesor -->
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
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>activos/css/jquery-ui.css"> -->
<style>
.dropdown-submenu{ position: relative; }
.dropdown-submenu>.dropdown-menu{
  top:0;
  left:100%;
  margin-top:-6px;
  margin-left:-1px;
  -webkit-border-radius:0 6px 6px 6px;
  -moz-border-radius:0 6px 6px 6px;
  border-radius:0 6px 6px 6px;
}
.dropdown-submenu>a:after{
  display:block;
  content:" ";
  float:right;
  width:0;
  height:0;
  border-color:transparent;
  border-style:solid;
  border-width:5px 0 5px 5px;
  border-left-color:#cccccc;
  margin-top:5px;margin-right:-10px;
}
.dropdown-submenu:hover>a:after{
  border-left-color:#555;
}
.dropdown-submenu.pull-left{ float: none; }
.dropdown-submenu.pull-left>.dropdown-menu{
  left: -100%;
  margin-left: 10px;
  -webkit-border-radius: 6px 0 6px 6px;
  -moz-border-radius: 6px 0 6px 6px;
  border-radius: 6px 0 6px 6px;
}
@media (min-width: 768px) { 
}
@media (min-width: 992px) { 
}
@media (min-width: 1200px) { 
}
</style>
</head>
<body background="<?php echo base_url() ?>activos/images/textura.jpg">
<nav class="navbar navbar-light navbar-fixed-top" style="background-color: #e3f2fd;">
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
        <li class="active"><a href="<?php echo base_url() ?>index.php">Inicio <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Posicion Cliente</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/report">Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/report/posicionahorro">Doco</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Crear Cliente</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/cliente/crearcliente">Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/crearclienteform">Doco</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Lista de Clientes</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/cliente/lista">Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/listaclientesasesor">Doco</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url() ?>index.php/cliente/crearpersonaform">Crear Persona</a></li>
          </ul>     
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Solicitud <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url() ?>index.php/solicitud">Crear Solicitud</a></li>
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Lista de Solicitudes</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/solicitud/lista_solicitudesgeneral">Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/listasolicitudes">Doco</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url() ?>index.php/solicitud/lista_solicitudes">Evaluacion</a></li>
             <li><a href="<?php echo base_url() ?>index.php/ahorros/seleccliente">Crear Solicitud doco</a></li>
          </ul>  
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          Cobranza <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Pagos</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/pagos/cobranzaasesor">Clientes</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/cobranzaasesor">Doco</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url() ?>index.php/report/detpagosusuario/<?php echo $this->session->userdata('idusuario') ?>">Reporte</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Herramientas<span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li><a href="<?php echo base_url() ?>index.php/pagos/formcalcularmora">Calcular Mora</a></li>
            <li><a href="<?php echo base_url() ?>index.php/atencion">Ticket de Atencion</a></li>
            <li><a href="<?php echo base_url() ?>index.php/castigo/formrequerimiento">Requerimiento de Pago</a></li>
          </ul>           
        </li>
        <li><a href="<?php echo base_url() ?>index.php/asesor/logroasesor/<?php echo $this->session->userdata('idusuario') ?>">Meta</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="">Agencia : <?php echo $this->session->userdata('agencia') ?></a></li>
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