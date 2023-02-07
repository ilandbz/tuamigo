<table class="table table-condensed table-bordered small">
	<tr>
		<th width="3%">ITEM</th>
		<th width="7%">ID. SOL</th>
		<th width="6%">FECH. DES.</th>
		<th width="8%">MONTO</th>
		<th width="5%">TIPO</th>
		<th width="5%">PLAZO</th>
		<th width="9%">SALDO</th>
		<th width="7%">Mora</th>
		<th width="7%">Mora Acum.</th>
		<th width="7%">Dias Ret.</th>
		<th>APELLIDOS Y NOMBRES</th>
		<th width="15%">MONTO</th>		
		<th width="5%"></th>
	</tr>
	<?php $total=0; $i=0; foreach($solicitudes as $row) { 
		$pagomora=is_null($row['pagomora']) ? 0 : $row['pagomora'];
		$i++; 
		$total+=$row['monto'];
	 ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['idsolicitud'] ?></td>
		<td><?php echo date("d/m/Y", strtotime($row['fecha_hora'])); ?></td>
		<td>S/.<?php echo $row['monto'] ?></td>
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
		<td><?php echo $row['tipoplazo']; ?></td>
		<td>S/.<?php echo number_format($row['total']-$row['totalpagado'],2) ?></td>
		<td class="<?php echo number_format($row['moraactual'])>0 ? 'text-danger' : ''; ?>"><strong><?php echo $row['moraactual'] ?> dias</strong></td>	
		<td class="<?php echo number_format($row['moradias'])>0 ? 'text-danger' : ''; ?>"><?php echo $row['moradias'] ?> dias</td>
		<td class="<?php echo number_format($row['diasatrasados'])>0 ? 'text-danger' : ''; ?>"><strong><?php echo $row['diasatrasados'] ?> dias</strong></td>	
		<input type="hidden" name="pago[<?php echo $row['iddesembolso'] ?>][diasretraso]" value="<?php echo $row['diasatrasados'] ?>">
		<input type="hidden" name="pago[<?php echo $row['iddesembolso'] ?>][idsolicitud]" value="<?php echo $row['idsolicitud'] ?>">
		<input type="hidden" name="pago[<?php echo $row['iddesembolso'] ?>][codcliente]" value="<?php echo $row['codcliente'] ?>">
		<input type="hidden" name="pago[<?php echo $row['iddesembolso'] ?>][moraactual]" value="<?php echo $row['moraactual'] ?>">
		<input type="hidden" name="pago[<?php echo $row['iddesembolso'] ?>][ultimafechapago]" value="<?php echo $row['ultimafechapago'] ?>">		
		<td><?php echo substr($row['apenom'], 0, 38) ?></td>
		<td align="center">
			<div class="input-group input-group-xs">
				<div class="input-group-addon">
					<input type="radio" name="pago[<?php echo $row['iddesembolso'] ?>][checkiddesembolso]" class="checkpagar" value="<?php echo $row['iddesembolso'] ?>">
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control numerosypunto montopagado" id="monto<?php echo $row['iddesembolso'] ?>" name="pago[<?php echo $row['iddesembolso'] ?>][monto]" placeholder="0.00" value="<?php echo $row['pagohoy']=='NO' ? '' : $row['pagohoy'] ?>" onchange="sptotal(this, <?php echo $row['total']-$row['totalpagado'] ?>)" disabled>
				<input type="hidden" id="estado<?php echo $row['iddesembolso'] ?>" name="pago[<?php echo $row['iddesembolso'] ?>][estado]" value="<?php echo $row['pagohoy']=='NO' ? 'NO' : 'Si' ?>" disabled>
				<input type="hidden" id="iddesembolso<?php echo $row['iddesembolso'] ?>" name="pago[<?php echo $row['iddesembolso'] ?>][iddesembolso]" value="<?php echo $row['iddesembolso'] ?>" disabled>
				<input type="hidden" id="saldo<?php echo $row['iddesembolso'] ?>" name="pago[<?php echo $row['iddesembolso'] ?>][saldo]" value="<?php echo $row['total']-$row['totalpagado'] ?>" disabled>
			</div>
		</td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $row['idsolicitud'] ?>" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="<?php echo base_url() ?>index.php/pagos/posiciondetallepdf/<?php echo $row['idsolicitud'] ?>" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
	<?php } ?>
	<input type="hidden" name="totalapagar" id="totalapagar" value="0">

	<tr>
		<th colspan="6" align="right">TOTAL</th>
		<th>S/.<?php echo number_format($total,2); ?></th>
		<th></th>
		<th></th>
	</tr>
</table>