<table id="reporteclientes" class="table table-bordered table-hover">
	<tr>
		<th>NRO</th>
		<th>COD</th>
		<th>DNI</th>
		<th>APENOM</th>
		<th>REGISTRO</th>
		<th>ESTADO</th>
		<th>CREDITOS</th>
		<th>VIGENTES</th>
		<th>CANCELADOS</th>
		<th>MORA T.</th>
		<th>MORA P.</th>
		<th>IDASESOR</th>
	</tr>
<?php 
$totalcreditos = 0;
$creditosvigentes = 0;
$creditoscancelados = 0;
$totaldiasdemora = 0;
$morapagado = 0;
 ?>
	<?php $i=0; foreach($registros as $row) : $i++; ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><a href="<?php echo base_url(); ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $row['codcliente'] ?></a></td>
		<td><?php echo $row['dni'] ?></td>
		<td><?php echo $row['apenom'] ?></td>
		<td><?php echo $row['fecha_registro'] ?></td>
		<td><?php echo $row['estado'] ?></td>
		<td><?php echo is_null($row['totalcreditos']) ? 0 : $row['totalcreditos'] ?></td>
		<td><?php echo is_null($row['creditosvigentes']) ? 0 : $row['creditosvigentes'] ?></td>
		<td><?php echo is_null($row['creditoscancelados']) ? 0 : $row['creditoscancelados'] ?></td>
		<td><?php echo is_null($row['totaldiasdemora']) ? 0 : $row['totaldiasdemora'] ?></td>
		<td><?php echo is_null($row['morapagado']) ? 0 : $row['morapagado'] ?></td>
		<td><?php echo $row['idasesor'] ?></td>
	</tr>
<?php 
$totalcreditos += is_null($row['totalcreditos']) ? 0 : $row['totalcreditos'];
$creditosvigentes += is_null($row['creditosvigentes']) ? 0 : $row['creditosvigentes'];
$creditoscancelados += is_null($row['creditoscancelados']) ? 0 : $row['creditoscancelados'];
$totaldiasdemora += is_null($row['totaldiasdemora']) ? 0 : $row['totaldiasdemora'];
$morapagado += is_null($row['morapagado']) ? 0 : $row['morapagado'];
 ?>
	<?php endforeach; ?>
	<tr>
		<th colspan="6"></th>
		<th><?php echo $totalcreditos ?></th>
		<th><?php echo $creditosvigentes ?></th>
		<th><?php echo $creditoscancelados ?></th>
		<th><?php echo $totaldiasdemora ?></th>
		<th><?php echo $morapagado ?></th>
		<th></th>
	</tr>	
</table>