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
<img src="<?= base_url() ?>activos/images/emprender.jpg" alt="" width="120px">
	<div align="center">
		<h3>KARDEX DE PAGOS</h3>
	</div>
	<?php
	$totalpagado=0;
	 ?>
	<table width="100%">
		<tr>
			<td>CODCLIENTE : <?php echo $cliente['codcliente'] ?></td>
			<td colspan="3">APELLIDOS Y NOMBRES : <?php echo $cliente['apenom'] ?></td>
		</tr>
		<tr>
			<td>IDSOLICITUD : <?php echo $solicitud['idsolicitud'] ?></td><td>ASESOR : <?php echo $solicitud['idasesor'] ?></td>
			<td>FECHA SOLICITUD : <?php echo $solicitud['fecha'] ?></td><td>MONTO : S/.<?php echo $desembolso['monto'] ?></td>
		</tr>
		<tr>
			<td>FECHA DESEMBOLSO : <?php echo $desembolso['fecha_hora'] ?></td><td>INTERES : <?php echo $desembolso['interes'] ?>%</td>
			<td>PLAZO : <?php echo $desembolso['plazo'].' '.$desembolso['unidplazo'] ?></td><td>TOTAL : S/.<?php echo $desembolso['total'] ?></td>
		</tr>
	</table>
	<br>
	<h4>LISTA DE CUOTAS</h4>
	<table width="100%" class="conborde">
		<tr>
			<th>ITEM</th>
			<th>FECHA PROG.</th>
			<th>MONTO PAGADO</th>
			<th>SALDO</th>
			<th>USUARIO</th>
		</tr>
	<?php 
$saldo = $desembolso['total'];
 ?>
	<?php foreach($kardex as $row) : ?>
 	<tr>
		<td><?php echo $row['id'] ?></td>
		<td><?php echo $row['fecha_hora_reg'] ?></td>
		<td>S/.<?php echo $row['montopagado']; $totalpagado=$totalpagado+$row['montopagado'];
		$saldo = $saldo - $row['montopagado'];	?></td>
		<td>S/.<?php echo number_format($saldo,2); ?></td>
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