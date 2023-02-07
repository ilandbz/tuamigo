<div class="small">
	<table class="table table-condensed table-bordered table-hover small" id="tablacastigo">
		<tr class="active">
			<th width="2%">NRO</th>
			<th width="6%">MONTO</th>
			<th width="">APELLIDOS Y NOMBRES</th>
			<th width="6%">IDASESOR</th>
			<th width="6%">SALDO</th>
			<th width="5%">DIAS ATRAS. (dias)</th>
			<th width="5%">DEUDA ATRASO</th>
			<th width="6%">ULTIM. PAGO</th>
			<th width="6$">CELULAR</th>
			<th>DIRECCION</th>
			<th>ACTIVIDAD</th>
			<th width="7%"></th>
		</tr>
		<?php $i=0; foreach ($solicitudes as $row) { 
			$pagomora=is_null($row['pagomora']) ? 0 : $row['pagomora'];//pago mora indica dias pagados 
			$i++; 
		?>
		<tr class="">
			<td><?php echo $i ?></td>
			<td>S/.<?php echo $row['monto'] ?></td>
			<td><a href="<?= base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo substr($row['apenom'], 0,35) ?></a></td>
			<td><?php echo $row['idasesor'] ?></td>
			<td>S/.<?php echo number_format($row['total']-$row['totalpagado'],2) ?></td>
			<td class="<?php echo number_format($row['diasatrasados'])>0 ? 'text-danger' : ''; ?>">
				<?php echo $row['diasatrasados']; ?> dias
			</td>
			<td><?php echo $row['diasatrasados']*$row['costomora']; ?></td>
			<td><?php echo !is_null($row['ultimafechapago']) ? date("d/m/y", strtotime($row['ultimafechapago'])) : $row['ultimafechapago']; ?></td>
			<td><?php echo $row['celular'] ?></td>
			<td><?php echo $row['direccion_dom'] ?></td>
			<td><?php echo $row['actividad_espec'] ?></td>
			<td align="center">
<div class="btn-group" role="group" aria-label="...">
<a title="Plan de Pagos" target="_blank" href="<?= base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $row['idsolicitud'] ?>" class="btn btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
<a title="Kardex" target="_blank" href="<?= base_url() ?>index.php/pagos/posiciondetallepdf/<?php echo $row['idsolicitud'] ?>" class="btn btn-xs"><span class="glyphicon glyphicon-list-alt"></span></a>
</div>

			</td>
		</tr>	
		<?php } ?>
	</table>
</div>