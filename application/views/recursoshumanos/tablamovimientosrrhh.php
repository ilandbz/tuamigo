<?php if(count($operaciones)>0){ $total=0; ?>
<table class="table table-striped">
	<tr>
		<th>NRO</th>
		<th>FECHA HORA</th>
		<th>TIPO</th>
		<th>MONTO</th>
		<th>DNI</th>
		<th>DESCRIPCION</th>
		<th>USUARIO</th>
	</tr>
	<?php $i=0; foreach($operaciones as $row) { $i++; ?>
	<tr>
		<th><?= $i ?></th>
		<th><?= $row['fechareg'] ?></th>
		<th><?= $row['tipo'] ?></th>
		<th><?= $row['cantidad']; $total+=$row['cantidad'] ?></th>
		<th><?= $row['dni'] ?></th>
		<th><?= $row['tiporegistro'].' '.$row['descripcion'] ?></th>
		<th><?= $row['usuario'] ?></th>
	</tr>
	<?php } ?>
	<tr>
		<th colspan="3">TOTAL</th>
		<th colspan="4"><?= number_format($total,2) ?></th>
	</tr>
</table>
<?php } ?>
