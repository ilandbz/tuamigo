<div class="panel panel-info">
	<div class="panel-heading">
	LISTA DE PERSONAS REGISTRADAS
	</div>
	<div class="panel-body">
		<div class="container-fluid">
			<table class="table table-bordered table-condensed table-hover small">
				<tr>
					<th>N°</th>
					<th>DNI</th>
					<th>APELLIDOS Y NOMBRES</th>
					<th>EDAD</th>
					<th>DISTRITO DE NAC.</th>
					<th>PROVINCIA DE NAC.</th>
					<th>DEPARTAMENTO DE NAC.</th>
					<th>CELULAR</th>
					<th>ESTADO CIVIL</th>
					<th>ESTUDIOS</th>
					<th>OCUPACION</th>
				</tr>
		<?php $i=1; foreach($personas as $row): ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><a href="<?php echo base_url() ?>index.php/cliente/verpersona/<?php echo $row['dni'] ?>"><?php echo $row['dni'] ?></a></td>
				<td><?php echo $row['apenom'] ?></td>
				<td><?php echo $row['edad'] ?></td>
				<td><?php echo $row['distritonombre_nac'] ?></td>
				<td><?php echo $row['provincianombre_nac'] ?></td>
				<td><?php echo $row['departamentonombre_nac'] ?></td>
				<td><?php echo $row['celular'] ?></td>
				<td><?php echo $row['estadocivil'] ?></td>
				<td><?php echo $row['grado_instr'] ?></td>
				<td><?php echo $row['ocupacion'] ?></td>				
			</tr>
		<?php $i++; endforeach; ?>
			</table>
		</div>		
	</div>
</div>
