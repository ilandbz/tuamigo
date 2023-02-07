<div class="container-fluid">
	<form action="<?php echo base_url() ?>index.php/solicitud/actualizarsolicitud" class="form-horizontal input-sm" name="guardar_solicitud" role="form" method="POST" onsubmit="">
		<div class="panel panel-primary">
			<div class="panel-heading">
				MODIFICAR SOLICITUD
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="nrosolicitud" class="control-label col-md-2">NRO DE SOLICITUD</label>
				    <div class="col-md-2">
				        <input class="form-control solo_numeros" id="nrosolicitud" name="nrosolicitud" type="text" maxlength="8" value="<?php echo $solicitud['idsolicitud'] ?>" readonly />
				    </div>
				    <label for="fecha" class="control-label col-md-2">FECHA</label>
				    <div class="col-md-2">
				    	<input type="date" id="fecha" name="fecha" class="form-control input-sm" value="<?php echo $solicitud['fecha']; ?>">
				    </div>
				    <label for="fecha" class="control-label col-md-2">FUENTE</label>
				    <div class="col-md-2">
				    	<select name="fuenterecursos" id="fuenterecursos" class="form-control input-sm" required="true">
				    		<option value="PROPIO" <?php echo ($solicitud['fuenterecursos']=='PROPIO') ? 'selected' : ''; ?>>FUENTE 1</option>
				    		<option value="RECAUDADO" <?php echo ($solicitud['fuenterecursos']=='RECAUDADO') ? 'selected' : ''; ?>>FUENTE 2</option>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="montosolic" class="control-label col-md-2">MONTO SOLIC.</label>
				    <div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
				    		<input type="text" id="montosolic" name="montosolic" class="form-control input-sm" value="<?php echo $solicitud['monto'] ?>" placeholder="0.00" required>	
						</div>
				    </div>
				    <label for="producto" class="control-label col-md-2">PRODUCTO</label>
				    <div class="col-md-2">
				        <select name="producto" id="" class="form-control input-sm">
				        	<option value="TRANSPORTE" <?php echo ($solicitud['producto']=='TRANSPORTE') ? 'selected' : ''; ?>>Transporte</option>
				        	<option value="CONSUMO" <?php echo ($solicitud['producto']=='CONSUMO') ? 'selected' : ''; ?>>Consumo</option>
				        	<option value="CAPITAL" <?php echo ($solicitud['producto']=='CAPITAL') ? 'selected' : ''; ?>>Capital</option>
				        	<option value="PRENDARIO" <?php echo ($solicitud['producto']=='PRENDARIO') ? 'selected' : ''; ?>>Prendario</option>
				        	<option value="ACTIVO FIJO" <?php echo ($solicitud['producto']=='ACTIVO FIJO') ? 'selected' : ''; ?>>Activo Fijo</option>
				        	<option value="CREDI-6" <?php echo ($solicitud['producto']=='CREDI-6') ? 'selected' : ''; ?>>CREDI-6</option>				        	
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
				    <div class="col-md-2">
				    	<a href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $cliente['codcliente'] ?>" class="btn btn-link" title="Ver Cliente"><span class="glyphicon glyphicon-eye-open"></span></a>
				    </div>
				</div>
				<div class="form-group">
				    <label for="conyugue" class="control-label col-md-2">CONYUGUE</label>
				    <div class="col-md-2">
				        <input class="form-control input-sm" type="text" name="conyugue" id="conyugue" value="<?php echo ($conyugue['apenom']=='') ? 'No Posee' : $conyugue['apenom']; ?>" readonly>
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
							<option value="DIARIO" <?php echo ($solicitud['tipoplazo']=='DIARIO') ? 'selected' : ''; ?>>Diario</option>
							<option value="SEMANAL" <?php echo ($solicitud['tipoplazo']=='SEMANAL') ? 'selected' : ''; ?>>Semanal</option>
							<option value="QUINCENAL" <?php echo ($solicitud['tipoplazo']=='QUINCENAL') ? 'selected' : ''; ?>>Quincenal</option>
							<option value="MENSUAL" <?php echo ($solicitud['tipoplazo']=='MENSUAL') ? 'selected' : ''; ?>>Mensual</option>
						</select>
					</div>
				    <label for="plazo" class="control-label col-md-2">PLAZO</label>
				    <div class="col-md-2">
						<div class="input-group input-group-sm">
							<input type="number" name="plazo" value="<?php echo $solicitud['cantplazo'] ?>" min="0" max="90" class="form-control input-sm">
							<?php switch ($solicitud['tipoplazo']) {
								case 'DIARIO':
									$unid = 'Dias Hab.';
									break;
								case 'SEMANAL':
									$unid = 'Semanas';
									break;
								case 'QUINCENAL':
									$unid = 'Quincenas';
									break;									
								case 'MENSUAL':
									$unid = 'Mes';
									break;	
							} ?>
							<span class="input-group-addon" id="mostrar"><?php echo $unid ?></span>
						</div>
				    </div>
				</div>
				<div class="form-group">
				    <label for="tiposolicitud" class="control-label col-md-2">TIPO DE SOLICITUD</label>
				    <div class="col-md-3">
				    	<select name="tiposolicitud" id="tiposolicitud" class="form-control input-sm">
							<?php 
								if(count($solicitudes)==0){//solicitudes desembolsados
									echo '<option value="Nuevo">Nuevo</option>';
								}elseif(count($solvigentes)==0){//SI TODOS ESTAN FINALIZADOS
				    				echo '<option value="Recurrente Sin Saldo">Recurrente Sin Saldo</option>';
								}else{
									if($solicitud['tipo']=='Paralelo'){
							    		echo '<option value="Paralelo" selected="true">Paralelo</option>';
							    		echo '<option value="Recurrente Con Saldo">Recurrente Con Saldo</option>';					
									}else{
							    		echo '<option value="Paralelo">Paralelo</option>';
							    		echo '<option value="Recurrente Con Saldo" selected="true">Recurrente Con Saldo</option>';
									}
								}
							 ?>
				    	</select>
				    </div> 
				</div>
				<?php if($solicitud['tipo']=='Recurrente Con Saldo' || $solicitud['tipo']=='Paralelo'){ ?>
				<div id="selectsolicitudDIV">
				<div class="form-group">
				    <label class="control-label col-md-2">SOLICITUDES A PAGAR</label>
				    <div class="col-md-5">
						<table class="table table-bordered" style="font-size:10px">
							<tr>
								<th>idsolicitud</th>
								<th>Saldo</th>
								<th>Mora deb.</th>
								<th>Total Pagar</th>
								<th>Eliminar</th>
							</tr>
							<?php 
							$a = 0;
							if(!is_null($solpagar)){
							foreach($solpagar as $row){
								$t=0;
							?>
							<tr>
								<td><a href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $row['idsolicitudreg'] ?>"><?php echo $row['idsolicitudreg'] ?></a></td>
								<td>S/.<?php
								echo $row['saldo'];
								 $t += $row['saldo'];
								  ?></td>
								<td>S/.<?php $diasmora = $row['diasmora']-$row['pagomora']; echo $diasmora*$row['costomora'];
									$t += $diasmora*$row['costomora'];
								 ?></td>
								 <td>S/.<?php echo $t; ?></td>
								 <td align="center"><a href="<?php echo base_url() ?>index.php/solicitud/eliminarcuotacancelar/<?php echo $row['idsolicitud'].'/'.$row['idsolicitudreg'] ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
							</tr>
							<?php 
								$a++; 
							} } ?>
						</table>
				    </div>
				</div>
				<div class="form-group">
				    <label class="control-label col-md-2">SOLICITUDES VIGENTES</label>
				    <div class="col-md-5">
				    <input type="hidden" name="estadocuotasapagar" value="<?php echo is_null($solpagar) ? 1 : 0; ?>">
						<table class="table table-bordered" style="font-size:10px">
							<tr>
								<th>idsolicitud</th>
								<th>Monto</th>
								<th>Fecha</th>
								<th>Saldo</th>
								<th>Mora deb.</th>
								<th>Cancelar</th>
							</tr>
							<?php 
							foreach($solvigentes as $row){
							?>
							<tr>
								<td><a href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $row['idsolicitud'] ?>"><?php echo $row['idsolicitud'] ?></a></td>
								<td><?php echo $row['monto'] ?></td>
								<td><?php echo $row['fecha_hora'] ?></td>
								<td>S/.<?php
								$saldo = is_null($row['saldo']) ? 0 : $row['saldo'];
								 echo $saldo; ?></td>
								<td>S/.<?php $mora = $row['mora'];
									$mora -= is_null($row['pagomora']) ? 0 : $row['pagomora'];
									echo $mora*$row['costomora'];
								 ?></td>
								<td>
								<input type="checkbox" name="solopciones[<?php echo $row['idsolicitud'] ?>][iddesembolso]" value="<?php echo $row['iddesembolso'] ?>">
								<input type="hidden" name="solopciones[<?php echo $row['idsolicitud'] ?>][saldo]" value="<?php echo $saldo; ?>">
								<input type="hidden" name="solopciones[<?php echo $row['idsolicitud'] ?>][mora]" value="<?php echo $mora*$row['costomora']; ?>">
								<input type="hidden" name="solopciones[<?php echo $row['idsolicitud'] ?>][idsolicitud]" value="<?php echo $row['idsolicitud']; ?>">
								<input type="hidden" name="solopciones[<?php echo $row['idsolicitud'] ?>][diasdemora]" value="<?php echo $mora ?>">
								</td>
							</tr>
							<?php 
								$a++; 
							} ?>
						</table>
				    </div>
				</div>
				</div>
				<?php } ?>
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
							<span class="input-group-addon"><?php echo $solicitud['idasesor'] ?></span>
							<input type="text" class="form-control input-sm" name="nombreasesor" value="<?php echo $asesor['apenom'] ?>" readonly>
						</div>
					</div>                         
				</div>
				<div class="form-group">
				    <label for="medioorigen" class="control-label col-md-2">MEDIO DE ORIGEN</label>
				    <div class="col-md-4">
				        <select name="medioorigen" id="medioorigen" class="form-control input-sm">
				        	<option value="Asesores de Negocio" <?php echo ($solicitud['tipo']=='Asesores de Negocio') ? 'selected' : ''; ?>>Asesores de Negocio</option>
				        	<option value="Referidos" <?php echo ($solicitud['tipo']=='Referidos') ? 'selected' : ''; ?>>Referidos</option>
				        	<option value="Promocion de campo" <?php echo ($solicitud['tipo']=='Promocion de campo') ? 'selected' : ''; ?>>Promocion de Campo</option>
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
	
</div>