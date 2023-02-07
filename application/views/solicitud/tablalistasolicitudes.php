<table class="small table table-bordered table-condensed table-striped">
	<tr>
		<th>ITEM</th>
		<th>IDSOLICITUD</th>
		<th>CODCLIENTE</th>
		<th>APELLIDOS Y NOMBRES</th>
		<th>FECHA</th>
		<th>TIPO</th>
		<th>MONTO</th>
		<th>ESTADO</th>
		<th></th>
	</tr>
<?php $total=0; $i=0; foreach($solicitudes as $row): $i++; $total+=$row['monto']; ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['idsolicitud'] ?></td>
		<td><?php echo $row['codcliente'] ?></td>
		<td><?php echo $row['apenom'] ?></td>
		<td><?php echo $row['fecha'] ?></td>
		<td><?php echo $row['tipo'] ?></td>
		<td>S/.<?php echo number_format($row['monto'],2) ?></td>		
		<td><?php echo $row['estado'] ?></td>
		<td align="center">
            <div class="btn-group btn-group-xs">
                <a href="<?php echo base_url() ?>index.php/solicitud/versolicitud/<?php echo $row['idsolicitud'] ?>" title="Ver datos de Solicitud" class="<?php echo ($row['estado']=='RECHAZADO') ? ' text-danger' : 'btn btn-info' ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="<?php echo base_url() ?>index.php/solicitud/form_evaluacion/<?php echo $row['idsolicitud'] ?>" title="EVALUAR" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                <a href="<?php echo base_url() ?>index.php/solicitud/eliminar/<?php echo $row['idsolicitud'] ?>" title="Eliminar Solicitud" class="btn btn-danger<?php echo ($row['estado']!='PENDIENTE' ? ' disabled' : '') ?> eliminar"><span class="glyphicon glyphicon-remove"></span></a>
                <a title="Solicitud Requerimiento Pago" href="<?php echo base_url() ?>index.php/castigo/formrequerimiento/<?php echo $row['idsolicitud'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span></a>
            </div>
		</td>
	</tr>
<?php endforeach; ?>
	<tr>
		<th colspan="6" class="text-right">TOTAL</th>
		<th>S/.<?php echo number_format($total,2); ?></th>
		<th></th>
		<th></th>
	</tr>
</table>