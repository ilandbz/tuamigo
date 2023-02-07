<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>REPORTE DESEMBOLSOS</h3>
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
							<span class="input-group-addon">AGENCIA</span>
							<select name="agenciabsc" id="agenciabsc" class="form-control">
								<?php if($this->session->userdata('tipouser')==4){ ?>
								<option value="<?php echo $this->session->userdata('agencia') ?>"><?php echo $this->session->userdata('agencia') ?></option>
								<?php }else{ ?>
								<option value="TODOS">TODOS</option>
								<option value="HUANUCO">HUANUCO</option>
								<option value="TINGO MARIA">TINGO MARIA</option>
								<option value="HUANUCO2">HUANUCO2</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">ASESOR</span>
							<select name="asesor" id="asesor" class="form-control">
								<option value="TODOS">TODOS</option>
								<?php foreach ($asesores as $f) { ?>
									<option value="<?php echo $f['codusuario'] ?>"><?php echo $f['codusuario'] ?></option>	
								<?php } ?>

							</select>							
						</div>					
					</div>
					<div class="col-md-1">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-primary" type="button" id="buscarldesem"><span class="glyphicon glyphicon-search"></span></button>
					</div>
				</div>

			</form>
		</div>
		<div class="panel-footer">
			<div id="resultadobusqueda">
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-primary pull-right" title="imprimir" type="button" onclick="tableToExcel('registroscaja', 'REPORTE CAJA')"><span class="glyphicon glyphicon-download-alt"></span></button>
				</div>
			</div>
		</div>
	</div>
</div>


