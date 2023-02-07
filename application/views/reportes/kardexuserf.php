<?php 
$sum=0;
 ?>
<table class="table table-striped table-hover table-bordered small">
	<tr>
		<th>NRO</th>
		<th>ID SOLICITUD</th>
		<th>ID DESEMBOLSO</th>
		<th>CLIENTE</th>
		<th>FECHA HORA</th>
		<th>MONTO</th>
		<th>ASESOR</th>
	</tr>
	<?php $i=1; foreach($vistakardex as $row){ ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row['idsolicitud'] ?></td>
		<td><?php echo $row['iddesembolso'] ?></td>
		<td><?php echo $row['apenom'] ?></td>
		<td><?php echo $row['fecha_hora_reg'] ?></td>
		<td>S/.<?php echo $row['montopagado'] ?></td>
		<td><?php echo $row['idasesor'] ?></td>
	</tr>
	<?php $sum=$sum+$row['montopagado']; $i++; }?>
	<tr>
		<td colspan="5" align="right">TOTAL</td>
		<td>S/.<?php echo number_format($sum,2); ?></td>
		<td></td>
	</tr>
</table>

<h4>DOCO</h4>
<br>
<table class="table table-striped table-hover table-bordered small">
	<tr>
		<th>NRO</th>
		<th>CODIGO</th>
		<th>CLIENTE</th>
		<th>FECHA HORA</th>
		<th>MONTO</th>
		<th>ASESOR</th>
	</tr>
	<?php $i=1; $sum=0; foreach($kardexahorro as $row){ ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row['codigo'] ?></td>
		<td><?php echo $row['apenom'] ?></td>
		<td><?php echo $row['fecha_hora'] ?></td>
		<td>S/.<?php echo $row['monto'] ?></td>
		<td><?php echo $row['idusuario'] ?></td>
	</tr>
	<?php $sum=$sum+$row['monto']; $i++; } ?>
	<tr>
		<td colspan="5" align="right">TOTAL</td>
		<td>S/.<?php echo number_format($sum,2); ?></td>
		<td></td>
	</tr>
</table>

