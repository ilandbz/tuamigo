<div class="container">
<h2>REGISTRO DE FERIADOS</h2>
	<form action="<?php echo base_url() ?>index.php/inicio/guardarferiado" class="form-horizontal" method="POST" name="cuadrarcaja">
<div class="row">
	<div class="form-group">
		<div class="col-md-3">
			<div class="input-group">
				<span class="input-group-addon">FECHA</span>
				<input type="date" name="fecha" value="<?= date('Y-m-d') ?>" class="form-control" required="true">
			</div>
		</div>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">DESCRIPCION</span>
				<input type="text" class="form-control" name="descripcion" required="true">
			</div>
		</div>
		<div class="col-md-3">
			<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-check"></span>&nbsp;Registrar</button>	
		</div>
	</div>	
</div>
	<table class="table table-bordered table-hover">
		<tr>
			<th>Fecha</th>
			<th>Descripcion</th>
			<th>Accion</th>
		</tr>
		<?php foreach($registros as $row){ ?>
		<tr>
			<td><?= $row['fecha'] ?></td>
			<td><?= $row['descripcion'] ?></td>
			<td><a title="Eliminar" href="<?= base_url() ?>index.php/inicio/eliminarferiado/<?= $row['id'] ?>" class="btn btn-danger eliminar"><span class="glyphicon glyphicon-trash"></span></a></td>
		</tr>
		<?php } ?>

	</table>
	</form>

</div>