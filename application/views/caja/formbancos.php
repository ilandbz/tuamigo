<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">ADMINISTRAR BANCOS</h3>
		</div>
		<div class="panel-body">
			<div align="center"><h3>SALDO S/.<?php echo number_format($saldobancos,2) ?></h3></div>
			<div class="row">
				<div class="col-md-6">
					<h4>INGRESO</h4>
					<form action="<?php echo base_url() ?>index.php/caja/ingbancos" class="form-horizontal" method="POST">
						<div class="form-group">
							<label for="ingresobanco" class="control-label col-md-4">MONTO</label>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">S/.</span>
									<input type="text" name="ingresobanco" id="ingresobanco" class="form-control numerosypunto" placeholder="0.00" value="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="entidadingresobancos" class="control-label col-md-4">ENTIDAD</label>	
							<div class="col-md-6">
								<input type="text" name="entidadingresobancos" id="entidadingresobancos" class="form-control" placeholder="ENTIDAD FINANCIERA">
							</div>
						</div>					
						<div class="form-group">
							<label for="comprobanteingbancos" class="control-label col-md-4">COMBROBANTE</label>	
							<div class="col-md-6">
								<input type="text" name="comprobanteingbancos" id="comprobanteingbancos" class="form-control" placeholder="Vaucher o Recibo">
							</div>
						</div>
						<div class="form-group">
							<label for="fechaingbancos" class="control-label col-md-4">FECHA</label>
							<div class="col-md-6">
								<input type="datetime-local" name="fechaingbancos" class="form-control" id="fechaingbancos" value="<?php echo date('Y-m-d h:i:s') ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="descingbancos" class="control-label col-md-4">DESCRIPCION</label>
							<div class="col-md-8">
								<textarea name="descingbancos" id="descingbancos" rows="3" class="form-control" placeholder="Descripcion"></textarea>
							</div>						
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<button class="btn btn-info" id="ingresarbanco">INGRESAR</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<h4>SALIDA</h4>
					<form action="<?php echo base_url() ?>index.php/caja/salidabancos" class="form-horizontal" method="POST">
						<div class="form-group">
							<label for="salidabanco" class="control-label col-md-4">MONTO</label>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">S/.</span>
									<input type="text" name="salidabanco" id="salidabanco" class="form-control numerosypunto" placeholder="0.00" value="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="comprobantesalidabanco" class="control-label col-md-4">COMBROBANTE</label>	
							<div class="col-md-6">
								<input type="text" name="comprobantesalidabanco" id="comprobantesalidabanco" class="form-control" placeholder="Vaucher o Recibo">
							</div>
						</div>
						<div class="form-group">
							<label for="fechasalidabancos" class="control-label col-md-4">FECHA</label>
							<div class="col-md-6">
								<input type="date" name="fechasalidabancos" class="form-control" id="fechasalidabancos" value="<?php echo date('Y-m-d') ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="descripcionsalidabancos" class="control-label col-md-4">DESCRIPCION</label>
							<div class="col-md-8">
								<textarea name="descripcionsalidabancos" id="descripcionsalidabancos" rows="3" class="form-control" placeholder="Descripcion"></textarea>
							</div>						
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<button class="btn btn-info" id="salirbanco">REGISTRAR SALIDA</button>
							</div>
						</div>
					</form>
				</div>
			</div>

				<h4>REGISTROS</h4>
				<table class="table table-bordered table-responsive table-hover">
					<tr>
						<th>ITEM</th>
						<th>FECHA HORA</th>
						<th>CANTIDAD</th>
						<th>TIPO</th>
						<th>SALDO</th>
						<th>DESCRIPCION</th>
						<th>AGENCIA</th>
						<th></th>
					</tr>
					<?php $i=0; $total=0; foreach($registrosbancos as $row){ $i++; $total+=$row['cantidad']; ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row['fecha_hora'] ?></td>
						<td><?php echo $row['cantidad'] ?></td>
						<td><?php echo $row['tipo'] ?></td>
						<td>s/.<?php echo number_format($row['saldo'],2); ?></td>
						<td><?php echo $row['descripcion'] ?></td>
						<td><?php echo $row['agencia'] ?></td>
						<td>
							<a href="<?php echo base_url() ?>index.php/caja/eliminarregbanco/<?php echo $row['id'] ?>" class="<?php echo $i==1 ? '' : 'disabled' ?> btn btn-danger btn-xs eliminar" title="Eliminar "><span class="glyphicon glyphicon-remove"></span></a>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<th colspan="2">TOTAL</th>
						<th>S/.<?php echo number_format($total,2); ?></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</table>

		</div>
	</div>
</div>
