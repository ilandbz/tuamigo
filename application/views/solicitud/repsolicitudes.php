<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">SOLICITUDES PENDIENTES DE SER EVALUADOS POR ASESOR FINANCIERO</h3>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-condensed table-striped">
				<tr>
					<th>ITEM</th>
					<th>IDSOLICITUD</th>
					<th>CODCLIENTE</th>
					<th>APELLIDOS Y NOMBRES</th>
					<th>FECHA</th>
					<th>TIPO</th>
					<th>MONTO</th>
					<th>IDASESOR</th>
					<th></th>
				</tr>
				<?php $total=0; $i=0; foreach($solicitudes as $row): $i++; ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['idsolicitud'] ?></td>
					<td><?php echo $row['codcliente'] ?></td>
					<td><?php echo $row['apenom'] ?></td>
					<td><?php echo $row['fecha'] ?></td>
					<td><?php echo $row['tipo'] ?></td>
					<td>S/.<?php echo number_format($row['monto'],2); $total+=$row['monto']; ?></td>
					<td><?php echo $row['idasesor'] ?></td>	
					<td><a href="<?php echo base_url() ?>index.php/solicitud/form_evaluacion/<?php echo $row['idsolicitud'] ?>" title="EVALUAR" class="btn btn-link"><span class="glyphicon glyphicon-edit"></span></a></td>		
				</tr>
				<?php endforeach; ?>
				<tr>
					<th colspan="6" align="right">TOTAL</th>
					<th>S/.<?php echo number_format($total,2) ?></th>
					<th></th>
					<th></th>
				</tr>
			</table>		
		</div>
	</div>
</div>