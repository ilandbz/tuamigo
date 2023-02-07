<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
	<title>FINANCIERA EMPRENDER</title>
	<style type="text/css">
		body{
			font-size: 12px;

		}
		table.conborde th,table.conborde td{
		    border: 1px solid black;
		}
	</style>
</head>
<body>
	<div align="center">
		<h3>KARDEX DE PAGOS</h3>
	</div>
	<?php
	$totalpagado=0;
	 ?>
	<table width="100%">
		<tr>
			<td>CODCLIENTE : <?php echo $solicitud['codcliente'] ?></td>
			<td colspan="3">APELLIDOS Y NOMBRES : <?php echo $solicitud['apenom'] ?></td>
		</tr>
		<tr>
			<td>IDSOLICITUD : <?php echo $solicitud['codigo'] ?></td><td>ASESOR : <?php echo $solicitud['idusuario'] ?></td>
			<td>FECHA SOLICITUD : <?php echo $solicitud['fecha_registro'] ?></td><td>MONTO : S/.<?php echo $solicitud['monto'] ?></td>
		</tr>
		<tr>
			<td>FECHA INICIO : <?php echo $solicitud['fechainicio'] ?></td><td></td>
			<td>PLAZO : <?php echo $solicitud['plazo'].' '.$solicitud['tipoplazo'] ?></td><td></td>
		</tr>
	</table>
	<br>
	<h4>LISTA DE CUOTAS</h4>
	<table width="100%" class="conborde">
		<tr>
			<th>ITEM</th>
			<th>FECHA PAG.</th>
			<th>MONTO PAGADO</th>
			<th>USUARIO</th>
		</tr>
	<?php 
 ?>
	<?php foreach($kardex as $row) : ?>
 	<tr>
		<td><?php echo $row['nro'] ?></td>
		<td><?php echo $row['fecha_hora'] ?></td>
		<td>S/.<?php echo $row['monto']; $totalpagado=$totalpagado+$row['monto']; ?></td>
		<td><?php echo $row['idusuario'] ?></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<th colspan="2" align="right">TOTAL</th>
		<th align="left">S/.<?php echo number_format($totalpagado,2) ?></th>
	</tr>
	</table>

<br>
<br>

	<b>IMPRESION : </b><?php echo date('d-m-Y') ?> 
</body>
</html>