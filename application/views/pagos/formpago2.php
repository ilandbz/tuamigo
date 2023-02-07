<div class="container-fluid">
	<form action="<?php echo base_url() ?>index.php/pagos/guardarpagoxasesor" name="guardarpagosdasesor" onsubmit="return validarpagos()" class="form-horizontal" method="POST">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					<div class="row">
						<div class="col-md-9">
							CLIENTE : <?php echo $solicitud['apenom'] ?>
						</div>
						<div class="col-md-3">
							COD. CLIENTE : <?php echo $solicitud['codcliente'] ?>
							<input type="hidden" name="idsolicitud" value="<?php echo $solicitud['idsolicitud'] ?>">
						</div>	
					</div>
				</div>
			</div>
			<div class="panel-body">
					<div class="form-group">
						<label for="" class="control-label col-md-2">ID SOLICITUD</label>
						<div class="col-md-2">
							<input type="text" class="form-control" value="<?php echo $solicitud['idsolicitud'] ?>">
						</div>
						<label for="" class="control-label col-md-4">FECHA DE SOLICITUD</label>
						<div class="col-md-2">
							<input type="text" class="form-control" value="<?php echo $solicitud['fecha'] ?>">
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
								<span class="input-group-addon"><?php echo $asesor['idasesor'] ?></span>
								<input type="text" class="form-control" value="<?php echo $asesor['apenom'] ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-addon">SALDO DE ASESOR S/.</span>
								<input type="text" class="form-control" name="saldoasesor" value="<?php echo $saldo ?>" readonly>
							</div>
						</div>	
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-2">MONTO</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="monto" value="S/.<?php echo $solicitud['monto'] ?>" readonly>
						</div>
						<label for="" class="control-label col-md-2">COSTO MORA</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="monto" value="S/.<?php echo $costodiario ?>" readonly>
						</div>	
						<label for="" class="control-label col-md-2">IDDESEMBOLSO</label>	
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
						<th>MORA (días)</th>
						<th>PAGO</th>
					</tr>
				<?php 
				$diasdemora = 0;
				$aux=0;
				foreach($cuotaspago as $row) : ?>
				<tr>
					<td><?php echo $row['nrocuota'] ?></td>
					<td><?php echo $row['nombredia'] ?></td>
					<td><?php echo $row['fecha_prog'] ?></td>
					<td>S/.<?php echo $row['cuota'] ?></td>
					<td>S/.<?php echo $row['saldo'] ?></td>
					<?php if($row['estado']==1){ ?>
					<td><label class="radio-inline"><input type="radio" name="pagado<?php echo $row['nrocuota'] ?>" checked>SI</label></td>
					<td>
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control numerosypunto" id="pagosmp" name="pagadom<?php echo $row['cuota'] ?>" value="<?php echo $row['montopagado'] ?>" size="5" readonly>
						</div>
					</td>
					<td>
						<div class="input-group input-group-sm">
							<input type="date" class="form-control input-sm" name="pagadofecha<?php echo $row['nrocuota'] ?>" value="<?php echo $row['fechapago']; ?>" readonly>
							<span class="input-group-addon">
								<input type="radio" name="pagofecharadio<?php echo $row['nrocuota'] ?>" value="" checked>	
							</span>
						</div>						
					</td>
					<td align="center"><p class="<?php echo ($row['mora']>0) ? 'text-danger' : 'text-info' ?>"><?php echo $row['mora'] ?></p></td>
					<td><?php echo $row['usuario'] ?></td>
					<?php
						$diasdemora = $diasdemora + $row['mora'];
					 }else{ ?>
					<td><label class="radio-inline"><input type="radio" class="sipago" name="pagos[<?php echo $row['nrocuota'] ?>][si]"  data-item-price="<?php echo $row['cuota'] ?>" value="<?php echo $row['nrocuota'] ?>">SI</label></td>
					<td>
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control numerosypunto montopagar" id="pagosmp<?php echo $row['nrocuota'] ?>" name="pagos[<?php echo $row['nrocuota'] ?>][montopagado]" value="<?php echo $row['cuota'] ?>" size="5" onKeyPress="return acceptNum(event)" onfocus="mp=$(this).val();" readonly>
						</div>
					</td>
					<td>
						<input type="date" class="form-control input-sm" id="pagos<?php echo $row['nrocuota'] ?>" name="pagos[<?php echo $row['nrocuota'] ?>][fecha]" value="<?php echo //$row['fecha_prog'];
						date('Y-m-d'); ?>" readonly>
						<input type="hidden" class="form-control input-sm" id="" name="pagos[<?php echo $row['nrocuota'] ?>][fechaprog]" value="<?php echo $row['fecha_prog']; ?>">
					</td>
					<td align="center">
						<b class="text-danger">
							<?php if($aux==0){ 
								echo $moraultima.' dias de mora';
								$aux=1;
							 } ?>
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
						S/.<?php echo number_format($pagodesembolso['totalpagado'],2) ?>
					</td>
					<td colspan="2" align="right">
						SALDO TOTAL
					</td>
					<td colspan="2" align="center" class="text-info">
						S/.<?php echo number_format($desembolso['total']-(is_null($pagodesembolso['totalpagado']) ? 0 : $pagodesembolso['totalpagado']),2) ?>
					</td>

					<td></td>					
				</tr>			
				<tr>
					<td></td>
					<?php 
						$diasdemora=($diasdemora<0) ? 0 : $diasdemora;
						$totalmora=$diasdemora*$costodiario;
						$totalmorapagado=$diasdemorapagado*$costodiario;
						$saldomora=$totalmora-($totalmorapagado);
						$saldomora=$saldomora<0 ? 0 : $saldomora;
					 ?>	
					<td colspan="2" align="right">DIAS DE RETRASO </td>
					<td colspan="2" align="center" class="text-danger"><?php echo $diasdemora ?></td>
					<td colspan="2" align="right">TOTAL MORA</td>
					<td colspan="2" align="center" class="text-danger">S/.<?php echo number_format($totalmora,2); ?></td>				
					<td></td>
				</tr>
				<tr>
					<td></td>				
					<td colspan="2" align="right">MORA PAGADO</td>
					<td colspan="2" align="center" class="text-danger">S/.<?php echo number_format($totalmorapagado,2); ?></td>
					<td colspan="2" align="right">SALDO MORA</td>
					<td colspan="2" align="center" class="text-danger">S/.<?php echo number_format($saldomora,2); ?></td>					
					<td></td>
				</tr>
				</table>			
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-8">
						<button type="submit" class="btn btn-info">Registrar Pagos</button>
				<a href="<?php echo base_url() ?>index.php/solicitud/reportecobranzapdfxcodsolic/<?php echo $solicitud['idsolicitud'] ?>" target="_blank" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-print"></span> Calendario de Pagos</a>
				<a href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $solicitud['idsolicitud'] ?>" target="_blank" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-print"></span> Plan de Pagos</a>			
				<a href="<?php echo base_url() ?>index.php/pagos/posiciondetallepdf/<?php echo $solicitud['idsolicitud'] ?>" target="_blank" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-print"></span> Kardex de Pagos</a>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon">SALDO DE ASE. S/.</span>
							<input type="text" class="form-control" name="saldoasesor2" value="<?php echo $saldo ?>" readonly>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>