<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="<?php echo base_url() ?>activos/css/miestilo3.css">
	<title>FINANCIERA EMPRENDER</title>
<style type="text/css">
@page {
    margin-top: 2em;
    margin-left: 4.2em;
}
th,td{
	text-align: left;
}
table{
	font-size: 11px;
}
tr.conborde th, tr.conborde td{
    border: 1px solid black;
}
</style>

</head>
<body>
<div align="center">

	<img src="<?= base_url() ?>activos/images/emprender.jpg" alt="" width="120px">
	<h4>SOLICITUD</h4>
</div>
<table width="100%">
	<tr>
		<th>COD SOLICITUD</th><td><?php echo $SOLICITUD['idsolicitud'] ?></td>
		<th>Monto</th><td>S/.<?php echo $SOLICITUD['monto'] ?></td>
		<th>FECHA</th><td><?php echo $SOLICITUD['fecha'] ?></td>
	</tr>
	<tr>
		<th>PRODUCTO</th><td><?php echo $SOLICITUD['producto'] ?></td>
<?php 
switch ($SOLICITUD['tipoplazo']) {
	case 'DIARIO':
		$frecuencia = 'Dias';
		break;
	case 'SEMANAL':
		$frecuencia = 'Semanas';
		break;
	case 'QUINCENAL':
		$frecuencia = 'Quincenas';
		break;									
	case 'MENSUAL':
		$frecuencia = 'Mes';
		break;	
}

 ?>

		<th>PLAZO</th><td><?php echo $SOLICITUD['cantplazo'] ?>&nbsp;<?php echo $frecuencia ?></td>
		<th>TIPO PRESTAMO</th><td><?php echo $SOLICITUD['tipo'] ?></td>
	</tr>
	<tr>
		<th>ASESOR</th>
		<td colspan="3"><?php echo $asesor['apenom'] ?></td>
		<th>ID</th>
		<td><?php echo $SOLICITUD['idasesor'] ?></td>
	</tr>

	<tr class="conborde">
		<th style="padding-top:8px; padding-bottom:8px;" colspan="6" align="center">DATOS DEL CLIENTE</th>
	</tr>
	<tr class="conborde">
		<th>Apellidos y Nombres</th><td colspan="3"><?php echo $cliente['apenom'] ?></td><th>COD</th><td><?php echo $cliente['codcliente'] ?></td>
	</tr>
	<tr class="conborde">
		<th>DNI</th><td><?php echo $cliente['dni'] ?></td>
		<th>RUC</th><td><?php echo ($cliente['ruc']=='') ? 'NO TIENE' : $cliente['ruc'] ?></td>
		<th>EDAD</th><td><?php echo $edad ?></td>
	</tr>
	<tr class="conborde">
		<th>GENERO</th><td><?php echo ($cliente['sexo']=='M') ? 'MASCULINO' : 'FEMENINO' ?></td><td>&nbsp;</td>
		<th colspan="2">ESTADO CIVIL</th><td><?php echo $cliente['estadocivil'] ?></td>
	</tr>
	<tr class="conborde">
		<th colspan="2">GRADO INSTRUCCION</th><td><?php echo $cliente['grado_instr'] ?></td><td>&nbsp;</td>
		<th>NACIONALIDAD</th><td><?php echo $cliente['nacionalidad'] ?></td>
	</tr>
	<tr class="conborde">
		<th colspan="2">TIPO DE TRABAJADOR</th><td><?php echo $cliente['tipotrabajador'] ?></td><td>&nbsp;</td>
		<th>ESTADO</th><td><?php echo $cliente['estado'] ?></td>
	</tr>
	<tr class="conborde">
		<th>CELULAR</th><td><?php echo $cliente['celular'] ?></td><td>&nbsp;</td>
		<th>EMAIL</th><td colspan="2"><?php echo $cliente['email'] ?></td>
	</tr>	
	<tr class="conborde">
		<th style="padding-top:8px; padding-bottom:8px;" colspan="6" align="center">DOMICILIO CLIENTE</th>
	</tr>
	<tr class="conborde">
		<th>TIPO DE VIVIENDA</th><td colspan="5"><?php echo $cliente['tipovivienda'] ?></td>
	</tr>	
	<tr class="conborde">
		<th>DEPARTAMENTO</th><td><?php echo $distritodomic['departamento'] ?></td><th>PROVINCIA</th><td><?php echo $distritodomic['provincia'] ?></td><th>DISTRITO</th><td><?php echo $distritodomic['distrito'] ?></td>
	</tr>
	<tr class="conborde">
		<td colspan="6">
			<?php echo $cliente['tipovia'].' '.$cliente['nombrevia'].' NRO : '.$cliente['nro'].', Interior : '.$cliente['interior'].', MZ : '.$cliente['mz'].', Lote : '.$cliente['lote'].', '.$cliente['tipozona'].':'.$cliente['nombrezona']; ?>
		</td>
	</tr>
	<tr class="conborde">
		<th>REFERENCIA</th><td colspan="5"><?php echo $cliente['referencia'] ?></td>
	</tr>
	<tr class="conborde">
		<th style="padding-top:8px; padding-bottom:8px;" align="center" colspan="6">NEGOCIO</th>
	</tr>
	
	<?php if(!is_null($negocio)){ ?>
	<tr class="conborde">
		<th colspan="2">Nombre del Negocio</th><td colspan="4" align="left"><?php echo ($negocio['razonsocial']=='') ? 'NO TIENE' : $negocio['razonsocial'] ?></td>
	</tr>
	<tr class="conborde">
		<th>RUC</th><td><?php echo ($negocio['ruc']=='') ? 'NO TIENE' : $negocio['ruc'] ?></td>
		<th>Telefono/Cel</th><td colspan="3"><?php echo $negocio['tel_cel'] ?></td>
	</tr>
	<tr class="conborde">
		<th>Actividad</th><td><?php echo $negocio['actividad'] ?></td><th>Actividad Espec.</th><td colspan="4"><?php echo $negocio['actividad_espec'] ?></td>
	</tr>
	<tr class="conborde">
		<th>Inicio de Actividad</th><td><?php echo $negocio['inicio_actividad']; ?></td>
		<th colspan="2">TIEMPO DE ACTIVIDAD</th><td colspan="2"><?php echo $tiemponegocio; ?></td>
	</tr>
	<tr class="conborde">
		<th style="padding-top:8px; padding-bottom:8px;" colspan="6" align="center">DIRECCION NEGOCIO</th>
	</tr>
	<tr class="conborde">
		<th>DEPARTAMENTO</th><td><?php echo $distritoneg['departamento'] ?></td><th>PROVINCIA</th><td><?php echo $distritoneg['provincia'] ?></td><th>DISTRITO</th><td><?php echo $distritoneg['distrito'] ?></td>
	</tr>	
	<tr class="conborde">
		<td colspan="6"><?php echo $negocio['tipovia'].' '.$negocio['nombrevia'].' NRO : '.$negocio['Nro'].', Interior : '.$negocio['interior'].', MZ : '.$negocio['mz'].', Lote : '.$negocio['lote'].', '.$negocio['tipozona'].':'.$negocio['nombrezona'] ?></td>
	</tr>
	<tr class="conborde">
		<th>Referencia : </th><td colspan="5" align="left"><?php echo $negocio['referencia']; ?></td>
	</tr>
	<?php }else{ ?>
	<tr class="conborde">
		<td colspan="6">NO POSEE</td>
	</tr>
	<?php } ?>
	<tr class="conborde">
		<th style="padding-top:8px; padding-bottom:8px;" colspan="6" align="center">CONYUGUE</th>
	</tr>
	<?php if(!is_null($conyugue)){ ?>
	<tr class="conborde">
		<th colspan="2">Apellidos y Nombres</th><td colspan="4"><?php echo $conyugue['apenom'] ?></td>
	</tr>
	<tr class="conborde">
		<th>DNI</th><td align="left"><?php echo $conyugue['dni'] ?></td>
		<th>RUC</th><td align="left"><?php echo ($conyugue['ruc']=='') ? 'NO TIENE' : $conyugue['ruc'] ?></td>
		<th>EDAD</th><td align="left"><?php echo $edadconyugue ?></td>
	</tr>
	<tr class="conborde">
		<th colspan="2">GRADO INSTRUCCION</th><td colspan="2"><?php echo $conyugue['grado_instr'] ?></td>
		<th>NACIONALIDAD</th><td><?php echo $conyugue['nacionalidad'] ?></td>
	</tr>
	<tr class="conborde">
		<th colspan="2">TIPO DE TRABAJADOR</th><td colspan="4"><?php echo $conyugue['tipotrabajador'] ?></td>
	</tr>
	<?php }else{ ?>
	<tr class="conborde">
		<td colspan="6">NO POSEE</td>
	</tr>
	<?php } ?>
	<tr class="conborde">
		<th style="padding-top:8px; padding-bottom:8px;" colspan="6" align="center">AVAL</th>
	</tr>
	<?php if(!is_null($aval)){ ?>
	<tr class="conborde">
		<th colspan="2">Apellidos y Nombres</th><td colspan="4"><?php echo $aval['apenom'] ?></td>
	</tr>
	<tr class="conborde">
		<th>DNI</th><td align="left"><?php echo $aval['dniaval'] ?></td>
		<th>RUC</th><td align="left"><?php echo ($aval['ruc']=='') ? 'NO TIENE' : $aval['ruc'] ?></td>
		<th>EDAD</th><td align="left"><?php echo $edadaval ?></td>
	</tr>
	<tr class="conborde">
		<th colspan="2">GRADO INSTRUCCION</th><td><?php echo $aval['grado_instr'] ?></td><td>&nbsp;</td>
		<th>NACIONALIDAD</th><td><?php echo $aval['nacionalidad'] ?></td>
	</tr>
	<tr class="conborde">
		<th colspan="2">TIPO DE TRABAJADOR</th><td colspan="4"><?php echo $aval['tipotrabajador'] ?></td>
	</tr>
	<?php }else{ ?>
	<tr class="conborde">
		<td colspan="6">NO POSEE</td>
	</tr>
	<?php } ?>
	<tr class="conborde">
		<th style="padding-top:8px; padding-bottom:8px;" colspan="6" align="center">DOMICILIO AVAL</th>
	</tr>
	<?php if(is_null($aval)){ ?>	
	<tr class="conborde">
		<th>DEPARTAMENTO</th><td><?php echo $distritoaval['departamento'] ?></td><th>PROVINCIA</th><td><?php echo $distritoaval['provincia'] ?></td><th>DISTRITO</th><td><?php echo $distritoaval['distrito'] ?></td>
	</tr>
	<tr class="conborde">
		<td colspan="6">
			<?php echo $aval['tipovia'].' '.$aval['nombrevia'].' NRO : '.$aval['Nro'].', Interior : '.$aval['interior'].', MZ : '.$aval['mz'].', Lote : '.$aval['lote'].', '.$aval['tipozona'].':'.$aval['nombrezona']; ?>
		</td>
	</tr>
	<tr class="conborde">
		<th>REFERENCIA</th><td colspan="5"><?php echo $aval['referencia'] ?></td>
	</tr>
	<?php }else{ ?>
	<tr class="conborde">
		<td colspan="6">NO POSEE</td>
	</tr>
	<?php } ?>
</table>
<br>
<br><br>
<table width="100%">
	<tr>
		<td width="40%" align="center"><hr>FIRMA DEL CLIENTE</td>
		<td width="20%">&nbsp;</td>
		<td width="40%" align="center"><hr>CONYUGUE Y/O AVAL</td>
	</tr>
</table>

	<script type="text/javascript" src="<?php echo base_url() ?>activos/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>activos/bootstrap3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>activos/js/miscript2.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>activos/js/bootstrap-switch.min.js"></script>

</body>
</html>
