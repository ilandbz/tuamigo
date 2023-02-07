<div class="container">
	<form action="<?php echo base_url() ?>index.php/caja/reggastos" class="form-horizontal" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">GASTOS</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="tipogasto" class="control-label col-md-1">TIPO</label>
					<div class="col-md-2">
						<select name="tipogasto" id="tipogasto" class="form-control" required="true">
							<option value="">Seleccione</option>
							<option value="Celebracion">Celebracion</option>
							<option value="Regalo">Regalo</option>
							<option value="Break">Break</option>
							<option value="Medicina">Medicina</option>
							<option value="Pasaje">Pasaje</option>
							<option value="Alquiler de Local">Alquiler de Local</option>							
							<option value="Otros">Otros</option>	
						</select>
						<input type="hidden" name="estado" value="GST">
					</div>
					<label for="montogasto" class="control-label col-md-offset-5 col-md-1">MONTO</label>
					<div class="col-md-2">
						<input type="text" class="form-control numerosypunto" id="montogasto" name="montogasto" value="" placeholder="S/. 0.00" required>
					</div>
				</div>
				<div class="form-group" style="font-size: 10px;">

					<label for="montogasto" class="control-label col-md-1">COMPROBANTE</label>
					<div class="col-md-2">
						<select name="tipocomprobante" id="tipocomprobante" class="form-control input-xs">
							<option value="Boleta">Boleta</option>
							<option value="Factura">Factura</option>
							<option value="Vaucher">Baucher</option>							
							<?php if($this->session->userdata('tipouser')==3) {?>

							<option value="Ninguno">Ninguno</option>
							<?php } ?>
						</select>
					</div>
					<label for="ruc" class="control-label col-md-2 solo_numeros">RUC</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-xs" id="ruc" name="ruc" value="" placeholder="RUC" required>
					</div>
					<label for="razonsocial" class="control-label col-md-2">RAZON SOCIAL</label>
					<div class="col-md-3">
						<input type="text" class="form-control input-xs" id="razonsocial" name="razonsocial" value="" placeholder="Razon Social" required>
					</div>
				</div>
				<div class="form-group" style="font-size: 10px;">
					<label for="nrocomprobante" class="control-label col-md-1">NRO</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-xs" id="nrocomprobante" name="nrocomprobante" value="" placeholder="000-00000" required>
					</div>
					<label for="conceptogasto" class="control-label col-md-2">CONCEPTO</label>
					<div class="col-md-6">
						<textarea name="conceptogasto" id="conceptogasto" placeholder="Concepto" class="form-control" rows="2" required></textarea>
					</div>														
				</div>
				<div class="form-group">
					<div class="col-md-2">
						<button type="submit" class="btn btn-primary pull-right">Guardar</button>
					</div>
				</div>
				<hr>
				<form action="" class="form-horizontal ">
					<div class="form-group">
						<label for="" class="control-label col-md-3">REGISTROS DESDE LA FECHA : </label>
						<div class="col-md-2">
							<input type="date" class="form-control" id="fechadetcajagasto" name="fechadetcajagasto" value="<?php echo date('Y-m-d') ?>">
						</div>
						<label for="" class="control-label col-md-3">REGISTROS DESDE LA FECHA : </label>
						<div class="col-md-2">
							<input type="date" class="form-control" id="fechadetcajagastofin" name="fechadetcajagastofin" value="<?php echo date('Y-m-d') ?>">
						</div>	
						<div class="col-md-2">
							<button type="button" class="btn btn-info" id="buscaregresosfechas"><span class="glyphicon glyphicon-search"></span></button>
						</div>					
					</div>
				</form>

				<div class="row">
					<div class="col-md-12">
						<div id="tabladetcaja">
						<?php $this->view('caja/detallecaja'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>