<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
	<title>FINANCIERA EMPRENDER</title>
</head>
<style>
	*{
		font-size: 11px;
	}
td, th {
    border: 1px solid black;
    text-align: center;
}
</style>
<body>
<img src="<?= base_url() ?>activos/images/emprender.jpg" alt="" width="120px">
<div align="center">
	<h2>PAGOS POR USUARIO</h2>
	<h3>FECHA <?php echo $fecha ?></h3>
	<br>
	<table class="" width="100%">
		<tr>
			<th>NRO</th>
			<th>ID SOLICITUD</th>
			<th>ID DESEMBOLSO</th>
			<th>CLIENTE</th>
			<th>FECHA HORA</th>
			<th>MONTO</th>
			<th>ASESOR</th>
		</tr>
		<?php $sum=0; $i=1; foreach($vistakardex as $row){ ?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $row['idsolicitud'] ?></td>
			<td align="left"><?php echo $row['iddesembolso'] ?></td>
			<td align="left"><?php echo $row['apenom'] ?></td>
			<td><?php echo $row['fecha_hora_reg'] ?></td>
			<td>S/.<?php echo $row['montopagado'] ?></td>
			<td><?php echo $row['idasesor'] ?></td>
		</tr>
		<?php $sum=$sum+$row['montopagado']; $i++; } ?>
		<tr>
			<td colspan="5" align="right">TOTAL</td>
			<td>S/.<?php echo number_format($sum,2); ?></td>
			<td></td>
		</tr>
	</table>
</div>

<br>
<br>

	<b>IMPRESION : </b><?php echo date('d-m-Y') ?> 
</body>
</html>