<div class="container-fluid">
	<form action="<?php echo base_url() ?>index.php/ahorros/guardarsolicitud" class="form-horizontal input-sm" name="guardar_solicitud" role="form" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-primary">
			<div class="panel-heading">
				CODIGO : <?php echo $codigo ?>
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="nrosolicitud" class="control-label col-md-2">NRO DE SOLICITUD</label>
				    <div class="col-md-2">
				        <input class="form-control solo_numeros" id="nrosolicitud" name="nrosolicitud" type="text" maxlength="8" value="<?php echo $codigo ?>" readonly />
				    </div>
				    <label for="fecha" class="control-label col-md-2">FECHA</label>
				    <div class="col-md-3">
				    	<input type="date" id="fecha" name="fecha" class="form-control input-sm" value="<?php echo date("Y-m-d"); ?>" <?= ($this->session->userdata('tipouser')==2) ? 'readonly="true"' : ''; ?>>
				    </div> 
				</div>
				<div class="form-group">
				    <label for="montosolic" class="control-label col-md-2">MONTO.</label>
				    <div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
				    		<input type="text" id="montosolic" name="montosolic" class="form-control input-sm numerosypunto" value="" placeholder="0.00" required>	
						</div>
				    </div> 
				    <label for="descripcion" class="control-label col-md-2">TIPO</label>
				    <div class="col-md-3">
				        <select name="descripcion" id="" class="form-control input-sm">
				        	<option value="AHORRO PARA EL FUTURO">AHORRO PARA EL FUTURO</option>
				        	<option value="DEPOSITO PLAZO FIJO">DEPOSITO PLAZO FIJO</option>
				        	<option value="CANASTA NAVIDAD">CANASTA NAVIDAD</option>
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
							<option value="DIARIO">Diario</option>
							<option value="SEMANAL">Semanal</option>
							<option value="MENSUAL">Mensual</option>
							<option value="DPF">Fija</option>							
						</select>
					</div>
				</div>
				<div class="form-group">
				    <label for="plazo" class="control-label col-md-2">PLAZO</label>
				    <div class="col-md-2">
						<div class="input-group input-group-sm">
						<!-- plazo y tipo de plazo -->
							<select name="plazo" id="plazo" class="form-control">
								<option value="6">6 MESES</option>
								<option value="9">9 MESES</option>
								<option value="12">12 MESES</option>
							</select>
						</div>
				    </div>
				    <label for="fechainicio" class="control-label col-md-2">Fecha de Inicio</label>
				    <div class="col-md-2">
				    	<input type="date" name="fechainicio" class="form-control" value="<?php echo date('Y-m-d') ?>" <?= ($this->session->userdata('tipouser')==2) ? 'readonly="true"' : ''; ?>>
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
							<option value="">Seleccione</option>
							<option value="Campo">Campo</option>
							<option value="Oficina">Oficina</option>
						</select>
					</div>
				</div>	
			</div>
			<div class="panel-footer">
				<button type="submit" id="btnguardar_solicitud" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Crear Solicitud</button>
				<button type="button" id="btnreset_form" class="btn btn-warning"><span class="glyphicon glyphicon-refresh"> Limpiar</span></button>
			</div>
		</div>
	</form>	
</div>