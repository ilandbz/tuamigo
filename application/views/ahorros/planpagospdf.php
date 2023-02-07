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
table.mitabla {
  border-collapse: collapse;
}

table.mitabla, table.mitabla th, table.mitabla td {
  border: 1px solid black;
}
</style>
</head>
<body>
<img src="<?= base_url() ?>activos/images/emprender.jpg" alt="" width="120px">
	<div align="center">
		<h3>PLAN DE PAGOS</h3>
	</div>
	<table width="100%">
		<tr>
			<td>CODCLIENTE : <?php echo $solicitud['codcliente'] ?></td>
			<td colspan="3">APELLIDOS Y NOMBRES : <?php echo $solicitud['apenom'] ?></td>
		</tr>
		<tr>
			<td>IDSOLICITUD : <?php echo $solicitud['codigo'] ?></td><td>ASESOR : <?php echo $solicitud['idusuario'] ?></td>
			<td>FECHA SOLICITUD : <?php echo $solicitud['fechainicio'] ?></td><td>MONTO : S/.<?php echo $solicitud['monto'] ?></td>
		</tr>
		<tr>
			<?php $totalapagar = $solicitud['monto']*$solicitud['nrocuotas']; ?>
			<td></td><td></td>
			<td>PLAZO : <?php echo $solicitud['plazo'].' '.$solicitud['tipoplazo'] ?></td><td>TOTAL : S/.<?php echo $totalapagar ?></td>
		</tr>
	</table>
	<h4>LISTA DE CUOTAS</h4>
	<table class="mitabla" width="100%" class="conborde">
		<tr>
			<th>NRO</th>
			<th>DIA LETRAS</th>
			<th>FECHA PROG.</th>
			<th>CUOTA</th>
			<th>MONTO PAGADO</th>
			<th>SALDO</th>			
			<th>FECHA DE PAGO</th>
		</tr>
		<?php 

$saldo=$totalapagar;
		foreach($cuotaspago as $row) :

		 ?>
		<tr>
			<td><?php echo $row['nrocuota'] ?></td>
			<td><?php echo $row['nombredia'] ?></td>
			<td><?php echo $row['fechaprog'] ?></td>
			<td><?php echo $row['cuota'] ?></td>
			<td><?php echo $row['montopagado'];
			$saldo-=$row['montopagado'];
			 ?></td>
			 <td>S/.<?php echo number_format($saldo,2); ?></td>
			<td><?php 
					echo (is_null($row['fechareg']) ? '' : $row['fechareg']);
			 ?></td>
		</tr>
		<?php
		endforeach; 
		?>
	<tr>
		<td colspan="8" align="right">TOTAL DIAS MORA </td><td align="center"></td>	
	</tr>
	<tr>
		<td colspan="8" align="right">DEUDA MORA </td><td align="center"></td>	
	</tr>	
	<tr>
		<td colspan="8" align="right">TOTAL MORA PAGADO</td><td align="center"></td>	
	</tr>
	</table>

<br>
<br>
<br>
<br>
	<b>IMPRESION : </b><?php echo date('d-m-Y') ?> 

</body>
</html>