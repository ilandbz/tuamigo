<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">LISTA DE SOLICITUDES</h3>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-condensed table-striped small">
				<tr class="info">
					<td>ITEM</td>
					<th>CODIGO</th>
					<th>CODCLIENTE</th>
					<th>DNI</th>
					<th>APELLIDOS Y NOMBRES</th>
					<th>MONTO</th>
					<th>PLAZO</th>
					<th>FRECUENCIA</th>
					<th>IDASESOR</th>
					<th>AGENCIA</th>
					<th>FECHA SOL.</th>
					<th></th>
				</tr>
				<?php $i=0; $total=0; foreach($solicitudes as $row) : $i++; ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['codigo'] ?></td>
					<td><?php echo $row['codcliente'] ?></td>
					<td><?php echo $row['dni'] ?></td>
					<td><?php echo $row['apenom'] ?></td>
					<td>S/.<?php echo number_format($row['monto'],2); $total+=$row['monto']; ?></td>
					<td><?php echo $row['plazo'].' '.$row['tipoplazo'] ?></td>
					<td><?php echo $row['frecuencia'] ?></td>
					<td><?php echo $row['idusuario'] ?></td>
					<td><?php echo $row['agencia'] ?></td>
					<td><?php echo $row['fecha_registro'] ?></td>
					<td>
						<a title="Generar Calendario" target="_blank" href="<?php echo base_url() ?>index.php/ahorros/generarcal/<?php echo $row['codigo'] ?>" class="btn btn-block"><span class="glyphicon glyphicon-edit"></span></a>
					</td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<th colspan="5" class="text-right">TOTAL</th>
					<th>S/.<?php echo number_format($total,2); ?></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>					
				</tr>
			</table>	
			<hr>
		</div>
	</div>
</div>
