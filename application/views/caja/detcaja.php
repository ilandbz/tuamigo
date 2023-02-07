<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">SALDO : S/. <?php echo $saldo; ?>&nbsp; USUARIO : <?php echo $this->session->userdata('idusuario'); ?></h3>
	</div>
	<div class="panel-body">
<div class="small">
	<table class="table table-striped table-bordered table-hover table-condensed small" width="100%">
		<tr>
			<th>NRO</th>
			<th>FECHA HORA</th>
			<th>CODUSUARIO</th>
			<th>CANTIDAD</th>
			<th>TIPO</th>
			<th>SALDO</th>
			<th>DESCRIPCION</th>
		</tr>
		<?php $i=1; foreach($registros as $row) : ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['fecha_hora'] ?></td>
			<td><?php echo $row['codusuario'] ?></td>
			<td>S/.<?php echo $row['cantidad'] ?></td>
			<td><?php echo $row['tipo'] ?></td>
			<td>S/.<?php echo $row['saldo'] ?></td>
			<td><?php echo $row['descripcion'] ?></td>
		</tr>
		<?php $i++; endforeach; ?>
	</table>
</div>
	</div>
</div>
