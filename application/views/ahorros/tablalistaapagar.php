
<table class="table table-bordered table-condensed table-striped small" style="font-size : 10px">
	<tr class="info">
		<td>ITEM</td>
		<th>CODIGO</th>
		<th>CODCLIENTE</th>
		<th>DNI</th>
		<th>APELLIDOS Y NOMBRES</th>
		<th>MONTO</th>
		<th>PLAZO</th>
		<th>FRECUENCIA</th>
		<th>IDASESOR</th>
		<th>AGENCIA</th>
		<th>FECHA SOL.</th>
		<th>ACUMULADO</th>
		<th width="10%"></th>
	</tr>
	<?php $i=0; $total=0; foreach($solicitudes as $row) : $i++; ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['codigo'] ?></td>
		<td><?php echo $row['codcliente'] ?></td>
		<td><?php echo $row['dni'] ?></td>
		<td><?php echo $row['apenom'] ?></td>
		<td>S/.<?php echo number_format($row['monto'],2); $total+=$row['monto']; ?></td>
		<td><?php echo $row['plazo'].' '.$row['tipoplazo'] ?></td>
		<td><?php echo $row['frecuencia'] ?></td>
		<td><?php echo $row['idusuario'] ?></td>
		<td><?php echo $row['agencia'] ?></td>
		<td><?php echo $row['fecha_registro'] ?></td>
		<td><?php echo $row['totalpagado'] ?></td>
		<td align="center">
			<div class="btn-group btn-group-xs">
				<a title="Pagos" target="_blank" href="<?php echo base_url() ?>index.php/ahorros/verpagos/<?php echo $row['codigo'] ?>" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
				<a title="Pagos" target="_blank" href="<?php echo base_url() ?>index.php/ahorros/pagoform/<?php echo $row['codigo'] ?>" class="btn btn-default"><span class="glyphicon glyphicon-usd"></span></a>
				<a title="Editar" href="<?php echo base_url() ?>index.php/ahorros/formeditcuentaahorros/<?php echo $row['codigo'] ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
				<?php if(is_null($row['totalpagado'])){ ?>
				<a title="Eliminar" href="<?php echo base_url() ?>index.php/ahorros/eliminarreg/<?php echo $row['codigo'] ?>" class="btn btn-default eliminar"><span class="glyphicon glyphicon-remove"></span></a>
				<?php } ?>
			</div>
		</td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<th colspan="5" class="text-right">TOTAL</th>
		<th>S/.<?php echo number_format($total,2); ?></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>	
	</tr>
</table>

<script type="text/javascript">
	$(".eliminar").click(function (){
    var url=$(this).attr("href");
    if(window.confirm("ESTA SEGURO DE ELIMINAR?")==true){
        window.location.href = url;
    }
    return false;
});
</script>



