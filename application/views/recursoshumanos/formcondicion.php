<div class="container">
	<form action="<?php echo base_url() ?>index.php/rrhh/registraroperacion" class="form-horizontal input-sm" name="guardar_solicitud" role="form" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-primary">
			<div class="panel-heading">
				REGISTRAR OPERACION DE CONDICION DE TRABAJADOR
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="personal" class="control-label col-md-2">PERSONAL</label>
				    <div class="col-md-4">
				    <select name="personal" id="personal" class="form-control">
				    <option value="">Seleccione</option>   
				    <?php foreach($registros as $row) :  ?>
				    		<option value="<?= $row['dni'] ?>"><?= $row['apenom'] ?></option>
				    <?php endforeach; ?>
				    </select>				    
				    </div>
				    <div class="col-md-2">
						<input type="text" name="mes" value="" readonly="true" class="form-control">
				    </div>
				    <label for="fecha_hora" class="control-label col-md-2">FECHA HORA</label>
				    <div class="col-md-2">
				        <input class="form-control" id="fecha_hora" name="fecha_hora" type="datetime" maxlength="8" value="<?php echo date('Y-m-d H:i:s') ?>" readonly />
				    </div>				    	
				</div>
				<div class="form-group">
				    <label for="tiporegistro" class="control-label col-md-2">TIPO</label>
				    <div class="col-md-4">
				    	<select name="tiporegistro" class="form-control">
				    		<option value="MOVILIDAD">MOVILIDAD</option>
				    		<option value="ALIMENTACION">ALIMENTACION</option>
				    		<option value="BONO POR META">BONO POR META</option>
				    		<option value="ASIGNACION FAMILIAR">ASIGNACION FAMILIAR</option>
				    		<option value="OTRAS BONIFICACIONES">OTRAS BONIFICACIONES</option>
				    	</select>
				    	<input type="hidden" name="tipo" value="INGRESO">
				    </div>
				    <label for="monto" class="control-label col-md-2">MONTO</label>
				    <div class="col-md-2">
				        <input class="form-control" id="monto" name="monto" type="text" maxlength="8" value="" placeholder="S/.0.00" required="true" />
				    </div>				    
				</div>
				<div class="form-group">
				    <label for="descripcion" class="control-label col-md-2">DESCRIPCION</label>
				    <div class="col-md-6">
				    	<textarea class="form-control" name="descripcion"></textarea>
				    </div>				    				
				</div>		
			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Registrar</button>
			</div>
		</div>
	</form>	
</div>