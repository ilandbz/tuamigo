<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
	<title>FINANCIERA EMPRENDER</title>
</head>
<style>
	*{
		font-size: 10px;
	}
table {
  border-collapse: collapse;
}
table, th, td {
  border: 1px solid black;
}
.table{
	width: 90%;
	margin: auto;
}
</style>
<body>
<img src="<?= base_url() ?>activos/images/emprender.jpg" alt="" width="120px">
<div align="center">
	<h1 style="text-decoration: underline; ">REPORTE DE INGRESOS Y EGRESOS A LA FECHA <?php echo date('d-m-Y') ?></h1>
	<h3>INGRESOS</h3>
	<table class="table">
		<tr class="success">
			<th width="8%">ITEM</th>
			<th width="17%">FECHA HORA</th>
			<th width="20%">INGRESO</th>
			<th>DESCRIPCION</th>
		</tr>
		<?php $i=0; $totaling=0; foreach($registroingcajahoy as $row) : $i++; ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['fecha_hora'] ?></td>
			<td>S/.<?php echo $row['cantidad']; $totaling+=$row['cantidad']; ?></td>
			<td><?php echo substr($row['descripcion'], 0, 130) ?></td>
		</tr>				
		<?php endforeach; ?>
		<tr>
			<th colspan="2">TOTAL : </th><th>S/. <?php echo number_format($totaling,2) ?></th><td></td>
		</tr>
	</table>
	<br>
	<h3>EGRESOS</h3>
	<table class="table">
		<tr class="warning">
			<th width="8%">ITEM</th>
			<th width="17%">FECHA HORA</th>
			<th width="20%">SALIDA</th>
			<th>DESCRIPCION</th>
		</tr>
		<?php $i=0; $totalsal=0; foreach($registroegrecajahoy as $row) : $i++; ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['fecha_hora'] ?></td>
			<td>S/.<?php echo $row['cantidad']; $totalsal+=$row['cantidad']; ?></td>
			<td><?php echo substr($row['descripcion'], 0, 130) ?></td>
		</tr>				
		<?php endforeach; ?>
		<tr>
			<th colspan="2">TOTAL : </th><th>S/. <?php echo number_format($totalsal,2) ?></th><td></td>
		</tr>
	</table>
	<br>
	<h4>REGISTRO ULTIMO DIA CIERRE</h4>
	<table class="" width="100%">
		<tr>
			<th>ITEM</th>
			<th>FECHA HORA</th>
			<th>CANTIDAD</th>
			<th>OBSERVACION</th>
			<th>IDUSUARIO</th>
		</tr>
		<?php $i=0; foreach ($registroscc as $row) { $i++; ?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $row['fecha_hora'] ?></td>
			<td>S/.<?php echo number_format($row['cantidad'],2) ?></td>
			<td><?php echo $row['observacion'] ?></td>
			<td><?php echo $row['idusuario'] ?></td>
		</tr>
		<?php }	 ?>
	</table>
	<br><br>
	<h2 style="font-size: 18px"><SMALL>SALDO DE CIERRE ACTUAL : </SMALL>S/.<?php echo $saldocaja ?></h3>

</div>
</body>
</html>