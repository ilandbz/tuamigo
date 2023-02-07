<div class="panel panel-default">
	<div class="panel-heading">
		ULTIMAS 10 OPERACIONES DE ASESOR
	</div>
	<div class="panel-body">
		<h3><?php echo $asesor['apenom'] ?></h3>
		<table class="table table-striped table-hover table-bordered">
			<tr>
				<th>ITEM</th>
				<th>TIPO</th>
				<th>CANTIDAD</th>
				<th>SALDO</th>
				<th>ACCION</th>
			</tr>
			<?php $i=0; $total=0; foreach($operaciones as $row){ $i++; $total+=$row['cantidad']; ?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $row['tipo'] ?></td>
					<td>S/.<?php echo number_format($row['cantidad'],2) ?></td>
					<td>S/.<?php echo number_format($row['saldo'],2) ?></td>
					<td><a href="<?php echo base_url() ?>index.php/pagos/eliminaroperacionasesor/<?php echo $row['id'] ?>" title="Eliminar Operacion" class="<?php echo $i>1 ? 'disabled' : '' ?> btn btn-danger btn-xs eliminar"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
				</tr>
			<?php } ?>
			<tr>
				<th colspan="2">TOTAL</th>
				<th>S/.<?php echo number_format($total,2); ?></th>
				<th></th>
				<th></th>
			</tr>
		</table>
	</div>
</div>
