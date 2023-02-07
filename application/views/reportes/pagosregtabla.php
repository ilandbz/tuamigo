
<table class="table table-striped table-bordered table-hover table-condensed small" width="100%" id="registrospagos">
	<tr>
		<th>NRO</th>
		<th>FECHA HORA</th>
		<th>APELLIDOS Y NOMBRES</th>
		<th>COD. DESEM.</th>
		<th>PLAZO</th>
		<th>MONTO</th>

		<!-- <th>MORA</th> -->
		<th>COBRAD. POR</th>
	</tr>
	<?php $sum=0; $i=0; foreach($registros as $row) : $i++; ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['fecha_hora_reg'] ?></td>
		<td><?php echo $row['apenom'] ?></td>
		<td><?php echo $row['iddesembolso'] ?></td>
		<td><?php echo $row['tipoplazo'] ?></td>
		<td>S/.<?php echo $row['montopagado']; $sum+=$row['montopagado']; ?></td>
		<td><?php echo $row['idusuario'] ?></td>
		<td></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="5">TOTAL</td>
		<td>S/. <?php echo $sum; ?></td>
		<td></td>
	</tr>
</table>
