<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>REPORTE DE CAJA</h3>
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
							<select name="tipocaja" id="tipocaja" class="form-control">
								<option value="TODOS">TODOS</option>
								<option value="INGRESO">INGRESO</option>
								<option value="SALIDA">SALIDA</option>
							</select>										
						</div>
						<br>
						<div class="input-group input-group-xs">
							<span class="input-group-addon">ESPECIFIQUE</span>
							<select name="tipocajaespec" id="tipocajaespec" class="form-control" disabled="disabled">
								<option value="">TODOS</option>
							</select>							
						</div>
					</div>			
					<div class="col-md-2">

						<div class="input-group input-group-xs">
							<span class="input-group-addon">USUARIO</span>
							<select name="usuario" id="usuario" class="form-control">
								<option value="TODOS">TODOS</option>
								<?php foreach ($usuarios as $row) { ?>
									<option value="<?php echo $row['codusuario'] ?>"><?php echo $row['codusuario'] ?></option>
								<?php } ?>
							</select>							
						</div>					
					</div>
					<div class="col-md-2">
						<?php if($this->session->userdata('tipouser')==3){ ?>
						<div class="input-group input-group-xs">
							<span class="input-group-addon">AGENCIA</span>
							<select name="agencia" id="agencia" class="form-control">
								<option value="HUANUCO">HUANUCO</option>
								<option value="HUANUCO2">HUANUCO2</option>
								<option value="TINGO MARIA">TINGO MARIA</option>
							</select>							
						</div>
						<?php } ?>
					</div>
					<div class="col-md-1">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-primary" type="button" id="buscarxtipoc"><span class="glyphicon glyphicon-search"></span></button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-5">
						<div class="input-group input-group-xs">
							<span class="input-group-addon">DESCRIPCION</span>
							<input type="text" class="form-control" name="cajadesc" value="">
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
					<button class="btn btn-primary pull-right" title="imprimir" type="button" onclick="exportTableToExcel('registroscaja', 'REPORTE CAJA')"><span class="glyphicon glyphicon-download-alt"></span></button>
<!-- 					<button class="btn btn-primary pull-right" title="imprimir" type="button" onclick="tableToExcel('registroscaja', 'REPORTE CAJA')"><span class="glyphicon glyphicon-download-alt"></span></button> -->					
				</div>
			</div>
		</div>
	</div>
</div>


