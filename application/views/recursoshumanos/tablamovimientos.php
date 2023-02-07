<?php if(is_null($existesueldomes)){ ?>

<table class="table table-striped">
	<tr>
		<th>NRO</th>
		<th>FECHA HORA</th>
		<th>TIPO</th>
		<th>MONTO (S/.)</th>
		<th>DNI</th>
		<th>DESCRIPCION</th>
		<th></th>
	</tr>
	<?php
$total = 0;
$comisionesyalimentacion=0;
$descuentos=0;
$adelanto=0;


	$i=0; foreach($operaciones as $row) { $i++; ?>
		<tr>
			<td><?= $i ?></td>
			<td><?= $row['fecha_hora'] ?></td>
			<td><?= $row['tipo'] ?></td>
			<td><?= $row['monto'] ?>
				<?php 
				$total+=($row['tipoaritmetico']*$row['monto']); 
				if($row['tipo']=='MAL CIERRE' || $row['tipo']=='TARDANZA' || $row['tipo']=='AFP'){
					$descuentos += $row['monto'];
				}
				if($row['tipo']=='MOVILIDAD' || $row['tipo']=='COMISION' || $row['tipo']=='ALIMENTACION' || $row['tipo']=='HOSPEDAJE'){
					$comisionesyalimentacion += $row['monto'];
				}
				if($row['tipo']=='ADELANTO DE SUELDO'){
					$adelanto += $row['monto'];
				}				
				?>
			</td>
			<td><?= $row['apenom'] ?></td>
			<td><?= $row['descripcion'] ?></td>
			<td><?= $row['tipoaritmetico'] ?></td>
		</tr>

	<?php } ?>
	<tr>
		<th>TOTAL</th>
		<th></th>
		<th></th>
		<th><?= $total ?></th>
		<th></th>
		<th></th>
	</tr>

</table>

<div class="row">
	<div class="col-md-3">
		<h3><span class="small">ADELANTO : </span>S/.<?= $adelanto ?></h3>
		<h3><span class="small">DESCUENTO : </span>S/.<?= $descuentos ?></h3>
		<h3><span class="small">COMISION : </span>S/.<?= $comisionesyalimentacion ?></h3>		
	</div>
	<div class="col-md-3">
		<h3><span class="small">SUELDO : </span>S/.<?= $personal['sueldobasico'] ?></h3>
		<h3><span class="small">SUELDO TOTAL : </span>S/.<?= ($personal['sueldobasico']-$descuentos)-$adelanto ?></h3>
		<input type="hidden" name="sueldoapagar" value="<?= ($personal['sueldobasico']-$descuentos)-$adelanto ?>">
		<input type="hidden" name="dni" value="<?= $personal['dni'] ?>">
		<input type="hidden" name="apenom" value="<?= $personal['apenom'] ?>">
	</div>
	<div class="col-md-3"><br><br> <br>
		<button type="submit" class="btn btn-primary">Registrar</button>
	</div>
</div>	



<?php }else{ ?>

<h3>NO TIENE OPERACIONES EN EL MES</h3>

<?php } ?>