<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				CERRAR CAJA
			<a href="<?php echo base_url() ?>index.php/caja/detalledecaja" title="VER DETALLE DE CAJA" class="pull-right btn-link"><span class="glyphicon glyphicon-folder-open"></span></a>				
			</div>
		</div>
		<div class="panel-body">
			<form name="cerrarcajaform" action="<?php echo base_url() ?>index.php/caja/cerrarcaja" class="form-horizontal" method="POST">
				<div class="row">
					<div class="col-md-12">
						<h3 class="pull-right"><small>SALDO ACTUAL EN CAJA : </small>S/.<?php echo number_format($saldo,2); ?></h3>
					</div>
				</div>
					<input type="hidden" class="form-control" name="saldocaja" id="saldocaja" value="<?php echo $saldo; ?>">
				<div class="form-group">
					<div class="col-md-5">
						<div class="input-group">
							<span class="input-group-addon">FECHA HORA</span>
							<input type="datetime-local" class="form-control" name="fecha_hora" value="<?php echo date('Y-m-d\TH:i'); ?>" readonly>
						</div>
					</div>
					<?php if($cantasesorconsaldo>0){ ?>
							<div class="col-md-offset-2 col-md-4">
								<div class="alert alert-danger" role="alert">
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  <span class="sr-only">Error:</span>
								  EXISTEN ASESORES CON SALDO <a href="<?php echo base_url() ?>index.php/pagos/formpagasesor"><span class="glyphicon glyphicon-eye-open"></span></a>
								</div>
							</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<div class="col-md-7">
						<div class="input-group">
							<span class="input-group-addon">OBSERVACION</span>
							<textarea rows="2" class="form-control" name="observacion" placeholder="Observacion"></textarea>
						</div>
					</div>
					<div class="col-md-2">
						<button type="submit" id="cerrarcajabtn" class="btn btn-success">CERRAR CAJA</button>
					</div>	
				</div>
			</form>	
			<div class="row">
			<hr>
				<div class="col-md-9">
					<h3>REGISTROS</h3>
				</div>
				<div class="col-md-3">
					<a href="<?php echo base_url() ?>index.php/caja/registrosingresossalidapdf" target="_blank" type="button" class="btn btn-primary pull-right">IMPRIMIR <span class="glyphicon glyphicon-print"></span></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<table class="table table-bordered table-hover">
						<tr class="success">
							<th>FECHA HORA</th>
							<th>INGRESO</th>
						</tr>
						<?php $totaling=0; foreach($registroingcajahoy as $row) : ?>
						<tr title="<?php echo $row['descripcion'] ?>">
							<td><?php echo $row['fecha_hora'] ?></td>
							<td>S/.<?php echo $row['cantidad']; $totaling+=$row['cantidad']; ?></td>

						</tr>				
						<?php endforeach; ?>
						<tr>
							<th>TOTAL : </th><th>S/. <?php echo number_format($totaling,2) ?></th>
						</tr>
					</table>					
				</div>
				<div class="col-md-6">
					<table class="table table-bordered table-hover">
						<tr class="warning">
							<th>FECHA HORA</th>
							<th>SALIDA</th>
						</tr>
						<?php $totalsal=0; foreach($registroegrecajahoy as $row) : ?>
						<tr title="<?php echo $row['descripcion'] ?>">
							<td><?php echo $row['fecha_hora'] ?></td>
							<td>S/.<?php echo $row['cantidad']; $totalsal+=$row['cantidad']; ?></td>
						</tr>				
						<?php endforeach; ?>
						<tr>
							<th>TOTAL : </th><th>S/. <?php echo number_format($totalsal,2) ?></th>
						</tr>
					</table><br>
					<p>PAGOS POR USUARIO</p>
					<ul class="nav nav-pills nav-justified">
						<?php $c=0; foreach($usuarios as $row){ $c++; ?>
							<li role="presentation"><a href="<?php echo base_url() ?>index.php/report/detpagosusuario/<?php echo $row['codusuario'] ?>"><?php echo $row['codusuario'] ?></a></li>
							<?php if($c % 5 ==0){ ?>
								</ul>
								<ul class="nav nav-pills nav-justified">
							<?php } ?>
						<?php } ?>	
					</ul>
				</div>				
			</div>

			<br>
			<h4>REGISTRO ULTIMO DIA CIERRE</h4>
			<table class="table table-hover table-striped table-bordered small">
				<tr>
					<th>ITEM</th>
					<th>FECHA HORA</th>
					<th>CANTIDAD</th>
					<th>OBSERVACION</th>
					<th>IDUSUARIO</th>
				</tr>
				<?php $i=0; foreach ($registroscc as $row) { $i++; ?>
					<td><?php echo $i ?></td>
					<td><?php echo $row['fecha_hora'] ?></td>
					<td>S/.<?php echo number_format($row['cantidad'],2) ?></td>
					<td><?php echo $row['observacion'] ?></td>
					<td><?php echo $row['idusuario'] ?></td>
				<?php }	 ?>
			</table>

		</div>
	</div>
</div>
