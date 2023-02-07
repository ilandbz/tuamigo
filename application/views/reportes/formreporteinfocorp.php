<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>REPORTE PARA INFOCORP</h4>
		</div>
		<div class="panel-body">
			<form action="" class="form-horizontal" method="POST">
				<div class="form-group">
					<label class="col-md-1">DESEMB. </label>
					<div class="col-md-10">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">DESDE</span>
							<input type="date" class="form-control" id="fechaini" name="fechaini" value="<?php echo date('Y-m-d') ?>">
							<span class="input-group-addon">HASTA</span>
							<input type="date" class="form-control" id="fechafin" name="fechafin" value="<?php echo date('Y-m-d') ?>">
							<span class="input-group-addon">ESTADO</span>
							<select name="estadosolic" id="estadosolic" class="form-control">
								<option value="FINALIZADO">FINALIZADOS</option>
								<option value="APROBADO" selected="selected">VIGENTES</option>
								<option value="CASTIGO" selected="selected">CASTIGO</option>								
							</select>
							<span class="input-group-addon">AGENCIA</span>
							<select name="agenciabsc" id="agenciabsc" class="form-control">
								<option value="TODOS">TODOS</option>
								<option value="HUANUCO">HUANUCO</option>
								<option value="TINGO MARIA">TINGO MARIA</option>
							</select>
							<span class="input-group-addon">ASESOR</span>
							<select name="asesor" id="asesor" class="form-control">
								<option value="TODOS">TODOS</option>
								<?php foreach($asesores as $row): ?>
									<option value="<?php echo $row['codusuario'] ?>"><?php echo $row['codusuario'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-1">
						<button type="button" name="bscreporteinfocorp" id="bscreporteinfocorp" class="btn btn-primary btn-xs">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2">
						
					</div>
					<div class="col-md-4">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">AP. Y NOMBRES</span>
							<input type="text" class="form-control" name="apenomrg" value="">
						</div>							
					</div>
			
				</div>



			</form>
		</div>
		<div class="panel-footer">
			<div id="resultadobusqueda" style="font-size:11px;">
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-primary pull-right" title="imprimir" type="button" onclick="tableToExcel('reportegral', 'REPORTE FINANCIERO')"><span class="glyphicon glyphicon-download-alt"></span></button>
				</div>
			</div>
		</div>
	</div>
</div>


