<div class="container">
	<form action="<?php echo base_url() ?>index.php/rrhh/registrarsueldop" class="form-horizontal input-sm" name="guardar_solicitud" role="form" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-primary">
			<div class="panel-heading">
				PERSONAL REGISTRADO AGENCIA <?= $this->session->userdata('agencia') ?>
			</div>
			<div class="panel-body">
				<table class="table table-hover table-bordered">
					<tr>
						<th>DNI</th>
						<th>APENOM</th>
						<th>CARGO</th>
						<th>FECHA INICIO</th>
						<th>TIPO</th>
						<th>ESTADO</th>
						<th>CELULAR</th>
						<th>Accion</th>
					</tr>
					<?php foreach ($registros as $row) { ?>
						<tr>
							<td><?= $row['dni'] ?></td>
							<td><?= $row['apenom'] ?></td>
							<td><?= $row['cargo'] ?></td>
							<td><?= $row['fechainicio'] ?></td>
							<td><?= $row['tipo'] ?></td>
							<td><?= $row['estado'] ?></td>
							<td><?= $row['celular'] ?></td>
							<td>
								<div class="btn-group" role="group" aria-label="...">
								<a title="Ver Operaciones" href="<?= base_url() ?>index.php/rrhh/verocuentapersonal/<?= $row['dni'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
								<a title="Pago Sueldo" href="<?= base_url() ?>index.php/rrhh/sueldoform/<?= $row['dni'] ?>/<?= date('m') ?>" class="btn btn-success"><span class="glyphicon glyphicon-usd"></span></a>
								</div>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<div class="panel-footer">
<a href="<?= base_url() ?>index.php/rrhh/formregpersonal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-user"></span></a>
			</div>
		</div>
	</form>	
</div>
