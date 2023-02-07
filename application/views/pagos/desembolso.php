<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">DESEMBOLSO</h3>
		</div>
		<div class="panel-body">
			<h3>LISTA DE SOLICITUDES APROBADAS A SER DESEMBOLSADO</h3>
			<table class="table table-bordered table-condensed table-striped small">
				<tr class="info">
					<td>ITEM</td>
					<th>IDSOLICITUD</th>
					<th>CODCLIENTE</th>
					<th>DNI</th>
					<th>APELLIDOS Y NOMBRES</th>
					<th>MONTO</th>
					<th>TIPO</th>
					<th>IDASESOR</th>
					<th>AGENCIA</th>
					<th>FECHA SOL.</th>
					<th></th>
				</tr>
				<?php $i=0; $total=0; foreach($solicitudes as $row) : $i++; ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['idsolicitud'] ?></td>
					<td><?php echo $row['codcliente'] ?></td>
					<td><?php echo $row['dni'] ?></td>
					<td><?php echo $row['apenom'] ?></td>
					<td>S/.<?php echo number_format($row['monto'],2); $total+=$row['monto']; ?></td>
					<td><?php echo $row['tipo'] ?></td>
					<td><?php echo $row['idasesor'] ?></td>
					<td><?php echo $row['agencia'] ?></td>
					<td><?php echo $row['fecha'] ?></td>
					<td><a href="<?php echo base_url() ?>index.php/pagos/formdesembolso/<?php echo $row['idsolicitud'] ?>" class="btn btn-block"><span class="glyphicon glyphicon-edit"></span></a></td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<th colspan="5" class="text-right">TOTAL</th>
					<th>S/.<?php echo number_format($total,2); ?></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</table>	
			<hr>
			<h3>Desembolsos Recientes</h3>
			<table class="table table-hover table-striped table-bordered small">
				<tr>
					<th>Iddesembolso</th>
					<th>Fecha Hora Desem.</th>
					<th>Id Solicitud</th>
					<th>Apellidos y Nombres</th>
					<th>Monto</th>
					<th>Tipo</th>
					<th>Interes</th>
					<th>PLazo</th>
					<th>Agencia</th>
					<th>Total</th>
					<th></th>
				</tr>
				<?php $total=0; foreach($desembolsos as $row){ ?>
				<tr>
					<td><?php echo $row['iddesembolso'] ?></td>
					<td><?php echo $row['fecha_hora'] ?></td>
					<td><?php echo $row['idsolicitud'] ?></td>
					<td><?php echo $row['apenom'] ?></td>
					<td>S/.<?php echo number_format($row['monto'],2); $total+=$row['monto']; ?></td>
					<td><?php echo $row['tipo'] ?></td>
					<td><?php echo $row['interes'] ?>%</td>
					<td><?php echo $row['plazo'].' '.($row['unidplazo']) ?></td>
					<td><?php echo $row['agencia'] ?></td>
					<td>S/.<?php echo number_format($row['total'],2) ?></td>
					<td align="center" style="padding:2px">
<?php if($this->session->userdata('tipouser')==3){ ?>
					<a href="<?php echo base_url() ?>index.php/pagos/eliminardesembolso/<?php echo $row['iddesembolso'] ?>/<?php echo $row['idsolicitud'] ?>" class="btn btn-danger btn-xs eliminar" title="Eliminar <?php echo $row['iddesembolso'] ?>"><span class="glyphicon glyphicon-remove"></span></a>

<?php } ?>

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/pagos/formpago/<?php echo $row['idsolicitud'] ?>" class="btn btn-info btn-xs" title="Ver <?php echo $row['iddesembolso'] ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
				</tr>
				<?php } ?>
				<tr>
					<th colspan="4" align="right">TOTAL</th>
					<th>S/.<?php echo number_format($total,2); ?></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</table>
		</div>
	</div>
</div>
