<div class="container">
	<form action="<?php echo base_url() ?>index.php/pagos/guardarpagos" name="guardarpagos" class="form-horizontal" onsubmit="return checkSubmit();" method="POST">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					<div class="row">
						<div class="col-md-9">
							CLIENTE : <?php echo $desembolso['apenom'] ?>
						</div>
						<div class="col-md-3">
							COD. CLIENTE : <?php echo $desembolso['codcliente'] ?>
							<input type="hidden" name="idsolicitud" value="<?php echo $desembolso['idsolicitud'] ?>">
							<input type="hidden" name="codcliente" value="<?php echo $desembolso['codcliente'] ?>">
							<input type="hidden" name="diasatrasadosc" value="<?php echo $diasatrasadosc ?>">
						</div>	
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="" class="control-label col-md-2">ID SOLICITUD</label>
					<div class="col-md-2">
						<input type="text" class="form-control" value="<?php echo $desembolso['idsolicitud'] ?>">
					</div>
					<label for="" class="control-label col-md-4">FECHA DE SOLICITUD</label>
					<div class="col-md-2">
						<input type="text" class="form-control" value="<?php echo $desembolso['fecha'] ?>">
					</div>
					<div class="col-md-2">
						<a href="<?php echo base_url() ?>index.php/pagos/pago/<?php echo $desembolso['iddesembolso'] ?>" title="Pagar Monto Especifico" class="btn btn-info pull-right">
						<span class="glyphicon glyphicon-usd"></span></a>
					</div>			
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">ASESOR</label>
					<div class="col-md-6">
						<div class="input-group input-group-sm">
							<span class="input-group-addon"><?php echo $desembolso['idasesor'] ?></span>
							<input type="text" class="form-control" value="<?php echo $desembolso['apenom'] ?>">				
						</div>
					</div>
					<label for="" class="control-label col-md-2">CUOTA DEBE</label>			
					<div class="col-md-2">
						<div class="input-group input-group-sm">
							<span class="input-group-addon">NRO</span>
							<input type="text" class="form-control" value="<?php echo is_null($ultimacuota) ? 0 : $ultimacuota['nrocuota'] ?>" readonly>				
						</div>						
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">MONTO</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="monto" value="S/.<?php echo $desembolso['monto'] ?>" readonly>
					</div>
					<label for="monto" class="control-label col-md-2">COSTO MORA</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="monto" value="S/.<?php echo $desembolso['costomora'] ?>" readonly>
					</div>
					<label for="iddesembolso" class="control-label col-md-2">IDDESEMBOLSO</label>	
					<div class="col-md-2">
						<input type="text" class="form-control" name="iddesembolso" value="<?php echo $desembolso['iddesembolso'] ?>" readonly>
					</div>					
				</div>
				<h4>LISTA DE CUOTAS</h4>
				<table class="table table-condensed table-bordered small">
					<tr>
						<th width="5%">NRO</th>
						<th width="10%">DIA LETRAS</th>
						<th>FECHA PROG.</th>
						<th>CUOTA</th>
						<th>SALDO</th>
						<th>PAGO</th>
						<th>MONTO PAG.</th>
						<th width="15%">FECHA DE PAGO</th>
						<!--<th width="10%">MORA (días)</th>-->
						<th width="10%">Mora</th>
						<th>PAGO</th>
					</tr>
				<?php 
				$diasdemora = 0;
				$mora=0;
				$aux=0;
				foreach($cuotaspago as $row) : 
				?>
				<tr>
					<td><?php echo $row['nrocuota'] ?></td>
					<td><?php echo $row['nombredia'] ?></td>
					<td><?php 
						echo date("d/m/Y", strtotime($row['fecha_prog']));
					?></td>
					<td>S/.<?php echo $row['cuota'] ?></td>
					<td>S/.<?php echo $row['saldooriginal'] ?></td>
					<?php if(!is_null($row['montopagado'])){ ?>
					<td><label class="radio-inline"><input type="radio" name="pagado<?php echo $row['nrocuota'] ?>" checked>SI</label></td>
					<td>
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control numerosypunto" id="pagosmp" name="pagadom<?php echo $row['cuota'] ?>" value="<?php echo $row['montopagado'] ?>" size="5" readonly>
						</div>
					</td>
					<?php if($row['montopagado']<$row['cuota']){
					//SI ES QUE NO SE PAGO COMPLETO LA CUOTA
					 ?>
						<td>
							<input type="date" class="form-control input-sm" id="pagos<?php echo $row['nrocuota'] ?>" name="pagos[<?php echo $row['nrocuota'] ?>][fecha]" value="<?php echo //$row['fecha_prog'];
								date('Y-m-d'); ?>" readonly>
						</td>
						<td align="center">
							<b class="text-danger">
							<?php
							if($aux==0){
								// $moraactual += 1;
								$mora+=$moraactual;
								echo $moraactual; ?>
								<input type="hidden" name="moraactual" value="<?php echo $moraactual; ?>">
								<?php $aux=1; 
							}
							?>
							</b>
						</td>
					<?php }else{ ?>
						<td>
							<div class="input-group input-group-sm">
								<input type="date" class="form-control input-sm" name="pagadofecha<?php echo $row['nrocuota'] ?>" value="<?php echo $row['fechapagado']; ?>" readonly>
								<span class="input-group-addon">
									<input type="radio" name="pagofecharadio<?php echo $row['nrocuota'] ?>" value="" checked>					
								</span>
							</div>						
						</td>					
						<td align="center" class="<?php echo ($row['moradias']>0) ? 'has-error' : '' ?>">
							<div class="input-group input-group-sm">
								<input type="number" class="form-control" name="moradias<?php echo $row['nrocuota'] ?>" value="<?php echo is_null($row['moradias']) ? 0 : $row['moradias'] ?>" min="0" max="80">
								<span class="input-group-btn"><button type="button" data-item-price="<?php echo $row['nrocuota'] ?>" class="btn btn-success cambmora" title="Actualizar mora" id=""><span class="glyphicon glyphicon-floppy-disk"></span></button></span>
							</div>
						</td>
					<?php 
					$mora += $row['moradias']; }	 ?>
					<td><?php echo $row['codusuario'];	 ?></td>
					<?php }else{ ?>
					<td><label class="radio-inline"><input type="radio" name="pagos[<?php echo $row['nrocuota'] ?>][si]" value="<?php echo $row['nrocuota'] ?>">SI</label></td>
					<td>
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control numerosypunto" id="pagosmp<?php echo $row['nrocuota'] ?>" name="pagos[<?php echo $row['nrocuota'] ?>][montopagado]" value="<?php echo $row['cuota'] ?>" size="5" readonly>
						</div>
					</td>
					<td>
						<div class="input-group input-group-sm">
							<input type="date" class="form-control input-sm" id="pagos<?php echo $row['nrocuota'] ?>" name="pagos[<?php echo $row['nrocuota'] ?>][fecha]" value="<?php echo //$row['fecha_prog'];
							date('Y-m-d'); ?>" readonly>
							<input type="hidden" class="form-control input-sm" id="" name="pagos[<?php echo $row['nrocuota'] ?>][fechaprog]" value="<?php echo $row['fecha_prog']; ?>">
							<span class="input-group-addon">
								<input type="radio" name="pagofecharadio<?php echo $row['nrocuota'] ?>" value="" onchange="$('#pagos<?php echo $row['nrocuota'] ?>').attr('readonly', false);">					
							</span>
						</div>
					</td>
					<td align="center">
						<b class="text-danger">
							<?php 
							if($aux==0){ 
								echo $moraactual; ?>
								<input type="hidden" name="moraactual" value="<?php echo $moraactual; ?>">
								<?php $aux=1; 
								$mora+=$moraactual;
							}
							 ?>
					 	</b>
					 </td>
					<td></td>
					<?php } ?>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td></td>					
					<td colspan="2" align="right">
						PAGADO
					</td>
					<td colspan="2" align="center" class="text-info">
						S/.<?php echo number_format($desembolso['totalpagado'],2) ?>
					</td>
					<td colspan="2" align="right">
						SALDO TOTAL
					</td>
					<td colspan="2" align="center" class="text-info">
						S/.<?php echo number_format($desembolso['total']-(is_null($desembolso['totalpagado']) ? 0 : $desembolso['totalpagado']),2) ?>
					</td>
					<td></td>					
				</tr>
			</table>
<br>
			<?php 
				$diasdemora=$mora;
				$totalmora=$diasdemora*$desembolso['costomora'];
				$totalmorapagado=$desembolso['pagomora']*$desembolso['costomora'];
				$saldomora=$totalmora-($totalmorapagado);
				$saldomora=$saldomora<0 ? 0 : $saldomora;
			 ?>
<div class="row">
	<div class="col-md-7"></div>
	<div class="col-md-4">MORA</div>
	<div class="col-md-1 text-danger"><?php echo $moraactual ?></div>
</div>
<div class="row">
	<div class="col-md-7"></div>
	<div class="col-md-4">DIAS VENCIDOS CREDITO</div>
	<div class="col-md-1 text-danger"><?php echo $moravencido ?></div>
</div>
<div class="row">
	<div class="col-md-9"></div>
	<div class="col-md-2">DIAS ATRASADO(s)</div>
	<div class="col-md-1 text-danger"><?php echo $diasatrasadosc ?></div>
</div>
<div class="row">
	<div class="col-md-6">		
	</div>
	<div class="col-md-2">DIAS MORA ACUM.</div>
	<div class="col-md-1"><?php echo $diasdemora ?></div>
	<div class="col-md-2">TOTAL MORA ACUM</div>
	<div class="col-md-1">S/.<?php echo number_format($totalmora,2); ?></div>
</div>
<div class="row">
	<div class="col-md-6">		
	</div>
	<div class="col-md-2">MORA PAGADO</div>
	<div class="col-md-1">S/.<?php echo number_format($totalmorapagado,2); ?></div>
	<div class="col-md-2">SALDO MORA</div>
	<div class="col-md-1">S/.<?php echo number_format($saldomora,2); ?></div>

</div>



			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-info">Registrar Pagos</button>
				<a href="<?php echo base_url() ?>index.php/solicitud/reportecobranzapdfxcodsolic/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Calendario de Pagos</a>
				<a href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Plan de Pagos</a>			
				<a href="<?php echo base_url() ?>index.php/pagos/posiciondetallepdf/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Kardex de Pagos</a>
<?php if(isset($tipouser) && $tipouser==3){ ?>
				<a href="<?php echo base_url() ?>index.php/pagos/formeliminarpagos/<?php echo $desembolso['iddesembolso'] ?>" class="btn btn-danger pull-right">Eliminar Pagos</a>
<?php } ?>
			</div>
		</div>
	</form>
</div>
