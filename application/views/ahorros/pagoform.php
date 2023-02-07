<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>PAGO DE CLIENTE DE AHORROS</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url() ?>index.php/ahorros/pagar" class="form-horizontal" method="POST" onsubmit="return validarpagos2()">
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
						<input type="text" class="form-control input-sm" value="<?php echo $solicitud['idusuario'] ?>" readonly>
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
							<input type="text" class="form-control input-sm" name="totalpagado" value="<?php echo $solicitud['totalpagado'] ?>" readonly>
						</div>					
					</div>
					<label for="" class="control-label col-md-2">SALDO A COMPLETAR</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm" name="totalpagado" value="<?php echo round(($solicitud['nrocuotas']*$solicitud['monto'])-$solicitud['totalpagado'], 2) ?>" readonly>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2">FECHA INICIO</label>
					<div class="col-md-3">
						<input type="text" class="form-control input-sm" value="<?php echo $solicitud['fechainicio'] ?>" readonly>
					</div>
					<label for="" class="control-label col-md-2">FECHA DE PAGO</label>
					<div class="col-md-3">
						<div class="input-group">
							<input type="datetime-local" class="form-control" name="fechapago" value="<?php echo date('Y-m-d\TH:i:s'); ?>">
							<span class="input-group-addon">
								<input type="radio" name="rdbfechapago">
							</span>
						</div>
					</div>
				</div>
				<input type="hidden" name="montocuota" value="<?php echo $solicitud['monto'] ?>">
				<hr>
				<div class="form-group has-success">
					<label for="" class="control-label col-md-2">MONTO</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control" name="montopagar" id="montopagar" value="<?php echo $solicitud['monto'] ?>" readonly>
						</div>
					</div>
					<label for="" class="control-label col-md-1">Nro</label>
					<div class="col-md-1">
						<input type="number" value="1" class="form-control" onchange="$('input[name=montototalpagar]').val($(this).val()*$('input[name=montocuota]').val());">
					</div>
					<label for="" class="control-label col-md-1">Ultima Cuota</label>
					<input type="text" name="ultimonrocuota" value="<?= is_null($ultimoregistropagoahorros) ? 0 : $ultimoregistropagoahorros['nro'] ?>">
				</div>
				<div class="form-group has-success">			
					<label for="" class="control-label col-md-2">TOTAL A PAGAR</label>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control" name="montototalpagar" id="montototalpagar" value="<?php echo $solicitud['monto'] ?>" readonly>
						</div>
					</div>
					<label for="" class="control-label col-md-1">Recibida</label>
					<div class="col-md-1">
						<input type="text" class="form-control" name="mrecibido" id="mrecibido" value="" placeholder="0.00">
					</div>
					<label for="" class="control-label col-md-1">Vuelto</label>
					<div class="col-md-1">
						<input type="text" class="form-control" name="mvuelto" value="0.00">
					</div>					
				</div>
				<div class="form-group">
					<div class="col-md-offset-7 col-md-2">
						<button type="submit" class="btn btn-primary">Guardar</button>
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
			<a href="<?php echo base_url() ?>index.php/ahorros/formeliminarpagos/<?php echo $solicitud['codigo'] ?>" class="btn btn-danger pull-right">Eliminar Pagos</a>
<?php } ?>

		</div>
	</div>
</div>