<div class="container">
	<div class="container-fluid">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">SOLICITUDES APROBADOS POR AGENCIA</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-condensed table-striped small">
					<tr>
						<th>IDSOLICITUD</th>
						<th>CODCLIENTE</th>
						<th>APELLIDOS Y NOMBRES</th>
						<th>FECHA</th>
						<th>TIPO</th>
						<th>MONTO</th>
						<th>ASESOR</th>
						<th>AGENCIA</th>
						<th></th>
					</tr>
					<?php $total=0; foreach($solicitudes as $row): ?>
						<tr>
							<td><?php echo $row['idsolicitud'] ?></td>
							<td><?php echo $row['codcliente'] ?></td>
							<td><?php echo $row['apenom'] ?></td>
							<td><?php echo $row['fecha'] ?></td>
							<td><?php echo $row['tipo'] ?></td>
							<td>S/.<?php echo $row['monto']; $total+=$row['monto']; ?></td>
							<td><?php echo $row['idasesor'] ?></td>
							<td><?php echo $row['agencia'] ?></td>
							<td><a href="<?php echo base_url() ?>index.php/solicitud/evaluar/<?php echo $row['idsolicitud'] ?>" title="EVALUAR" class="btn btn-link"><span class="glyphicon glyphicon-edit"></span></a></td>		
						</tr>
					<?php endforeach; ?>
						<tr>
							<th colspan="5" align="right">TOTAL</th>
							<th>S/.<?php echo number_format($total,2) ?></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
				</table>		
			</div>
		</div>
	</div>
</div>