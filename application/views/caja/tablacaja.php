<table class="table table-striped table-bordered table-hover table-condensed small" width="100%">
	<tr>
		<th>NRO</th>
		<th>FECHA HORA</th>
		<th>CODUSUARIO</th>
		<th>CANTIDAD</th>
		<th>TIPO</th>
		<th>SALDO</th>
		<th>DESCRIPCION</th>
	</tr>
	<?php $i=1; foreach($registros as $row) : ?>
	<tr class="<?= $row['eliminados']==0 ? 'bg-danger' : '' ?>">
		<td><?php echo $i; ?></td>
		<td><?php echo $row['fecha_hora'] ?></td>
		<td><?php echo $row['codusuario'] ?></td>
		<td>S/.<?php echo $row['cantidad'] ?></td>
		<td><?php echo $row['tipo'] ?></td>
		<td>S/.<?php echo $row['saldo'] ?></td>
		<td><?php echo $row['descripcion'] ?></td>
	</tr>
	<?php $i++; endforeach; ?>
</table>