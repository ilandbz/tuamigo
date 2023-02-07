<div class="container">
	<form action="<?php echo base_url() ?>index.php/rrhh/registraropercondicion" class="form-horizontal input-sm" name="guardar_solicitud" role="form" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-primary">
			<div class="panel-heading">
				REGISTRADO CON EXITO
			</div>
			<div class="panel-body">
	<h3><small>APENOM : </small><?= $personal['apenom'] ?></h3>
	<h3><small>NUEVO SALDO : </small><?= $registro['saldo'] ?></h3>	
	<h3><small>TIPO : </small><?= $registro['tiporegistro'] ?></h3>		
			</div>
			<div class="panel-footer">
				<a target="_blank" href="<?= base_url() ?>index.php/rrhh/vaucherregistrooperacion/<?= $registro['dni'] ?>/<?= $registro['nro'] ?>/<?= $registro['mes'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></a>
				<a href="<?= base_url() ?>index.php/rrhh/verocuentapersonal/<?= $personal['dni'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></a>
			</div>
		</div>
	</form>	
</div>