<div class="panel panel-info">
	<div class="panel-heading">
	LISTA DE USUARIOS
	</div>
	<div class="panel-body">
		<div class="container-fluid">
			<table class="table table-bordered table-condensed table-hover small">
				<tr>
					<th>N°</th>
					<th>CODUSUARIO</th>
					<th>DNI</th>
					<th>APELLIDOS Y NOMBRES</th>
					<th>CELULAR</th>
					<th>TIPO</th>
					<th>AGENCIA</th>
					<th></th>
				</tr>
		<?php $i=1; foreach($usuarios as $row): ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['codusuario'] ?></td>
				<td><?php echo $row['dni'] ?></td>
				<td><?php echo $row['apenom'] ?></td>
				<td><?php echo $row['celular'] ?></td>
				<td><?php echo $row['nombretipo']; ?></td>
				<td><?php echo $row['agencia'] ?></td>
				<td><a title="Actualizar" href="<?php echo base_url() ?>index.php/inicio/actualizarusuarioform/<?php echo $row['codusuario'] ?>" class="btn btn-link"><span class="glyphicon glyphicon-pencil"></span></a></td>
			</tr>
		<?php $i++; endforeach; ?>
			</table>
		</div>		
	</div>
</div>
