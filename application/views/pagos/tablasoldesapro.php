<div class="small">
	<table class="table table-condensed table-bordered table-hover small">
		<tr class="active">
			<th width="2%">NRO</th>
			<th width="5%">IDSOL.</th>
			<th width="6%">FECH. DES.</th>			
			<th width="6%">MONTO</th>
			<th width="">APELLIDOS Y NOMBRES</th>
			<th width="6%">IDASESOR</th>
			<th width="5%">TIPO</th>
			<th width="6%">PLAZO</th>
			<th width="6%">SALDO</th>
			<th width="6%">ESTADO</th>
			<th width="5%">DIAS ATRAS. (dias)</th>
			<th width="5%">MORA ACUM. (dias)</th>
			<th width="5%">MORA PAGADO</th>
			<th width="6%">ULTIM. PAGO</th>
			<th width="4%">COBRANZA</th>
			<th width="8%"></th>
		</tr>
		<?php $i=0; foreach ($solicitudes as $row) { 
			$pagomora=is_null($row['pagomora']) ? 0 : $row['pagomora'];//pago mora indica dias pagados 
			$i++; 
		?>
		<tr class="">
			<td><?php echo $i ?></td>
			<td><?php echo $row['idsolicitud'] ?></td>
			<td><?php echo substr($row['fecha_hora'], 8, 2).'/'.substr($row['fecha_hora'], 5, 2).'/'.substr($row['fecha_hora'], 2, 2) ?></td>			
			<td>S/.<?php echo $row['monto'] ?></td>
			<td><?php echo substr($row['apenom'], 0,35) ?></td>
			<td><?php echo $row['idasesor'] ?></td>
			<td>
				<?php 
					if($row['tipo']=='Recurrente Con Saldo'){
						echo 'RCS';
					}elseif($row['tipo']=='Recurrente Sin Saldo'){
						echo 'RSS';
					}else{
						echo $row['tipo'];
					}
				?>
			</td>
			<td><?php echo $row['tipoplazo'] ?></td>
			<td>S/.<?php echo number_format($row['total']-$row['totalpagado'],2) ?></td>
			<td><?php echo $row['estado'] ?></td>
			<td class="<?php echo number_format($row['diasatrasados'])>0 ? 'text-danger' : ''; ?>">
				<?php echo $row['diasatrasados']; ?>
			</td>
			<td class="<?php echo number_format($row['moradias'])>0 ? 'text-danger' : ''; ?>">
				<?php echo $row['moradias']; ?>
			</td>
			<td><?php echo $pagomora; ?> dias</td>
			<td><?php echo !is_null($row['ultimafechapago']) ? date("d/m/y", strtotime($row['ultimafechapago'])) : $row['ultimafechapago']; ?></td>
			<td><?php echo $row['dondepagara'] ?> </td>
			<td align="center">
				<div class="btn-group btn-group-sm">
					<a href="<?php echo base_url() ?>index.php/pagos/formpago/<?php echo $row['idsolicitud'] ?>" title="PAGOS" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
					<a href="<?php echo base_url() ?>index.php/pagos/pago/<?php echo $row['iddesembolso'] ?>" title="Monto" class="btn btn-default">
					<span class="glyphicon glyphicon-usd"></span></a>								
				</div>
			</td>
		</tr>
		<?php } ?>
	</table>
	<table id="registrospago" class="hidden">
		<tr class="active">
			<th width="2%">NRO</th>
			<th width="5%">IDSOL.</th>
			<th width="6%">FECH. DES.</th>			
			<th width="6%">MONTO</th>
			<th width="20%">APELLIDOS Y NOMBRES</th>
			<th width="6%">IDASESOR</th>
			<th width="5%">TIPO</th>
			<th width="6%">PLAZO</th>
			<th width="6%">SALDO</th>
			<th width="5%">DIAS ATRAS. (dias)</th>
			<th width="6%">ULTIM. PAGO</th>
			<th width="4%">COBRANZA</th>
		</tr>
		<?php $i=0; foreach ($solicitudes as $row) { 
			$pagomora=is_null($row['pagomora']) ? 0 : $row['pagomora'];//pago mora indica dias pagados 
			$i++; 
		?>
		<tr class="">
			<td><?php echo $i ?></td>
			<td><?php echo $row['idsolicitud'] ?></td>
			<td><?php echo substr($row['fecha_hora'], 8, 2).'/'.substr($row['fecha_hora'], 5, 2).'/'.substr($row['fecha_hora'], 2, 2) ?></td>			
			<td>S/.<?php echo $row['monto'] ?></td>
			<td><?php echo substr($row['apenom'], 0,35) ?></td>
			<td><?php echo $row['idasesor'] ?></td>
			<td>
				<?php 
					if($row['tipo']=='Recurrente Con Saldo'){
						echo 'RCS';
					}elseif($row['tipo']=='Recurrente Sin Saldo'){
						echo 'RSS';
					}else{
						echo $row['tipo'];
					}
				?>
			</td>
			<td><?php echo $row['tipoplazo'] ?></td>
			<td>S/.<?php echo number_format($row['total']-$row['totalpagado'],2) ?></td>
			<td class="<?php echo number_format($row['diasatrasados'])>0 ? 'text-danger' : ''; ?>">
				<?php echo $row['diasatrasados']; ?>
			</td>
			<td><?php echo !is_null($row['ultimafechapago']) ? date("d/m/y", strtotime($row['ultimafechapago'])) : $row['ultimafechapago']; ?></td>
			<td><?php echo $row['dondepagara'] ?> </td>
		</tr>
		<?php } ?>
	</table>
	<button class="btn btn-primary pull-right" title="imprimir" type="button" onclick="exportTableToExcel('registrospago', 'REPORTE DE PAGOS')">
		<span class="glyphicon glyphicon-download-alt"></span>
	</button>
</div>