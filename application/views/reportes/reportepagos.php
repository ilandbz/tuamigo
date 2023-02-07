<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3>REPORTE DE PAGOS</h3>
		</div>
		<div class="panel-body">
			<form action="" class="form-horizontal" method="POST">
				<div class="form-group">
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">DESDE</span>
							<input type="date" class="form-control" id="fechaini" name="fechaini" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">HASTA</span>
							<input type="date" class="form-control" id="fechafin" name="fechafin" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>

					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">TIPO</span>
							<select name="tipopagos" id="tipopagos" class="form-control">
								<option value="TODOS">TODOS</option>
								<option value="DIARIO">DIARIO</option>
								<option value="SEMANAL">SEMANAL</option>
							</select>										
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">RECIB. POR</span>
							<select name="usuarios" id="usuarios" class="form-control">
								<option value="TODOS">TODOS</option>
								<?php foreach($usuarios as $row): ?>
								<option value="<?php echo $row['codusuario'] ?>"><?php echo $row['codusuario'] ?></option>
								<?php endforeach; ?>
							</select>										
						</div>
					</div>						
					<div class="col-md-1">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-primary" type="button" id="buscarpagosreport"><span class="glyphicon glyphicon-search"></span></button>
					</div>	
									
					<div class="col-md-3">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">DESCRIPCION</span>
							<input type="text" class="form-control" name="apenomrp" value="">
						</div>						
					</div>
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<div id="resultadobusqueda">
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-primary pull-right" title="imprimir" type="button" onclick="tableToExcel('registrospagos', 'REPORTE CAJA')"><span class="glyphicon glyphicon-download-alt"></span></button>
				</div>
			</div>
		</div>
	</div>
</div>


