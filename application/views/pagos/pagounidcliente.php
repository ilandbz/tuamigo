<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>PAGO DE CLIENTE</h3>
		</div>
		<?php 
			$totaldiasmora=($desembolso['moradias']+$ultimamora)-$desembolso['pagomora']; 
			$totaldiasmora=$totaldiasmora<0 ? 0 : $totaldiasmora;
		?>
		<div class="panel-body">
			<form action="<?php echo base_url() ?>index.php/pagos/realizapago2" class="form-horizontal" method="POST" onsubmit="return validarpagos3()">
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
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm" name="saldototal2" value="<?php echo number_format($desembolso['total']-(is_null($desembolso['totalpagado']) ? 0 : $desembolso['totalpagado']),2) ?>" readonly>
							<input type="hidden" name="saldototal" value="<?php echo $desembolso['total']-(is_null($desembolso['totalpagado']) ? 0 : $desembolso['totalpagado']) ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">FECHA DESEMBOLSO</label>
					<div class="col-md-3">
						<input type="text" class="form-control input-sm" value="<?php echo $desembolso['fecha_hora'] ?>" readonly>
					</div>
					<label for="" class="control-label col-md-3">NRO DIAS DE MORA</label>
					<div class="col-md-1">
						<input type="text" class="form-control" value="<?php echo $totaldiasmora; ?>" readonly>
					</div>
					<label for="" class="control-label col-md-1">DEUDA MORA</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" name="montomora" class="form-control" value="<?php echo $costomora*$totaldiasmora ?>" readonly>						
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">FECHA DE PAGO</label>
					<div class="col-md-3">
						<input type="datetime-local" class="form-control" name="fechapago" value="<?php echo date('Y-m-d\TH:i'); ?>" readonly>
					</div>
				</div>			
				<hr>
				<div class="form-group has-success">
					<label for="" class="control-label col-md-3">ULTIMA CUOTA</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">NRO</span>
							<input type="number" name="nrocuotaspg" id="nrocuotaspg" class="form-control" value="<?php echo $ultimacuota['nrocuota'] ?>" min="<?php echo $ultimacuota['nrocuota'] ?>" max="30" readonly>
						</div>
						<input type="hidden" name="cuotac" value="<?php echo $cuota; ?>">
					</div>
					<label for="" class="control-label col-md-2">MONTO TOTAL</label>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control" name="montopagar" id="montopagar" value="<?php echo is_null($ultimacuota['montopagado']) ? $ultimacuota['cuota'] : $ultimacuota['cuota']-$ultimacuota['montopagado']; ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-7 col-md-4">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
				<input type="hidden" class="form-control" name="saldoasesor2" value="<?php echo $saldo ?>" readonly>
			</form>
		</div>
		<div class="panel-footer">
			<div class="row">
				<div class="col-md-8">
			<a href="<?php echo base_url() ?>index.php/solicitud/reportecobranzapdfxcodsolic/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Calendario de Pagos</a>
			<a href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Plan de Pagos</a>			
			<a href="<?php echo base_url() ?>index.php/pagos/posiciondetallepdf/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Kardex de Pagos</a>
				</div>
				<div class="col-md-4">
					<div class="input-group">
						<span class="input-group-addon">SALDO DE ASESOR S/.</span>
						<input type="text" class="form-control" name="saldoasesor_c" value="<?php echo $saldo ?>" readonly>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
