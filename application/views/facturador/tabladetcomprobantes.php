<table class="table table-bordered">
	<tr>
		<th>NRO</th>
		<th>IDSOLICITUD</th>
		<th>DESCRIPCION</th>
		<th>IMPORTE S/.</th>
	</tr>
	<?php $suma=0; $i=0; foreach ($detcomprobantes as $row) { $i++; ?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $row['idsolicitud'] ?></td>
		<td><?= $row['descripcion'] ?></td>
		<td><?= $row['importe']; $suma+=$row['importe'];; ?></td>
	</tr>
	<?php } ?>
	<tr>
	<tr>
		<th colspan="3">TOTAL</th>
		<th>S/. <?= number_format($suma,2) ?></th>
	</tr>
		
	</tr>
</table>