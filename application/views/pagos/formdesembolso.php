<div class="container">
<?php 
if($this->session->userdata('tipouser')==3){//operaciones
	$direccionenvio='regdesembolso';
}else{//si es cobranza
	$direccionenvio='desembolsar';
}
 ?>
	<form action="<?php echo base_url() ?>index.php/pagos/<?php echo $direccionenvio ?>" class="form-horizontal" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">
					DESEMBOLSO
				</div>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="fecha_des" class="control-label col-md-2">FECHA DES.</label>
					<div class="col-md-3 input-sm">
						<input type="text" name="fecha_des" id="fecha_des" value="<?php echo date('Y-m-d H:i:s'); ?>" class="form-control input-sm solo_numeros">
					</div>
					<label for="idsolicitud_des" class="control-label col-md-1">SOL.</label>
					<div class="col-md-2">
						<input type="text" name="idsolicitud_des" id="idsolicitud_des" class="form-control" value="<?php echo $solicitud['idsolicitud'] ?>" readonly>
					</div>
					<label for="" class="control-label col-md-2">MONTO</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" value="<?php echo $solicitud['monto']; ?>" name="monto_des" class="form-control input-sm solo_numeros" readonly>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">PLAZO</label>		
					<div class="col-md-2">
						<div class="input-group input-group-sm">
							<input type="text" name="plazo_des" value="<?php echo $solicitud['cantplazo']; ?>" class="form-control input-sm" readonly>	
							<?php 
							switch ($solicitud['tipoplazo']) {
								case 'DIARIO':
									$plazo = 'Dias';
									break;
								case 'SEMANAL':
									$plazo = 'Semanas';
									break;
								case 'QUINCENAL':
									$plazo = 'Quincenas';
									break;		
								case 'MENSUAL':
									$plazo = 'Mes';
									break;	
							}
							 ?>
							<span class="input-group-addon"><?php echo $plazo ?></span>
							<input type="hidden" name="unidplazo_des" id="unidplazo_des" value="<?php echo $plazo ?>">
						</div>
					</div>
					<label for="" class="control-label col-md-2">INTERES</label>		
					<div class="col-md-2">
						<div class="input-group">
							<input type="text" name="interes_des" value="<?php echo $solicitud['tasainteres']; ?>" class="form-control input-sm solo_numeros" readonly>	

							<span class="input-group-addon">%</span>
						</div>
					</div>
					<?php $total=$solicitud['monto']*(1+$interes/100); ?>
					<label for="" class="control-label col-md-2">TOTAL</label>		
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" value="<?php echo $total; ?>" name="total_des" class="form-control input-sm solo_numeros" readonly>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">PRODUCTO</label>
					<div class="col-md-2">
						<input type="text" value="<?php echo $solicitud['producto'] ?>" class="form-control input-sm" readonly>
					</div>
					<label for="" class="control-label col-md-2">CLIENTE</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
								<?php echo $solicitud['codcliente'] ?>
							</span>
							<input type="text" name="cliente_des" value="<?php echo $solicitud['apenom'] ?>" class="form-control input-sm" readonly>
						</div>
					</div>	
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">TIPO</label>
					<div class="col-md-2">
						<input type="text" name="tiposolicitud" value="<?php echo $solicitud['tipo'] ?>" class="form-control input-sm" readonly>
					</div>	
					<?php if($solicitud['tipo']=='Recurrente Con Saldo'){ ?>
						<?php if($totalapagardeuda>0){
							$montorestar=$totalapagardeuda;
						 ?>
						<label for="" class="control-label col-md-2">DEUDA A PAGAR</label>
						<div class="col-md-2">
							<div class="input-group">
								<input type="hidden" name="totalapagardeuda" value="<?php echo $totalapagardeuda; ?>">
								<span class="input-group-addon">S/.</span>
								<input type="text" value="<?php echo number_format($totalapagardeuda,2) ?>" class="form-control input-sm" readonly>
							</div>
						</div>
						<div class="col-md-2">
							<a id="enviarcrcs" href="<?php echo base_url() ?>index.php/pagos/cancelardeudasrcs/<?php echo $solicitud['idsolicitud'] ?>" title="CANCELAR DEUDA" class="btn btn-warning unsoloclick"><span class="glyphicon glyphicon-saved"></span></a>
						</div>
						<?php }else{ 
							$montorestar=$totaldeudapagada;
							?>
						<label for="" class="control-label col-md-2">DEUDA PAGADO</label>
						<div class="col-md-2">
							<div class="input-group">
								<span class="input-group-addon">S/.</span>
								<input type="text" value="<?php echo number_format($totaldeudapagada,2) ?>" class="form-control input-sm" readonly>
							</div>
						</div>
						<div class="col-md-2">

						</div>
						<?php } ?>
					<?php } ?>
				</div>
				<?php if($solicitud['tipo']=='Recurrente Con Saldo'){ ?>
				<div class="form-group">
					<label for="" class="control-label col-md-2">SOLICITUDES VIGENTES o CON DEUDA</label>
					<div class="col-md-5">
						<table class="table table-bordered" style="font-size:10px">
							<tr>
								<th>idsolicitud</th>
								<th>Monto</th>
								<th>Fecha</th>
								<th>Saldo</th>
								<th>Mora deb.</th>
								<th>Total</th>
							</tr>
							<?php if(!is_null($solvigentes)){
							foreach($solvigentes as $row){
							$t = 0;
							?>
							<tr>
								<td><a href="<?php echo base_url() ?>index.php/pagos/formpago/<?php echo $row['idsolicitud'] ?>"><?php echo $row['idsolicitud'] ?></a></td>
								<td><?php echo $row['monto'] ?></td>
								<td><?php echo $row['fecha_hora'] ?></td>
								<td>S/.<?php
								$saldo = is_null($row['saldo']) ? 0 : $row['saldo'];
								 echo $saldo; 
								 $t+=$saldo; 

								 ?></td>
								<td><?php
echo $row['mora'].' asdasd S/.';
								 $mora = $row['mora'];
									$mora -= is_null($row['pagomora']) ? 0 : $row['pagomora'];
									echo $mora*$row['costomora'];
									$t+=$mora*$row['costomora'];
								 ?></td>
								 <td>S/.<?php echo $t; ?></td>
							</tr>
							<?php 
								$t++; 
							} } ?>
						</table>
					</div>
				</div>
				<?php } ?>
				<div class="form-group">
					<label for="" class="control-label col-md-2">DOMICILIO</label>
					<div class="col-md-10">
						<input type="text" value="<?php echo $cliente['tipovia'].' '.$cliente['nombrevia'].' NRO : '.$cliente['nro'].', Interior : '.$cliente['interior'].', MZ : '.$cliente['mz'].', Lote : '.$cliente['lote'].', '.$cliente['tipozona'].':'.$cliente['nombrezona'].', REF:'.$cliente['referencia'] ?>" name='domicilio_direc' class="form-control input-sm" readonly>
					</div>			
				</div>
				<?php 
				if(!is_null($negocio)){
				$direc_negocio = $negocio['tipovia'].' '.$negocio['nombrevia'].' NRO : '.$negocio['Nro'].', Interior : '.$negocio['interior'].', MZ : '.$negocio['mz'].', Lote : '.$negocio['lote'].', '.$negocio['tipozona'].':'.$negocio['nombrezona'].', REF:'.$negocio['referencia'];
				 ?>
				<div class="form-group">
					<label for="" class="control-label col-md-2">NEGOCIO</label>
					<div class="col-md-10">
						<input type="text" value="<?php echo (count($negocio)>0) ? $direc_negocio : 'NO TIENE'; ?>" name='direc_negocio' class="form-control input-sm" readonly>
					</div>
				</div>
				<?php } ?>

				<div class="form-group">
					<label for="" class="control-label col-md-2">CEL</label>		
					<div class="col-md-2">
						<input type="text" class="form-control solo_numeros" name="celcliente" value="<?php echo $cliente['celular'] ?>" readonly>
					</div>
					<label for="" class="control-label col-md-2">USUARIO</label>		
					<div class="col-md-2">
						<input type="text" class="form-control solo_numeros" name="usuario_desembolso" value="<?php echo $this->session->userdata('idusuario') ?>" readonly>
					</div>
					<label for="" class="control-label col-md-2">ID ASESOR</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="idasesordes" value="<?php echo $solicitud['idasesor'] ?>" readonly>
					</div>
				</div>
				<div class="row">
					<div class="col-md-offset-2 col-md-4">
						<div class="alert alert-info" role="alert" style="padding: 5px">Gasto Administrativo S/. <?php echo number_format($montoseguro, 2); ?></div><input type="hidden" name="poliza" value="<?php echo $montoseguro; ?>">
					</div>
					<div class="col-md-6">
						<div class="pull-right">
							<?php $totentregar=$solicitud['tipo']=='Recurrente Con Saldo' ? ($solicitud['monto']-$montorestar) : $solicitud['monto'];
								$totentregar -= $montoseguro;
							 ?>
							<h3 class="text-primary"><small>TOTAL ENTREGAR : </small>S/.<?php echo number_format($totentregar, 2); ?></h3>
							<input type="hidden" name="totaldescaja" value="<?php echo $solicitud['monto'] ?>">		
						</div>
					</div>					
				</div>
			</div>
			<div class="panel-footer">
				<?php if($saldocaja>=$totentregar){ ?>
				<button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;GUARDAR&nbsp;<span class="glyphicon glyphicon-floppy-saved"></span></button>
				<?php }else{ ?>
				<button class="btn btn-info disabled" type="button" title="NO TIENE SALDO SUFICIENTE EN CAJA"><span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;GUARDAR&nbsp;<span class="glyphicon glyphicon-floppy-saved"></span></button>
				<?php } ?>
				<button type="button" class="btn btn-warning" id="observardes"><span class="glyphicon glyphicon-eye-open"></span> Observar</button>
			</div>
		</div>
	</form>
</div>