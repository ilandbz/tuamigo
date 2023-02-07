<div class="container">
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3>FINALIZAR DESEMBOLSO</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url() ?>index.php/pagos/realizapago" class="form-horizontal" method="POST" onsubmit="return validarpagos2()">
				<div class="form-group">
					<label for="" class="control-label col-md-2">CLIENTE</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon"><?php echo $desembolso['codcliente'] ?></span>
							<input type="text" value="<?php echo $desembolso['apenom'] ?>" class="form-control" readonly>
							<input type="hidden" name="iddesembolso" value="<?php echo $desembolso['iddesembolso'] ?>">			
						</div>
					</div>
					<label for="" class="control-label col-md-2">ASESOR</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" value="<?php echo $desembolso['idasesor'] ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">SOLICITUD</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" value="<?php echo $desembolso['idsolicitud'] ?>" readonly>
					</div>
					<label for="" class="control-label col-md-2">MONTO SOLICITADO</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm" name="montocuotap" value="<?php echo $desembolso['monto'] ?>" readonly>					
						</div>
					</div>
					<label for="" class="control-label col-md-2">SALDO</label>
					<div class="col-md-2">
						<div class="input-group">
							<?php $saldo=$desembolso['total']-(is_null($desembolso['totalpagado']) ? 0 : $desembolso['totalpagado']); ?>
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm" name="saldototal2" value="<?php echo number_format($saldo,2); ?>" readonly>
							<input type="hidden" name="saldototal" value="<?php echo $saldo ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">FECHA DESEMBOLSO</label>
					<div class="col-md-3">
						<input type="text" class="form-control input-sm" value="<?php echo $desembolso['fecha_hora'] ?>" readonly>
					</div>
					<label for="" class="control-label col-md-2">FECHA DE PAGO</label>
					<div class="col-md-3">
						<div class="input-group">
							<input type="datetime-local" class="form-control" name="fechapago" value="<?php echo date('Y-m-d\TH:i:s'); ?>" readonly>
							<span class="input-group-addon">
								<input type="radio" name="rdbfechapago">
							</span>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group has-success">
					<label for="" class="control-label col-md-3"></label>
					<div class="col-md-2">

					</div>
					<label for="" class="control-label col-md-2">MONTO</label>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control" name="montopagar" id="montopagar" value="<?php echo $desembolso['total']-(is_null($desembolso['totalpagado']) ? 0 : $desembolso['totalpagado']) ?>" readonly>
						</div>
					</div>
					<div class="col-md-2">
					    <label class="checkbox-inline hide">
					      <input type="checkbox" value="1" checked="true" name="cuotascheck">CUOTAS
					    </label>
					</div>
				</div>
				<div class="form-group has-success">
					<label for="" class="control-label col-md-3">NRO DIAS DE MORA DEBE</label>
					<div class="col-md-2">
						<?php 
							$totaldiasmora=($desembolso['moradias']+$moraactual)-$desembolso['pagomora']; 
						?>
						<input type="text" class="form-control" name="diasmora" value="<?php echo $totaldiasmora; ?>" readonly>
						<input type="hidden" name="moraactual" value="<?php echo $moraactual; ?>">
					</div>
					<label for="" class="control-label col-md-2">MONTO MORA</label>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" name="montomora" class="form-control" value="<?php echo $desembolso['costomora']*$totaldiasmora ?>" readonly>						
						</div>
					</div>
					<div class="col-md-2">
					    <label class="checkbox-inline hide">
					      <input type="checkbox" value="1" name="moracheck" checked="true">MORA
					    </label>
					</div>
				</div>
				<div class="form-group has-success">
					<label for="" class="control-label col-md-7">TOTAL A PAGAR</label>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control" name="montototalpagar" value="<?php echo $saldo+($desembolso['costomora']*$totaldiasmora); ?>" readonly>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-7 col-md-4">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<a href="<?php echo base_url() ?>index.php/pagos/formpago/<?php echo $desembolso['idsolicitud'] ?>" class="btn btn-info">VER PAGOS</a>
			<a href="<?php echo base_url() ?>index.php/solicitud/reportecobranzapdfxcodsolic/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Calendario de Pagos</a>
			<a href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Plan de Pagos</a>			
			<a href="<?php echo base_url() ?>index.php/pagos/posiciondetallepdf/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Kardex de Pagos</a>
		</div>
	</div>
</div>