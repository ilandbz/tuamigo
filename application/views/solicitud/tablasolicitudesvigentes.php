<?php if(count($solvigentes)>0){ ?>
<table class="table table-bordered" style="font-size:10px">
	<tr>
		<th>idsolicitud</th>
		<th>Monto</th>
		<th>Fecha</th>
		<th>Saldo</th>
		<th>Mora deb.</th>
		<th>Cancelar</th>
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
		<td>S/.<?php $mora = $row['mora'];
			$mora -= is_null($row['pagomora']) ? 0 : $row['pagomora'];
			echo $mora*$row['costomora'];
		 ?></td>
		<td>
		<input type="checkbox" <?php echo $a==0 ? 'checked="true"' : '' ?> name="solopciones[<?php echo $row['idsolicitud'] ?>][iddesembolso]" value="<?php echo $row['iddesembolso'] ?>">
		<input type="hidden" name="solopciones[<?php echo $row['idsolicitud'] ?>][saldo]" value="<?php echo $saldo; ?>">
		<input type="hidden" name="solopciones[<?php echo $row['idsolicitud'] ?>][mora]" value="<?php echo $mora*$row['costomora']; ?>">
		<input type="hidden" name="solopciones[<?php echo $row['idsolicitud'] ?>][idsolicitud]" value="<?php echo $row['idsolicitud']; ?>">
		<input type="hidden" name="solopciones[<?php echo $row['idsolicitud'] ?>][diasdemora]" value="<?php echo $mora ?>">
		</td>
	</tr>
	<?php 
		$a++; 
	} ?>
</table>
<?php } ?>