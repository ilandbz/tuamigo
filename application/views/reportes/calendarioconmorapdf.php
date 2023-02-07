<!-- <!DOCTYPE html>
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
			<td>FECHA DESEMBOLSO : <?php echo $desembolso['fecha_hora'] ?></td><td>INTERES : <?php echo $desembolso['interes'] ?></td>
			<td>PLAZO : <?php echo $desembolso['plazo'].' '.$desembolso['unidplazo'] ?></td><td>TOTAL : S/.<?php echo $desembolso['total'] ?></td>
		</tr>
	</table>
	<br>
	<h4>LISTA DE CUOTAS</h4>
	<table width="100%" class="conborde">
		<tr>
			<th>NRO</th>
			<th>DIA LETRAS</th>
			<th>FECHA PROG.</th>
			<th>CUOTA</th>
			<th>SALDO</th>
			<th>PAGO</th>
			<th>MONTO PAG.</th>
			<th>FECHA DE PAGO</th>
			<th>MORA (días)</th>
		</tr>
	<?php 
$saldo = $desembolso['total'];
	$diasdemora = 0; ?>
	<?php foreach($cuotaspago as $row) : ?>
 	<tr>
		<td><?php echo $row['nrocuota'] ?></td>
		<td><?php echo $row['nombredia'] ?></td>
		<td><?php echo $row['fecha_prog'] ?></td>
		<td>S/.<?php echo $row['cuota'] ?></td>
		<td>S/.<?php echo ($saldo<0) ? '0.00' : $saldo ?></td>
 		<?php if($row['estado']==1){ ?>
		<td>SI</td>
		<td>
			S/. <?php echo $row['montopagado'];
				$saldo = $saldo - $row['montopagado'];
			 ?>
		</td>	
		<td>
			<?php echo $row['fechapago']; ?>
		</td>
		<td align="center"><?php echo $row['mora'] ?></td>
		<?php
			$diasdemora = $diasdemora + $row['mora'];
		 }else{ ?>
		<td>NO</td>
		<?php $saldo = $saldo - $row['cuota']; ?>
		<td>
		</td>
		<td>
		</td>
		<td></td>
		<?php } ?>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="8">TOTAL DIAS MORA </td><td align="center"><p class="text-danger"><?php echo $diasdemora ?></p></td>
	</tr>
	</table>
</body>
</html> -->