<link rel="stylesheet" href="<?php echo base_url() ?>activos/css/jquery-ui.css">
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">SOLICITUDES AHORROS DEVOLUCION</h3>		
		</div>
		<div class="panel-body">
			<form action="" class="form-horizontal">
				<h4>BUSQUEDA</h4>
				<div class="form-group">
					<div class="col-md-4">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">COD CLIENTE</span>
							<input type="text" class="form-control input-xs" name="codcliente" value="">
							<div class="input-group-btn">
								<button class="btn btn-default" id="bsccodclientesda" type="button"><span class="glyphicon glyphicon-search"></span></button>
							</div>
							<span class="input-group-addon">DNI CLIENTE</span>
							<input type="text" class="form-control input-xs" name="dnicliente" value="">
							<div class="input-group-btn">
								<button class="btn btn-default" id="bscdniclientesda" type="button"><span class="glyphicon glyphicon-search"></span></button>
							</div>														
						</div>
					</div>
					<div class="col-md-8">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">APELLIDOS Y NOMBRES</span>
							<input type="text" class="form-control input-xs" name="apenomclie" id="apenomclie" value="">
							<div class="input-group-btn">
								<button class="btn btn-default" type="button" id="bscapenomsdadev"><span class="glyphicon glyphicon-search"></span></button>
							</div>						
						</div>
					</div>
				</div>
			</form>
			<div id="vistasolicitudesdesembapro">
			</div>
		</div>
	</div>
</div>
