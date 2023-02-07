<form action="<?php echo base_url() ?>index.php/solicitud/aceptar_evaluacion" class="form-horizontal input-sm" name="evaluarform" method="POST">	
<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-9">
				Datos de la solicitud a Evaluar					
			</div>
			<div class="col-md-3">
				<input type="text" name="fecha_evaluacion" class="form-control input-sm" value="<?php echo date('Y-m-d h:i:s'); ?>" readonly>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="form-group">
		    <label for="nrosolicitud" class="control-label col-md-2">NRO DE SOLICITUD</label>
		    <div class="col-md-2">
		        <input class="form-control solo_numeros" id="nrosolicitud" name="nrosolicitud" type="text" maxlength="8" value="<?php echo $solicitud['idsolicitud'] ?>" readonly />
		    </div>
		    <label for="fecha" class="control-label col-md-2">FECHA SOLICITUD</label>
		    <div class="col-md-2">
		    	<input type="date" id="fecha" name="fecha" class="form-control input-sm" value="<?php echo $solicitud['fecha'] ?>" readonly>
		    </div>
		    <label for="familia" class="control-label col-md-2">SALDO VIGENTE</label>
		    <div class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon">S/.</span>
					<input type="text" name="totalsaldvigente" id="totalsaldvigente" value="<?php echo $sumasaldcreditos; ?>" class="form-control input-sm solo_numeros" readonly>
				</div>
		    </div>
		</div>
		<div class="form-group">
		    <label for="montosolic" class="control-label col-md-2">MONTO SOLIC.</label>
		    <div class="col-md-2">
		    	<input type="text" id="montosolic" name="montosolic" class="form-control input-sm" value="<?php echo $solicitud['monto'] ?>" readonly="true">
		    </div>
		    <label for="tasainteres" class="control-label col-md-2">INTERES</label>
		    <div class="col-md-2">
				<div class="input-group">
				<?php 

					if($solicitud['fuenterecursos']=='RECAUDADO'){
						$INTERES=number_format(7,2);
					}elseif($solicitud['producto']=='CREDI-6'){
						$INTERES=number_format(6,2);
					}else{
						$INTERES=number_format(9,2);
					}
				 ?>
					<input type="text" name="tasainteres" id="tasainteres" value="<?php echo $INTERES ?>" class="form-control input-sm solo_numeros" required>	
					<span class="input-group-addon">%</span>
				</div>				    	
		    </div>
		    <label for="totalpago" class="control-label col-md-2">TOTAL</label>
		    <div class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon">S/.</span>
					<input type="text" name="totalpago" id="totalpago" value="<?php echo $solicitud['monto']*(1+($INTERES/100)); ?>" class="form-control input-sm solo_numeros" readonly>
				</div>				    	
		    </div>				    
		</div>
		<div class="form-group">
		    <label for="producto" class="control-label col-md-2">PRODUCTO</label>
		    <div class="col-md-3">
		    	<input type="text" class="form-control input-sm" value="<?php echo $solicitud['producto'] ?>" readonly>
		    </div>
			<label for="familia" class="control-label col-md-1">PLAZO</label>
		    <div class="col-md-2">
		    	<div class="input-group">
		    		<input type="text" id="familia" name="familia" class="form-control input-sm" value="<?php echo $solicitud['cantplazo'] ?>" readonly>
					<?php 
					switch ($solicitud['tipoplazo']) {
						case 'DIARIO':
							$plazo = 'Dias';
							break;
						case 'SEMANAL':
							$plazo = 'Semanas';
							break;
						case 'QUINCENAL':
							$plazo = 'Quincenas';
							break;
						case 'MENSUAL':
							$plazo = 'Mes';
							break;	
					}
					 ?>
		    		<span class="input-group-addon"><?php echo $plazo ?></span>
		    		<input type="hidden" name="tipoplazooculto" value="<?php echo ($solicitud['tipoplazo']=='DIARIO') ? 'Dias' : 'Semanas' ?>">
		    	</div>
		    </div>

		</div>
		<div class="form-group">
		    <label for="dni" class="control-label col-md-2">TITULAR</label>
		    <div class="col-md-6">
				<div class="input-group">
					<input type="hidden" id="codcliente_s" name="codcliente_s" value="<?php echo $solicitud['codcliente'] ?>">
					<span class="input-group-addon"><?php echo $solicitud['codcliente'] ?></span>
					
			        <input class="form-control input-sm" id="apenom" name="apenom" maxlength="11" value="<?php echo $solicitud['apenom'] ?>" type="text" readonly/>	
				</div>
		    </div>
		</div>
		<?php if(!is_null($negocio)) { ?>
		<div class="form-group">
		    <label for="provincia" class="control-label col-md-2">ACTIVIDAD</label>
		    <div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon"><?php echo $negocio['actividad'] ?></span>
			        <input class="form-control input-sm" id="apenom" name="apenom" maxlength="11" value="<?php echo $negocio['actividad_espec'] ?>" type="text" readonly/>					
				</div>
		    </div>
		</div> 
		<?php } ?>
		<div class="form-group">
			<label for="tipoplazo" class="control-label col-md-2">TIPO DE CLIENTE</label>
			<div class="col-md-3">
				<input type="text" class="form-control input-sm" value="<?php if($cliente['ruc']!='' && substr($cliente['ruc'], 0, 2)=='20'){ echo 'PERSONA JURIDICA'; }else{ echo 'PERSONA NATURAL'; } ?>" readonly="true">
			</div>
		    <label class="control-label col-md-2">ASESOR</label>
			<div class="col-md-5">
		    	<div class="input-group">
		    		<span class="input-group-addon"><?php echo $asesor['codusuario'] ?></span>
		    		<input type="text" class="form-control input-sm" value="<?php echo $asesor['apenom'] ?>" readonly>
		    	</div>						
			</div> 				
		</div>
		<div class="form-group">
		    <label for="tiposolicitud" class="control-label col-md-2">SEGMENTACION</label>
		    <div class="col-md-3">
		    	<input type="text" class="form-control input-sm" value="RIESGO MODERADO" readonly>
		    </div> 
		</div>
		<div class="form-group">
		    <label for="tiposolicitud" class="control-label col-md-2">CONDICION DE VIVIENDA</label>
		    <div class="col-md-3">
		    	<input type="text" class="form-control input-sm" value="<?php echo $solicitud['tipovivienda'] ?>" readonly>
		    </div> 
		</div>
		<div class="form-group">
		    <label class="control-label col-md-2">TIPO DE PRESTAMO</label>
		    <div class="col-md-3">
		    	<input type="text" class="form-control input-sm" value="<?php echo $solicitud['tipo'] ?>" readonly>
		    </div> 						
			<?php if($solicitud['tipo']=='Recurrente Con Saldo'){ ?>
				<label for="" class="control-label col-md-4">SALDO SOLICITUD A PAGAR</label>
				<div class="col-md-2">
					<div class="input-group">
						<span class="input-group-addon">S/.</span>
						<input type="text" value="<?php echo number_format($totalapagar,2) ?>" class="form-control input-sm" readonly>
					</div>
				</div>	
			<?php } ?>        
		</div>
		<div class="form-group">
		    <label for="medioorigen" class="control-label col-md-2">MEDIO DE ORIGEN</label>
		    <div class="col-md-4">
		    	<input type="text" class="form-control input-sm" name="medioorigen" id="medioorigen" value="<?php echo $solicitud['medioorigen'] ?>" readonly>
		    </div>
		    <a href="<?php echo base_url() ?>index.php/solicitud/solicitudpdf/<?php echo $solicitud['idsolicitud'] ?>" target="_blank" class="btn btn-info btn-sm">SOLICITUD <span class="glyphicon glyphicon-print"></span></a>
		    <a href="<?php echo base_url(); ?>index.php/solicitud/estadosfinancieros/<?php echo $solicitud['idsolicitud']; ?>" target="_blank" class="btn btn-info btn-sm">ESTADOS FINANCIEROS <span class="glyphicon glyphicon-print"></span></a>
		</div>
		<div class="form-group">
		    <label for="observacionsol" class="control-label col-md-2">OBSERVACION</label>
			<div class="col-md-4">
				<textarea name="observacionsol" id="observacionsol" placeholder="Observacion" class="form-control input-sm" readonly><?php echo (is_null($observacion) || $observacion['id']=='') ? 'NINGUNO' : $observacion['idusuario'].': '.$observacion['descripcion'];
				?></textarea><input type="hidden" value="<?php echo is_null($observacion) ? '' : $observacion['id'] ?>" id="idobservacion" name="idobservacion">
			</div>
			<div class="col-md-6">
				<label class="radio-inline control-label">
					<input name="observacionestado" id="observacionestado" type="radio" value="1" <?php echo ($cantobaservaciones==0) ? 'checked' : '' ?>>Resuelto
				</label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-10">
				<a href="#formanalisiscualitativo" data-toggle="modal" type="button" class="btn btn-default">ANALISIS CUALITATIVO</a>
				<a href="#formbalancegeneral" data-toggle="modal" type="button" class="btn btn-default">BALANCE GENERAL</a>
				<a href="#formperdidasganancias" data-toggle="modal" type="button" class="btn btn-default">P. Y G.</a>
				<a href="#propuestacredito" data-toggle="modal" type="button" class="btn btn-default">PROPUESTA DE CREDITO</a>
			</div>
			<div class="col-md-2">
			</div>
		</div>
	</div>
		<div class="panel-footer">
			<button type="submit" id="aprobarsolicitud" name="aprobarsolicitud" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Aprobar</button>
			<button type="button" id="guardar_observacioneva" name="guardar_observacioneva" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> Observar</button>
			<button type="button" id="btn_rechazarasesor" name="btn_rechazarasesor" class="btn btn-danger"><span class="glyphicon glyphicon-remove"> Rechazar</span></button>
		</div>
	</div>
</form>		
</div>
</div>
<div id="formperdidasganancias" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModal-title">PERDIDAS GANANCIAS</h4>
    </div>
    <div class="modal-body">
		<div class="row">
			<form action="" class="form-horizontal input-sm">
				<div class="form-group">
					<label for="" class="control-label col-md-2">Ventas</label>
					<div class="col-md-4">
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm solo_numeros" name="ventaspg" id="ventaspg" placeholder="0.00" value="<?php echo $perdidasgananciasgral['ventas'] ?>" readonly>
							<span class="input-group-btn">
						        <a href="#epgventascosto" data-toggle="modal" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></a>
							</span>
						</div>
					</div>
					<label for="" class="control-label col-md-2">Costo</label>
					<div class="col-md-4">
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm solo_numeros" name="costopg" id="costopg" placeholder="0.00" value="<?php echo $perdidasgananciasgral['costo'] ?>" readonly>
							<span class="input-group-btn">
						        <a href="#epgventascosto" data-toggle="modal" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></a>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="has-success">
						<label for="" class="control-label col-md-2">UTILIDAD</label>
						<div class="col-md-4">
							<div class="input-group input-group-sm">
								<span class="input-group-addon">S/.</span>
								<input type="text" class="form-control input-sm solo_numeros" name="utilidadbpg" id="utilidadbpg" placeholder="0.00" value="<?php echo $perdidasgananciasgral['utilidad'] ?>" readonly>
							</div>
						</div>
					</div>
					<label for="" class="control-label col-md-2">Gasto Negocio</label>
					<div class="col-md-4">
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm solo_numeros" name="gastoneg" id="gastoneg" value="<?php echo $perdidasgananciasgral['costonegocio'] ?>" placeholder="0.00">
							<span class="input-group-btn">
						        <a href="#gastonegocio" data-toggle="modal" class="btn btn-default" type="button"><span class="glyphicon glyphicon-eye-open"></span></a>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="has-success">
						<label for="" class="control-label col-md-2">Utilidad Operativa</label>
						<div class="col-md-4">
							<div class="input-group input-group-sm">
								<span class="input-group-addon">S/.</span>
								<input type="text" class="form-control input-sm solo_numeros" name="utilidopera" id="utilidopera" placeholder="0.00" value="<?php echo $perdidasgananciasgral['utiloperativa'] ?>" readonly>
							</div>
						</div>
					</div>
					<label for="" class="control-label col-md-2">Otros Ingresos</label>
					<div class="col-md-4">
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm solo_numeros" name="otrosing" id="otrosing" value="<?php echo $perdidasgananciasgral['otrosing'] ?>" placeholder="0.00">
						</div>
					</div>
				</div>											
				<div class="form-group">
					<label for="" class="control-label col-md-2">Otros Egresos</label>
					<div class="col-md-4">
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm solo_numeros" name="otrosegre" id="otrosegre" value="<?php echo $perdidasgananciasgral['otrosegr'] ?>" placeholder="0.00">
						</div>
					</div>
					<label for="" class="control-label col-md-2">Gastos Familiares</label>
					<div class="col-md-4">
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm solo_numeros" name="gastfamiliares" id="gastfamiliares" value="<?php echo $perdidasgananciasgral['gast_fam'] ?>" placeholder="0.00" readonly>
							<span class="input-group-btn">
						        <a href="#gastosfamiliares" data-toggle="modal" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></a>
							</span>
						</div>
					</div>							
				</div>
				<div class="form-group has-success">
					<label for="" class="control-label col-md-2">Utilidad Neta</label>
					<div class="col-md-4">
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm solo_numeros" name="utilneta" id="utilneta" placeholder="0.00" value="<?php echo $perdidasgananciasgral['utilidadneta'] ?>" readonly>
						</div>
					</div>							
					<label for="" class="control-label col-md-2">Utilidad Neta Diaria</label>
					<div class="col-md-4">
						<div class="input-group input-group-sm">
							<span class="input-group-addon">S/.</span>
							<input type="text" class="form-control input-sm solo_numeros" name="utilnetadiaria" id="utilnetadiaria" placeholder="0.00" value="<?php echo $perdidasgananciasgral['utilnetdiaria'] ?>" readonly>
						</div>
					</div>							
				</div>
			</form>
		</div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cerrar</button>
    </div>
</div>
</div>
</div>
<div id="epgventascosto" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">VENTAS COSTO</h4>
</div>
<div class="modal-body">
<div class="table-responsive">
	<table class="table table-bordered table-hover table-condensed small" id="perdidasganancias">
		<tr>
			<th width="40%"></th>
			<td>
				<div class="text-primary">PRODUCTO 1</div>				
			</td>
			<td>
				<div class="text-primary">PRODUCTO 2 </div>
			</td>
			<td>
				<div class="text-primary">PRODUCTO 3</div>
			</td>
		</tr>
		<tr>
			<th>DESCRIPCION DEL PRODUCTO</th>
			<td><input type="text" class="form-control input-sm producto1" name="descproducto1" placeholder="Descripcion" value="<?php echo (isset($detperdidasganancias[0]['descripcion'])) ? $detperdidasganancias[0]['descripcion'] : '' ?>"></td>
			<td><input type="text" class="form-control input-sm producto2" name="descproducto2" placeholder="Descripcion" value="<?php echo (isset($detperdidasganancias[1]['descripcion'])) ? $detperdidasganancias[1]['descripcion'] : '' ?>"></td>
			<td><input type="text" class="form-control input-sm producto3" name="descproducto3" placeholder="Descripcion" value="<?php echo (isset($detperdidasganancias[2]['descripcion'])) ? $detperdidasganancias[2]['descripcion'] : '' ?>"></td>
		</tr>
		<tr>
			<th>UNIDAD DE MEDIDA</th>
			<td>
				<select name="unidmedida1" id="unidmedida1" class="form-control input-sm producto1">
					<option value="Diario">Diario</option>
					<option value="Semanal">Semanal</option>
					<option value="Mensual">Mensual</option>
				</select>
			<td>
				<select name="unidmedida2" id="unidmedida2" class="form-control input-sm producto2">
					<option value="Diario">Diario</option>
					<option value="Semanal">Semanal</option>
					<option value="Mensual">Mensual</option>
				</select>								
			</td>
			<td>
				<select name="unidmedida3" id="unidmedida3" class="form-control input-sm producto3">
					<option value="Diario">Diario</option>
					<option value="Semanal">Semanal</option>
					<option value="Mensual">Mensual</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>PRECIO VENTA UNIT.</th>
			<td><input type="text" class="input-sm solo_numeros producto1" size="6" maxlength="10" name="precioventaunit1" value="<?php echo (isset($detperdidasganancias[0]['preciounit'])) ? $detperdidasganancias[0]['preciounit'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto2" size="6" maxlength="10" name="precioventaunit2" value="<?php echo (isset($detperdidasganancias[1]['preciounit'])) ? $detperdidasganancias[1]['preciounit'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto3" size="6" maxlength="10" name="precioventaunit3" value="<?php echo (isset($detperdidasganancias[2]['preciounit'])) ? $detperdidasganancias[2]['preciounit'] : '0.00' ?>"></td>
		</tr>
		<tr>
			<th>MATERIA PRIMA PRINCIPAL</th>
			<td><input type="text" class="input-sm solo_numeros producto1 matprima1" size="6" maxlength="10" name="materiaprimapri1" value="<?php echo (isset($detperdidasganancias[0]['primaprincipal'])) ? $detperdidasganancias[0]['primaprincipal'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto2 matprima2" size="6" maxlength="10" name="materiaprimapri2" value="<?php echo (isset($detperdidasganancias[1]['primaprincipal'])) ? $detperdidasganancias[1]['primaprincipal'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto3 matprima3" size="6" maxlength="10" name="materiaprimapri3" value="<?php echo (isset($detperdidasganancias[2]['primaprincipal'])) ? $detperdidasganancias[2]['primaprincipal'] : '0.00' ?>"></td>
		</tr>
		<tr>
			<th>MATERIA PRIMA SECUNDARIA</th>
			<td><input type="text" class="input-sm solo_numeros producto1 matprima1" size="6" maxlength="10" name="materiaprimasec1" value="<?php echo (isset($detperdidasganancias[0]['primasecundaria'])) ? $detperdidasganancias[0]['primasecundaria'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto2 matprima2" size="6" maxlength="10" name="materiaprimasec2" value="<?php echo (isset($detperdidasganancias[1]['primasecundaria'])) ? $detperdidasganancias[1]['primasecundaria'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto3 matprima3" size="6" maxlength="10" name="materiaprimasec3" value="<?php echo (isset($detperdidasganancias[2]['primasecundaria'])) ? $detperdidasganancias[2]['primasecundaria'] : '0.00' ?>"></td>
		</tr>
		<tr>
			<th>MATERIA PRIMA COMPLEMENTARIA</th>
			<td><input type="text" class="input-sm solo_numeros producto1 matprima1" size="6" maxlength="10" name="materiaprimacomp1" value="<?php echo (isset($detperdidasganancias[0]['primacomplement'])) ? $detperdidasganancias[0]['primacomplement'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto2 matprima2" size="6" maxlength="10" name="materiaprimacomp2" value="<?php echo (isset($detperdidasganancias[1]['primacomplement'])) ? $detperdidasganancias[1]['primacomplement'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto3 matprima3" size="6" maxlength="10" name="materiaprimacomp3" value="<?php echo (isset($detperdidasganancias[2]['primacomplement'])) ? $detperdidasganancias[2]['primacomplement'] : '0.00' ?>"></td>
		</tr>
		<tr>
			<th>MATERIA PRIMA</th>
			<td><input type="text" class="input-sm solo_numeros producto1" size="6" maxlength="10" name="materiaprima1" value="<?php echo (isset($detperdidasganancias[0]['matprima'])) ? $detperdidasganancias[0]['matprima'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto2" size="6" maxlength="10" name="materiaprima2" value="<?php echo (isset($detperdidasganancias[1]['matprima'])) ? $detperdidasganancias[1]['matprima'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto3" size="6" maxlength="10" name="materiaprima3" value="<?php echo (isset($detperdidasganancias[2]['matprima'])) ? $detperdidasganancias[2]['matprima'] : '0.00' ?>" readonly></td>
		</tr>
		<tr>
			<th>MANO DE OBRA 1</th>
			<td><input type="text" class="input-sm solo_numeros producto1 manoobra1" size="6" maxlength="10" name="manoobraun1" value="<?php echo (isset($detperdidasganancias[0]['manoobra1'])) ? $detperdidasganancias[0]['manoobra1'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto2 manoobra2" size="6" maxlength="10" name="manoobraun2" value="<?php echo (isset($detperdidasganancias[1]['manoobra1'])) ? $detperdidasganancias[1]['manoobra1'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto3 manoobra3" size="6" maxlength="10" name="manoobraun3" value="<?php echo (isset($detperdidasganancias[2]['manoobra1'])) ? $detperdidasganancias[2]['manoobra1'] : '0.00' ?>"></td>
		</tr>
		<tr>
			<th>MANO DE OBRA 2</th>
			<td><input type="text" class="input-sm solo_numeros producto1 manoobra1" size="6" maxlength="10" name="manoobrados1" value="<?php echo (isset($detperdidasganancias[0]['manoobra2'])) ? $detperdidasganancias[0]['manoobra2'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto2 manoobra2" size="6" maxlength="10" name="manoobrados2" value="<?php echo (isset($detperdidasganancias[1]['manoobra2'])) ? $detperdidasganancias[1]['manoobra2'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto3 manoobra3" size="6" maxlength="10" name="manoobrados3" value="<?php echo (isset($detperdidasganancias[2]['manoobra2'])) ? $detperdidasganancias[2]['manoobra2'] : '0.00' ?>"></td>
		</tr>
		<tr>
			<th>MANO DE OBRA</th>
			<td><input type="text" class="input-sm solo_numeros producto1" size="6" maxlength="10" name="manoobra1" value="<?php echo (isset($detperdidasganancias[0]['manoobra'])) ? $detperdidasganancias[0]['manoobra'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto2" size="6" maxlength="10" name="manoobra2" value="<?php echo (isset($detperdidasganancias[1]['manoobra'])) ? $detperdidasganancias[1]['manoobra'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto3" size="6" maxlength="10" name="manoobra3" value="<?php echo (isset($detperdidasganancias[2]['manoobra'])) ? $detperdidasganancias[2]['manoobra'] : '0.00' ?>" readonly></td>
		</tr>
		<tr>
			<th>COSTO PRIMO UNITARIO</th>
			<td><input type="text" class="input-sm solo_numeros producto1" size="6" maxlength="10" name="costoprimounit1" value="<?php echo (isset($detperdidasganancias[0]['costoprimounit'])) ? $detperdidasganancias[0]['costoprimounit'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto2" size="6" maxlength="10" name="costoprimounit2" value="<?php echo (isset($detperdidasganancias[1]['costoprimounit'])) ? $detperdidasganancias[1]['costoprimounit'] : '0.00' ?>"></td>
			<td><input type="text" class="input-sm solo_numeros producto3" size="6" maxlength="10" name="costoprimounit3" value="<?php echo (isset($detperdidasganancias[2]['costoprimounit'])) ? $detperdidasganancias[2]['costoprimounit'] : '0.00' ?>"></td>
		</tr>
		<tr>
			<th>PRODUCCION MENSUAL POR PRODUCTO</th>
			<td><input type="text" class="input-sm solo_numeros producto1" size="6" maxlength="10" name="produccionmensprod1" value="<?php echo (isset($detperdidasganancias[0]['prodmensual'])) ? $detperdidasganancias[0]['prodmensual'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto2" size="6" maxlength="10" name="produccionmensprod2" value="<?php echo (isset($detperdidasganancias[1]['prodmensual'])) ? $detperdidasganancias[1]['prodmensual'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto3" size="6" maxlength="10" name="produccionmensprod3" value="<?php echo (isset($detperdidasganancias[2]['prodmensual'])) ? $detperdidasganancias[2]['prodmensual'] : '0.00' ?>" readonly></td>
		</tr>
		<tr>
			<th>VENTAS TOTALES POR PRODUCTO</th>
			<td><input type="text" class="input-sm solo_numeros producto1" size="6" maxlength="10" name="ventastotprod1" value="<?php echo (isset($detperdidasganancias[0]['ventastotales'])) ? $detperdidasganancias[0]['ventastotales'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto2" size="6" maxlength="10" name="ventastotprod2" value="<?php echo (isset($detperdidasganancias[1]['ventastotales'])) ? $detperdidasganancias[1]['ventastotales'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto3" size="6" maxlength="10" name="ventastotprod3" value="<?php echo (isset($detperdidasganancias[2]['ventastotales'])) ? $detperdidasganancias[2]['ventastotales'] : '0.00' ?>" readonly></td>
		</tr>
		<tr>
			<th>COSTO PRIMO POR PRODUCTO</th>
			<td><input type="text" class="input-sm solo_numeros producto1" size="6" maxlength="10" name="costoprimprod1" value="<?php echo (isset($detperdidasganancias[0]['totcostoprimo'])) ? $detperdidasganancias[0]['totcostoprimo'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto2" size="6" maxlength="10" name="costoprimprod2" value="<?php echo (isset($detperdidasganancias[1]['totcostoprimo'])) ? $detperdidasganancias[1]['totcostoprimo'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto3" size="6" maxlength="10" name="costoprimprod3" value="<?php echo (isset($detperdidasganancias[2]['totcostoprimo'])) ? $detperdidasganancias[2]['totcostoprimo'] : '0.00' ?>" readonly></td>
		</tr>
		<tr>
			<th>MARGEN DE VENTAS POR PRODUCTO</th>
			<td><input type="text" class="input-sm solo_numeros producto1" size="6" maxlength="10" name="margenventasprod1" value="<?php echo (isset($detperdidasganancias[0]['margenventas'])) ? $detperdidasganancias[0]['margenventas'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto2" size="6" maxlength="10" name="margenventasprod2" value="<?php echo (isset($detperdidasganancias[1]['margenventas'])) ? $detperdidasganancias[1]['margenventas'] : '0.00' ?>" readonly></td>
			<td><input type="text" class="input-sm solo_numeros producto3" size="6" maxlength="10" name="margenventasprod3" value="<?php echo (isset($detperdidasganancias[2]['margenventas'])) ? $detperdidasganancias[2]['margenventas'] : '0.00' ?>" readonly></td>
		</tr>
	</table>
</div>
<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-10 small">
		<form action="" class="form-horizontal">
			<div class="form-group">
				<label for="" class="control-label col-md-4">TOTAL INGRESO MENSUAL</label>
				<div class="col-md-2">
					<input type="text" name="totingmensual" class="form-control input-sm" value="<?php echo $perdidasganancias['tot_ing_mensual'] ?>" readonly>
				</div>
				<label for="" class="control-label col-md-4">MARGEN TOTAL</label>
				<div class="col-md-2">
					<input type="text" name="margtontal" class="form-control input-sm" value="<?php echo $perdidasganancias['margen_tot'] ?>" readonly>
				</div>			
			</div>
			<div class="form-group">
				<label for="" class="control-label col-md-4">TOTAL COSTO PRIMO MENSUAL</label>
				<div class="col-md-2">
					<input type="text" name="totcostoprimo" class="form-control input-sm" value="<?php echo $perdidasganancias['tot_cosprimo_m'] ?>" readonly>
				</div>
				<label for="" class="control-label col-md-4">VENTAS AL CREDITO</label>
				<div class="col-md-2">
					<input type="text" name="ventcredito" class="form-control input-sm" value="<?php echo $perdidasganancias['ventas_cred'] ?>" value="0">
				</div>			
			</div>
			<div class="form-group">
				<label for="" class="control-label col-md-4">COSTO PRIMO/VENTAS</label>
				<div class="col-md-2">
					<input type="text" name="costoprimovent" class="form-control input-sm" value="<?php echo $perdidasganancias['tot_cosprimo_m']/(($perdidasganancias['tot_ing_mensual']==0) ? 1 : $perdidasganancias['tot_ing_mensual']); ?>" readonly>
				</div>
				<label for="" class="control-label col-md-4">IRRECUPERABILIDAD</label>
				<div class="col-md-2">
					<input type="text" name="irrecuperabilidad" class="form-control input-sm" value="<?php echo $perdidasganancias['irrecuperable'] ?>" value="0">
				</div>			
			</div>			
		</form>
	</div>
	<div class="col-md-1">
	</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div id="propuestacredito" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModal-title">PROPUESTA DE CREDITO</h4>
    </div>
    <div class="modal-body">
		<div class="form-group">
			<label class="control-label">UNIDAD FAMILIAR(CONYUGUE, HIJOS)</label>
			<textarea name="unidfam" id="unidfam" class="form-control input-sm" placeholder="Unidad Familiar"><?php echo $propuestacred['unidad_familiar'] ?></textarea>
		</div>
		<div class="form-group">
			<label class="">EXPERIENCIA CREDITICIA Y NEGOCIO</label>
			<textarea name="expcred" id="expcred" class="form-control input-sm" placeholder="Experiencia Crediticia"><?php echo $propuestacred['experiencia_cred'] ?></textarea>
		</div>
		<div class="form-group">
			<label class="">DESTINO DEL PRESTAMO</label>
			<textarea name="destprest" id="destprest" class="form-control input-sm" placeholder="Destino del Prestamo"><?php echo $propuestacred['destino_prest'] ?></textarea>
		</div>
		<div class="form-group">
			<label class="">REFERENCIAS PERSONALES Y COMERCIALES</label>
			<textarea name="refper" id="refper" class="form-control input-sm" placeholder="Destino del Prestamo"><?php echo $propuestacred['referencias'] ?></textarea>
		</div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" name="close" id="close" data-dismiss="modal">Close</button>
        <a id="" target="_blank" href="<?php echo base_url() ?>index.php/solicitud/propuestacreditopdf/<?php echo $solicitud['idsolicitud'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-print"></span> Imprimir</a>
    </div>
</div>
</div>
</div>
<div id="formanalisiscualitativo" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header text-xs-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModal-title">ANALISIS CUALITATIVO</h4>
    </div>
    <div class="modal-body">
        <h4><?php echo $solicitud['apenom']; ?></h4>
		<form action="" class="form-horizontal">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-info">
				  	<div class="panel-heading">I. UNIDAD FAMILIAR</div>
				  	<div class="panel-body">
						<p class="text-primary">1. TIPO DE GARANTIA</p>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">REAL CONSTITUIDA A FAVOR DE LA INSTITUCION (HIPOTECA Y/O PRENDA)</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="tipogarantia" type="radio" class="anacualitativo" value="4" <?php echo ($analisiscualitativo['tipogarantia']=='4' ? 'checked' : '');?>>4</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">SIMPLE</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="tipogarantia" type="radio" class="anacualitativo" value="2" <?php echo ($analisiscualitativo['tipogarantia']=='2' ? 'checked' : '');?>>2</label>
							</div>
						</div>
						<p class="text-primary">2. CARGA FAMILIAR</p>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">NO TIENE DEPENDIENTES</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="cargafamiliar" type="radio" class="anacualitativo" value="4" <?php echo ($analisiscualitativo['cargafamiliar']=='4' ? 'checked' : '');?>>4</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">TIENE DEPENDIENTES NO VULNERABLES</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="cargafamiliar" type="radio" class="anacualitativo" value="2" <?php echo ($analisiscualitativo['cargafamiliar']=='2' ? 'checked' : '');?>>2</label>
							</div>
						</div>	
						<div class="form-group small">
							<label for="" class="control-label col-md-10">TIENE DEPENDIENTES MENORES A 5 AÑOS</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="cargafamiliar" type="radio" class="anacualitativo" value="1" <?php echo ($analisiscualitativo['cargafamiliar']=='1' ? 'checked' : '');?>>1</label>
							</div>
						</div>	
						<div class="form-group small">
							<label for="" class="control-label col-md-10">TIENE ALGUN DEPENDIENTE CON ENFERMEDADES FRECUENTE Y/O GRAVE</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="cargafamiliar" type="radio" class="anacualitativo" value="0" <?php echo ($analisiscualitativo['cargafamiliar']=='0' ? 'checked' : '');?>>0</label>
							</div>
						</div>	
						<p class="text-primary">3. RIESGO POR EDAD MAXIMA</p>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">MENOR DE 64 AÑOS</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="riesgoedadmax" type="radio" class="anacualitativo" value="3" <?php echo ($analisiscualitativo['riesgoedadmax']=='3' ? 'checked' : '');?>>3</label>
							</div>
						</div>	
						<div class="form-group small">
							<label for="" class="control-label col-md-10">MAYOR O IGUAL A 64 AÑOS</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="riesgoedadmax" type="radio" class="anacualitativo" value="1" <?php echo ($analisiscualitativo['riesgoedadmax']=='1' ? 'checked' : '');?>>1</label>
							</div>
						</div>
				  	</div>
				  	<div class="panel-footer">
						<div class="row">
							<div class="col-md-9">
								<label for="totalunidadfam">TOTAL PUNTAJE UNIDAD FAMILIAR</label>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" name="totalunidadfam" id="totalunidadfam" value="<?php echo $analisiscualitativo['totunidfamiliar']; ?>" readonly>
							</div>
						</div>
				  	</div>
				</div>		
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
				  	<div class="panel-heading">II. UNIDAD EMPRESARIAL</div>
				  	<div class="panel-body">
						<p class="text-primary">1. TIENE ANTECEDENTES CREDITICIOS</p>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">CREDITOS EN NUESTRA ENTIDAD</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="antecedentescredit" type="radio" class="anacualitativo" value="5" <?php echo ($analisiscualitativo['antecedentescred']=='5' ? 'checked' : '');?>>5</label>
							</div>
						</div>						
						<div class="form-group small">
							<label for="" class="control-label col-md-10">CREDITOS EN OTRAS ENTIDADES DEL SISTEMA FINANCIERO</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="antecedentescredit" type="radio" class="anacualitativo" value="4" <?php echo ($analisiscualitativo['antecedentescred']=='4' ? 'checked' : '');?>>4</label>
							</div>
						</div>	
						<div class="form-group small">
							<label for="" class="control-label col-md-10">CREDITO CON PROVEEDORES</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="antecedentescredit" type="radio" class="anacualitativo" value="3" <?php echo ($analisiscualitativo['antecedentescred']=='3' ? 'checked' : '');?>>3</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">NO HA TENIDO CREDITOS</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="antecedentescredit" type="radio" class="anacualitativo" value="1" <?php echo ($analisiscualitativo['antecedentescred']=='1' ? 'checked' : '');?>>1</label>
							</div>
						</div>
						<p class="text-primary">2. RECORD PAGO DEL ULTIMO PRESTAMO</p>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">FUE CON PAGOS OPORTUNOS EN SU FECHA DE PAGO</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="recordultimopago" type="radio" class="anacualitativo" value="7" <?php echo ($analisiscualitativo['recorpagoult']=='7' ? 'checked' : '');?>>7</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">FUE CON RETRASO MENOR A 8 DIAS</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="recordultimopago" type="radio" class="anacualitativo" value="5" <?php echo ($analisiscualitativo['recorpagoult']=='5' ? 'checked' : '');?>>5</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">FUE CON RETRASO ENTRE 9 Y 30 DIAS</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="recordultimopago" type="radio" class="anacualitativo" value="2" <?php echo ($analisiscualitativo['recorpagoult']=='2' ? 'checked' : '');?>>2</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">FUE CON RETRASO MAYOR A 30 DIAS O NO HA TENIDO PRESTAMOS</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="recordultimopago" type="radio" class="anacualitativo" value="1" <?php echo ($analisiscualitativo['recorpagoult']=='1' ? 'checked' : '');?>>1</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">NO HA TENIDO CREDITOS</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="recordultimopago" type="radio" class="anacualitativo" value="0" <?php echo ($analisiscualitativo['antecedentescred']=='0' ? 'checked' : '');?>>0</label>
							</div>
						</div>
						<p class="text-primary">3. NIVEL DE DESARROLLO DEL NEGOCIO</p>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">ACUMULACION AMPLIADA</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="niveldesarro" type="radio" class="anacualitativo" value="4" <?php echo ($analisiscualitativo['niveldesarr']=='4' ? 'checked' : '');?>>4</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">ACUMULACION SIMPLE</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="niveldesarro" type="radio" class="anacualitativo" value="3" <?php echo ($analisiscualitativo['niveldesarr']=='3' ? 'checked' : '');?>>3</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">EMERGENTE</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="niveldesarro" type="radio" class="anacualitativo" value="2" <?php echo ($analisiscualitativo['niveldesarr']=='2' ? 'checked' : '');?>>2</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">SOBREVIVENCIA</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="niveldesarro" type="radio" class="anacualitativo" value="1" <?php echo ($analisiscualitativo['niveldesarr']=='1' ? 'checked' : '');?>>1</label>
							</div>
						</div>
						<p class="text-primary">4. TIEMPO FUNCIONAMIENTO DEL NEGOCIO</p>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">MAYOR A 3 AÑOS</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="tiempofuncionamiento" type="radio" class="anacualitativo" value="4" <?php echo ($analisiscualitativo['niveldesarr']=='4' ? 'checked' : '');?>>4</label>
							</div>
						</div>					
						<div class="form-group small">
							<label for="" class="control-label col-md-10">ENTRE 1 Y 3 AÑOS</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="tiempofuncionamiento" type="radio" class="anacualitativo" value="3" <?php echo ($analisiscualitativo['niveldesarr']=='3' ? 'checked' : '');?>>3</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">MENOR A 1 AÑO</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="tiempofuncionamiento" type="radio" class="anacualitativo" value="2" <?php echo ($analisiscualitativo['niveldesarr']=='2' ? 'checked' : '');?>>2</label>
							</div>
						</div>
						<p class="text-primary">5. CONTROLA SUS INGRESOS Y EGRESOS</p>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">SUFICIENTE Y ADECUADAMENTE REGISTRADA</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="controlasusingegre" type="radio" class="anacualitativo" value="3" <?php echo ($analisiscualitativo['control_ingegre']=='3' ? 'checked' : '');?>>3</label>
							</div>
						</div>					
						<div class="form-group small">
							<label for="" class="control-label col-md-10">SUFICIENTE PERO INADECUADAMENTE REGISTRADA</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="controlasusingegre" type="radio" class="anacualitativo" value="2" <?php echo ($analisiscualitativo['control_ingegre']=='2' ? 'checked' : '');?>>2</label>
							</div>
						</div>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">INSUFICIENTE</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="controlasusingegre" type="radio" class="anacualitativo" value="1" <?php echo ($analisiscualitativo['control_ingegre']=='1' ? 'checked' : '');?>>1</label>
							</div>
						</div>
						<p class="text-primary">6. LAS VENTAS TOTALES SE DECLARAN</p>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">FORMALMENTE DE MANERA PARCIAL</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="lasventastotales" type="radio" class="anacualitativo" value="2" <?php echo ($analisiscualitativo['vent_totdec']=='2' ? 'checked' : '');?>>2</label>
							</div>
						</div>	
						<div class="form-group small">
							<label for="" class="control-label col-md-10">NO LAS DECLARA</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="lasventastotales" type="radio" class="anacualitativo" value="0" <?php echo ($analisiscualitativo['vent_totdec']=='0' ? 'checked' : '');?>>0</label>
							</div>
						</div>										
						<p class="text-primary">7. COMPORTAMIENTO DEL SUBSECTOR</p>
						<div class="form-group small">
							<label for="" class="control-label col-md-10">BAJO RIESGO</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="comportamientosubsec" type="radio" class="anacualitativo" value="4" <?php echo ($analisiscualitativo['compsubsector']=='4' ? 'checked' : '');?>>4</label>
							</div>
						</div>	
						<div class="form-group small">
							<label for="" class="control-label col-md-10">MEDIANO RIESGO</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="comportamientosubsec" type="radio" class="anacualitativo" value="2" <?php echo ($analisiscualitativo['compsubsector']=='2' ? 'checked' : '');?>>2</label>
							</div>
						</div>	
						<div class="form-group small">
							<label for="" class="control-label col-md-10">ALTO RIESGO</label>
							<div class="col-md-2">
								<label class="radio-inline control-label"><input name="comportamientosubsec" type="radio" class="anacualitativo" value="0" <?php echo ($analisiscualitativo['compsubsector']=='0' ? 'checked' : '');?>>0</label>
							</div>
						</div>
					</div>
				  	<div class="panel-footer">
						<div class="row">
							<div class="col-md-9">
								<label for="totalunidademp">TOTAL PUNTAJE UNIDAD EMPRESARIAL</label>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" name="totalunidademp" id="totalunidademp" value="<?php echo $analisiscualitativo['totunidempresa'] ?>" readonly>
							</div>
						</div>
				  	</div>
				</div>		
			</div>
		</div>
		<div class="form-group small has-warning">
			<label for="" class="control-label col-md-2">PUNTAJE TOTAL</label>
			<div class="col-md-2">
				<input type="text" name="puntajetotal" class="form-control" value="<?php echo $analisiscualitativo['total'] ?>" readonly="">
			</div>
			<input type="hidden" name="tipoenvioac" id="tipoenvioac" value="<?php echo ($analisiscualitativo['control_ingegre']=='-1') ? '0' : '1';?>">
		</div>
		</form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" name="cerrar" id="cerrar" data-dismiss="modal">Cerrar</button>
        <a id="imprimiranalisicual" href="<?php echo base_url() ?>index.php/solicitud/analisiscualitativopdf/<?php echo $solicitud['idsolicitud'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-print"></span> Imprimir</a>
    </div>
</div>
</div>
</div>
<div id="formbalancegeneral" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="col-md-8">
        	<h4 class="modal-title" id="myModal-title">BALANCE GENERAL</h4>
        </div>
        <div class="col-md-4">
            <div class="input-group input-sm">
            	<span class="input-group-addon">FECHA</span>
            	<input type="date" class="form-control" name="fecha_balance" id="fecha_balance" value="<?php echo $balance['fecha'] ?>">
            </div>                	
        </div>
    </div>
    <div class="modal-body">
		<form action="" name="balanceform" class="form-horizontal small">
			<div class="row">
				<div class="col-md-4">
					<h5>ACTIVO CORRIENTE</h5>
					<div class="row">
						<label for="activocaja" class="control-label col-md-7">CAJA</label>
						<div class="col-md-5">
							<input type="text" onchange="sumarbalance()" name="activocaja" id="activocaja" class="form-control input-sm solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['activocaja'] ?>">
						</div>
					</div>
					<div class="row">
						<label for="activobancos" class="control-label col-md-7">BANCOS</label>
						<div class="col-md-5">
							<input type="text" onchange="sumarbalance()" name="activobancos" id="activobancos" class="form-control input-sm solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['activobancos'] ?>">
						</div>
					</div>
					<div class="row">
						<label for="activoctascobrar" class="control-label col-md-7">CUENTAS POR COBRAR</label>
						<div class="col-md-5">
							<input type="text" onchange="sumarbalance()" name="activoctascobrar" id="activoctascobrar" class="form-control input-sm solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['activoctascobrar'] ?>">
						</div>
					</div>
					<div class="row">
						<label for="activoinventarios" class="control-label col-md-7">INVENTARIOS</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" name="activoinventarios" id="activoinventarios" class="form-control input-sm solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['activoinventarios'] ?>" readonly>
							    <span class="input-group-btn">
							    	<a href="#myModal2" data-toggle="modal" id="agregarinventarios" class="btn btn-default btn-sm" type="button"><span class="glyphicon glyphicon-eye-open"></span></a>
							    </span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="has-success">
							<label for="totalactivocorr" class="control-label col-md-7">TOTAL ACTIVO CORR.</label>
							<div class="col-md-5">
								<input type="text" name="totalactivocorr" id="totalactivocorr" class="form-control input-sm solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['totalacorriente'] ?>" readonly>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<h5>PASIVO CORRIENTE</h5>
					<div class="row">
						<label for="pasivodeudaprove" class="control-label col-md-7">DEUDAS CON PROVEEDORES</label>
						<div class="col-md-5">
							<input type="text" onchange="sumarbalance()" name="pasivodeudaprove" id="pasivodeudaprove" class="form-control input-sm solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['pasivodeudaprove'] ?>">
						</div>
					</div>
					<div class="row">
						<label for="pasivodeudaent" class="control-label col-md-7">DEUDAS CON ENTIDADES FINANCIERAS</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" onchange="sumarbalance()" name="pasivodeudaent" id="pasivodeudaent" class="form-control input-sm solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['pasivodeudaent'] ?>">
								<span class="input-group-btn">
									<a href="#deudasentidadfin" data-toggle="modal" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
								</span>										
							</div>
						</div>
					</div>
					<div class="row">
						<label for="pasivodeudaemprender" class="control-label col-md-7">DEUDAS CON EMPRENDER</label>
						<div class="col-md-5">
							<input type="text" onchange="sumarbalance()" name="pasivodeudaemprender" id="pasivodeudaemprender" class="form-control input-sm solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['pasivodeudaemprender'] ?>">
						</div>
					</div>
					<div class="row">
						<div class="has-warning">
							<label for="totalpasivocorr" class="control-label col-md-7">TOTAL PASIVO CORR</label>
							<div class="col-md-5">
								<input type="text" name="totalpasivocorr" id="totalpasivocorr" class="form-control input-sm solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['totalpcorriente'] ?>" readonly>
							</div>
						</div>
					</div>							
				</div>
				<div class="col-md-3">
					<div class="row small">
						<label for="totalactivo" class="control-label col-md-6">TOTAL ACTIVO</label>
						<div class="col-md-6">
							<input type="text" name="totalactivo" id="totalactivo" class="form-control solo_numeros input-sm" value="<?php echo $balance['total_activo'] ?>" readonly>
						</div>
					</div>
					<div class="row small">
						<label for="totalpasivo" class="control-label col-md-6">TOTAL PASIVO</label>
						<div class="col-md-6">
							<input type="text" name="totalpasivo" id="totalpasivo" class="form-control solo_numeros input-sm" value="<?php echo $balance['total_pasivo'] ?>" readonly>
						</div>
					</div>							
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
					<h5>ACTIVO NO CORRIENTE</h5>
					<div class="row">
						<label for="activomueble" class="control-label col-md-7">MUEBLES, MAQUINARIA Y EQUIPO</label>
						<div class="col-md-5">
							<div class="input-group">
							<?php 
							$activomueble=0;
							foreach($muebles as $row): 
							$activomueble=$activomueble+$row['cantidad'];
							endforeach; ?>
								<input type="text" onchange="sumarbalance()" class="form-control solo_numeros input-sm" name="activomueble" id="activomueble" placeholder="S/. 0.00" value="<?php echo $activomueble; ?>" readonly>
							    <span class="input-group-btn">
							    	<a href="#mueblemaq" data-toggle="modal" class="btn btn-default btn-sm" type="button"><span class="glyphicon glyphicon-eye-open"></span></a>
							    </span>
							</div>
						</div>
					</div>
					<div class="row">
						<label for="activootrosact" class="control-label col-md-7">OTROS ACTIVOS</label>
						<div class="col-md-5">
							<input type="text" onchange="sumarbalance()" class="form-control solo_numeros input-sm" name="activootrosact" id="activootrosact" placeholder="S/. 0.00" value="<?php echo $detbalance['activootrosact'] ?>">
						</div>
					</div>
					<div class="row">
						<label for="activodepre" class="control-label col-md-7">DEPRECIACION, AMORTIZACION Y AGOTAMIENTO ACUMULADO</label>
						<div class="col-md-5">
							<input type="text" onchange="sumarbalance()" class="form-control solo_numeros input-sm" name="activodepre" id="activodepre" placeholder="S/. 0.00" value="<?php echo $detbalance['activodepre'] ?>">
						</div>
					</div>
					<div class="row">
						<div class="has-success">
							<label for="totalactivonocorr" class="control-label col-md-7">TOTAL ACTIVO NO CORRIENTE</label>
							<div class="col-md-5">
								<input type="text" name="totalactivonocorr" id="totalactivonocorr" class="form-control input-sm solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['totalancorriente'] ?>" readonly>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<h5>PASIVO NO CORRIENTE</h5>
					<div class="row">
						<label for="pasivolargop" class="control-label col-md-7">PASIVO LARGO PLAZO</label>
						<div class="col-md-5">
							<input type="text" onchange="sumarbalance()" name="pasivolargop" id="pasivolargop" class="form-control solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['pasivolargop'] ?>">
						</div>
					</div>
					<div class="row">
						<label for="otrascuentaspagar" class="control-label col-md-7">OTRAS CUENTAS POR PAGAR</label>
						<div class="col-md-5">
							<input type="text" onchange="sumarbalance()" name="otrascuentaspagar" id="otrascuentaspagar" class="form-control solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['otrascuentaspagar'] ?>">
						</div>
					</div>
					<div class="row">
						<div class="has-warning">
							<label for="totalpasivonocorr" class="control-label col-md-7">TOTAL PASIVO NO CORRIENTE</label>
							<div class="col-md-5">
								<input type="text" name="totalpasivonocorr" id="totalpasivonocorr" class="form-control input-sm solo_numeros" placeholder="S/. 0.00" value="<?php echo $detbalance['totalpncorriente'] ?>" readonly>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<h5>PATRIMONIO</h5>
					<div class="row">
						<label for="patrimonioemp" class="control-label col-md-7">PATRIMONIO EMPRESARIAL</label>
						<div class="col-md-5">
							<input type="text" name="patrimonioemp" id="patrimonioemp" class="form-control solo_numeros" value="<?php echo $balance['patrimonio'] ?>" readonly>
						</div>
					</div>
					<div class="row">
						<label for="totpatrimonio" class="control-label col-md-7">TOTAL PATRIMONIO</label>
						<div class="col-md-5">
							<input type="text" name="totpatrimonio" id="totpatrimonio" class="form-control solo_numeros" value="<?php echo $balance['patrimonio'] ?>" readonly>
						</div>
					</div>
					<div class="row">
						<label for="paspatrimonio" class="control-label col-md-7">PASIVO Y PATRIMONIO</label>
						<div class="col-md-5">
							<input type="text" name="paspatrimonio" id="paspatrimonio" class="form-control solo_numeros" value="<?php echo number_format($balance['patrimonio']+$balance['total_pasivo'],2) ?>" readonly>
						</div>
					</div>
					<div class="row">
						<label for="captrabajo" class="control-label col-md-7">CAPITAL TRABAJO</label>
						<div class="col-md-5">
							<input type="text" name="captrabajo" id="captrabajo" class="form-control solo_numeros" value="<?php echo number_format($detbalance['totalacorriente']-$detbalance['pasivodeudaprove'],2); ?>" readonly>
						</div>
					</div>
				</div>
			</div>
		</form>
    </div>           
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" name="cerrar_" id="cerrar_" data-dismiss="modal">Cerrar</button>
    </div>
</div>
</div>
</div>
<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				DETALLE DE INVENTARIO
			</div>
			<div class="modal-body">
				<div class="row">
					<form action="" class="form-horizontal input-sm small">
						<div class="form-group">
							<label for="" class="control-label col-md-8">INVENTARIO DE MATERIALES</label>
							<div class="col-md-4">
								<input type="text" name="inventariomateriales" class="form-control input-sm" value="<?php echo (!is_null($detinventariobg)) ? $detinventariobg['inv_materiales'] : '0.00' ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-md-8">INVENTARIO DE PRODUCTOS EN PROCESO</label>
							<div class="col-md-4">
								<input type="text" name="inventarioproductosproc" class="form-control input-sm" value="<?php echo (!is_null($detinventariobg)) ? $detinventariobg['inv_prodproc'] : '0.00' ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-md-8">INVENTARIO DE PRODUCTOS TERMINADOS</label>
							<div class="col-md-4">
								<input type="text" name="inventarioproductoster" class="form-control input-sm" value="<?php echo (!is_null($detinventariobg)) ? $detinventariobg['inv_prodtermi'] : '0.00' ?>">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" data-dismiss="modal" aria-hidden="true" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<div id="mueblemaq" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		MUEBLES, MAQUINARIA Y EQUIPO
	</div>
	<div class="modal-body">
		<div class="row">

			<div class="form-group">
				<label for="descripcionmueble" class="col-md-12">DESCRIPCION</label>
				<div class="col-md-12">
					<input type="text" name="descripcionmueble" id="descripcionmueble" class="form-control input-sm" placeholder="Descripcion">
				</div>
			</div>
			<div class="form-group">
			<br><br><br>
				<label for="" class="control-label col-md-5">VALOR</label>
				<div class="col-md-4">
					<input type="text" name="valormueble" class="form-control input-sm solo_numeros" value="0">
				</div>
				<div class="col-md-3">
					<a href="#" id="agregarmueble" class="btn btn-info"><span class="glyphicon glyphicon-chevron-down"></span></a>
				</div>
			</div>
		</div>
		<div class="row">
			<br>
			<div class="col-md-12">
				<div id="tablamuebles">
					<div class="table-responsive small">
						<table class="table table-striped">
							<tr>
								<th>DESCRIPCION</th>
								<th>VALOR</th>
								<th></th>
							</tr>
							<?php foreach($muebles as $row) : ?>
							<tr>
								<td><?php echo $row['descripcion'] ?></td>
								<td><?php echo $row['cantidad'] ?></td>
								<td><a href="<?php echo $row['id'] ?>" class="btn btn-danger btn-xs eliminarmueble"><span class="glyphicon glyphicon-remove"></span></a></td>
							</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-success" data-dismiss="modal" aria-hidden="true" data-dismiss="modal">Cerrar</button>
	</div>
</div>
</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="gastonegocio">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">GASTOS NEGOCIO</h4>
</div>
<div class="modal-body">
<form action="" class="form-horizontal">
	<div class="form-group">
		<label for="" class="control-label col-md-6">Alquiler</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control input-sm" name="alquilerpg" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosnegocios)) ? $gastosnegocios['alquiler'] : '0.00' ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Servicios</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>		
				<input type="text" class="form-control input-sm" name="serviciospg" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosnegocios)) ? $gastosnegocios['servicios'] : '0.00' ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Personal</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>			
				<input type="text" class="form-control input-sm" name="personalpg" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosnegocios)) ? $gastosnegocios['personal'] : '0.00' ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Sunat</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>			
				<input type="text" class="form-control input-sm" name="sunatpg" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosnegocios)) ? $gastosnegocios['sunat'] : '0.00' ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Transporte</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>			
				<input type="text" class="form-control input-sm" name="transportepg" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosnegocios)>0) ? $gastosnegocios['transporte'] : '0.00' ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Gastos Financieros</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>			
				<input type="text" class="form-control input-sm" name="gastosfinan" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosnegocios)>0) ? $gastosnegocios['gastosfinancieros'] : '0.00' ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Otros</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>		
				<input type="text" class="form-control input-sm" name="otrospg" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosnegocios)>0) ? $gastosnegocios['otros'] : '0.00' ?>">
			</div>
		</div>
	</div>
</form>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="gastosfamiliares">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">GASTOS FAMILIARES</h4>
</div>
<div class="modal-body">
<form action="" class="form-horizontal">
	<div class="form-group">
		<label for="" class="control-label col-md-6">Alimentacion</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control input-sm" name="alimentac" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosfamilliares)) ? $gastosfamilliares['alimentacion'] : '0.00' ?>">				
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Alquileres</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>		
				<input type="text" class="form-control input-sm" name="alquil" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosfamilliares)) ? $gastosfamilliares['alquileres'] : '0.00' ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Educacion</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>			
				<input type="text" class="form-control input-sm" name="educac" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosfamilliares)) ? $gastosfamilliares['educacion'] : '0.00' ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Servicios</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>			
				<input type="text" class="form-control input-sm" name="servic" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosfamilliares)) ? $gastosfamilliares['servicios'] : '0.00' ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Transporte</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>			
				<input type="text" class="form-control input-sm" name="transport" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosfamilliares)) ? $gastosfamilliares['transporte'] : '0.00' ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Salud</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>			
				<input type="text" class="form-control input-sm" name="salud" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosfamilliares)) ? $gastosfamilliares['salud'] : '0.00' ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-6">Otros</label>
		<div class="col-md-6">
			<div class="input-group">
				<span class="input-group-addon">S/.</span>		
				<input type="text" class="form-control input-sm" name="otros_gf" onclick="selecciona_value(this)" placeholder="0.00" value="<?php echo (!is_null($gastosfamilliares)) ? $gastosfamilliares['otros'] : '0.00' ?>">
			</div>
		</div>
	</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

