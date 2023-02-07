<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">INGRESO</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url() ?>index.php/caja/regingreso" class="form-horizontal" method="POST" onsubmit="return checkSubmit()">
				<div class="form-group">
					<label for="montoingreso" class="control-label col-md-2">MONTO</label>
					<div class="col-md-2">
						<input type="text" class="form-control numerosypunto" id="montoingreso" name="montoingreso" value="" placeholder="S/. 0.00" required>
					</div>
					<div class="col-md-offset-4 col-md-2">
						<button type="submit" class="btn btn-primary pull-right">Guardar</button>
					</div>
				</div>
				<div class="form-group">
					<label for="conceptoingreso" class="control-label col-md-2">CONCEPTO</label>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon">INGRESO POR : </span>
							<textarea name="conceptoingreso" id="conceptoingreso" placeholder="Concepto" class="form-control" rows="2" required></textarea>
						</div>
					</div>
				</div>
			</form>
			<form action="" class="form-horizontal ">
				<div class="form-group">
					<label for="" class="control-label col-md-3">REGISTROS DESDE FECHA : </label>
					<div class="col-md-2">
						<input type="date" class="form-control" id="fechadetcajaingreso" name="fechadetcajaingreso" value="<?php echo date('Y-m-d') ?>">
					</div>
					<label for="" class="control-label col-md-2">HASTA : </label>
					<div class="col-md-2">
						<input type="date" class="form-control" id="fechadetcajaingresohasta" name="fechadetcajaingresohasta" value="<?php echo date('Y-m-d') ?>">
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-info" id="buscaringresosfechas"><span class="glyphicon glyphicon-search"></span></button>
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
</div>