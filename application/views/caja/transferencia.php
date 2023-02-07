<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			TRANSFERENCIA ENTRE BANCO Y CAJA
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<h3><small>CAJA HUANUCO </small>S/.<?php echo number_format($saldocajahco,2); ?></h3>
				</div>
				<div class="col-md-6">
					<h3><small>BANCO HUANUCO </small>S/.<?php echo number_format($saldobancohco,2); ?></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h3><small>CAJA HUANUCO2 </small>S/.<?php echo number_format($saldocajahco2,2); ?></h3>
				</div>
				<div class="col-md-6">
					<h3><small>BANCO HUANUCO2 </small>S/.<?php echo number_format($saldobancohco2,2); ?></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h3><small>CAJA TINGO MARIA </small>S/.<?php echo number_format($saldocajatm,2); ?></h3>
				</div>
				<div class="col-md-6">
					<h3><small>BANCO TINGO MARIA </small>S/.<?php echo number_format($saldobancotm,2); ?></h3>
				</div>
			</div>			
			<br>
			<form action="<?php echo base_url() ?>index.php/caja/transferir" class="form-horizontal" method="POST" onsubmit="return checkSubmit();">
				<input type="hidden" name="saldocajahco" value="<?php echo $saldocajahco ?>">
				<input type="hidden" name="saldobancohco" value="<?php echo $saldobancohco ?>">
				<input type="hidden" name="saldocajahco2" value="<?php echo $saldocajahco2 ?>">
				<input type="hidden" name="saldobancohco2" value="<?php echo $saldobancohco2 ?>">
				<input type="hidden" name="saldocajatm" value="<?php echo $saldocajatm ?>">
				<input type="hidden" name="saldobancotm" value="<?php echo $saldobancotm ?>">
				<div class="form-group">
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">DESDE</span>
							<select name="transfdesde" id="transfdesde" class="form-control" required>
								<option value="">SELECCIONE</option>
								<option value="BANCO HCO">BANCO HCO</option>
								<option value="CAJA HCO">CAJA HCO</option>
								<option value="BANCO HCO2">BANCO HCO2</option>
								<option value="CAJA HCO2">CAJA HCO2</option>
								<option value="BANCO TINGO">BANCO TINGO</option>
								<option value="CAJA TINGO">CAJA TINGO</option>								
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">HASTA</span>
							<select name="transfhasta" id="transfhasta" class="form-control" required>
								<option value="">SELECCIONE</option>
								<option value="BANCO HCO">BANCO HCO</option>
								<option value="CAJA HCO">CAJA HCO</option>
								<option value="BANCO HCO2">BANCO HCO2</option>
								<option value="CAJA HCO2">CAJA HCO2</option>
								<option value="BANCO TINGO">BANCO TINGO</option>
								<option value="CAJA TINGO">CAJA TINGO</option>	
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">S/.</span>
							<input type="text" name="montotransferencia" class="form-control numerosypunto" placeholder="Monto S/.0.00" required>
						</div>
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-primary" name="enviartransferencia" title="Enviar">TRANSFERIR <span class="glyphicon glyphicon-send"></span></button>
					</div>
				</div>
			</form>
			<div class="row" style="font-size:10px">
				<div class="col-md-6">
					<h3>ULTIMAS TRANSFERENCIAS CAJA</h3>
					<table class="table table-bordered table-responsive table-hover">
						<tr>
							<th>NRO</th>
							<th>FECHA HORA</th>
							<th>USUARIO</th>
							<th>CANTIDAD</th>
							<th>TIPO</th>
							<th>DESCRIPCION</th>
							<th>SALDO</th>
							<th>AGENCIA</th>
						</tr>
						<?php $i=1; foreach($registroscajahoy as $fila): ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $fila['fecha_hora'] ?></td>
								<td><?php echo $fila['codusuario'] ?></td>
								<td><?php echo $fila['cantidad'] ?></td>
								<td><?php echo $fila['tipo'] ?></td>
								<td><?php echo substr($fila['descripcion'], 14) ?></td>
								<td><?php echo $fila['saldo'] ?></td>
								<td><?php echo $fila['agencia'] ?></td>
							</tr>
						<?php $i++; endforeach; ?>						
					</table>
				</div>
				<div class="col-md-6">
					<h3>ULTIMAS TRANSFERENCIAS BANCO</h3>
					<table class="table table-bordered table-responsive table-hover">
						<tr>
							<th>NRO</th>
							<th>FECHA HORA</th>
							<th>USUARIO</th>
							<th>CANTIDAD</th>
							<th>TIPO</th>
							<th>DESCRIPCION</th>
							<th>SALDO</th>
							<th>AGENCIA</th>
						</tr>
						<?php $i=1; foreach($registrosbancohoy as $fila): ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $fila['fecha_hora'] ?></td>
								<td><?php echo $fila['codusuario'] ?></td>
								<td><?php echo $fila['cantidad'] ?></td>
								<td><?php echo $fila['tipo'] ?></td>
								<td><?php echo substr($fila['descripcion'], 14) ?></td>
								<td><?php echo $fila['saldo'] ?></td>
								<td><?php echo $fila['agencia'] ?></td>
							</tr>
						<?php $i++; endforeach; ?>						
					</table>


				</div>
			</div>
		</div>
	</div>

</div>