<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>PAGO DE CLIENTE</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url() ?>index.php/pagos/realizapago" name="realizapagocb" class="form-horizontal" method="POST" onsubmit="return validarpagos2()">
				<div class="form-group">
					<label for="" class="control-label col-md-2">CLIENTE</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon"><?php echo $desembolso['codcliente'] ?></span>
							<input type="text" value="<?php echo $desembolso['apenom'] ?>" class="form-control" readonly>
							<input type="hidden" name="iddesembolso" value="<?php echo $desembolso['iddesembolso'] ?>">	
							<span class="input-group-btn">
								<a href="<?php echo base_url() ?>index.php/cliente/formactualizarpersona/<?php echo $desembolso['dni'] ?>" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
							</span>
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

					<?php 
$saldototal = number_format($desembolso['total']-(is_null($desembolso['totalpagado']) ? 0 : $desembolso['totalpagado']),2);
					 ?>
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm" name="saldototal2" value="<?php echo $saldototal ?>" readonly>
							<span class="input-group-addon">
								<input type="radio" name="rdbsaldocompleto" onchange="$('input[name=montopagar]').val($('input[name=saldototal]').val()); $('input[name=montopagar]').change();">
							</span>
							
						</div>
					<input type="hidden" name="saldototal" value="<?php echo $desembolso['total']-$desembolso['totalpagado']; ?>">
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
					<label for="" class="control-label col-md-1">ULT. CUOTA</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">NRO</span>
							<input type="text" class="form-control" value="<?php echo is_null($ultimacuota) ? 0 : $ultimacuota['nrocuota'] ?>" readonly>
						</div>
						<input type="hidden" name="nrocuotamenor" value="<?php echo is_null($ultimacuota) ? 0 :  $ultimacuota['nrocuota']; ?>">
					</div>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">CANT</span>
							<input type="number" name="nrocuotaspg" id="nrocuotaspg" class="form-control" min="0" max="<?php echo $nrocuotasdebe; ?>" value="<?php echo $nrocuotasdebe>0 ? 1 : 0; ?>">
						</div>
					</div>
					<label for="" class="control-label col-md-2">MONTO</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control" name="montopagar" id="montopagar" value="<?php echo is_null($ultimacuota) ? 0 : number_format($ultimacuota['cuota']-$ultimacuota['montopagado'],2); ?>">
						</div>
					</div>
					<div class="col-md-3">
					    <label class="checkbox-inline">
					      <input type="checkbox" value="1" name="cuotascheck">cuotas
					    </label>
					</div>
				</div>
				<div class="form-group has-success">
					<label for="" class="control-label col-md-1">DEUDA MORA</label>
					<div class="col-md-2">
						<?php 
							$totaldiasmora=($desembolso['moradias']+$moraactual)-$desembolso['pagomora']; 
							$totaldiasmora = $totaldiasmora<0 ? 0 : $totaldiasmora;//solo para los que anteriormente hubo errores
						?>
						<input type="hidden" name="moraactual" value="<?php echo $moraactual; ?>">
						<div class="input-group">
							<input type="number" class="form-control" name="diasmora" value="<?php echo $totaldiasmora; ?>" onchange="$('input[name=montomora]').val(calcularmontomora());" min="0" max="<?php echo $totaldiasmora; ?>">
							<span class="input-group-addon">Dias</span>
						</div>
					</div>
					<div class="col-md-2">
						<?php if(!empty($ahorrosvigentes)){ ?>
							<div class="alert alert-danger" role="alert"><a href="<?= base_url() ?>index.php/ahorros/listaapagar">POSEE CUENTA DOCO</a></div>
						<?php } ?>
						<input type="hidden" name="costomora" value="<?php echo $desembolso['costomora']; ?>">
					</div>
					<label for="" class="control-label col-md-2">MONTO MORA</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" name="montomora" class="form-control" value="<?php echo $desembolso['costomora']*$totaldiasmora ?>" readonly>
						</div>
					</div>
					<div class="col-md-3">
					    <label class="checkbox-inline">
					      <input type="checkbox" value="1" name="moracheck">MORA
					    </label>
					</div>
				</div>
				<div class="form-group has-success">
					<label for="" class="control-label col-md-1">RETRASO.</label>
					<div class="col-md-2">
						<div class="input-group">
							<input type="text" readonly="true" class="form-control" name="diasretraso" value="<?php echo $diasretraso; ?>">
							<span class="input-group-addon">Dias</span>
						</div>						
					</div>					
					<label for="" class="control-label col-md-4">TOTAL A PAGAR</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control" name="montototalpagar" id="montototalpagar" value="0.00" readonly>
						</div>
					</div>
					<label for="" class="control-label col-md-1">Recibida</label>
					<div class="col-md-1">
						<input type="text" class="form-control" name="mrecibido" id="mrecibido" value="" placeholder="0.00">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-7 col-md-2">
						<button type="button" class="btn btn-primary" id="guardarpagocb">Guardar</button>
					</div>
					<label for="" class="control-label col-md-1">Vuelto</label>
					<div class="col-md-1">
						<input type="text" class="form-control" name="mvuelto" value="0.00">
					</div>
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<a href="<?php echo base_url() ?>index.php/pagos/formpago/<?php echo $desembolso['idsolicitud'] ?>" class="btn btn-info">VER PAGOS</a>
			<a href="<?php echo base_url() ?>index.php/solicitud/reportecobranzapdfxcodsolic/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Calendario de Pagos</a>
			<a href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Plan de Pagos</a>			
			<a href="<?php echo base_url() ?>index.php/pagos/posiciondetallepdf/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Kardex de Pagos</a>
<?php if($this->session->userdata('tipouser')==3){ ?>
			<a href="<?php echo base_url() ?>index.php/pagos/formeliminarpagos/<?php echo $desembolso['iddesembolso'] ?>" class="btn btn-danger pull-right">Eliminar Pagos</a>
<?php } ?>
		</div>
	</div>
</div>