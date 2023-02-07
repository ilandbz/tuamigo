<link rel="stylesheet" href="<?php echo base_url() ?>activos/css/jquery-ui.css">
<div class="container">
	<form action="<?php echo base_url() ?>index.php/report/verposicionc" class="form-horizontal" method="POST">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">POSICION DEL CLIENTE</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="" class="control-label col-md-3">BUSQUEDA DE CLIENTE</label>
				</div>
				<div class="form-group">
					<div class="col-md-9">
						<div class="input-group">
							<span class="input-group-addon">Apellidos y/o Nombres</span>
							<input type="text" class="form-control" name="apenomclie" id="apenomclie" placeholder="Apellidos y Nombres">
							<input type="hidden" name="tipo" value="<?php echo $tipo ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">DNI</span>
							<input type="text" class="form-control solo_numeros" name="dniclie" placeholder="DNI" maxlength="8">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">CODIGO</span>
							<input type="text" class="form-control solo_numeros" name="codclie" maxlength="9" placeholder="Codigo">
						</div>
					</div>
					<div class="col-md-offset-7 col-md-2">
						<button type="submit" class="btn btn-sm btn-info pull-right"><span class="glyphicon glyphicon-search"></span></button>
					</div>				
				</div>
			</div>
		</div>
	</form>
</div>