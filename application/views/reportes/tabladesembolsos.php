<table class="table table-striped table-bordered table-hover table-condensed small" width="100%" id="registrospagos">
	<tr>
		<th>NRO</th>
		<th>ESTADO</th>
		<th>FECHA DESEMB</th>
		<th>APELLIDOS Y NOMBRES</th>
		<th>MONTO SOLICITUD</th>
		<th>TIPO</th>
		<th>TIPO PLAZO</th>
		<th>ASESOR</th>
		<th>AGENCIA</th>
	</tr>
	<?php $sum=0; $i=0; foreach($registros as $row) : $i++; ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['estado'] ?></td>
		<td><?php echo $row['fecha_hora'] ?></td>
		<td><?php echo $row['apenom'] ?></td>
		<td>S/.<?php echo $row['monto']; $sum+=$row['monto']; ?></td>
		<td><?php echo $row['tipo']; ?></td>
		<td><?php echo $row['tipoplazo'] ?></td>
		<td><?php echo $row['idasesor'] ?></td>
		<td><?php echo $row['agencia'] ?></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="5">TOTAL</td>
		<td>S/. <?php echo $sum; ?></td>
		<td></td>
	</tr>
</table>
