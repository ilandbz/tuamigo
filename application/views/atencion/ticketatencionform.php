<div class="container">

		<form action="<?= base_url() ?>index.php/atencion/registrarsolicitud" method="POST" class="form-horizontal">

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>SOLICITUD DE ATENCION</h4>
		</div>
		<div class="panel-body">

			<div class="form-group">
				<label for="" class="control-label col-md-2">ID SOLICITUD</label>
				<div class="col-md-2">
					<input type="text" name="id" class="form-control input-sm" value="<?php echo date('dmyi') ?>" readonly="true">
				</div>
				<label for="" class="control-label col-md-2">FECHA DE SOLICITUD</label>
				<div class="col-md-2">
					<input type="date" name="fecha" class="form-control input-sm" value="<?php echo date('Y-m-d') ?>" readonly="true">
				</div>
				<label for="idusuario" class="control-label col-md-2">IDUSUARIO</label>					
				<div class="col-md-2">
					<input type="text" name="idusuario" class="form-control input-sm" value="<?php echo $this->session->userdata('idusuario') ?>" readonly="true">
				</div>			
			</div>
			<div class="form-group">
				<label for="modulo" class="control-label col-md-2">MODULO</label>
				<div class="col-md-2">
					<select name="modulo" id="modulo" class="form-control">
						<option value="PAGOS">PAGOS</option>
						<option value="REPORTES">REPORTES</option>
						<option value="SOLICITUD">SOLICITUD CREDITO</option>
						<option value="SOLICITUD">SOLICITUD DOCO</option>
						<option value="CAJA">CAJA</option>
						<option value="USUARIOS">USUARIO</option>
					</select>
				</div>
				<label for="tipo" class="control-label col-md-2">TIPO</label>
				<div class="col-md-2">
					<select name="tipo" id="tipo" class="form-control">
						<option value="AGREGAR AL SISTEMA">AGREGAR AL SISTEMA</option>
						<option value="SOLUCIONAR ERROR">SOLUCIONAR ERROR</option>
					</select>
				</div>
				<label for="prioridad" class="control-label col-md-2">PRIORIDAD</label>
				<div class="col-md-2">
					<select name="prioridad" id="prioridad" class="form-control">
						<option value="BAJA">BAJA</option>
						<option value="INTERMEDIA">INTERMEDIA</option>
						<option value="ALTA">ALTA</option>
					</select>
				</div>				
			</div>
			<div class="form-group">
				<label for="descripcion" class="control-label col-md-2">DESCRIPCION</label>
				<div class="col-md-8">
					<textarea name="descripcion" class="form-control"></textarea>
				</div>					
			</div>

		</div>
		<div class="panel-footer">
			<button type="submit" id="btnguardar_solicitud" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Crear Solicitud</button>
		</div>
	</div>
		</form>
	<div class="bg-info">
	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>IDUSUARIO</th>
			<th>FECHA HORA</th>
			<th>MODULO</th>
			<th>DESCRIPCION</th>
			<th>ESTADO</th>
			<th>TIPO</th>
			<th>PRIORIDAD</th>
		</tr>
		<?php foreach ($registros as $row) { ?>
			<tr>
				<td><?= $row['id'] ?></td>
				<td><?= $row['idusuario'] ?></td>
				<td><?= $row['fechahora'] ?></td>
				<td><?= $row['modulo'] ?></td>
				<td><?= $row['descripcion'] ?></td>
				<td><?= $row['estado'] ?></td>
				<td><?= $row['tipo'] ?></td>
				<td><?= $row['prioridad'] ?></td>
			</tr>
		<?php }	 ?>
	</table>
	</div>
</div>