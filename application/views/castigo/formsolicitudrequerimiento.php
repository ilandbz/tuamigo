<div class="container-fluid">
	<form action="<?php echo base_url() ?>index.php/solicitud/guardarsolicitud" class="form-horizontal input-sm" name="guardar_solicitud" role="form" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-primary">
			<div class="panel-heading">
				SOLICITUD DE REQUERIMIENTO DE PAGOS
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="dni" class="control-label col-md-2">TITULAR</label>
				    <div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon"><?php echo $solicitud['apenom'] ?></span>			
						</div>
				    </div>
				</div>
				<div class="form-group">
				    <label for="conyugue" class="control-label col-md-2">DIRECCION</label>
				    <div class="col-md-6">
				    	<span class="input-group-addon"><?php echo $solicitud['direccion_dom'] ?></span>
				    </div>
				</div> 
				<div class="form-group">
				    <label for="estadociv" class="control-label col-md-2">AVAL</label>
				    <div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon"><?= $aval['apenom'] ?></span>			
						</div>
				    </div>
					<div class="col-md-6">
						<span class="input-group-addon">
						<?php echo $aval['tipovia'].' '.$aval['nombrevia'].' NRO : '.$aval['nro'].' INTERIOR: '.$aval['interior'].' MZ : '.$aval['mz'].' LOTE : '.$aval['lote'].' '.$aval['tipozona'].' :'.$aval['nombrezona'] ?>
						</span>
					</div>
				</div>
				<div class="form-group">
				    <label for="plazo" class="control-label col-md-2">PRESTAMO OTORGADO</label>
				    <div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon">S/.<?= number_format($solicitud['monto'],2) ?></span>			
						</div>
				    </div>
				    <label for="tiposolicitud" class="control-label col-md-2">DEUDA TOTAL</label>
				    <div class="col-md-2">
						<span class="input-group-addon">
						S/.<?= number_format($solicitud['saldo'],2); ?>
						</span>
				    </div>
				    <label for="tiposolicitud" class="control-label col-md-2">MONTO VENCIDO</label>
				    <div class="col-md-2">
						<span class="input-group-addon">
<?php $mora=($solicitud['moradias']-$solicitud['pagomora'])*$solicitud['costomora'] ?>


						S/.<?= number_format($solicitud['saldo']+$mora,2); ?>
						</span>
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