<?php 
$sum=0;
 ?>
<form action="<?php echo base_url() ?>index.php/report/imprimirpagosporasesorpdf" method="POST">
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">PAGOS POR USUARIO</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-8">
					<h4><small>USUARIO : </small><?php echo $usuario['apenom'] ?></h4>
				</div>
				<div class="col-md-4">
					<div class="input-group">
						<input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" name="fecha">
						<input type="hidden" name="idusuario" value="<?php echo $usuario['codusuario'] ?>">
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" id="bscpagus"><span class="glyphicon glyphicon-search"></span></button>
						</span>
					</div>
				</div>
			</div>
			<div id="vistatablakuser">
				<table class="table table-striped table-hover table-bordered small">
					<tr>
						<th>NRO</th>
						<th>ID SOLICITUD</th>
						<th>ID DESEMBOLSO</th>
						<th>CLIENTE</th>
						<th>FECHA HORA</th>
						<th>MONTO</th>
						<th>ASESOR</th>
					</tr>
					<?php $i=1; foreach($vistakardex as $row){ ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row['idsolicitud'] ?></td>
						<td><?php echo $row['iddesembolso'] ?></td>
						<td><?php echo $row['apenom'] ?></td>
						<td><?php echo $row['fecha_hora_reg'] ?></td>
						<td>S/.<?php echo $row['montopagado'] ?></td>
						<td><?php echo $row['idasesor'] ?></td>
					</tr>
					<?php $sum=$sum+$row['montopagado']; $i++; } ?>
					<tr>
						<td colspan="5" align="right">TOTAL</td>
						<td>S/.<?php echo number_format($sum,2); ?></td>
						<td></td>
					</tr>
				</table>
				<br>
				<h4>DOCO</h4>
				<br>
				<table class="table table-striped table-hover table-bordered small">
					<tr>
						<th>NRO</th>
						<th>CODIGO</th>
						<th>CLIENTE</th>
						<th>FECHA HORA</th>
						<th>MONTO</th>
						<th>ASESOR</th>
					</tr>
					<?php $i=1; $sum=0; foreach($kardexahorro as $row){ ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row['codigo'] ?></td>
						<td><?php echo $row['apenom'] ?></td>
						<td><?php echo $row['fecha_hora'] ?></td>
						<td>S/.<?php echo $row['monto'] ?></td>
						<td><?php echo $row['idusuario'] ?></td>
					</tr>
					<?php $sum=$sum+$row['monto']; $i++; } ?>
					<tr>
						<td colspan="5" align="right">TOTAL</td>
						<td>S/.<?php echo number_format($sum,2); ?></td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="panel-footer">
			<div class="row">
				<div class="col-md-12">
						<button type="submit" class="btn btn-primary pull-right">Imprimir <span class="glyphicon glyphicon-print"></span></button>
				</div>
			</div>
		</div>
	</div>
</div>
</form>