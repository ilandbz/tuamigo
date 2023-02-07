<div class="container-fluid">
	<form action="<?= base_url() ?>index.php/facturador/formregistrosaemitir" class="form-horizontal" method="POST">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>REPORTE FINANCIERO CASTIGO</h4>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-1">PAGADOS </label>
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">DESDE</span>
							<input type="date" class="form-control" id="fechainipagos" name="fechainipagos" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">HASTA</span>
							<input type="date" class="form-control" id="fechafinpagos" name="fechafinpagos" max="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">AGENCIA</span>
							<select name="agenciabsc" id="agenciabsc" class="form-control">
								<option value="TODOS">TODOS</option>
								<option value="HUANUCO">HUANUCO</option>
								<option value="TINGO MARIA">TINGO MARIA</option>
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

							<select name="estadosolic" id="estadosolic" class="hidden">
								<option value="CASTIGO">CASTIGO</option>
							</select>										

					<div class="col-md-1">
						<button type="button" class="btn btn-info btn-xs" id="buscrf"><span class="glyphicon glyphicon-search"></span></button>
					</div>					
				</div>
			</div>
			<div class="panel-footer">
				<div id="resultadobusqueda" style="font-size:11px;">
				</div>
				<div class="row">
					<div class="col-md-10">
						
					</div>
					<div class="col-md-2">
						<button class="btn btn-primary" title="imprimir" type="button" onclick="tableToExcel('reportegral', 'REPORTE FINANCIERO')"><span class="glyphicon glyphicon-download-alt"></span></button>
						<button class="btn btn-success" type="submit" title="Emitir Comprobantes">Comprobantes</button>
					</div>
				</div>
			</div>
		</div>
	</form>	
</div>


