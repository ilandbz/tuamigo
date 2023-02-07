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
  <!--<link rel="stylesheet" href="<?php echo base_url() ?>activos/css/jquery-ui.css">-->
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
<nav class="navbar navbar-inverse navbar-fixed-top">
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
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Crear Cliente</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/cliente/crearcliente">Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/crearclienteform">Doco</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Lista de Clientes</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/cliente/lista">Credito</a></li>
                <li><a href="<?php echo base_url() ?>index.php/ahorros/listaclientes">Doco</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url() ?>index.php/cliente/crearpersonaform">Crear Persona</a></li>
            <li><a href="<?php echo base_url() ?>index.php/inicio/listapersonas">Lista Personas</a></li>
          </ul>     
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Solicitud <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url() ?>index.php/solicitud/lista_solicitudesgeneral">Lista de Solicitudes</a></li>
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Evaluacion</a>
              <ul class="dropdown-menu">
              <?php if($this->session->userdata('tipouser')=='5'){//gerente agencia ?>
                <li><a href="<?php echo base_url() ?>index.php/solicitud/lista_solicitudes">Asesor</a></li>
                <li><a href="<?php echo base_url() ?>index.php/solicitud/solicitudesevaluacion">Gerente Agencia</a></li>            
              <?php }else{ ?>
                <li><a href="<?php echo base_url() ?>index.php/solicitud/solicitudesevaluacion">Lista Total</a></li>
                <li><a href="<?php echo base_url() ?>index.php/solicitud/solicitudesevaluaciogz">Gerente Zonal</a></li>
              <?php }  ?>
              </ul>
            </li>
          </ul>  
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cuentas<span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li><a href="<?php echo base_url() ?>index.php/inicio/newusuarioform">CREAR USUARIO</a></li>
            <li><a href="<?php echo base_url() ?>index.php/inicio/listausuarios">LISTA DE USUARIOS</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Metas<span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li><a href="<?php echo base_url() ?>index.php/report/metagerencial">Metas Generales</a></li>
            <li><a href="<?php echo base_url() ?>index.php/report/metaporpagos">Metas por Pagos</a></li>
            <li><a href="<?php echo base_url() ?>index.php/asesor/logroasesorgral">Metas por Asesor</a></li>            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url() ?>index.php/report/formreportegeneral">Reporte General</a></li>
            <li><a href="<?php echo base_url() ?>index.php/report/formreportefinan">Reporte Financiero</a></li>
            <li><a href="<?php echo base_url() ?>index.php/report/formreportinfocorp">Reporte INFOCORP</a></li>
            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Castigo</a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>index.php/report/formrepcastigogeneral">General</a></li>
                <li><a href="<?php echo base_url() ?>index.php/report/formrepcastigofinanciero">Financiero</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url() ?>index.php/report/formreportescaja">Caja</a></li>
            <li><a href="<?php echo base_url() ?>index.php/report/formreportepagos">Pagos</a></li>
            <li><a href="<?php echo base_url() ?>index.php/report/formreportecliente">Clientes</a></li>
            <li><a href="<?php echo base_url() ?>index.php/report/doco">Doco</a></li>
            <li><a href="<?php echo base_url() ?>index.php/caja/cajabancosoperaciones_ger">Saldos Caja Bancos</a></li>
          </ul> 
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Herramientas<span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li><a href="<?php echo base_url() ?>index.php/pagos/formcalcularmora">Calcular Mora</a></li>
            <li><a href="<?php echo base_url() ?>index.php/report/realizarbackuptotal">Realizar backup</a></li>
            <li><a href="<?php echo base_url() ?>index.php/inicio/formferiado">Feriados</a></li>
          </ul>           
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php 
        $date1=new DateTime(date('Y-m-d'));
        $date3=new DateTime($fechalogros);        
        $date2=new DateTime(date("Y-m-t"));
        $diff = $date1->diff($date2);
        $diff2 = $date3->diff($date2);
        if($diff->days<3 && $diff2->days>27){ ?>
        <li><a class="btn btn-danger" style="color:black; padding:4px; margin-top:8px;" href="<?php echo base_url() ?>index.php/asesor/logroasesorgral"><span class="badge">GUARDAR LOGROS</a></li>
        <?php } ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">USUARIO : <?php echo $this->session->userdata('idusuario'); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url() ?>index.php/inicio/perfil">Perfil</a></li>
            <li><a href="<?php echo base_url() ?>index.php/inicio/cambclaveform">Cambiar de Clave</a></li>
            <li><a href="<?php echo base_url() ?>index.php/atencion">Ticket de Atencion</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url() ?>index.php/inicio/logout">Cerrar Session</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>