<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>CENTRO COSTOS</h4>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<h3><small>TOTAL INGRESO AHORROS GENERAL: </small>S/.<?php echo number_format($ahorropagadototal, 2); ?></h3>					
				</div>
				<div class="col-md-4">
					<h3><small>TOTAL DEVUELTO AHORROS: </small><br>S/.<?php echo number_format($ahorropagadofinalizado, 2); ?></h3>					
				</div>					
				<div class="col-md-4">
					<h3><small>TOTAL INGRESO AHORROS VIGENTE: </small>S/.<?php echo number_format($ahorropagadovigente, 2); ?></h3>					
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
					<h3><small>TOTAL SALDO FUENTE 1</small><br>S/.<?php echo number_format($saldocredito, 2); ?></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<h3><small>TOTAL SALDO FUENTE 2</small><br>S/.<?php echo number_format($saldocreditof2, 2); ?></h3>
				</div>
			</div>			
		</div>
		<div class="panel-footer">
			<button type="submit" id="btnguardar_solicitud" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Crear Solicitud</button>
			<button type="button" id="btnreset_form" class="btn btn-warning"><span class="glyphicon glyphicon-refresh"> Limpiar</span></button>
		</div>
	</div>
</div>