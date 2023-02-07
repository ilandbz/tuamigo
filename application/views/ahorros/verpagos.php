<div class="container">
	<form action="<?php echo base_url() ?>index.php/ahorros/guardarpagos" name="guardarpagos" class="form-horizontal" onsubmit="return checkSubmit();" method="POST">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					<div class="row">
						<div class="col-md-9">
							CLIENTE : <?php echo $solicitud['apenom'] ?>
						</div>
						<div class="col-md-3">
							COD. CLIENTE : <?php echo $solicitud['codcliente'] ?>
							<input type="hidden" name="codigo" value="<?php echo $solicitud['codigo'] ?>">
							<input type="hidden" name="codcliente" value="<?php echo $solicitud['codcliente'] ?>">
						</div>	
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="" class="control-label col-md-2">ID</label>
					<div class="col-md-2">
						<input type="text" class="form-control" value="<?php echo $solicitud['codigo'] ?>">
					</div>
					<label for="" class="control-label col-md-2">FECHA DE SOLICITUD</label>
					<div class="col-md-2">
						<input type="text" class="form-control" value="<?php echo $solicitud['fecha_registro'] ?>">
					</div>
					<div class="col-md-2">
						<a href="<?php echo base_url() ?>index.php/ahorros/pagoform/<?php echo $solicitud['codigo'] ?>" title="Pagar Monto Especifico" class="btn btn-info pull-right">
						<span class="glyphicon glyphicon-usd"></span></a>
					</div>			
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">ASESOR</label>
					<div class="col-md-2">
						<div class="input-group input-group-sm">
							<span class="input-group-addon"><?php echo $solicitud['idusuario'] ?></span>
							<input type="text" class="form-control" value="<?php echo $solicitud['idusuario'] ?>">				
						</div>
					</div>
					<label for="" class="control-label col-md-2">NRO DE CUOTAS</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" value="<?php echo $solicitud['nrocuotas'] ?>">
					</div>
					<label for="" class="control-label col-md-2">MONTO</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="monto" value="S/.<?php echo $solicitud['monto'] ?>" readonly>
					</div>						
				</div>
				<h4>LISTA DE CUOTAS</h4>
				<style type="text/css">
					.my-custom-scrollbar {
				position: relative;
				height: 300px;
				overflow: auto;
				}
				.table-wrapper-scroll-y {
				display: block;
				}
				</style>
				<div class="table-wrapper-scroll-y my-custom-scrollbar">
					<table class="table table-condensed table-bordered small">
						<tr>
							<th width="5%">NRO</th>
							<th width="10%">DIA LETRAS</th>
							<th>FECHA PROG.</th>
							<th>MONTO</th>
							<th width="15%">FECHA DE PAGO</th>
							<th>MONTO PAGADO</th>
							<th>IDUSUARIO</th>
						</tr>
					<?php 
					$total = 0;
					$totalpagado = 0;
					foreach($cuotas as $row) : 
						$total += $row['cuota'];
						$totalpagado+= $row['montopagado'];
					?>
					<tr>
						<td><?php echo $row['nrocuota'] ?></td>
						<td><?php echo $row['nombredia'] ?></td>
						<td><?php 
							echo date("d/m/Y", strtotime($row['fechaprog']));
						?></td>
						<td>S/.<?php echo $row['cuota'] ?></td>
						<td><?php echo $row['fechareg'] ?></td>
						<td><?php echo $row['montopagado'] ?></td>
						<td><?php echo $row['idusuario'] ?></td>
					</tr>
					<?php endforeach; ?>
					<tr>
						<td></td><td></td>				
						<td colspan="2" align="right">
							TOTAL : S/. <?php echo $total ?>
						</td>
						<td align="right">
							TOTAL PAGADO S/.<?php echo $totalpagado; ?>
						</td>
						<td align="center" class="text-info">
							SALDO S/. <?php echo $total-$totalpagado; ?>
						</td>
						<td></td>
					</tr>
				</table>
				</div>
			<br>
			<div class="row">
				<div class="col-md-7"></div>
				<div class="col-md-4">MORA</div>

			</div>
			<div class="row">
				<div class="col-md-7"></div>
				<div class="col-md-4">DIAS VENCIDOS CREDITO</div>

			</div>
			<div class="row">
				<div class="col-md-9"></div>
				<div class="col-md-2">DIAS ATRASADO(s)</div>
			</div>
			<div class="row">
				<div class="col-md-6">		
				</div>
				<div class="col-md-2">DIAS MORA ACUM.</div>
				<div class="col-md-2">TOTAL MORA ACUM</div>
			</div>
			<div class="row">
				<div class="col-md-6">		
				</div>
				<div class="col-md-2">MORA PAGADO</div>
				<div class="col-md-2">SALDO MORA</div>
			</div>
			</div>
			<div class="panel-footer">
				<a href="<?php echo base_url() ?>index.php/ahorros/reportecobranzapdf/<?php echo $solicitud['codigo'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Calendario de Pagos</a>
				<a href="<?php echo base_url() ?>index.php/ahorros/plandepagosopdf/<?php echo $solicitud['codigo'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Plan de Pagos</a>				
				<a href="<?php echo base_url() ?>index.php/ahorros/kardexpdf/<?php echo $solicitud['codigo'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Kardex de Pagos</a>
<?php if(isset($tipouser) && $tipouser==3){ ?>
				<a href="<?php echo base_url() ?>index.php/pagos/formeliminarpagos/<?php echo $solicitud['iddesembolso'] ?>" class="btn btn-danger pull-right">Eliminar Pagos</a>
<?php } ?>
			</div>
		</div>
	</form>
</div>
