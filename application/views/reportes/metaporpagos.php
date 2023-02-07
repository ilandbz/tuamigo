<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>META POR FECHA DE PAGOS</h4>
		</div>
		<div class="panel-body">
			<form action="" class="form-horizontal" method="POST">
				<div class="form-group">
					<label class="col-md-2"></label>
					<div class="col-md-2">
 						<div class="input-group input-group-xs">
							<span class="input-group-addon">DESDE</span>
							<input type="date" class="form-control" id="metafechai" name="metafechai" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>					
					<div class="col-md-2">
 						<div class="input-group input-group-xs">
							<span class="input-group-addon">HASTA</span>
							<input type="date" class="form-control" id="metafechaf" name="metafechaf" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">ESTADO</span>
							<select name="estado" id="estado" class="form-control">
								<option value="TODOS">TODOS</option>
								<option value="APROBADO" selected="selected">VIGENTES</option>
								<option value="FINALIZADO">FINALIZADOS</option>
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
						<button type="button" class="btn btn-info btn-xs" id="cargarmetapp">CARGAR <span class="glyphicon glyphicon-search"></span></button>
					</div>					
				</div>

			</form>
		</div>
		<div class="panel-footer">
			<div id="resultadobusqueda" style="font-size:11px;">

			</div>
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-primary pull-right" title="imprimir" type="button" onclick="tableToExcel('reportemetas', 'REPORTE DE META')"><span class="glyphicon glyphicon-download-alt"></span></button>
				</div>
			</div>
		</div>
	</div>
</div>


