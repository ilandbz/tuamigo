<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h3>REGISTRO EXITOSO DEL CLIENTE</h3>
			<h3>CODIGO GENERADO : <?php echo $cliente['codcliente']; ?></h3>
			<h3>ASESOR : <?php echo $cliente['idusuario']; ?></h3>			
			<br>
				<a href="<?php echo base_url() ?>index.php/solicitud/formsolicitud/<?php echo $cliente['codcliente']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span> Crear Solicitud</a> &nbsp;<a href="<?php echo base_url() ?>index.php/solicitud/listainscritos" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Ver Lista de Inscritos</a>	&nbsp;<a href="<?php echo base_url() ?>index.php/cliente/crearcliente" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear Cliente</a>
		</div>
		<div class="col-md-6">
			<img src="<?php echo base_url() ?>activos/images/registrado.png" alt="">			
		</div>
	</div>
</div>