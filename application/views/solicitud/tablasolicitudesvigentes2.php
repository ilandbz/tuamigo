<?php if(count($solvigentes)>0){ ?>
<table class="table table-bordered" style="font-size:10px">
	<tr>
		<th>idsolicitud</th>
		<th>Monto</th>
		<th>Fecha</th>
		<th>Saldo</th>
		<th>Mora deb.</th>
	</tr>
	<?php 
	$a = 0;
	foreach($solvigentes as $row){
	?>
	<tr>
		<td><a href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $row['idsolicitud'] ?>"><?php echo $row['idsolicitud'] ?></a></td>
		<td><?php echo $row['monto'] ?></td>
		<td><?php echo $row['fecha_hora'] ?></td>
		<td>S/.<?php
		$saldo = is_null($row['saldo']) ? 0 : $row['saldo'];
		 echo $saldo; ?></td>
		<td>S/.<?php $mora = $row['moradias']-$row['pagomora'];
			echo $mora*$row['costomora'];
		 ?></td>
	</tr>
	<?php 
		$a++; 
	} ?>
</table>
<?php } ?>