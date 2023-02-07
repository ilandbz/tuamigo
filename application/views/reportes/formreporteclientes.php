<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>REPORTE DE CLIENTES</h4>
		</div>
		<div class="panel-body">
			<form action="" class="form-horizontal" method="POST">
				<div class="form-group">
					<label class="col-md-2">FECH. REG. </label>
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
							<span class="input-group-addon">ESTADO</span>
							<select name="estado" id="estado" class="form-control">
								<option value="TODOS">TODOS</option>
								<option value="INSCRITO">INSCRITO</option>
								<option value="SOLICITADO">SOLICITADO</option>
								<option value="ACTIVO">ACTIVO</option>
								<option value="INACTIVO">INACTIVO</option>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">ASESOR</span>
							<select name="asesor" id="asesor" class="form-control">
								<option value="TODOS">TODOS</option>
								<?php foreach($asesores as $row): ?>
									<option value="<?php echo $row['codusuario'] ?>"><?php echo $row['codusuario'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>						
					</div>	
					<div class="col-md-2">
						<button type="button" class="btn btn-info btn-xs" id="buscrepclientes">BUSCAR <span class="glyphicon glyphicon-search"></span></button>
					</div>					
				</div>

			</form>
		</div>
		<div class="panel-footer">
			<div id="resultadobusqueda" style="font-size:11px;">
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-primary pull-right" title="imprimir" type="button" onclick="tableToExcel('reporteclientes', 'REPORTE DE CLIENTES')"><span class="glyphicon glyphicon-download-alt"></span></button>
				</div>
			</div>
		</div>
	</div>
</div>


