<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>FINANCIERA EMPRENDER</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
  <link rel="stylesheet" href="<?php echo base_url() ?>activos/css/miestilo.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>activos/bootstrap3/css/bootstrap.min.css">
<style>
body{
  background: url('http://amigoemprendedor.com/activos/images/cobranzafondo.jpg') no-repeat center center fixed;
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
}
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
<body background="">
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
        <li class=""><a href="<?php echo base_url() ?>index.php">Inicio <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Posicion Cliente</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/report">Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/report/posicionahorro">Doco</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Lista Clientes</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/cliente/lista">Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/listaclientes">Doco</a></li>
              </ul>
            </li>
<!--             <li><a href="<?php echo base_url() ?>index.php/cliente/crearpersonaform">Crear Persona</a></li> -->
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Crear Cliente</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/cliente/formcrearcliente">Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/crearclienteoperaciones">Doco</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Solicitud</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/solicitud">Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/seleccliente">Doco</a></li>
              </ul>
            </li>
          </ul>     
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          Cobranza <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Habilitar Cta. Asesor</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/pagos/formpagasesor">Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/formpagasesor">Doco</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Pago</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/pagos">Cliente Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/listaapagar">Doco</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url() ?>index.php/caja/cerrarcajaform">Cuadre y Cierre</a></li>
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Egresos</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/pagos/listpdesembolso">Desembolso</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/formbusqdevolucion">Devolucion Doco</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url() ?>index.php/castigo">Castigo</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Centro de Costos<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo base_url() ?>index.php/caja/cajabancoscobranza">SALDO</a></li>
            <li><a href="<?php echo base_url() ?>index.php/caja/ingresoform">INGRESOS</a></li>
            <li><a href="<?php echo base_url() ?>index.php/caja/gastosform">GASTOS</a></li>
            <li><a href="<?php echo base_url() ?>index.php/caja/costosform">Costos</a></li>
            <li><a href="<?php echo base_url() ?>index.php/caja/formcuadrarcajadia">CUADRAR CAJA</a></li>
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">RRHH</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/rrhh/condicionform">Condicion de Trabajador</a></li>
                <li><a href="<?php echo base_url() ?>index.php/rrhh/egresosform">Egresos</a></li>
                <li><a href="<?php echo base_url() ?>index.php/rrhh/listapersonal">Personal</a></li>
              </ul>
            </li> 
          </ul>           
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes<span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li><a href="<?php echo base_url() ?>index.php/report/formreportescaja">Caja</a></li>
            <li><a href="<?php echo base_url() ?>index.php/report/formreportepagos">Pagos</a></li>
            <li><a href="<?php echo base_url() ?>index.php/report/desembolsos">Desembolsos</a></li>
            <li><a href="<?php echo base_url() ?>index.php/ahorros/reportes">Doco</a></li>
          </ul>           
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Doco<span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li><a href="<?php echo base_url() ?>index.php/caja/ingresodocoform">INGRESO</a></li>
            <li><a href="<?php echo base_url() ?>index.php/caja/devdocoform">DEVOLUCION</a></li>
          </ul>           
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><button class="btn btn-primary" style="color:black; padding:4px; margin-top:8px;" id="versaldo">Caja : <span class="badge" id="spanversaldo"> <span class="glyphicon glyphicon-eye-open"></span></span></button></li>
        <li class="active"><a href="">Agencia : <?php echo $this->session->userdata('agencia') ?></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">USUARIO : <?php echo $this->session->userdata('idusuario'); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url() ?>index.php/inicio/perfil">Perfil</a></li>
            <li><a href="<?php echo base_url() ?>index.php/inicio/cambclaveform">Cambiar de Clave</a></li>
            <li><a href="<?php echo base_url() ?>index.php/inicio/regipform">Registrar Ip</a></li>
            <li><a href="<?php echo base_url() ?>index.php/atencion">Ticket de Atencion</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url() ?>index.php/inicio/logout">Cerrar Session</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>