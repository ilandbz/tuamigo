<table class="table table-striped table-bordered table-hover table-condensed small" style="font-size:10px;" width="100%">
	<tr>
		<th>NRO</th>
		<th>FECHA HORA</th>
		<th>CODUSUARIO</th>
		<th>CANTIDAD (S/.)</th>
		<th>TIPO</th>
		<th>SALDO (S/.)</th>
		<th>DESCRIPCION</th>
		<th></th>
	</tr>
	<?php $subtotal=0; $i=1; foreach($registros as $row) : ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['fecha_hora'] ?></td>
		<td><?php echo $row['codusuario'] ?></td>
		<td><?php echo $row['cantidad'] ?></td>
		<td><?php echo $row['tipo'] ?></td>
		<td><?php echo $row['saldo'] ?></td>
		<td><?php echo $row['descripcion'] ?></td>
		<td>
		<?php if($this->session->userdata('tipouser')==3){ ?>
		<a href="<?php echo base_url() ?>index.php/caja/eliminarregcaja/<?php echo $row['idreg'] ?>" class="btn btn-danger btn-xs eliminar" title="Eliminar "><span class="glyphicon glyphicon-remove"></span></a>
		<?php } ?>
		</td>
	</tr>
	<?php $subtotal+=$row['cantidad']; ?>	

	<?php endforeach; ?>

	<tr>
		<th colspan="3">SUBTOTAL (S/.)</th>
		<th colspan="5"><?php echo $subtotal ?></th>
	</tr>
</table>