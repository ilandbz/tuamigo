<div class="table-responsive small">
	<table class="table table-striped">
		<tr>
			<th>DESCRIPCION</th>
			<th>VALOR</th>
			<th></th>
		</tr>
		<?php foreach($entidadesf as $row) : ?>
		<tr>
			<td><?php echo $row['desc_entidad'] ?></td>
			<td><?php echo $row['cantidad'] ?></td>
			<td><a href="<?php echo $row['id'] ?>" class="btn btn-danger btn-xs eliminardeudaentidad"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>