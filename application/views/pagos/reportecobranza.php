<div class="container">
	<form action="" method="POST" class="form-horizontal">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <div class="panel-title">
			<div class="row">
				<div class="col-md-7">
					CALENDARIO DE PAGOS
				</div>
				<label for="" class="control-label col-md-3">TAZA DE INTERES : </label>			
				<div class="col-md-2">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control solo_numeros" name="ti_repcobra" id="ti_repcobra" value="<?php echo number_format($desembolso['interes'],2); ?>" readonly>
						<span class="input-group-addon">%</span>						
					</div>
				</div>
			</div>
	    </div>
	  </div>
	  <div class="panel-body">
			<div class="form-group">
				<label for="" class="control-label col-md-2">F. DESEMBOLSO</label>	
				<div class="col-md-2 input-sm">
					<input type="text" name="fecha_des" value="<?php echo $desembolso['fecha_hora']; ?>" class="form-control input-sm" readonly>
				</div>
				<label for="" class="control-label col-md-2">MONTO</label>
				<div class="col-md-2">
					<input type="text" value="<?php echo $desembolso['monto']; ?>" class="form-control input-sm solo_numeros" readonly>
				</div>
				<label for="" class="control-label col-md-2">PLAZO</label>		
				<div class="col-md-2">
					<div class="input-group input-group-sm">
						<input type="text" value="<?php echo $desembolso['plazo']; ?>" class="form-control input-sm" readonly>	
						<span class="input-group-addon"><?php echo $desembolso['unidplazo'] ?></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-md-2">PRODUCTO</label>
				<div class="col-md-2">
					<input type="text" value="<?php echo $solicitud['producto'] ?>" class="form-control input-sm" readonly>
				</div>
				<label for="" class="control-label col-md-2">CLIENTE</label>
				<div class="col-md-5">
					<input type="text" value="<?php echo $solicitud['apenom'] ?>" class="form-control input-sm" readonly>
				</div>		
			</div>
			<div class="form-group">
				<label for="" class="control-label col-md-2">DOMICILIO</label>
				<div class="col-md-10">
					<input type="text" value="<?php echo $cliente['tipovia'].' '.$cliente['nombrevia'].' NRO : '.$cliente['nro'].', Interior : '.$cliente['interior'].', MZ : '.$cliente['mz'].', Lote : '.$cliente['lote'].', '.$cliente['tipozona'].':'.$cliente['nombrezona'].', REF:'.$cliente['referencia'] ?>" name='domicilio_direc' class="form-control input-sm" readonly>
				</div>			
			</div>
			<div class="form-group">
				<label for="" class="control-label col-md-2">NEGOCIO</label>
	<?php 
	
	if(!is_null($negocio)){
		$direc_negocio = $negocio['tipovia'].' '.$negocio['nombrevia'].' NRO : '.$negocio['Nro'].', Interior : '.$negocio['interior'].', MZ : '.$negocio['mz'].', Lote : '.$negocio['lote'].', '.$negocio['tipozona'].':'.$negocio['nombrezona'].', REF:'.$negocio['referencia'];
	}else{
		$direc_negocio = 'NO TIENE';
	}
	 ?>
				<div class="col-md-7">
					<textarea class="form-control" id="direc_negocio" name='direc_negocio' readonly><?php echo $direc_negocio ?></textarea>
	
				</div>
				<label for="" class="control-label col-md-1">CEL</label>		
				<div class="col-md-2">
					<input type="text" class="form-control solo_numeros" name="celcliente" value="<?php echo $cliente['celular'] ?>" readonly>
				</div>
			</div>
			<div class="table-responsive small">
				<table class="table table-striped table-bordered table-condensed table-hover small">
					<tr>
						<th width="10%">N° CUOTA</th>
						<th width="20%">FECHA PROG.</th>
						<th width="10%">CUOTA</th>
						<th width="15%">MONTO PAG.</th>
						<th width="15%">FECHA DE PAGO</th>
						<th width="15%">SALDO</th>
						<th width="15%">FIRMA</th>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo number_format($desembolso['total'],2); ?></td>
						<td></td>				
					</tr>
					<?php 
					foreach($cuotapagos as $row){  ?>
						<tr>
							<td><?php echo $row['nrocuota']; ?></td>
							<td><?php echo $row['nombredia'].' '.$row['fecha_prog']; ?></td>
							<td><?php echo number_format($row['cuota'],2); ?></td>
							<td></td>
							<td></td>
							<td><?php echo number_format($row['saldo'],2); ?></td>
							<td></td>
						</tr>
					<?php } ?>
				</table>
			</div>
	  </div>

	  <div class="panel-footer">
		  <a href="<?php echo base_url() ?>index.php/solicitud/reportecobranzapdf/<?php echo $desembolso['iddesembolso'] ?>" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>&nbsp;IMPRIMIR&nbsp;<span class="glyphicon glyphicon-print"></span></a>&nbsp;
		  
<?php if($this->session->userdata('tipouser')==3){ ?>
	  <a href="<?php echo base_url() ?>index.php/caja/cajadesembolsoform/<?php echo $desembolso['iddesembolso'] ?>/<?php echo $totaldescaja ?>" class="btn btn-warning"><span class="glyphicon glyphicon-object-align-vertical"></span> PASAR A CAJA</a>
	  <a href="<?php echo base_url() ?>index.php/pagos/eliminardesembolso/<?php echo $desembolso['iddesembolso'] ?>/<?php echo $desembolso['idsolicitud'] ?>" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-remove"></span> Eliminar Desembolso</a>

<?php } ?>




	  </div>
	</div>
	</form>
</div>