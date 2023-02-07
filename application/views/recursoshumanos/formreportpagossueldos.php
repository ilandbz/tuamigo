<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>REPORTE DE SUELDOS</h4>
		</div>
		<div class="panel-body">
			<form action="" class="form-horizontal" method="POST">
				<div class="form-group">
					<label class="col-md-2">FECHA REGISTROS</label>
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">DESDE</span>
							<input type="date" class="form-control" id="fechainireg" name="fechainireg" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">HASTA</span>
							<input type="date" class="form-control" id="fechafinreg" name="fechafinreg" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">PERSONAL</span>
							<select name="personal" id="personal" class="form-control">
								<option value="">TODOS</option>
								<?php foreach($personal as $row): ?>
									<option value="<?php echo $row['dni'] ?>"><?php echo $row['apenom'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>						
					</div>	
					<div class="col-md-2">
						<button type="button" class="btn btn-info btn-xs" id="btnbuscarrepsueldos">BUSCAR <span class="glyphicon glyphicon-search"></span></button>
					</div>					
				</div>

			</form>
		</div>
		<div class="panel-footer">
			<div id="resultadobusqueda" style="font-size:11px;">
			</div>
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-primary pull-right" title="imprimir" type="button" onclick="tableToExcel('reportesueldos', 'REPORTE DE SUELDOS')"><span class="glyphicon glyphicon-download-alt"></span></button>
				</div>
			</div>
		</div>
	</div>
</div>


