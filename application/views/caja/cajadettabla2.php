<?php if($this->session->userdata('tipouser')==1){ ?>
<table class="table table-striped table-bordered table-hover table-condensed small" width="100%" id="registroscaja">
	<tr>
		<th>NRO</th>
		<th>FECHA HORA</th>
		<th>CODUSUARIO</th>
		<th>CANTIDAD (S/.)</th>
		<th>TIPO</th>
		<th>SALDO (S/.)</th>
		<th>DESCRIPCION</th>
		<th>AGENCIA</th>
	</tr>
	<?php $total=0; $i=1; foreach($registros as $row) : ?>
	<tr>
		<td width="4%"><?php echo $i; ?></td>
		<td width="11%"><?php echo $row['fecha_hora'] ?></td>
		<td width="5%"><?php echo $row['codusuario'] ?></td>
		<td width="7%"><?php echo $row['cantidad'] ?></td>
		<td width="5%"><?php echo $row['tipo'] ?></td>
		<td width="5%"><?php echo $row['saldo'] ?></td>
		<td width="63%"><?php echo $row['descripcion'] ?></td>
		<td><?php echo $row['agencia'] ?></td>
	</tr>
	<?php $row['tipo']=='INGRESO' ? $total+=$row['cantidad'] : $total-=$row['cantidad']; $i++; endforeach; ?>
	<tr>
		<td colspan="3" align="right">TOTAL HOY : </td>
		<td colspan="3">S/.<?php echo number_format($total,2); ?></td>
		<td></td>
	</tr>
</table>
<?php }else{ ?>
<table class="table table-striped table-bordered table-hover table-condensed small" width="100%" id="registroscaja">
	<tr>
		<th>NRO</th>
		<th>FECHA HORA</th>
		<!-- <th>CODUSUARIO</th> -->
		<th>CANTIDAD (S/.)</th>
		<th>TIPO</th>
		<th>SALDO (S/.)</th>
		<th>DESCRIPCION</th>
		<th>AGENCIA</th>
	</tr>
	<?php $total=0; $i=1; foreach($registros as $row) : ?>
	<tr>
		<td width="5%"><?php echo $i; ?></td>
		<td width="12%"><?php echo $row['fecha_hora'] ?></td>
		<!-- <td width="5%"><?php echo $row['codusuario'] ?></td> -->
		<td width="8%"><?php echo $row['cantidad'] ?></td>
		<td width="5%"><?php echo $row['tipo'] ?></td>
		<td width="5%"><?php echo $row['saldo'] ?></td>
		<td width="65%"><?php echo $row['descripcion'] ?></td>
		<td><?php echo $row['agencia'] ?></td>
	</tr>
	<?php $row['tipo']=='INGRESO' ? $total+=$row['cantidad'] : $total-=$row['cantidad']; $i++; endforeach; ?>
	<tr>
		<td colspan="2" align="right">TOTAL HOY : </td>
		<td colspan="3">S/.<?php echo number_format($total,2); ?></td>
		<td></td>
	</tr>
</table>
<?php } ?>

