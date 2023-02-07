<table class="table">
	<thead>
		<tr>
			<th>CODUSUARIO</th>
			<th>CANTIDAD (S/.)</th>
			<th>TIPO</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; $ir=1; foreach($registros as $row) : ?>
		<tr class="accordion-toggle" data-toggle="collapse" data-target="#collapse<?php echo $row['idreg']; ?>">
			<td><?php echo $row['codusuario'] ?></td>
			<td><?php echo $row['cantidad'] ?></td>
			<td><?php echo $row['tipo'] ?></td>
		</tr>
		<tr>
			<td colspan="3">
				<div id="collapse<?php echo $row['idreg']; ?>" class="collapse">
					<table class="table table-striped table-bordered table-hover table-condensed small" style="font-size:10px;" width="100%">
						<tr>
							<th>NRO</th>
							<th>FECHA HORA</th>
							<th>CODUSUARIO</th>
							<th>CANTIDAD (S/.)</th>
							<th>TIPO</th>
							<th>SALDO (S/.)</th>
							<th>DESCRIPCION</th>
							<th>AGENCIA</th>
							<th></th>
						</tr>
						<?php $subtotal=0; $i=1; foreach($registros2 as $row2) : ?>
						<?php if($row2['tipo']==$row['tipo'] && $row2['codusuario']==$row['codusuario']){ ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row2['fecha_hora'] ?></td>
							<td><?php echo $row2['codusuario'] ?></td>
							<td><?php echo $row2['cantidad'] ?></td>
							<td><?php echo $row2['tipo'] ?></td>
							<td><?php echo $row2['saldo'] ?></td>
							<td><?php echo $row2['descripcion'] ?></td>
							<td><?php echo $row2['agencia'] ?></td>
							<td>
							<?php if($this->session->userdata('tipouser')==3){ ?>
							<a href="<?php echo base_url() ?>index.php/caja/eliminarregcaja/<?php echo $row2['idreg'] ?>" class="btn btn-danger btn-xs eliminar" title="Eliminar "><span class="glyphicon glyphicon-remove"></span></a>
							<?php } ?>
							</td>
						</tr>
						<?php $subtotal+=$row2['cantidad']; } ?>
						<?php $ir++; endforeach; ?>
						<tr>
							<th colspan="3">SUBTOTAL (S/.)</th>
							<th colspan="5"><?php echo $subtotal ?></th>
						</tr>
					</table>
				</div>
			</td>
		</tr>
		<?php $row['tipo']=='INGRESO' ? $total+=$row['cantidad'] : $total-=$row['cantidad']; $i++; endforeach; ?>
		<tr>
			<td align="right">TOTAL HOY : </td>
			<td colspan="2">S/.<?php echo number_format($total,2); ?></td>
			<td></td>
		</tr>
	</tbody>
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
