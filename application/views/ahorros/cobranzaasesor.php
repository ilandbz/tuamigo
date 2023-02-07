<div class="container-fluid">
<?php if($registropagoasesorc['estado']=='ENVIADO'){ ?>
<h1><small>SALDO : </small>S/. <?php echo $registropagoasesorc['saldo']; ?></h1>
	<a href="<?php echo base_url() ?>index.php/ahorros/confirmarpagoasesor/<?php echo $registropagoasesorc['id']; ?>" class="btn btn-lg btn-success">MONTO CONFORME&nbsp;<span class="glyphicon glyphicon-check"></span></a>
<?php }else{ ?>
	<form name="guardarpagosasesor" id="guardarpagosasesor" action="<?php echo base_url() ?>index.php/ahorros/realizapago2" class="form-horizontal" method="POST" onsubmit="return validarpagosasesor()">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h class="panel-title">COBRANZA ASESOR </h>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<div class="col-md-6">
						<h3 class="text-primary"><small>SALDO : </small>S/. <span id="mostrarsaldo"><?php echo $saldo; ?></span></h3>
						<input type="hidden" name="saldoasesor2" value="<?php echo $saldo; ?>">
					</div>
					<div class="col-md-2">

					</div>
					<div id="mensajepagoacumulado" class="col-md-4 text">
						<h3 class="text-info">PAGO ACUMULADO : <span id="mostrarpagoacumulado">S/. 0.00</span></h3>
					</div>					
				</div>
				<h3>SOLICITUDES POR ASESOR</h3>
				<div id="solicitudescobranzaasesor" class="small">
					<table class="table table-condensed table-bordered small">
						<tr>
							<th width="3%">ITEM</th>
							<th width="7%">ID. SOL</th>
							<th width="6%">FECH. Reg.</th>
							<th width="8%">MONTO</th>
							<th width="5%">PLAZO</th>
							<th>Monto Acumulado</th>
							<th>APELLIDOS Y NOMBRES</th>
							<th width="15%">MONTO</th>		
							<th width="5%"></th>
						</tr>
						<?php $total=0; $i=0; foreach($solicitudes as $row) { 
							$i++; 
							$total+=$row['monto'];
						 ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row['codigo'] ?></td>
							<td><?php echo date("d/m/Y", strtotime($row['fecha_registro'])); ?></td>
							<td>S/.<?php echo $row['monto'] ?></td>
							<td><?php echo $row['plazo'].' '.$row['tipoplazo']; ?></td>
							<td><?php echo $row['totalpagado']; ?></td>
							<input type="hidden" name="pago[<?php echo $row['codigo'] ?>][codigo]" value="<?php echo $row['codigo'] ?>">
							<input type="hidden" name="pago[<?php echo $row['codigo'] ?>][codcliente]" value="<?php echo $row['codcliente'] ?>">
							<?php $saldo = ($row['monto']*$row['nrocuotas'])-$row['totalpagado'] ?>
							<td><?php echo substr($row['apenom'], 0, 38) ?></td>
							<td align="center">
								<div class="input-group input-group-xs">
									<div class="input-group-addon">
										<input type="radio" name="pago[<?php echo $row['codigo'] ?>][checkcodigo]" class="checkpagar" value="<?php echo $row['codigo'] ?>">
									</div>
									<span class="input-group-addon">S/.</span>
									<!--<input type="text" class="form-control numerosypunto montopagado" id="monto<?php echo $row['codigo'] ?>" name="pago[<?php echo $row['codigo'] ?>][monto]" placeholder="0.00" value="" onchange="sptotal(this, <?php echo floatval($saldo) ?>)" disabled>-->
									<input type="number" class="form-control montopagar" id="monto<?php echo $row['codigo'] ?>" name="pago[<?php echo $row['codigo'] ?>][monto]" value="0" min="<?php echo $row['monto'] ?>" max="" step="<?php echo $row['monto'] ?>" onblur="sptotal(this, <?php echo floatval($saldo) ?>)" onkeydown="return false" disabled>
									<input type="hidden" id="codigo<?php echo $row['codigo'] ?>" name="pago[<?php echo $row['codigo'] ?>][codigo]" value="<?php echo $row['codigo'] ?>" disabled>
									<input type="hidden" id="saldo<?php echo $row['codigo'] ?>" name="pago[<?php echo $row['codigo'] ?>][saldo]" value="<?php echo $saldo ?>" disabled>
								</div>
							</td>
							<td>
								<div class="btn-group btn-group-xs">
									<a target="_blank" href="<?php echo base_url() ?>index.php/ahorros/plandepagosopdf/<?php echo $row['codigo'] ?>" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
									<a target="_blank" href="<?php echo base_url() ?>index.php/ahorros/kardexpdf/<?php echo $row['codigo'] ?>" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
								</div>			
							</td>
						</tr>
						<?php } ?>
						<input type="hidden" name="totalapagar" id="totalapagar" value="0">

						<tr>
							<th colspan="6" align="right">TOTAL</th>
							<th>S/.<?php echo number_format($total,2); ?></th>
							<th></th>
							<th></th>
						</tr>
					</table>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="mensajedecarga" class="small">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
					</div>
					<div class="col-md-2">
						FECHA DE PAGO : 
					</div>
					<div class="col-md-2">
						<input type="text" value="<?php echo date('Y-m-d') ?>" class="form-control input-sm" readonly>
					</div>
					<div class="col-md-2">
						<button type="submit" id="btnguardarpaga" class="btn btn-success pull-right">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
					</div>
				</div>
			</div>
		</div>
	</form>	
	<?php }?>
	<br>
</div>
