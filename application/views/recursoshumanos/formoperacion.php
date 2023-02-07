<div class="container">
	<form action="<?php echo base_url() ?>index.php/rrhh/registraroperacion" class="form-horizontal input-sm" name="guardar_solicitud" role="form" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-primary">
			<div class="panel-heading">
				REGISTRAR OPERACION DE RECURSOS HUMANOS
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="personal" class="control-label col-md-2">PERSONAL</label>
				    <div class="col-md-4">
				    <select name="personal" id="personal" class="form-control">				    
				    <?php foreach($registros as $row) :  ?>
				    		<option value="<?= $row['dni'] ?>"><?= $row['apenom'] ?></option>
				    <?php endforeach; ?>
				    </select>				    
				    </div>

				    <div class="col-lg-offset-4 col-md-2">
				    	<a href="<?= base_url() ?>index.php/rrhh/sueldoform" class="btn btn-success">SUELDOS</a>
				    </div>			
				</div>
				<div class="form-group">
				    <label for="fecha_hora" class="control-label col-md-2">FECHA HORA</label>
				    <div class="col-md-2">
				        <input class="form-control" id="fecha_hora" name="fecha_hora" type="datetime" maxlength="8" value="<?php echo date('Y-m-d h:i:s') ?>" readonly />
				    </div>
				    <label for="tipo" class="control-label col-md-2">TIPO</label>
				    <div class="col-md-4">
				    	<select name="tipo" class="form-control">
				    		<option value="ADELANTO DE SUELDO">ADELANTO DE SUELDO</option>
				    		<option value="MOVILIDAD">MOVILIDAD</option>
				    		<option value="COMISION">COMISION</option>
				    		<option value="ALIMENTACION">ALIMENTACION</option>
				    		<option value="HOSPEDAJE">HOSPEDAJE</option>
				    		<option value="TARDANZA">TARDANZA</option>
				    		<option value="MAL CIERRE">MAL CIERRE</option>
				    		<option value="AFP">AFP</option>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="monto" class="control-label col-md-2">MONTO</label>
				    <div class="col-md-2">
				        <input class="form-control" id="monto" name="monto" type="text" maxlength="8" value="" placeholder="S/.0.00" required="true" />
				    </div>
				    <label for="descripcion" class="control-label col-md-2">DESCRIPCION</label>
				    <div class="col-md-6">
				    	<textarea class="form-control" name="descripcion"></textarea>
				    </div>				    				
				</div>
				<button type="submit" id="btnguardar_solicitud" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Registrar</button>


<?php if($this->session->userdata('tipouser')==3){ ?>
	<a href="<?= base_url() ?>index.php/rrhh/formregpersonal" title="Registar Nuevo Personal" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Nuevo Personal</a>

<?php } ?>




				<br><br><br><br>
				<H4>OPERACIONES</H4>
				<div class="bg-success">
					<table class="table table-striped">
						<tr>
							<th>NRO</th>
							<th>FECHA HORA</th>
							<th>TIPO</th>
							<th>MONTO</th>
							<th>DNI</th>
							<th>DESCRIPCION</th>
							<th>USUARIO</th>
							<th>AGENCIA</th>
						</tr>
						<?php $i=0; foreach($operaciones as $row) { $i++; ?>
							<tr>
								<th><?= $i ?></th>
								<th><?= $row['fecha_hora'] ?></th>
								<th><?= $row['tipo'] ?></th>
								<th><?= $row['monto'] ?></th>
								<th><a href="<?= base_url() ?>index.php/rrhh/verpersonal/<?= $row['dni'] ?>"><?= $row['apenom'] ?></a></th>
								<th><?= $row['descripcion'] ?></th>
								<th><?= $row['usuario'] ?></th>
								<th><?= $row['agencia'] ?></th>
							</tr>

						<?php } ?>
					</table>
				</div>				
			</div>
			<div class="panel-footer">

			</div>
		</div>
	</form>	



</div>
