<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">REGISTRADO</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4">
				<div class="alert alert-success">
					<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
					REGISTRADO
				</div>
			</div>
			<div class="col-md-4">
				<h3><small>USUARIO </small><?php echo $caja['codusuario'] ?></h3>
			</div>
			<div class="col-md-4">
				<h4><small>FECHA </small><?php echo $caja['fecha_hora'] ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h3><small>CODIGO REGISTRO </small><?php echo $caja['idreg'] ?></h3>
			</div>
			<div class="col-md-4">
				<h3><small>MONTO </small>S/. <?php echo $caja['cantidad'] ?></h3>
			</div>	
			<div class="col-md-4">
				<h3><small>NUEVO SALDO </small>S/. <?php echo $caja['saldo'] ?></h3>
			</div>						
		</div>
	</div>
</div>