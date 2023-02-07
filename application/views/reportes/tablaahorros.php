<table class="table table-striped table-bordered table-hover table-condensed small" width="100%">
	<tr>
		<th>NRO</th>
		<th>CODIGO</th>
		<th>ESTADO</th>
		<th>FECHA</th>
		<th>APELLIDOS Y NOMBRES</th>
		<th>MONTO SOLICITUD</th>
		<th>TOTAL PAGADO</th>
		<th>TIPO PLAZO</th>
		<th>ASESOR</th>
		<th>AGENCIA</th>
	</tr>
	<?php $sum=0; $totalpagado=0; $i=0; foreach($registros as $row) : $i++; ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['codigo'] ?></td>
		<td><?php echo $row['estado'] ?></td>
		<td><?php echo $row['fecha_registro'] ?></td>
		<td><?php echo $row['apenom'] ?></td>
		<td>S/.<?php echo $row['monto']; $sum+=$row['monto']; ?></td>
		<td>S/.<?php echo $row['totalpagado']; $totalpagado+=$row['totalpagado'] ?></td>
		<td><?php echo $row['tipoplazo'] ?></td>
		<td><?php echo $row['idusuario'] ?></td>
		<td><?php echo $row['agencia'] ?></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="5">TOTAL</td>
		<td>S/. <?php echo $sum; ?></td>
		<td>S/. <?php echo $totalpagado ?></td>
		<td></td>
		<td></td>
	</tr>
</table>
<table id="reportedocotb" class="" border="1">
	<tr>
		<th>NRO</th>
		<th>FECHA</th>
		<th>APELLIDOS Y NOMBRES</th>
		<th>TOTAL PAGADO</th>
	</tr>
	<?php $sum=0; $totalpagado=0; $i=0; foreach($registros as $row) : $i++; ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['fecha_registro'] ?></td>
		<td><?php echo ($row['apenom']) ?></td>
		<td>S/.<?php echo is_null($row['totalpagado']) ? '0.00' : number_format($row['totalpagado'],2); $totalpagado+=$row['totalpagado'] ?></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="3">TOTAL</td>
		<td>S/. <?php echo $totalpagado ?></td>
	</tr>
</table>