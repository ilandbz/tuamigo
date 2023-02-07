<link rel="stylesheet" href="<?php echo base_url() ?>activos/css/jquery-ui.css">
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">SOLICITUDES DESEMBOLSADOS A PAGAR</h3>		
		</div>
		<div class="panel-body">
			<form action="" class="form-horizontal">
				<h4>BUSQUEDA</h4>
				<div class="form-group">
					<div class="col-md-8"></div>
					<div class="col-md-4">
						<div class="input-group input-group-lg">
							<span class="input-group-addon">ID SOLICITUD</span>
							<input type="text" class="form-control solo_numeros input-lg" name="idsolicitudbsd" value="" autofocus>
							<div class="input-group-btn">
								<button class="btn btn-default" type="button" id="bscidsolsda"><span class="glyphicon glyphicon-search"></span></button>
							</div>
						</div>
					</div>					
				</div>
				<div class="form-group">

					<div class="col-md-6">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">ASESOR</span>
							<select name="asesorbscsd" id="asesorbscsd" class="form-control">
								<option value="">SELECCIONE</option>
								<?php foreach($asesores as $row) : ?>
								<option value="<?php echo $row['codusuario'] ?>"><?php echo $row['apenom'] ?></option>
								<?php endforeach; ?>
							</select>				
						</div>
					</div>
				</div>
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
								<button class="btn btn-default" type="button" id="bscapenomsda"><span class="glyphicon glyphicon-search"></span></button>
							</div>	

						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-4">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">FECHA DES</span>
							<input type="date" class="form-control input-xs" name="fecha_buscsd" value="<?php echo date('Y-m-d') ?>">
							<div class="input-group-btn">
								<button class="btn btn-default" type="button" id="bscfechasda"><span class="glyphicon glyphicon-search"></span></button>
							</div>					
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">TIPO DE PLAZO</span>
							<select name="tipoplazobsc" id="tipoplazobsc" class="form-control">
								<option value="">SELECCIONE</option>
								<option value="DIARIO">DIARIO</option>
								<option value="SEMANAL">SEMANAL</option>
								<option value="QUINCENAL">QUINCENAL</option>
								<option value="MENSUAL">MENSUAL</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">ESTADO</span>
							<select name="estadosolicitud" id="estadosolicitud" class="form-control">
								<option value="">SELECCIONE</option>
								<option value="APROBADO">APROBADO</option>
								<option value="FINALIZADO">FINALIZADO</option>
								<option value="CASTIGO">CASTIGO</option>
							</select>
						</div>
					</div>					
				</div>
			</form>
			<div id="vistasolicitudesdesembapro">
			</div>
		</div>
	</div>
</div>
