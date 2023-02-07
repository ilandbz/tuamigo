	<form action="<?php echo base_url() ?>index.php/solicitud/guardarsolicitud" class="form-horizontal input-sm" name="guardar_solicitud" method="POST">
		<div class="panel panel-primary">
			<div class="panel-heading">
				ID SOLICITUD : <?php echo $codigo ?>
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="nrosolicitud" class="control-label col-md-2">NRO DE SOLICITUD</label>
				    <div class="col-md-2">
				        <input class="form-control solo_numeros" id="nrosolicitud" name="nrosolicitud" type="text" maxlength="8" value="<?php echo $codigo ?>" readonly />
				    </div>
				    <label for="fecha" class="control-label col-md-2">FECHA</label>
				    <div class="col-md-3">
				    	<input type="date" id="fecha" name="fecha" class="form-control input-sm" value="<?php echo date("Y-m-d"); ?>" readonly>
				    </div> 
				</div>
				<div class="form-group">
				    <label for="montosolic" class="control-label col-md-2">MONTO SOLIC.</label>
				    <div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
				    		<input type="text" id="montosolic" name="montosolic" class="form-control input-sm" value="" placeholder="0.00" required>	
						</div>
				    </div>
				</div>
				<div class="form-group">
				    <label for="producto" class="control-label col-md-2">PRODUCTO</label>
				    <div class="col-md-2">
				        <select name="producto" id="" class="form-control input-sm">
				        	<option value="CAPITAL">Capital</option>
				        	<option value="PRENDARIO">Prendario</option>
				        	<option value="ACTIVO FIJO">Activo Fijo</option>
				        	<option value="TRANSPORTE">Transporte</option>
				        	<option value="CONSUMO">Consumo</option>
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
						</div>
				    </div>
				</div>
				<div class="form-group">
				    <label for="conyugue" class="control-label col-md-2">CONYUGUE</label>
				    <div class="col-md-2">
				        <input class="form-control input-sm" type="text" name="conyugue" id="conyugue" value="<?php echo $poseeconyugue ?>" readonly>
				    </div>
				    <div class="col-md-6">
						<?php if(count($conyugue)>0){ ?>
				    	<div class="input-group input-group-sm">
				    		<span class="input-group-addon"><?php echo $conyugue['dni'] ?></span>
				    		<input type="text" class="form-control" value="<?php echo $conyugue['apenom'] ?>">
				    	</div>
						<?php } ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="provincia" class="control-label col-md-2">DIRECCION</label>
				    <div class="col-md-10">
						<input type="text" name="direccion" value="<?php echo $cliente['tipovia'].' '.$cliente['nombrevia'].' NRO : '.$cliente['nro'].' INTERIOR: '.$cliente['interior'].' MZ : '.$cliente['mz'].' LOTE : '.$cliente['lote'].' '.$cliente['tipozona'].' :'.$cliente['nombrezona'] ?>" class="form-control input-sm" readonly>
				    </div>
				</div> 
				<div class="form-group">
				    <label for="estadociv" class="control-label col-md-2">NEGOCIO</label>
				    <div class="col-md-4">
				    	<input type="text" value="<?php echo $negocio; ?>" class="form-control input-sm" readonly>
				    </div>
				    <div class="col-md-1">
				    <?php if($negocio!='No Posee'){ ?>
				    	<a href="#negocio" title="Ver Detalle" data-toggle="modal" class="btn btn-link"><span class="glyphicon glyphicon-eye-open"></span></a>
				    <?php } ?>				    	
				    </div>
				</div>
				<div class="form-group">
					<label for="tipoplazo" class="control-label col-md-2">TIPO DE PLAZO</label>
					<div class="col-md-2">
						<select name="tipoplazo" id="tipoplazo" class="form-control input-sm">
							<option value="DIARIO">Diario</option>
							<option value="SEMANAL">Semanal</option>
						</select>
					</div>
				    <label for="plazo" class="control-label col-md-2">PLAZO</label>
				    <div class="col-md-2">
						<div class="input-group input-group-sm">
							<input type="number" name="plazo" value="30" min="0" max="30" class="form-control input-sm">
							<span class="input-group-addon" id="mostrar">Dias Hab.</span>
						</div>
				    </div>
				</div>
				<div class="form-group">
				    <label for="tiposolicitud" class="control-label col-md-2">TIPO DE SOLICITUD</label>
				    <div class="col-md-3">
				    	<select name="tiposolicitud" id="tiposolicitud" class="form-control input-sm">
				    		<option value="Paralelo">Nuevo</option>
				    		<option value="Paralelo">Paralelo</option>
				    		<option value="Recurrente Con Saldo">Recurrente Con Saldo</option>
				    		<option value="Recurrente Sin Saldo">Recurrente Sin Saldo</option>
				    	</select>
				    </div> 
				</div>
				<div class="form-group">
				    <label class="control-label col-md-2">AGENCIA</label>
				    <div class="col-md-4">
				    	<div class="input-group">
				    		<span class="input-group-addon">01</span>
				    		<input type="text" class="form-control input-sm" name="descagencia" value="HUÁNUCO" readonly>
				    		<input type="hidden" name="agencia" value="01">
				    	</div>

				    </div>
				    <label class="control-label col-md-2">ASESOR</label>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon"><?php echo $usuario['idasesor'] ?></span>
							<input type="hidden" name="idasesor" value="<?php echo $usuario['idasesor'] ?>">
							<input type="text" class="form-control input-sm" name="nombreasesor" value="<?php echo $usuario['apenom'] ?>" readonly>
						</div>
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
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" id="btnguardar_solicitud" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar Cambios</button>
				<button type="button" id="btnreset_form" class="btn btn-warning"><span class="glyphicon glyphicon-refresh"> Limpiar</span></button>
			</div>
		</div>
	</form>	
</div>

<div id="negocio" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				DETALLE DE NEGOCIO
			</div>
			<div class="modal-body small">
				<div class="row">
					<div class="col-md-5 text-primary text-primary">RAZON SOCIAL</div>
					<div class="col-md-7"><?php echo $filanegocio['razonsocial'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">RUC</div>
					<div class="col-md-7"><?php echo $filanegocio['ruc'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">TELEFONO</div>
					<div class="col-md-7"><?php echo $filanegocio['tel_cel'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">ACTIVIDAD</div>
					<div class="col-md-7"><?php echo $filanegocio['actividad'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">ACTIVIDAD ESPEC.</div>
					<div class="col-md-7"><?php echo $filanegocio['actividad_espec'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">INICIO ACTIVIDAD</div>
					<div class="col-md-7"><?php echo $filanegocio['inicio_actividad'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-12 text-warning">UBICACION</div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">DEPARTAMENTO</div>
					<div class="col-md-7"><?php echo $filanegocio['departamento'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">PROVINCIA</div>
					<div class="col-md-7"><?php echo $filanegocio['provincia'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">DISTRITO</div>
					<div class="col-md-7"><?php echo $filanegocio['distrito'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary"><?php echo $filanegocio['tipovia'] ?></div>
					<div class="col-md-7"><?php echo $filanegocio['nombrevia'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">NRO</div>
					<div class="col-md-7"><?php echo $filanegocio['Nro'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">Interior</div>
					<div class="col-md-7"><?php echo $filanegocio['interior'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">Mz</div>
					<div class="col-md-7"><?php echo $filanegocio['mz'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">Lote</div>
					<div class="col-md-7"><?php echo $filanegocio['lote'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">Tipo de Zona</div>
					<div class="col-md-7"><?php echo $filanegocio['tipozona'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">Nombre Zona</div>
					<div class="col-md-7"><?php echo $filanegocio['nombrezona'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-5 text-primary">Referencia</div>
					<div class="col-md-7"><?php echo $filanegocio['referencia'] ?></div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" id="guardardetinv" data-dismiss="modal" aria-hidden="true">Guardar</button>
			</div>
		</div>
	</div>
</div>
