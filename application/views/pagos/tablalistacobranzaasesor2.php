<script type="text/javascript">
$('.radiopagar').change(function (){
	var nombrecontrol=$(this).val();
	$('input[name=monto'+nombrecontrol+']').removeAttr('readonly');
	$('button[name=btn'+nombrecontrol+']').removeAttr('disabled');
});
</script>
<table class="table table-condensed table-bordered small">
	<tr>
		<th width="5%">ITEM</th>
		<th width="8%">IDSOLICITUD</th>
		<th width="8%">MONTO</th>
		<th>APELLIDOS Y NOMBRES</th>
		<th width="8%">FECH. DES.</th>
		<th width="10%">TIPO</th>
		<th width="10%">SALDO</th>
		<th width="15%">MONTO</th>
		<th width="10%">FECHA PAGO</th>
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
		<td>S/.<?php echo $row['monto'] ?></td>
		<td><?php echo substr($row['apenom'], 0, 38) ?></td>
		<td><?php echo substr($row['fecha_hora'], 0, 10) ?></td>
		<td><?php echo $row['tipo'] ?></td>
		<td>S/.<?php echo number_format($row['total']-$row['totalpagado'],2) ?></td>
		<td align="center">
			<div class="input-group input-group-sm">
				<div class="input-group-addon">
					<input type="radio" name="rad<?php echo $row['iddesembolso'] ?>" class="radiopagar" value="<?php echo $row['iddesembolso'] ?>" <?php echo $row['pagohoy']=='NO' ? '' : 'checked="checked"' ?>>
				</div>
				<span class="input-group-addon">S/.</span>
				<input type="text" class="form-control" name="monto<?php echo $row['iddesembolso'] ?>" placeholder="0.00" readonly value="<?php echo $row['pagohoy']=='NO' ? '' : $row['pagohoy'] ?>">
				<input type="hidden" class="form-control" name="saldo<?php echo $row['iddesembolso'] ?>" value="<?php echo $row['total']-$row['totalpagado'] ?>">
			</div>
		</td>
		<td><input type="text" value="<?php echo date('Y-m-d') ?>" class="form-control" readonly></td>
		<td>
			<div class="btn-group btn-group-xs">
				<a target="_blank" href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $row['idsolicitud'] ?>" class="btn btn-default" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
				<a target="_blank" href="<?php echo base_url() ?>index.php/pagos/posiciondetallepdf/<?php echo $row['idsolicitud'] ?>" class="btn btn-default" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
			</div>			
		</td>
	</tr>
	<?php } ?>
	<tr>
		<th colspan="6" align="right">TOTAL</th>
		<th>S/.<?php echo number_format($total,2); ?></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
</table>