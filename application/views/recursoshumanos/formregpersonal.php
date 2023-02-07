<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			REGISTRAR NUEVO PERSONAL
		</div>
		<div class="panel-body">
			<form action="<?= base_url() ?>index.php/rrhh/registrarpersonal" method="POST" class="form-horizontal">
				<div class="form-group">
					<div class="col-md-1"></div>
					<div class="col-md-2">
						<a href="<?= base_url() ?>index.php/cliente/crearpersonaform" class="btn btn-success">Registrar Persona</a>	
					</div>	
				</div>
				<div class="form-group">
				    <label for="dni" class="control-label col-md-1">DNI</label>
				    <div class="col-md-2">
				        <input class="form-control solo_numeros input-xs" id="dni" name="dni" maxlength="8" placeholder="DNI" type="text" required="true" />
				    </div> 
				    <label for="cargo" class="control-label col-md-1">CARGO :</label>
				    <div class="col-md-2">
						<input class="form-control input-xs" id="cargo" name="cargo" type="text" required="true" />
				    </div>
				    <label for="sueldo" class="control-label col-md-1">SUELDO</label>
				    <div class="col-md-2">
				        <input class="form-control input-xs numerosypunto" type="text" name="sueldo" id="sueldo" placeholder="0.00" required>
				    </div>
				    <label for="fechainicio" class="control-label col-md-1">INICIO</label>
				    <div class="col-md-2">
				        <input class="form-control input-xs" type="date" name="fechainicio" id="fechainicio" value="<?= date('Y-m-d') ?>" required>
				    </div>				
				</div>
				<br>
				<div class="form-group">
				    <label for="tipo" class="control-label col-md-1">TIPO</label>
				    <div class="col-md-2">
				       	<select name="tipo" class="form-control">
				       		<option value="DIRECTO">DIRECTO</option>
				       		<option value="INDIRECTO">INDIRECTO</option>
				       	</select>
				    </div> 
				    <div class="col-md-2">
				    	<button type="submit" class="btn btn-primary">Guardar</button>
				    </div>		
				</div>
			</form>
		</div>
	</div>
</div>



