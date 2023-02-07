<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4>REPORTE FINANCIERO AGENCIA <?php echo $this->session->userdata('agencia') ?></h4>
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url() ?>index.php/report/cargarreportefinanciero" class="form-horizontal" method="POST">
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
						<div class="hidden">
							<select name="agenciabsc" id="agenciabsc" class="form-control">
								<option value="<?php echo $this->session->userdata('agencia') ?>"><?php echo $this->session->userdata('agencia') ?></option>
							</select>
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
						<div class="input-group input-group-xs">
							<span class="input-group-addon">ESTADO</span>
							<select name="estadosolic" id="estadosolic" class="form-control">
								<option value="TODOS">TODOS</option>
								<option value="FINALIZADO">FINALIZADOS</option>
								<option value="APROBADO">VIGENTES</option>
							</select>										
						</div>
					</div>	
					<div class="col-md-1">
						<button type="button" class="btn btn-info btn-xs" id="buscrf"><span class="glyphicon glyphicon-search"></span></button>
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


