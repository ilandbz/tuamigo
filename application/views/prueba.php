
<!-- asesor -->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>FINANCIERA EMPRENDER</title>
  <link rel="shortcut icon" type="image/x-icon" href="http://localhost/tuamigo/activos/images/logo.ico">
  <link rel="stylesheet" href="http://localhost/tuamigo/activos/css/miestilo.css">
  <link rel="stylesheet" href="http://localhost/tuamigo/activos/css/bootstrap-switch.min.css">  
  <link rel="stylesheet" href="http://localhost/tuamigo/activos/bootstrap3/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="http://localhost/tuamigo/activos/css/jquery-ui.css"> -->
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
<body background="http://localhost/activos/images/prueba_files/textura.jpg">
<nav class="navbar navbar-light navbar-fixed-top" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://localhost/tuamigo/index.php/pagos/cobranzaasesor#"><img src="http://localhost/activos/images/prueba_files/logo.ico" class="img-responsive" alt=""></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://localhost/tuamigo/index.php">Inicio <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="http://localhost/tuamigo/index.php/pagos/cobranzaasesor#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li><a href="http://localhost/tuamigo/index.php/report">Posicion Cliente</a></li>
            <li><a href="http://localhost/tuamigo/index.php/cliente/crearcliente">Crear Cliente</a></li>
            <li><a href="http://localhost/tuamigo/index.php/cliente/lista">Lista de Clientes</a></li>
            <li><a href="http://localhost/tuamigo/index.php/cliente/crearpersonaform">Crear Persona</a></li>
          </ul>     
        </li>
        <li class="dropdown">
          <a href="http://localhost/tuamigo/index.php/pagos/cobranzaasesor#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Solicitud <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://localhost/tuamigo/index.php/solicitud">Crear Solicitud</a></li>
            <li><a href="http://localhost/tuamigo/index.php/solicitud/lista_solicitudesgeneral">Lista de Solicitudes</a></li>
            <li><a href="http://localhost/tuamigo/index.php/solicitud/lista_solicitudes">Evaluacion</a></li>
          </ul>  
        </li>
        <li class="dropdown">
          <a href="http://localhost/tuamigo/index.php/pagos/cobranzaasesor#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          Cobranza <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="http://localhost/tuamigo/index.php/pagos/cobranzaasesor">Pago Clientes</a></li>
            <li><a href="http://localhost/tuamigo/index.php/report/detpagosusuario/IESPIRITU">Reporte</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="http://localhost/tuamigo/index.php/pagos/cobranzaasesor#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Herramientas<span class="caret"></span></a>
          <ul class="dropdown-menu">     
            <li><a href="http://localhost/tuamigo/index.php/pagos/formcalcularmora">Calcular Mora</a></li>
          </ul>           
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="http://localhost/tuamigo/index.php/pagos/cobranzaasesor#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">USUARIO : IESPIRITU <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://localhost/tuamigo/index.php/inicio/perfil">Perfil</a></li>
            <li><a href="http://localhost/tuamigo/index.php/inicio/cambclaveform">Cambiar de Clave</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="http://localhost/tuamigo/index.php/inicio/logout">Cerrar Session</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav><div id="contenidoprincipal">
<div class="container-fluid">
	<form name="guardarpagosasesor" action="http://localhost/tuamigo/index.php/pagos/realizapago2" class="form-horizontal" method="POST">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h class="panel-title">COBRANZA ASESOR </h>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<div class="col-md-6">
						<div class="input-group hidden">
							<span class="input-group-addon">BUSQUEDA</span>
							<input type="text" class="form-control" readonly="TRUE" name="busqtablasolcobranza" placeholder="Apellidos y Nombres">
						</div>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<h3 class="text-primary"><small>SALDO : </small>S/. <span id="mostrarsaldo">1916.70</span></h3>
						<input type="hidden" name="saldoasesor2" value="1916.70">
					</div>
				</div>
				<h3>SOLICITUDES DESEMBOLSADOS POR ASESOR</h3>
				<div id="solicitudescobranzaasesor" class="small">
					<table class="table table-condensed table-bordered small">
	<tbody><tr>
		<th width="3%">ITEM</th>
		<th width="7%">ID. SOL</th>
		<th width="6%">FECH. DES.</th>
		<th width="8%">MONTO</th>
		<th width="5%">TIPO</th>
		<th width="5%">PLAZO</th>
		<th width="10%">SALDO</th>
		<th width="9%">MORA ACUMULADO</th>
		<th width="8%">DIAS ATRASADO</th>
		<th>APELLIDOS Y NOMBRES</th>
		<th width="15%">MONTO</th>		
		<th width="5%"></th>
	</tr>
		<tr>
		<td>1</td>
		<td>003571</td>
		<td>24/05/2019</td>
		<td>S/.800.00</td>
		<td>
			RSS		</td>
		<td>SEMANAL</td>
		<td>S/.872.00</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>AGAMA SALAZAR ELMER EDGAR</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003571][checkiddesembolso]" class="checkpagar" value="Fr003571">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003571" name="pago[Fr003571][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;872){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoFr003571" name="pago[Fr003571][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoFr003571" name="pago[Fr003571][iddesembolso]" value="Fr003571" disabled="">
				<input type="hidden" id="saldoFr003571" name="pago[Fr003571][saldo]" value="872" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003571" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003571" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>2</td>
		<td>003473</td>
		<td>16/05/2019</td>
		<td>S/.1000.00</td>
		<td>
			RCS		</td>
		<td>SEMANAL</td>
		<td>S/.817.50</td>
		<td class="text-danger">3 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>AGUILAR PALACIOS ARMANDO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Th003473][checkiddesembolso]" class="checkpagar" value="Th003473">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTh003473" name="pago[Th003473][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;817.5){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTh003473" name="pago[Th003473][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTh003473" name="pago[Th003473][iddesembolso]" value="Th003473" disabled="">
				<input type="hidden" id="saldoTh003473" name="pago[Th003473][saldo]" value="817.5" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003473" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003473" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>3</td>
		<td>003407</td>
		<td>10/05/2019</td>
		<td>S/.550.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.299.50</td>
		<td class="text-danger">5 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>AGUIRRE  GOÑE LUIS ENRIQUE</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003407][checkiddesembolso]" class="checkpagar" value="Fr003407">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003407" name="pago[Fr003407][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;299.5){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoFr003407" name="pago[Fr003407][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoFr003407" name="pago[Fr003407][iddesembolso]" value="Fr003407" disabled="">
				<input type="hidden" id="saldoFr003407" name="pago[Fr003407][saldo]" value="299.5" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003407" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003407" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>4</td>
		<td>003531</td>
		<td>21/05/2019</td>
		<td>S/.300.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.261.60</td>
		<td class="text-danger">4 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>AGUIRRE  GOÑE LUIS ENRIQUE</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Tu003531][checkiddesembolso]" class="checkpagar" value="Tu003531">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTu003531" name="pago[Tu003531][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;261.6){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTu003531" name="pago[Tu003531][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTu003531" name="pago[Tu003531][iddesembolso]" value="Tu003531" disabled="">
				<input type="hidden" id="saldoTu003531" name="pago[Tu003531][saldo]" value="261.6" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003531" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003531" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>5</td>
		<td>003450</td>
		<td>15/05/2019</td>
		<td>S/.1000.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.735.20</td>
		<td class="text-danger">6 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>ALBORNOZ MARTINEZ EPIFANIA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003450][checkiddesembolso]" class="checkpagar" value="We003450">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003450" name="pago[We003450][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;735.2){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoWe003450" name="pago[We003450][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoWe003450" name="pago[We003450][iddesembolso]" value="We003450" disabled="">
				<input type="hidden" id="saldoWe003450" name="pago[We003450][saldo]" value="735.2" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003450" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003450" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>6</td>
		<td>000355</td>
		<td>21/04/2018</td>
		<td>S/.1000.00</td>
		<td>
			RSS		</td>
		<td>SEMANAL</td>
		<td>S/.737.50</td>
		<td class="text-danger">395 dias</td>
		<td class="text-danger"><strong>391 dias</strong></td>
		<td>ALEJO POSTELLES FELICIANA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[A3210411][checkiddesembolso]" class="checkpagar" value="A3210411">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoA3210411" name="pago[A3210411][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;737.5){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoA3210411" name="pago[A3210411][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoA3210411" name="pago[A3210411][iddesembolso]" value="A3210411" disabled="">
				<input type="hidden" id="saldoA3210411" name="pago[A3210411][saldo]" value="737.5" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/000355" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/000355" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>7</td>
		<td>001970</td>
		<td>06/12/2018</td>
		<td>S/.10000.00</td>
		<td>
			Paralelo		</td>
		<td>SEMANAL</td>
		<td>S/.10,400.00</td>
		<td class="text-danger">169 dias</td>
		<td class="text-danger"><strong>169 dias</strong></td>
		<td>ALLPA ORTEGA VICTOR BENAVIDES</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[A5061211][checkiddesembolso]" class="checkpagar" value="A5061211">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoA5061211" name="pago[A5061211][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;10400){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoA5061211" name="pago[A5061211][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoA5061211" name="pago[A5061211][iddesembolso]" value="A5061211" disabled="">
				<input type="hidden" id="saldoA5061211" name="pago[A5061211][saldo]" value="10400" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/001970" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/001970" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>8</td>
		<td>002490</td>
		<td>02/02/2019</td>
		<td>S/.4653.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.5,257.90</td>
		<td class="text-danger">97 dias</td>
		<td class="text-danger"><strong>97 dias</strong></td>
		<td>ALLPA ORTEGA VICTOR BENAVIDES</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Sa002490][checkiddesembolso]" class="checkpagar" value="Sa002490">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoSa002490" name="pago[Sa002490][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;5257.9){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoSa002490" name="pago[Sa002490][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoSa002490" name="pago[Sa002490][iddesembolso]" value="Sa002490" disabled="">
				<input type="hidden" id="saldoSa002490" name="pago[Sa002490][saldo]" value="5257.9" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/002490" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/002490" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>9</td>
		<td>003465</td>
		<td>20/05/2019</td>
		<td>S/.500.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.435.80</td>
		<td class="text-danger">4 dias</td>
		<td class="text-danger"><strong>3 dias</strong></td>
		<td>BONIFACIO FABIAN MARITZA ELIDA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003465][checkiddesembolso]" class="checkpagar" value="Mo003465" checked="checked">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003465" name="pago[Mo003465][monto]" placeholder="0.00" value="54.6" onfocusout="">
				<input type="hidden" id="estadoMo003465" name="pago[Mo003465][estado]" value="NO">
				<input type="hidden" id="iddesembolsoMo003465" name="pago[Mo003465][iddesembolso]" value="Mo003465">
				<input type="hidden" id="saldoMo003465" name="pago[Mo003465][saldo]" value="435.8">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003465" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003465" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>10</td>
		<td>003504</td>
		<td>20/05/2019</td>
		<td>S/.2500.00</td>
		<td>
			RSS		</td>
		<td>DIARIO</td>
		<td>S/.2,065.00</td>
		<td class="text-danger">3 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>CABALLERO NIETO GICELA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003504][checkiddesembolso]" class="checkpagar" value="Mo003504" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003504" name="pago[Mo003504][monto]" placeholder="0.00" value="100" onfocusout="">
				<input type="hidden" id="estadoMo003504" name="pago[Mo003504][estado]" value="NO">
				<input type="hidden" id="iddesembolsoMo003504" name="pago[Mo003504][iddesembolso]" value="Mo003504">
				<input type="hidden" id="saldoMo003504" name="pago[Mo003504][saldo]" value="2065">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003504" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003504" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>11</td>
		<td>003508</td>
		<td>20/05/2019</td>
		<td>S/.2500.00</td>
		<td>
			RSS		</td>
		<td>DIARIO</td>
		<td>S/.2,025.00</td>
		<td class="text-danger">2 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>CABALLERO NIETO GICELA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003508][checkiddesembolso]" class="checkpagar" value="Mo003508" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003508" name="pago[Mo003508][monto]" placeholder="0.00" value="100">
				<input type="hidden" id="estadoMo003508" name="pago[Mo003508][estado]" value="NO">
				<input type="hidden" id="iddesembolsoMo003508" name="pago[Mo003508][iddesembolso]" value="Mo003508">
				<input type="hidden" id="saldoMo003508" name="pago[Mo003508][saldo]" value="2025">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003508" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003508" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>12</td>
		<td>003418</td>
		<td>11/05/2019</td>
		<td>S/.1500.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.810.00</td>
		<td class="text-danger">2 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>CABALLERO PIZARRO EDGARDO CARLOS</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Sa003418][checkiddesembolso]" class="checkpagar" value="Sa003418" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoSa003418" name="pago[Sa003418][monto]" placeholder="0.00" value="54">
				<input type="hidden" id="estadoSa003418" name="pago[Sa003418][estado]" value="NO">
				<input type="hidden" id="iddesembolsoSa003418" name="pago[Sa003418][iddesembolso]" value="Sa003418">
				<input type="hidden" id="saldoSa003418" name="pago[Sa003418][saldo]" value="810">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003418" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003418" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>13</td>
		<td>003534</td>
		<td>22/05/2019</td>
		<td>S/.1500.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.1,296.00</td>
		<td class="text-danger">2 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>CABALLERO PIZARRO EDGARDO CARLOS</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003534][checkiddesembolso]" class="checkpagar" value="We003534" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003534" name="pago[We003534][monto]" placeholder="0.00" value="54">
				<input type="hidden" id="estadoWe003534" name="pago[We003534][estado]" value="NO">
				<input type="hidden" id="iddesembolsoWe003534" name="pago[We003534][iddesembolso]" value="We003534">
				<input type="hidden" id="saldoWe003534" name="pago[We003534][saldo]" value="1296">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003534" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003534" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>14</td>
		<td>002067</td>
		<td>18/12/2018</td>
		<td>S/.1700.00</td>
		<td>
			RSS		</td>
		<td>DIARIO</td>
		<td>S/.656.00</td>
		<td class="text-danger">116 dias</td>
		<td class="text-danger"><strong>15 dias</strong></td>
		<td>CABALLERO RAMOS GLADIS</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[C0181211][checkiddesembolso]" class="checkpagar" value="C0181211">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoC0181211" name="pago[C0181211][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;656){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoC0181211" name="pago[C0181211][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoC0181211" name="pago[C0181211][iddesembolso]" value="C0181211" disabled="">
				<input type="hidden" id="saldoC0181211" name="pago[C0181211][saldo]" value="656" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/002067" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/002067" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>15</td>
		<td>003484</td>
		<td>17/05/2019</td>
		<td>S/.700.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.508.00</td>
		<td class="text-danger">3 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>CABELLO TUCTO TROYANO  </td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003484][checkiddesembolso]" class="checkpagar" value="Fr003484" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003484" name="pago[Fr003484][monto]" placeholder="0.00" value="25.5">
				<input type="hidden" id="estadoFr003484" name="pago[Fr003484][estado]" value="NO">
				<input type="hidden" id="iddesembolsoFr003484" name="pago[Fr003484][iddesembolso]" value="Fr003484">
				<input type="hidden" id="saldoFr003484" name="pago[Fr003484][saldo]" value="508">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003484" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003484" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>16</td>
		<td>003424</td>
		<td>11/05/2019</td>
		<td>S/.1000.00</td>
		<td>
			Nuevo		</td>
		<td>DIARIO</td>
		<td>S/.544.00</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>CABELLO TUCTO TROYANO  </td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Sa003424][checkiddesembolso]" class="checkpagar" value="Sa003424">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoSa003424" name="pago[Sa003424][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;544){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoSa003424" name="pago[Sa003424][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoSa003424" name="pago[Sa003424][iddesembolso]" value="Sa003424" disabled="">
				<input type="hidden" id="saldoSa003424" name="pago[Sa003424][saldo]" value="544" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003424" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003424" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>17</td>
		<td>001141</td>
		<td>05/09/2018</td>
		<td>S/.2000.00</td>
		<td>
			RSS		</td>
		<td>DIARIO</td>
		<td>S/.53.00</td>
		<td class="text-danger">200 dias</td>
		<td class="text-danger"><strong>2 dias</strong></td>
		<td>CALERO FERNANDEZ VICTOR AUGUSTO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[C3050910][checkiddesembolso]" class="checkpagar" value="C3050910" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoC3050910" name="pago[C3050910][monto]" placeholder="0.00" value="9">
				<input type="hidden" id="estadoC3050910" name="pago[C3050910][estado]" value="NO">
				<input type="hidden" id="iddesembolsoC3050910" name="pago[C3050910][iddesembolso]" value="C3050910">
				<input type="hidden" id="saldoC3050910" name="pago[C3050910][saldo]" value="53">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/001141" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/001141" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>18</td>
		<td>000625</td>
		<td>09/06/2018</td>
		<td>S/.2500.00</td>
		<td>
			Paralelo		</td>
		<td>SEMANAL</td>
		<td>S/.2,725.00</td>
		<td class="text-danger">349 dias</td>
		<td class="text-danger"><strong>349 dias</strong></td>
		<td>CARDENAS CHUQUIYAURI JAQUELINE BETSY</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[C4090612][checkiddesembolso]" class="checkpagar" value="C4090612">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoC4090612" name="pago[C4090612][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;2725){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoC4090612" name="pago[C4090612][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoC4090612" name="pago[C4090612][iddesembolso]" value="C4090612" disabled="">
				<input type="hidden" id="saldoC4090612" name="pago[C4090612][saldo]" value="2725" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/000625" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/000625" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>19</td>
		<td>000586</td>
		<td>05/06/2018</td>
		<td>S/.1200.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.1,160.80</td>
		<td class="text-danger">295 dias</td>
		<td class="text-danger"><strong>262 dias</strong></td>
		<td>CARDENAS CHUQUIYAURI JAQUELINE BETSY</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[C5050616][checkiddesembolso]" class="checkpagar" value="C5050616">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoC5050616" name="pago[C5050616][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;1160.8){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoC5050616" name="pago[C5050616][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoC5050616" name="pago[C5050616][iddesembolso]" value="C5050616" disabled="">
				<input type="hidden" id="saldoC5050616" name="pago[C5050616][saldo]" value="1160.8" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/000586" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/000586" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>20</td>
		<td>003603</td>
		<td>27/05/2019</td>
		<td>S/.1000.00</td>
		<td>
			RCS		</td>
		<td>SEMANAL</td>
		<td>S/.1,090.00</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>CASTRO HIDALGO ROSAURA YRACEMA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003603][checkiddesembolso]" class="checkpagar" value="Mo003603">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003603" name="pago[Mo003603][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;1090){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoMo003603" name="pago[Mo003603][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoMo003603" name="pago[Mo003603][iddesembolso]" value="Mo003603" disabled="">
				<input type="hidden" id="saldoMo003603" name="pago[Mo003603][saldo]" value="1090" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003603" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003603" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>21</td>
		<td>003343</td>
		<td>04/05/2019</td>
		<td>S/.1000.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.570.00</td>
		<td class="text-danger">10 dias</td>
		<td class="text-danger"><strong>3 dias</strong></td>
		<td>CASTRO LLANTO MARIVEL</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Sa003343][checkiddesembolso]" class="checkpagar" value="Sa003343">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoSa003343" name="pago[Sa003343][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;570){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoSa003343" name="pago[Sa003343][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoSa003343" name="pago[Sa003343][iddesembolso]" value="Sa003343" disabled="">
				<input type="hidden" id="saldoSa003343" name="pago[Sa003343][saldo]" value="570" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003343" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003343" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>22</td>
		<td>003592</td>
		<td>27/05/2019</td>
		<td>S/.350.00</td>
		<td>
			RCS		</td>
		<td>SEMANAL</td>
		<td>S/.381.50</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>CLAUDIO GONZALES JHONZON LINDON</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003592][checkiddesembolso]" class="checkpagar" value="Mo003592">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003592" name="pago[Mo003592][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;381.5){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoMo003592" name="pago[Mo003592][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoMo003592" name="pago[Mo003592][iddesembolso]" value="Mo003592" disabled="">
				<input type="hidden" id="saldoMo003592" name="pago[Mo003592][saldo]" value="381.5" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003592" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003592" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>23</td>
		<td>003541</td>
		<td>22/05/2019</td>
		<td>S/.300.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.272.50</td>
		<td class="text-danger">4 dias</td>
		<td class="text-danger"><strong>2 dias</strong></td>
		<td>CLAUDIO GONZALES JHONZON LINDON</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003541][checkiddesembolso]" class="checkpagar" value="We003541" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003541" name="pago[We003541][monto]" placeholder="0.00" value="21.8">
				<input type="hidden" id="estadoWe003541" name="pago[We003541][estado]" value="NO">
				<input type="hidden" id="iddesembolsoWe003541" name="pago[We003541][iddesembolso]" value="We003541">
				<input type="hidden" id="saldoWe003541" name="pago[We003541][saldo]" value="272.5">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003541" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003541" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>24</td>
		<td>003397</td>
		<td>09/05/2019</td>
		<td>S/.650.00</td>
		<td>
			RCS		</td>
		<td>SEMANAL</td>
		<td>S/.353.50</td>
		<td class="text-danger">12 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>CRESPO SANTIAGO JORGE</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Th003397][checkiddesembolso]" class="checkpagar" value="Th003397">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTh003397" name="pago[Th003397][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;353.5){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTh003397" name="pago[Th003397][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTh003397" name="pago[Th003397][iddesembolso]" value="Th003397" disabled="">
				<input type="hidden" id="saldoTh003397" name="pago[Th003397][saldo]" value="353.5" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003397" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003397" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>25</td>
		<td>003620</td>
		<td>29/05/2019</td>
		<td>S/.3000.00</td>
		<td>
			RSS		</td>
		<td>DIARIO</td>
		<td>S/.3,270.00</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>CUCA CLEMENTE GLICERIA YANET</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003620][checkiddesembolso]" class="checkpagar" value="We003620" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003620" name="pago[We003620][monto]" placeholder="0.00" value="109">
				<input type="hidden" id="estadoWe003620" name="pago[We003620][estado]" value="NO">
				<input type="hidden" id="iddesembolsoWe003620" name="pago[We003620][iddesembolso]" value="We003620">
				<input type="hidden" id="saldoWe003620" name="pago[We003620][saldo]" value="3270">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003620" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003620" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>26</td>
		<td>003402</td>
		<td>10/05/2019</td>
		<td>S/.1000.00</td>
		<td>
			RSS		</td>
		<td>DIARIO</td>
		<td>S/.493.60</td>
		<td class="text-danger">5 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>CUEVA CUELLAR YADIRA </td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003402][checkiddesembolso]" class="checkpagar" value="Fr003402" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003402" name="pago[Fr003402][monto]" placeholder="0.00" value="35.4">
				<input type="hidden" id="estadoFr003402" name="pago[Fr003402][estado]" value="NO">
				<input type="hidden" id="iddesembolsoFr003402" name="pago[Fr003402][iddesembolso]" value="Fr003402">
				<input type="hidden" id="saldoFr003402" name="pago[Fr003402][saldo]" value="493.6">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003402" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003402" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>27</td>
		<td>003565</td>
		<td>24/05/2019</td>
		<td>S/.3000.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.2,862.00</td>
		<td class="text-danger">2 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>ESPINOZA GARNILLO MARILU YUVANA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003565][checkiddesembolso]" class="checkpagar" value="Fr003565" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003565" name="pago[Fr003565][monto]" placeholder="0.00" value="106">
				<input type="hidden" id="estadoFr003565" name="pago[Fr003565][estado]" value="NO">
				<input type="hidden" id="iddesembolsoFr003565" name="pago[Fr003565][iddesembolso]" value="Fr003565">
				<input type="hidden" id="saldoFr003565" name="pago[Fr003565][saldo]" value="2862">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003565" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003565" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>28</td>
		<td>003384</td>
		<td>08/05/2019</td>
		<td>S/.3000.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.1,484.00</td>
		<td class="text-danger">4 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>ESPINOZA GARNILLO MARILU YUVANA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003384][checkiddesembolso]" class="checkpagar" value="We003384" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003384" name="pago[We003384][monto]" placeholder="0.00" value="106">
				<input type="hidden" id="estadoWe003384" name="pago[We003384][estado]" value="NO">
				<input type="hidden" id="iddesembolsoWe003384" name="pago[We003384][iddesembolso]" value="We003384">
				<input type="hidden" id="saldoWe003384" name="pago[We003384][saldo]" value="1484">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003384" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003384" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>29</td>
		<td>003449</td>
		<td>14/05/2019</td>
		<td>S/.1000.00</td>
		<td>
			RCS		</td>
		<td>SEMANAL</td>
		<td>S/.545.00</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>ESPINOZA TELLO JHOSEPH LANDEO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Tu003449][checkiddesembolso]" class="checkpagar" value="Tu003449">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTu003449" name="pago[Tu003449][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;545){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTu003449" name="pago[Tu003449][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTu003449" name="pago[Tu003449][iddesembolso]" value="Tu003449" disabled="">
				<input type="hidden" id="saldoTu003449" name="pago[Tu003449][saldo]" value="545" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003449" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003449" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>30</td>
		<td>003549</td>
		<td>22/05/2019</td>
		<td>S/.300.00</td>
		<td>
			Paralelo		</td>
		<td>SEMANAL</td>
		<td>S/.245.20</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>ESPINOZA TELLO JHOSEPH LANDEO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003549][checkiddesembolso]" class="checkpagar" value="We003549">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003549" name="pago[We003549][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;245.2){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoWe003549" name="pago[We003549][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoWe003549" name="pago[We003549][iddesembolso]" value="We003549" disabled="">
				<input type="hidden" id="saldoWe003549" name="pago[We003549][saldo]" value="245.2" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003549" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003549" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>31</td>
		<td>003162</td>
		<td>15/04/2019</td>
		<td>S/.1000.00</td>
		<td>
			Nuevo		</td>
		<td>SEMANAL</td>
		<td>S/.510.00</td>
		<td class="text-danger">38 dias</td>
		<td class="text-danger"><strong>3 dias</strong></td>
		<td>ESPIRITU MATOS HEADY</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003162][checkiddesembolso]" class="checkpagar" value="Mo003162">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003162" name="pago[Mo003162][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;510){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoMo003162" name="pago[Mo003162][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoMo003162" name="pago[Mo003162][iddesembolso]" value="Mo003162" disabled="">
				<input type="hidden" id="saldoMo003162" name="pago[Mo003162][saldo]" value="510" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003162" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003162" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>32</td>
		<td>003385</td>
		<td>08/05/2019</td>
		<td>S/.1500.00</td>
		<td>
			RSS		</td>
		<td>SEMANAL</td>
		<td>S/.408.60</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>ESPIRITU SERNA PAULINA LUCY</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003385][checkiddesembolso]" class="checkpagar" value="We003385">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003385" name="pago[We003385][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;408.6){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoWe003385" name="pago[We003385][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoWe003385" name="pago[We003385][iddesembolso]" value="We003385" disabled="">
				<input type="hidden" id="saldoWe003385" name="pago[We003385][saldo]" value="408.6" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003385" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003385" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>33</td>
		<td>003615</td>
		<td>28/05/2019</td>
		<td>S/.1500.00</td>
		<td>
			RSS		</td>
		<td>DIARIO</td>
		<td>S/.1,526.00</td>
		<td class="text-danger">1 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>ESTEBAN TOLEDO VIOLETA EMILIA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Tu003615][checkiddesembolso]" class="checkpagar" value="Tu003615">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTu003615" name="pago[Tu003615][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;1526){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTu003615" name="pago[Tu003615][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTu003615" name="pago[Tu003615][iddesembolso]" value="Tu003615" disabled="">
				<input type="hidden" id="saldoTu003615" name="pago[Tu003615][saldo]" value="1526" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003615" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003615" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>34</td>
		<td>003256</td>
		<td>25/04/2019</td>
		<td>S/.1000.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.141.80</td>
		<td class="text-danger">3 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>FABIAN BERNAL DECIDERIA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Th003256][checkiddesembolso]" class="checkpagar" value="Th003256" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTh003256" name="pago[Th003256][monto]" placeholder="0.00" value="35.7">
				<input type="hidden" id="estadoTh003256" name="pago[Th003256][estado]" value="NO">
				<input type="hidden" id="iddesembolsoTh003256" name="pago[Th003256][iddesembolso]" value="Th003256">
				<input type="hidden" id="saldoTh003256" name="pago[Th003256][saldo]" value="141.8">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003256" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003256" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>35</td>
		<td>003557</td>
		<td>23/05/2019</td>
		<td>S/.1500.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.1,325.00</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>FABIAN BERNAL DECIDERIA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Th003557][checkiddesembolso]" class="checkpagar" value="Th003557" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTh003557" name="pago[Th003557][monto]" placeholder="0.00" value="53">
				<input type="hidden" id="estadoTh003557" name="pago[Th003557][estado]" value="NO">
				<input type="hidden" id="iddesembolsoTh003557" name="pago[Th003557][iddesembolso]" value="Th003557">
				<input type="hidden" id="saldoTh003557" name="pago[Th003557][saldo]" value="1325">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003557" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003557" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>36</td>
		<td>003612</td>
		<td>28/05/2019</td>
		<td>S/.500.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.515.00</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>FERNANDEZ NOLASCO AMELIA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Tu003612][checkiddesembolso]" class="checkpagar" value="Tu003612" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTu003612" name="pago[Tu003612][monto]" placeholder="0.00" value="20">
				<input type="hidden" id="estadoTu003612" name="pago[Tu003612][estado]" value="NO">
				<input type="hidden" id="iddesembolsoTu003612" name="pago[Tu003612][iddesembolso]" value="Tu003612">
				<input type="hidden" id="saldoTu003612" name="pago[Tu003612][saldo]" value="515">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003612" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003612" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>37</td>
		<td>003334</td>
		<td>03/05/2019</td>
		<td>S/.300.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.54.50</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>FLORES ZEVALLOS EDUARDO JESUS</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003334][checkiddesembolso]" class="checkpagar" value="Fr003334">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003334" name="pago[Fr003334][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;54.5){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoFr003334" name="pago[Fr003334][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoFr003334" name="pago[Fr003334][iddesembolso]" value="Fr003334" disabled="">
				<input type="hidden" id="saldoFr003334" name="pago[Fr003334][saldo]" value="54.5" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003334" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003334" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>38</td>
		<td>003499</td>
		<td>18/05/2019</td>
		<td>S/.300.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.196.20</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>FLORES ZEVALLOS EDUARDO JESUS</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Sa003499][checkiddesembolso]" class="checkpagar" value="Sa003499">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoSa003499" name="pago[Sa003499][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;196.2){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoSa003499" name="pago[Sa003499][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoSa003499" name="pago[Sa003499][iddesembolso]" value="Sa003499" disabled="">
				<input type="hidden" id="saldoSa003499" name="pago[Sa003499][saldo]" value="196.2" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003499" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003499" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>39</td>
		<td>003287</td>
		<td>29/04/2019</td>
		<td>S/.1500.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.318.00</td>
		<td class="text-danger">2 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>GARNILLO DE ESPINOZA RAFAELA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003287][checkiddesembolso]" class="checkpagar" value="Mo003287" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003287" name="pago[Mo003287][monto]" placeholder="0.00" value="53">
				<input type="hidden" id="estadoMo003287" name="pago[Mo003287][estado]" value="NO">
				<input type="hidden" id="iddesembolsoMo003287" name="pago[Mo003287][iddesembolso]" value="Mo003287">
				<input type="hidden" id="saldoMo003287" name="pago[Mo003287][saldo]" value="318">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003287" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003287" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>40</td>
		<td>003472</td>
		<td>16/05/2019</td>
		<td>S/.1000.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.778.80</td>
		<td class="text-danger">4 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>GOZAR RIVERA INDIRA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Th003472][checkiddesembolso]" class="checkpagar" value="Th003472" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTh003472" name="pago[Th003472][monto]" placeholder="0.00" value="36.4">
				<input type="hidden" id="estadoTh003472" name="pago[Th003472][estado]" value="NO">
				<input type="hidden" id="iddesembolsoTh003472" name="pago[Th003472][iddesembolso]" value="Th003472">
				<input type="hidden" id="saldoTh003472" name="pago[Th003472][saldo]" value="778.8">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003472" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003472" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>41</td>
		<td>003408</td>
		<td>10/05/2019</td>
		<td>S/.500.00</td>
		<td>
			RSS		</td>
		<td>DIARIO</td>
		<td>S/.235.60</td>
		<td class="text-danger">4 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>HERMOGENES TADEO JORSIN</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003408][checkiddesembolso]" class="checkpagar" value="Fr003408">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003408" name="pago[Fr003408][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;235.6){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoFr003408" name="pago[Fr003408][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoFr003408" name="pago[Fr003408][iddesembolso]" value="Fr003408" disabled="">
				<input type="hidden" id="saldoFr003408" name="pago[Fr003408][saldo]" value="235.6" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003408" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003408" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>42</td>
		<td>003403</td>
		<td>10/05/2019</td>
		<td>S/.500.00</td>
		<td>
			Nuevo		</td>
		<td>DIARIO</td>
		<td>S/.253.80</td>
		<td class="text-danger">2 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>HUAYNATE SALAZAR DORILA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003403][checkiddesembolso]" class="checkpagar" value="Fr003403" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003403" name="pago[Fr003403][monto]" placeholder="0.00" value="18.2">
				<input type="hidden" id="estadoFr003403" name="pago[Fr003403][estado]" value="NO">
				<input type="hidden" id="iddesembolsoFr003403" name="pago[Fr003403][iddesembolso]" value="Fr003403">
				<input type="hidden" id="saldoFr003403" name="pago[Fr003403][saldo]" value="253.8">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003403" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003403" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>43</td>
		<td>003563</td>
		<td>24/05/2019</td>
		<td>S/.4000.00</td>
		<td>
			RSS		</td>
		<td>DIARIO</td>
		<td>S/.3,744.00</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>HUERTO ALVARADO WANDI LIZ</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003563][checkiddesembolso]" class="checkpagar" value="Fr003563" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003563" name="pago[Fr003563][monto]" placeholder="0.00" value="144">
				<input type="hidden" id="estadoFr003563" name="pago[Fr003563][estado]" value="NO">
				<input type="hidden" id="iddesembolsoFr003563" name="pago[Fr003563][iddesembolso]" value="Fr003563">
				<input type="hidden" id="saldoFr003563" name="pago[Fr003563][saldo]" value="3744">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003563" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003563" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>44</td>
		<td>003636</td>
		<td>30/05/2019</td>
		<td>S/.200.00</td>
		<td>
			Paralelo		</td>
		<td>SEMANAL</td>
		<td>S/.218.00</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>HUERTO ALVARADO WANDI LIZ</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Th003636][checkiddesembolso]" class="checkpagar" value="Th003636">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTh003636" name="pago[Th003636][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;218){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTh003636" name="pago[Th003636][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTh003636" name="pago[Th003636][iddesembolso]" value="Th003636" disabled="">
				<input type="hidden" id="saldoTh003636" name="pago[Th003636][saldo]" value="218" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003636" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003636" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>45</td>
		<td>003488</td>
		<td>17/05/2019</td>
		<td>S/.700.00</td>
		<td>
			Paralelo		</td>
		<td>SEMANAL</td>
		<td>S/.572.20</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>LAGUNA ESPINOZA FIORELLA DEL PILAR</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003488][checkiddesembolso]" class="checkpagar" value="Fr003488">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003488" name="pago[Fr003488][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;572.2){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoFr003488" name="pago[Fr003488][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoFr003488" name="pago[Fr003488][iddesembolso]" value="Fr003488" disabled="">
				<input type="hidden" id="saldoFr003488" name="pago[Fr003488][saldo]" value="572.2" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003488" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003488" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>46</td>
		<td>003561</td>
		<td>23/05/2019</td>
		<td>S/.500.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.490.40</td>
		<td class="text-danger">3 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>LAGUNA ESPINOZA FIORELLA DEL PILAR</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Th003561][checkiddesembolso]" class="checkpagar" value="Th003561" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTh003561" name="pago[Th003561][monto]" placeholder="0.00" value="54.6">
				<input type="hidden" id="estadoTh003561" name="pago[Th003561][estado]" value="NO">
				<input type="hidden" id="iddesembolsoTh003561" name="pago[Th003561][iddesembolso]" value="Th003561">
				<input type="hidden" id="saldoTh003561" name="pago[Th003561][saldo]" value="490.4">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003561" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003561" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>47</td>
		<td>003413</td>
		<td>10/05/2019</td>
		<td>S/.200.00</td>
		<td>
			Paralelo		</td>
		<td>SEMANAL</td>
		<td>S/.54.50</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>LIJARZA VALENZUELA ISABETH ANGELICA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003413][checkiddesembolso]" class="checkpagar" value="Fr003413">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003413" name="pago[Fr003413][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;54.5){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoFr003413" name="pago[Fr003413][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoFr003413" name="pago[Fr003413][iddesembolso]" value="Fr003413" disabled="">
				<input type="hidden" id="saldoFr003413" name="pago[Fr003413][saldo]" value="54.5" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003413" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003413" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>48</td>
		<td>003372</td>
		<td>07/05/2019</td>
		<td>S/.400.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.144.00</td>
		<td class="text-danger">2 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>LIJARZA VALENZUELA ISABETH ANGELICA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Tu003372][checkiddesembolso]" class="checkpagar" value="Tu003372">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTu003372" name="pago[Tu003372][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;144){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTu003372" name="pago[Tu003372][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTu003372" name="pago[Tu003372][iddesembolso]" value="Tu003372" disabled="">
				<input type="hidden" id="saldoTu003372" name="pago[Tu003372][saldo]" value="144" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003372" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003372" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>49</td>
		<td>003635</td>
		<td>30/05/2019</td>
		<td>S/.42700.00</td>
		<td>
			Nuevo		</td>
		<td>SEMANAL</td>
		<td>S/.46,543.00</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>MOLLEAPAZA CAMPOS RUBEN JOSEPH</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Th003635][checkiddesembolso]" class="checkpagar" value="Th003635">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTh003635" name="pago[Th003635][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;46543){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTh003635" name="pago[Th003635][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTh003635" name="pago[Th003635][iddesembolso]" value="Th003635" disabled="">
				<input type="hidden" id="saldoTh003635" name="pago[Th003635][saldo]" value="46543" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003635" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003635" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>50</td>
		<td>003486</td>
		<td>17/05/2019</td>
		<td>S/.600.00</td>
		<td>
			RCS		</td>
		<td>SEMANAL</td>
		<td>S/.554.00</td>
		<td class="text-danger">7 dias</td>
		<td class="text-danger"><strong>7 dias</strong></td>
		<td>MORALES NARBAJA RUSEL</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003486][checkiddesembolso]" class="checkpagar" value="Fr003486">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003486" name="pago[Fr003486][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;554){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoFr003486" name="pago[Fr003486][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoFr003486" name="pago[Fr003486][iddesembolso]" value="Fr003486" disabled="">
				<input type="hidden" id="saldoFr003486" name="pago[Fr003486][saldo]" value="554" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003486" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003486" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>51</td>
		<td>003267</td>
		<td>26/04/2019</td>
		<td>S/.500.00</td>
		<td>
			RSS		</td>
		<td>DIARIO</td>
		<td>S/.35.40</td>
		<td class="text-danger">9 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>NEIRA CONDEZO KARINA SOFIA </td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003267][checkiddesembolso]" class="checkpagar" value="Fr003267">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003267" name="pago[Fr003267][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;35.4){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoFr003267" name="pago[Fr003267][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoFr003267" name="pago[Fr003267][iddesembolso]" value="Fr003267" disabled="">
				<input type="hidden" id="saldoFr003267" name="pago[Fr003267][saldo]" value="35.4" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003267" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003267" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>52</td>
		<td>003345</td>
		<td>04/05/2019</td>
		<td>S/.1500.00</td>
		<td>
			RSS		</td>
		<td>SEMANAL</td>
		<td>S/.817.40</td>
		<td class="text-danger">13 dias</td>
		<td class="text-danger"><strong>6 dias</strong></td>
		<td>OROSCO MARTINEZ ANTONIO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Sa003345][checkiddesembolso]" class="checkpagar" value="Sa003345">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoSa003345" name="pago[Sa003345][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;817.4){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoSa003345" name="pago[Sa003345][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoSa003345" name="pago[Sa003345][iddesembolso]" value="Sa003345" disabled="">
				<input type="hidden" id="saldoSa003345" name="pago[Sa003345][saldo]" value="817.4" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003345" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003345" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>53</td>
		<td>003400</td>
		<td>10/05/2019</td>
		<td>S/.500.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.252.00</td>
		<td class="text-danger">4 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>PALOMINO MORALES OLGA RITA </td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003400][checkiddesembolso]" class="checkpagar" value="Fr003400" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003400" name="pago[Fr003400][monto]" placeholder="0.00" value="18">
				<input type="hidden" id="estadoFr003400" name="pago[Fr003400][estado]" value="NO">
				<input type="hidden" id="iddesembolsoFr003400" name="pago[Fr003400][iddesembolso]" value="Fr003400">
				<input type="hidden" id="saldoFr003400" name="pago[Fr003400][saldo]" value="252">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003400" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003400" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>54</td>
		<td>003482</td>
		<td>17/05/2019</td>
		<td>S/.800.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.581.00</td>
		<td class="text-danger">3 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>PALOMINO MORALES OLGA RITA </td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003482][checkiddesembolso]" class="checkpagar" value="Fr003482" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003482" name="pago[Fr003482][monto]" placeholder="0.00" value="29.1">
				<input type="hidden" id="estadoFr003482" name="pago[Fr003482][estado]" value="NO">
				<input type="hidden" id="iddesembolsoFr003482" name="pago[Fr003482][iddesembolso]" value="Fr003482">
				<input type="hidden" id="saldoFr003482" name="pago[Fr003482][saldo]" value="581">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003482" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003482" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>55</td>
		<td>003311</td>
		<td>30/04/2019</td>
		<td>S/.400.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.85.60</td>
		<td class="text-danger">5 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>PALOMINO MORALES OLGA RITA </td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Tu003311][checkiddesembolso]" class="checkpagar" value="Tu003311" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTu003311" name="pago[Tu003311][monto]" placeholder="0.00" value="14.6">
				<input type="hidden" id="estadoTu003311" name="pago[Tu003311][estado]" value="NO">
				<input type="hidden" id="iddesembolsoTu003311" name="pago[Tu003311][iddesembolso]" value="Tu003311">
				<input type="hidden" id="saldoTu003311" name="pago[Tu003311][saldo]" value="85.6">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003311" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003311" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>56</td>
		<td>003560</td>
		<td>23/05/2019</td>
		<td>S/.4000.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.3,630.00</td>
		<td class="text-danger">2 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>PIÑAN ALCEDO ROCIO ELIZABETH</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Th003560][checkiddesembolso]" class="checkpagar" value="Th003560" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTh003560" name="pago[Th003560][monto]" placeholder="0.00" value="146">
				<input type="hidden" id="estadoTh003560" name="pago[Th003560][estado]" value="NO">
				<input type="hidden" id="iddesembolsoTh003560" name="pago[Th003560][iddesembolso]" value="Th003560">
				<input type="hidden" id="saldoTh003560" name="pago[Th003560][saldo]" value="3630">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003560" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003560" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>57</td>
		<td>003633</td>
		<td>30/05/2019</td>
		<td>S/.1000.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.1,090.00</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>PIÑAN ALCEDO ROCIO ELIZABETH</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Th003633][checkiddesembolso]" class="checkpagar" value="Th003633">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTh003633" name="pago[Th003633][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;1090){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTh003633" name="pago[Th003633][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTh003633" name="pago[Th003633][iddesembolso]" value="Th003633" disabled="">
				<input type="hidden" id="saldoTh003633" name="pago[Th003633][saldo]" value="1090" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003633" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003633" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>58</td>
		<td>001608</td>
		<td>30/10/2018</td>
		<td>S/.500.00</td>
		<td>
			RSS		</td>
		<td>SEMANAL</td>
		<td>S/.145.00</td>
		<td class="text-danger">197 dias</td>
		<td class="text-danger"><strong>185 dias</strong></td>
		<td>PIÑAN DOMINGUEZ SEBASTIAN DAVID</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[P5301011][checkiddesembolso]" class="checkpagar" value="P5301011">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoP5301011" name="pago[P5301011][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;145){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoP5301011" name="pago[P5301011][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoP5301011" name="pago[P5301011][iddesembolso]" value="P5301011" disabled="">
				<input type="hidden" id="saldoP5301011" name="pago[P5301011][saldo]" value="145" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/001608" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/001608" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>59</td>
		<td>003411</td>
		<td>10/05/2019</td>
		<td>S/.250.00</td>
		<td>
			Nuevo		</td>
		<td>DIARIO</td>
		<td>S/.150.50</td>
		<td class="text-danger">4 dias</td>
		<td class="text-danger"><strong>2 dias</strong></td>
		<td>POMA TUCTO ERIKA TANIA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003411][checkiddesembolso]" class="checkpagar" value="Fr003411" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003411" name="pago[Fr003411][monto]" placeholder="0.00" value="9">
				<input type="hidden" id="estadoFr003411" name="pago[Fr003411][estado]" value="NO">
				<input type="hidden" id="iddesembolsoFr003411" name="pago[Fr003411][iddesembolso]" value="Fr003411">
				<input type="hidden" id="saldoFr003411" name="pago[Fr003411][saldo]" value="150.5">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003411" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003411" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>60</td>
		<td>003481</td>
		<td>17/05/2019</td>
		<td>S/.300.00</td>
		<td>
			Nuevo		</td>
		<td>DIARIO</td>
		<td>S/.316.10</td>
		<td class="text-danger">10 dias</td>
		<td class="text-danger"><strong>10 dias</strong></td>
		<td>PORTAL MALPARTIDA ROY ARTURO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003481][checkiddesembolso]" class="checkpagar" value="Fr003481">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003481" name="pago[Fr003481][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;316.1){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoFr003481" name="pago[Fr003481][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoFr003481" name="pago[Fr003481][iddesembolso]" value="Fr003481" disabled="">
				<input type="hidden" id="saldoFr003481" name="pago[Fr003481][saldo]" value="316.1" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003481" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003481" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>61</td>
		<td>001237</td>
		<td>17/09/2018</td>
		<td>S/.1600.00</td>
		<td>
			RSS		</td>
		<td>DIARIO</td>
		<td>S/.1,384.00</td>
		<td class="text-danger">205 dias</td>
		<td class="text-danger"><strong>201 dias</strong></td>
		<td>QUINTE LAZARO KAREN MILUSKA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Q0170911][checkiddesembolso]" class="checkpagar" value="Q0170911">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoQ0170911" name="pago[Q0170911][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;1384){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoQ0170911" name="pago[Q0170911][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoQ0170911" name="pago[Q0170911][iddesembolso]" value="Q0170911" disabled="">
				<input type="hidden" id="saldoQ0170911" name="pago[Q0170911][saldo]" value="1384" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/001237" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/001237" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>62</td>
		<td>003431</td>
		<td>13/05/2019</td>
		<td>S/.500.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.265.00</td>
		<td class="text-danger">4 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>QUIROZ ROJAS YULI MERY</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003431][checkiddesembolso]" class="checkpagar" value="Mo003431" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003431" name="pago[Mo003431][monto]" placeholder="0.00" value="20">
				<input type="hidden" id="estadoMo003431" name="pago[Mo003431][estado]" value="NO">
				<input type="hidden" id="iddesembolsoMo003431" name="pago[Mo003431][iddesembolso]" value="Mo003431">
				<input type="hidden" id="saldoMo003431" name="pago[Mo003431][saldo]" value="265">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003431" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003431" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>63</td>
		<td>003604</td>
		<td>27/05/2019</td>
		<td>S/.300.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.305.20</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>RIVERA ARGANDOÑA CARMELA LUZ</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003604][checkiddesembolso]" class="checkpagar" value="Mo003604" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003604" name="pago[Mo003604][monto]" placeholder="0.00" value="10.9">
				<input type="hidden" id="estadoMo003604" name="pago[Mo003604][estado]" value="NO">
				<input type="hidden" id="iddesembolsoMo003604" name="pago[Mo003604][iddesembolso]" value="Mo003604">
				<input type="hidden" id="saldoMo003604" name="pago[Mo003604][saldo]" value="305.2">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003604" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003604" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>64</td>
		<td>003630</td>
		<td>30/05/2019</td>
		<td>S/.600.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.654.00</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>RIVERA ARGANDOÑA CARMELA LUZ</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Th003630][checkiddesembolso]" class="checkpagar" value="Th003630">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTh003630" name="pago[Th003630][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;654){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTh003630" name="pago[Th003630][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTh003630" name="pago[Th003630][iddesembolso]" value="Th003630" disabled="">
				<input type="hidden" id="saldoTh003630" name="pago[Th003630][saldo]" value="654" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003630" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003630" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>65</td>
		<td>003419</td>
		<td>11/05/2019</td>
		<td>S/.1500.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.817.50</td>
		<td class="text-danger">2 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>RIVERA CABALLERO MARIA FERNANDA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Sa003419][checkiddesembolso]" class="checkpagar" value="Sa003419" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoSa003419" name="pago[Sa003419][monto]" placeholder="0.00" value="54.5">
				<input type="hidden" id="estadoSa003419" name="pago[Sa003419][estado]" value="NO">
				<input type="hidden" id="iddesembolsoSa003419" name="pago[Sa003419][iddesembolso]" value="Sa003419">
				<input type="hidden" id="saldoSa003419" name="pago[Sa003419][saldo]" value="817.5">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003419" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003419" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>66</td>
		<td>003536</td>
		<td>22/05/2019</td>
		<td>S/.800.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.696.90</td>
		<td class="text-danger">2 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>RIVERA CABALLERO MARIA FERNANDA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003536][checkiddesembolso]" class="checkpagar" value="We003536" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003536" name="pago[We003536][monto]" placeholder="0.00" value="29">
				<input type="hidden" id="estadoWe003536" name="pago[We003536][estado]" value="NO">
				<input type="hidden" id="iddesembolsoWe003536" name="pago[We003536][iddesembolso]" value="We003536">
				<input type="hidden" id="saldoWe003536" name="pago[We003536][saldo]" value="696.9">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003536" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003536" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>67</td>
		<td>003405</td>
		<td>10/05/2019</td>
		<td>S/.400.00</td>
		<td>
			Nuevo		</td>
		<td>DIARIO</td>
		<td>S/.196.40</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>SANCHEZ  CABALLERO JUAN CARLOS</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Fr003405][checkiddesembolso]" class="checkpagar" value="Fr003405" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoFr003405" name="pago[Fr003405][monto]" placeholder="0.00" value="15">
				<input type="hidden" id="estadoFr003405" name="pago[Fr003405][estado]" value="NO">
				<input type="hidden" id="iddesembolsoFr003405" name="pago[Fr003405][iddesembolso]" value="Fr003405">
				<input type="hidden" id="saldoFr003405" name="pago[Fr003405][saldo]" value="196.4">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003405" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003405" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>68</td>
		<td>003590</td>
		<td>27/05/2019</td>
		<td>S/.400.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.406.80</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>SANCHEZ CABALLERO RICARDO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003590][checkiddesembolso]" class="checkpagar" value="Mo003590">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003590" name="pago[Mo003590][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;406.8){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoMo003590" name="pago[Mo003590][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoMo003590" name="pago[Mo003590][iddesembolso]" value="Mo003590" disabled="">
				<input type="hidden" id="saldoMo003590" name="pago[Mo003590][saldo]" value="406.8" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003590" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003590" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>69</td>
		<td>003460</td>
		<td>15/05/2019</td>
		<td>S/.400.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.290.00</td>
		<td class="text-danger">3 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>SANCHEZ CABALLERO RICARDO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003460][checkiddesembolso]" class="checkpagar" value="We003460">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003460" name="pago[We003460][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;290){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoWe003460" name="pago[We003460][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoWe003460" name="pago[We003460][iddesembolso]" value="We003460" disabled="">
				<input type="hidden" id="saldoWe003460" name="pago[We003460][saldo]" value="290" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003460" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003460" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>70</td>
		<td>003519</td>
		<td>20/05/2019</td>
		<td>S/.1000.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.878.00</td>
		<td class="text-danger">4 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>SANTAMARIA SANTIAGO ANDRES </td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003519][checkiddesembolso]" class="checkpagar" value="Mo003519" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003519" name="pago[Mo003519][monto]" placeholder="0.00" value="36.4">
				<input type="hidden" id="estadoMo003519" name="pago[Mo003519][estado]" value="NO">
				<input type="hidden" id="iddesembolsoMo003519" name="pago[Mo003519][iddesembolso]" value="Mo003519">
				<input type="hidden" id="saldoMo003519" name="pago[Mo003519][saldo]" value="878">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003519" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003519" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>71</td>
		<td>003609</td>
		<td>28/05/2019</td>
		<td>S/.800.00</td>
		<td>
			RCS		</td>
		<td>SEMANAL</td>
		<td>S/.880.00</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>SANTIAGO AQUINO JACINTA</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Tu003609][checkiddesembolso]" class="checkpagar" value="Tu003609">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTu003609" name="pago[Tu003609][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;880){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTu003609" name="pago[Tu003609][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTu003609" name="pago[Tu003609][iddesembolso]" value="Tu003609" disabled="">
				<input type="hidden" id="saldoTu003609" name="pago[Tu003609][saldo]" value="880" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003609" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003609" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>72</td>
		<td>003347</td>
		<td>06/05/2019</td>
		<td>S/.300.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.107.00</td>
		<td class="text-danger">7 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>SILVA CACIQUE MARCO ANTONIO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003347][checkiddesembolso]" class="checkpagar" value="Mo003347" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003347" name="pago[Mo003347][monto]" placeholder="0.00" value="22">
				<input type="hidden" id="estadoMo003347" name="pago[Mo003347][estado]" value="NO">
				<input type="hidden" id="iddesembolsoMo003347" name="pago[Mo003347][iddesembolso]" value="Mo003347">
				<input type="hidden" id="saldoMo003347" name="pago[Mo003347][saldo]" value="107">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003347" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003347" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>73</td>
		<td>003532</td>
		<td>21/05/2019</td>
		<td>S/.200.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.166.90</td>
		<td class="text-danger">3 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>SOLIS GAMARRA JAVIER</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Tu003532][checkiddesembolso]" class="checkpagar" value="Tu003532">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTu003532" name="pago[Tu003532][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;166.9){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTu003532" name="pago[Tu003532][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTu003532" name="pago[Tu003532][iddesembolso]" value="Tu003532" disabled="">
				<input type="hidden" id="saldoTu003532" name="pago[Tu003532][saldo]" value="166.9" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003532" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003532" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>74</td>
		<td>000237</td>
		<td>27/03/2018</td>
		<td>S/.500.00</td>
		<td>
			Nuevo		</td>
		<td>DIARIO</td>
		<td>S/.69.90</td>
		<td class="text-danger">336 dias</td>
		<td class="text-danger"><strong>202 dias</strong></td>
		<td>SOLIS SILVA MIRIAN</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[S3270311][checkiddesembolso]" class="checkpagar" value="S3270311">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoS3270311" name="pago[S3270311][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;69.9){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoS3270311" name="pago[S3270311][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoS3270311" name="pago[S3270311][iddesembolso]" value="S3270311" disabled="">
				<input type="hidden" id="saldoS3270311" name="pago[S3270311][saldo]" value="69.9" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/000237" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/000237" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>75</td>
		<td>001929</td>
		<td>03/12/2018</td>
		<td>S/.400.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.263.00</td>
		<td class="text-danger">140 dias</td>
		<td class="text-danger"><strong>29 dias</strong></td>
		<td>SUAREZ PILLCO RICARDO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[S1031212][checkiddesembolso]" class="checkpagar" value="S1031212">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoS1031212" name="pago[S1031212][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;263){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoS1031212" name="pago[S1031212][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoS1031212" name="pago[S1031212][iddesembolso]" value="S1031212" disabled="">
				<input type="hidden" id="saldoS1031212" name="pago[S1031212][saldo]" value="263" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/001929" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/001929" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>76</td>
		<td>001940</td>
		<td>04/12/2018</td>
		<td>S/.500.00</td>
		<td>
			Paralelo		</td>
		<td>SEMANAL</td>
		<td>S/.398.70</td>
		<td class="text-danger">167 dias</td>
		<td class="text-danger"><strong>154 dias</strong></td>
		<td>SUAREZ PILLCO RICARDO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[S3041217][checkiddesembolso]" class="checkpagar" value="S3041217">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoS3041217" name="pago[S3041217][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;398.7){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoS3041217" name="pago[S3041217][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoS3041217" name="pago[S3041217][iddesembolso]" value="S3041217" disabled="">
				<input type="hidden" id="saldoS3041217" name="pago[S3041217][saldo]" value="398.7" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/001940" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/001940" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>77</td>
		<td>003584</td>
		<td>25/05/2019</td>
		<td>S/.800.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.782.00</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>TOLENTINO ANCHILLO JHOCEP CIRO </td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Sa003584][checkiddesembolso]" class="checkpagar" value="Sa003584" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoSa003584" name="pago[Sa003584][monto]" placeholder="0.00" value="30">
				<input type="hidden" id="estadoSa003584" name="pago[Sa003584][estado]" value="NO">
				<input type="hidden" id="iddesembolsoSa003584" name="pago[Sa003584][iddesembolso]" value="Sa003584">
				<input type="hidden" id="saldoSa003584" name="pago[Sa003584][saldo]" value="782">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003584" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003584" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>78</td>
		<td>003290</td>
		<td>29/04/2019</td>
		<td>S/.400.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.85.60</td>
		<td class="text-danger">2 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>VARA ANAYA EDITH ROSMERY</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Mo003290][checkiddesembolso]" class="checkpagar" value="Mo003290" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoMo003290" name="pago[Mo003290][monto]" placeholder="0.00" value="14.6">
				<input type="hidden" id="estadoMo003290" name="pago[Mo003290][estado]" value="NO">
				<input type="hidden" id="iddesembolsoMo003290" name="pago[Mo003290][iddesembolso]" value="Mo003290">
				<input type="hidden" id="saldoMo003290" name="pago[Mo003290][saldo]" value="85.6">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003290" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003290" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>79</td>
		<td>003543</td>
		<td>22/05/2019</td>
		<td>S/.1000.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.871.60</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>VARA ANAYA EDITH ROSMERY</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003543][checkiddesembolso]" class="checkpagar" value="We003543" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003543" name="pago[We003543][monto]" placeholder="0.00" value="36.4">
				<input type="hidden" id="estadoWe003543" name="pago[We003543][estado]" value="NO">
				<input type="hidden" id="iddesembolsoWe003543" name="pago[We003543][iddesembolso]" value="We003543">
				<input type="hidden" id="saldoWe003543" name="pago[We003543][saldo]" value="871.6">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003543" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003543" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>80</td>
		<td>003275</td>
		<td>27/04/2019</td>
		<td>S/.1200.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.309.60</td>
		<td class="text-danger">6 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>VELA MORALES FRANCISCO ENRIQUE</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Sa003275][checkiddesembolso]" class="checkpagar" value="Sa003275" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoSa003275" name="pago[Sa003275][monto]" placeholder="0.00" value="26">
				<input type="hidden" id="estadoSa003275" name="pago[Sa003275][estado]" value="NO">
				<input type="hidden" id="iddesembolsoSa003275" name="pago[Sa003275][iddesembolso]" value="Sa003275">
				<input type="hidden" id="saldoSa003275" name="pago[Sa003275][saldo]" value="309.6">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003275" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003275" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>81</td>
		<td>003341</td>
		<td>04/05/2019</td>
		<td>S/.700.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.340.00</td>
		<td class="text-danger">6 dias</td>
		<td class="text-danger"><strong>2 dias</strong></td>
		<td>VELA MORALES FRANCISCO ENRIQUE</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Sa003341][checkiddesembolso]" class="checkpagar" value="Sa003341">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoSa003341" name="pago[Sa003341][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;340){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoSa003341" name="pago[Sa003341][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoSa003341" name="pago[Sa003341][iddesembolso]" value="Sa003341" disabled="">
				<input type="hidden" id="saldoSa003341" name="pago[Sa003341][saldo]" value="340" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003341" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003341" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>82</td>
		<td>003616</td>
		<td>28/05/2019</td>
		<td>S/.500.00</td>
		<td>
			Paralelo		</td>
		<td>DIARIO</td>
		<td>S/.526.80</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>VELA MORALES FRANCISCO ENRIQUE</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Tu003616][checkiddesembolso]" class="checkpagar" value="Tu003616">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTu003616" name="pago[Tu003616][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;526.8){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoTu003616" name="pago[Tu003616][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoTu003616" name="pago[Tu003616][iddesembolso]" value="Tu003616" disabled="">
				<input type="hidden" id="saldoTu003616" name="pago[Tu003616][saldo]" value="526.8" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003616" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003616" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>83</td>
		<td>003550</td>
		<td>22/05/2019</td>
		<td>S/.1200.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.1,046.40</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>VELA MORALES FRANCISCO ENRIQUE</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003550][checkiddesembolso]" class="checkpagar" value="We003550">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003550" name="pago[We003550][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;1046.4){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoWe003550" name="pago[We003550][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoWe003550" name="pago[We003550][iddesembolso]" value="We003550" disabled="">
				<input type="hidden" id="saldoWe003550" name="pago[We003550][saldo]" value="1046.4" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003550" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003550" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>84</td>
		<td>003577</td>
		<td>25/05/2019</td>
		<td>S/.700.00</td>
		<td>
			RSS		</td>
		<td>SEMANAL</td>
		<td>S/.763.00</td>
		<td class="">0 dias</td>
		<td class=""><strong>0 dias</strong></td>
		<td>VERDI PADILLA NINO LUIS</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Sa003577][checkiddesembolso]" class="checkpagar" value="Sa003577">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoSa003577" name="pago[Sa003577][monto]" placeholder="0.00" value="" onfocusout="if($(this).val()&gt;763){ alert(&#39;EL MONTO ES MAYOR AL SALDO&#39;); }" disabled="">
				<input type="hidden" id="estadoSa003577" name="pago[Sa003577][estado]" value="NO" disabled="">
				<input type="hidden" id="iddesembolsoSa003577" name="pago[Sa003577][iddesembolso]" value="Sa003577" disabled="">
				<input type="hidden" id="saldoSa003577" name="pago[Sa003577][saldo]" value="763" disabled="">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003577" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003577" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>85</td>
		<td>003606</td>
		<td>28/05/2019</td>
		<td>S/.3000.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.3,074.00</td>
		<td class="text-danger">1 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>VILLA CALDERON AURELIO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[Tu003606][checkiddesembolso]" class="checkpagar" value="Tu003606" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoTu003606" name="pago[Tu003606][monto]" placeholder="0.00" value="106">
				<input type="hidden" id="estadoTu003606" name="pago[Tu003606][estado]" value="NO">
				<input type="hidden" id="iddesembolsoTu003606" name="pago[Tu003606][iddesembolso]" value="Tu003606">
				<input type="hidden" id="saldoTu003606" name="pago[Tu003606][saldo]" value="3074">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003606" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003606" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<td>86</td>
		<td>003539</td>
		<td>22/05/2019</td>
		<td>S/.3000.00</td>
		<td>
			RCS		</td>
		<td>DIARIO</td>
		<td>S/.2,834.00</td>
		<td class="text-danger">4 dias</td>
		<td class="text-danger"><strong>1 dias</strong></td>
		<td>VILLA CALDERON AURELIO</td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="checkbox" name="pago[We003539][checkiddesembolso]" class="checkpagar" value="We003539" checked="true">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto" id="montoWe003539" name="pago[We003539][monto]" placeholder="0.00" value="109">
				<input type="hidden" id="estadoWe003539" name="pago[We003539][estado]" value="NO">
				<input type="hidden" id="iddesembolsoWe003539" name="pago[We003539][iddesembolso]" value="We003539">
				<input type="hidden" id="saldoWe003539" name="pago[We003539][saldo]" value="2834">
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/plandepagosopdf/003539" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="http://localhost/tuamigo/index.php/pagos/posiciondetallepdf/003539" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
		<tr>
		<th colspan="6" align="right">TOTAL</th>
		<th>S/.144,353.00</th>
		<th></th>
		<th></th>
	</tr>
</tbody></table>				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="mensajedecarga" class="small">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
					</div>
					<div class="col-md-2">
						FECHA DE PAGO : 
					</div>
					<div class="col-md-2">
						<input type="text" value="2019-05-31" class="form-control input-sm" readonly="">
					</div>
					<div class="col-md-2">
						<button type="submit" id="btnguardarpaga" class="btn btn-success pull-right">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
					</div>
				</div>
			</div>
		</div>
	</form>	
	<br>
</div>
</div>
	<script type="text/javascript" src="http://localhost/tuamigo/activos/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="http://localhost/tuamigo/activos/bootstrap3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://localhost/tuamigo/activos/js/miscript.js"></script>
	<script type="text/javascript" src="http://localhost/tuamigo/activos/js/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="http://localhost/tuamigo/activos/js/scriptgeneral.js"></script>
</body>
</html>