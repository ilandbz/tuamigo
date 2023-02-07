<?php 
if($fechaultimacuota<date('Y-m-d')){
	$interes=$tasainteres*($solicitud['monto']*$solicitud['nrocuotas']);		
}else{
	$interes=0;
}
?>
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>DEVOLUCION DE CLIENTES DOCO</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url() ?>index.php/ahorros/devolver" class="form-horizontal" method="POST" onsubmit="return validarpagos2()">
				<div class="form-group">
					<label for="" class="control-label col-md-2">CLIENTE</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon"><?php echo $solicitud['codcliente'] ?></span>
							<input type="text" name="apenomcliente" value="<?php echo $solicitud['apenom'] ?>" class="form-control" readonly>
							<input type="hidden" name="codigo" value="<?php echo $solicitud['codigo'] ?>">			
						</div>
					</div>
					<label for="" class="control-label col-md-2">ASESOR</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" name="asesor" value="<?php echo $solicitud['idusuario'] ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">SOLICITUD</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" value="<?php echo $solicitud['codigo'] ?>" readonly>
					</div>
					<label for="" class="control-label col-md-2">MONTO ACUMULADO</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm" name="saldo" value="<?php echo $solicitud['totalpagado'] ?>" readonly>
						</div>					
					</div>
					<label for="" class="control-label col-md-2">SALDO A COMPLETAR</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm" name="restaahorro" value="<?php echo ($solicitud['nrocuotas']*$solicitud['monto'])-$solicitud['totalpagado'] ?>" readonly>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">FECHA INICIO</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" value="<?php echo $solicitud['fechainicio'] ?>" readonly>
					</div>
					<label for="" class="control-label col-md-2">FECHA DE PAGO</label>
					<div class="col-md-2">
						<input type="date" class="form-control" name="fechapago" value="<?php echo date('Y-m-d'); ?>">
					</div>
					<label for="" class="control-label col-md-2">INTERES</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">
								<?php echo $tasainteres*100; ?>%
							</span>
							<span class="input-group-addon">
								S/.
							</span>
							<input type="text" class="form-control" name="interes" value="<?php echo $interes ?>">
							<span class="input-group-addon">
							<input type="radio" name="agregarinteresdev" id="agregarinteresdev" onchange="">
							</span>		
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">FECHA FIN</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" value="<?php echo $fechaultimacuota ?>" readonly>
					</div>
					<div class="col-md-4">
						<?php //$this->view('solicitud/tablasolicitudesvigentes2') ?>
<?php $totalsaldo=0; if(count($solvigentes)>0){
;
 ?>
<table class="table table-bordered" style="font-size:10px">
	<tr>
		<th>idsolicitud</th>
		<th>Monto</th>
		<th>Fecha</th>
		<th>Saldo</th>
		<th>Mora deb.</th>
	</tr>
	<?php 
	$a = 0;
	foreach($solvigentes as $row){
	?>
	<tr>
		<td><a href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $row['idsolicitud'] ?>"><?php echo $row['idsolicitud'] ?></a></td>
		<td><?php echo $row['monto'] ?></td>
		<td><?php echo $row['fecha_hora'] ?></td>
		<td>S/.<?php
		$saldo = is_null($row['saldo']) ? 0 : $row['saldo'];
		$totalsaldo += $saldo;
		 echo $saldo; ?></td>
		<td>S/.<?php $mora = $row['moradias']-$row['pagomora'];
			echo $mora*$row['costomora'];
			$totalsaldo += $mora*$row['costomora'];
		 ?></td>
	</tr>
	<?php 
		$a++; 
	} ?>
</table>
<?php } ?>
					</div>
					<label for="" class="control-label col-md-2">COSTO TARJETA</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">
								S/.
							</span>
							<input type="text" class="form-control" name="costotarjeta" value="5">
							<span class="input-group-addon">
							<input type="radio" name="agregarctarjeta" id="agregarctarjeta" onchange="">
							</span>		
						</div>
					</div>
				</div>
				<input type="hidden" name="montocuota" value="<?php echo $solicitud['monto'] ?>">
				<hr>
				<div class="form-group has-success">			
					<label for="" class="control-label col-md-2">TOTAL A DEVOLVER</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control" name="totaldevolver" id="totaldevolver" value="<?php echo $solicitud['totalpagado'] ?>" readonly>
						</div>
					</div>
					<div class="col-md-2">

					<?php if($totalsaldo<$solicitud['totalpagado']){ ?>
						<button type="submit" class="btn btn-primary">REGISTRAR EN CAJA</button>
					<?php } else { 

						if($this->session->userdata('tipouser')==3){ ?>
<button type="submit" title="Tiene Saldos Vigentes" class="btn btn-primary devolverconfirm">REGISTRAR EN CAJA</button>
						<?php }else{ ?>
<button type="submit" title="Tiene Saldos Vigentes" class="btn btn-primary" disabled="true">REGISTRAR EN CAJA</button>
						<?php } ?> 
					<?php } ?>

					</div>					
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<a href="<?php echo base_url() ?>index.php/ahorros/verpagos/<?php echo $solicitud['codigo'] ?>" class="btn btn-info">VER PAGOS</a>
			<a href="<?php echo base_url() ?>index.php/ahorros/reportecobranzapdf/<?php echo $solicitud['codigo'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Calendario de Pagos</a>
			<a href="<?php echo base_url() ?>index.php/ahorros/plandepagosopdf/<?php echo $solicitud['codigo'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Plan de Pagos</a>			
			<a href="<?php echo base_url() ?>index.php/ahorros/kardexpdf/<?php echo $solicitud['codigo'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Kardex de Pagos</a>
<?php if($this->session->userdata('tipouser')==3){ ?>
			<a href="<?php echo base_url() ?>index.php/pagos/formeliminarpagos/<?php echo $solicitud['codigo'] ?>" class="btn btn-danger pull-right">Eliminar Pagos</a>
<?php } ?>

		</div>
	</div>
</div>