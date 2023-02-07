<div class="container-fluid">
	<form action="<?php echo base_url() ?>index.php/ahorros/actualizarsolicitud" class="form-horizontal input-sm" name="guardar_solicitud" role="form" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-primary">
			<div class="panel-heading">
				ACTUALIZAR SOLICITUD DOCO 
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="nrosolicitud" class="control-label col-md-2">NRO DE SOLICITUD</label>
				    <div class="col-md-2">
				        <input class="form-control solo_numeros" id="nrosolicitud" name="nrosolicitud" type="text" maxlength="8" value="<?php echo $solicitud['codigo'] ?>" readonly />
				    </div>
				    <label for="fecha" class="control-label col-md-2">FECHA</label>
				    <div class="col-md-3">
				    	<input type="date" id="fecha" name="fecha" class="form-control input-sm" value="<?php echo $solicitud['fecha_registro']; ?>">
				    </div> 
				</div>
				<div class="form-group">
				    <label for="montosolic" class="control-label col-md-2">MONTO.</label>
				    <div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
				    		<input type="text" id="montosolic" name="montosolic" class="form-control input-sm numerosypunto" value="<?php echo $solicitud['monto'] ?>" placeholder="0.00" required>	
						</div>
				    </div> 
				    <label for="descripcion" class="control-label col-md-2">TIPO</label>
				    <div class="col-md-3">
				        <select name="descripcion" id="" class="form-control input-sm">
				        	<option value="<?php echo $solicitud['descripcion'] ?>"><?php echo $solicitud['descripcion'] ?></option>
				        </select>
				    </div>				    
				</div>
				<div class="form-group">
				    <label for="dni" class="control-label col-md-2">TITULAR</label>
				    <div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon"><?php echo $cliente['codcliente'] ?></span>
					        <input class="form-control input-sm" id="apenom" name="apenom" maxlength="11" value="<?php echo $cliente['apenom'] ?>" type="text" readonly/>
					        <input type="hidden" name="codcliente" value="<?php echo $cliente['codcliente'] ?>">
					        <input type="hidden" name="dnicliente" value="<?php echo $cliente['dni'] ?>">						
						</div>
				    </div>
				</div>
				<div class="form-group">
					<label for="frecuencia" class="control-label col-md-2">FRECUENCIA</label>
					<div class="col-md-2">
						<select name="frecuencia" id="frecuencia" class="form-control input-sm">
							<option value="DIARIO" <?php echo $solicitud['descripcion']=='DIARIO' ? 'selected="selected"' : '' ?>>Diario</option>
							<option value="SEMANAL" <?php echo $solicitud['descripcion']=='DIARIO' ? 'selected="selected"' : '' ?>>Semanal</option>
							<option value="MENSUAL" <?php echo $solicitud['descripcion']=='DIARIO' ? 'selected="selected"' : '' ?>>Mensual</option>
						</select>
					</div>
				</div>
				<div class="form-group">
				    <label for="plazo" class="control-label col-md-2">PLAZO</label>
				    <div class="col-md-2">
						<div class="input-group input-group-sm">
						<!-- plazo y tipo de plazo -->
							<select name="plazo" id="plazo" class="form-control">
								<option value="6" <?php echo $solicitud['plazo']=='6' ? 'selected="selected"' : '' ?>>6 MESES</option>
								<option value="9" <?php echo $solicitud['plazo']=='9' ? 'selected="selected"' : '' ?>>9 MESES</option>
								<option value="12" <?php echo $solicitud['plazo']=='12' ? 'selected="selected"' : '' ?>>12 MESES</option>
							</select>
						</div>
				    </div>
				    <label for="fechainicio" class="control-label col-md-2">Fecha de Inicio</label>
				    <div class="col-md-2">
				    	<input type="date" name="fechainicio" class="form-control" value="<?php echo $solicitud['fechainicio'] ?>">
				    </div>
				</div>
				<div class="form-group">
				    <label class="control-label col-md-2">ASESOR</label>
					<div class="col-md-2">
						<input type="hidden" name="idasesor" value="<?php echo $cliente['idusuario'] ?>">
						<input type="text" class="form-control input-sm" name="idusuario" value="<?php echo $cliente['idusuario'] ?>" readonly>
					</div>                         
				</div>
				<div class="form-group">
				    <label for="medioorigen" class="control-label col-md-2">MEDIO DE ORIGEN</label>
				    <div class="col-md-4">
				        <select name="medioorigen" id="medioorigen" class="form-control input-sm">
				        	<option value="Asesores de Negocio">Asesores de Negocio</option>
				        	<option value="Referidos">Referidos</option>
				        	<option value="Promocion de campo">Promocion de Campo</option>
				        </select>
				    </div>
				    <label class="control-label col-md-2">AGENCIA</label>
				    <div class="col-md-4">
				    	<div class="input-group">
				    		<span class="input-group-addon">01</span>
							<input type="text" name="agencia" class="form-control" value="<?php echo $this->session->userdata('agencia'); ?>" readonly="true" readonly>
				    	</div>
				    </div>
				</div>
				<div class="form-group">
				    <label for="observacionsol" class="control-label col-md-2">LUGAR DE COBRANZA</label>
					<div class="col-md-2">
						<select name="lugcobranza" id="lugcobranza" class="form-control input-sm" required>
							<option value="Campo" <?php echo $solicitud['dondepagara']=='Campo' ? 'selected="selected"' : '' ?>>Campo</option>
							<option value="Oficina" <?php echo $solicitud['dondepagara']=='Oficina' ? 'selected="selected"' : '' ?>>Oficina</option>
						</select>
					</div>
				</div>	
			</div>
			<div class="panel-footer">
				<button type="submit" id="btnguardar_solicitud" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar Datos</button>
			</div>
		</div>
	</form>	
</div>