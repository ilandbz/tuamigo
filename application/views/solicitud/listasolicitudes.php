<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">BUSQUEDA DE SOLICITUDES</h3>		
		</div>
		<div class="panel-body">
			<form action="" class="form-horizontal">
				<div class="form-group">
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">NOMBRE CLIENTE</span>
							<input type="text" name="apenomcliente" class="form-control" placeholder="Buscar" value="">

						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon">TIPO</span>
							<select name="busqtiposolicitud" id="busqtiposolicitud" class="form-control">
								<option value="PENDIENTE" selected="selected">PENDIENTE</option>
								<option value="APROBADO">APROBADO</option>
								<option value="EVALUACION">EVALUACION</option>
							</select>
						</div>
					</div>					
				</div>
			</form>
			<div id="tablasolicitudes">
				<h3>Pendientes</h3>
				<?php $this->view('solicitud/tablalistasolicitudes') ?>
			</div>
		<p><b>ESTADO</b></p>
		<p>PENDIENTE : Solicitud creada en espera para llenar estados financieros, propuesta de credito, analisis cualitativo y enviar a evaluacion.</p>
		<p>EVALUACION : Solicitud en espera de evaluacion por Gerencia</p>
		<p>APROBADO : Solicitud que fue evaluado y aprobado por el gerente para su desembolso</p>
		<p>RECHAZADO : Solicitud que fue evaluado por gerencia y fue rechazado el prestamo</p>
		<p>FINALIZADO : Solicitud que fue cancelado todas las cuotas</p>	
		</div>
	</div>
</div>



