<table class="table table-striped"  id="reportesueldos">
	<tr>
		<th>NRO</th>
		<th>MES</th>
		<th>FECHA HORA</th>
		<th>AFP</th>
		<th>ADELANTOS</th>
		<th>MOVILIDAD</th>
		<th>ALIMENTACION</th>
		<th>BONIFICACION</th>
		<th>ASIGNACION</th>
		<th>SUELDO BASICO</th>
		<th>TOTAL</th>
	</tr>
	<?php $total=0; $i=0; foreach($listapagossueldo as $row) { $i++; ?>
	<?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?>
	<tr>
		<th><?= $i ?></th>
		<th><?= $row['dni'] ?></th>
		<th><?= $row['fechareg'] ?></th>
		<th><?= $row['afp'] ?></th>
		<th><?= $row['adelantos']; ?></th>
		<th><?= $row['movilidad']; ?></th>
		<th><?= $row['alimentacion']; ?></th>
		<th><?= $row['bonificacion'] ?></th>
		<th><?= $row['asignacion'] ?></th>
		<th><?= $row['sueldobasico'] ?></th>
		<th><?= $row['total']; $total+=$row['total']; ?></th>
	</tr>
	<?php } ?>
	<tr>
		<th colspan="10">TOTAL</th>
		<th colspan="1"><?= number_format($total,2) ?></th>
	</tr>
</table>