<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">
				CALCULAR MORA
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label for="fechaini">FECHA PROG.</label>
						<input type="date" class="form-control" name="fechaini" id="fechaini" value="<?php echo date('Y-m-d'); ?>">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="fechaact">FECHA ACTUAL</label>
						<input type="date" class="form-control" name="fechaact" id="fechaact" value="<?php echo date('Y-m-d'); ?>">			
					</div>		
				</div>
				<div class="col-md-3">
					<label for="">TIPO DE PLAZO</label>
					<select name="tipoplazo" id="tipoplazo" class="form-control">
						<option value="">Seleccione</option>
						<option value="DIARIO">DIARIO</option>
						<option value="SEMANAL">SEMANAL</option>
						<option value="QUINCENAL">QUINCENAL</option>
						<option value="MENSUAL">MENSUAL</option>
					</select>
				</div>
				<div class="col-md-2">&nbsp;
					<br>
					<button name="calcularmbtn" class="btn btn-primary" type="button">CALCULAR</button>
				</div>
				<div class="col-md-3">
					<div id="resultadomora" class="h3 text-primary"></div>
				</div>
			</div>
		</div>
	</div>
</div>