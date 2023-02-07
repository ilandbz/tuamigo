<div class="container">
	<div class="panel panel-danger">
		<div class="panel-heading">
			ELIMINAR PAGOS
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<h3><small>ID SOLICITUD </small><?php echo $desembolso['idsolicitud'] ?></h3>
				</div>
				<div class="col-md-8">
					<h3><small>APELLIDOS Y NOMBRES </small><?php echo $desembolso['apenom'] ?></h3>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
					<h3><small>ASESOR </small><?php echo $desembolso['idasesor'] ?></h3>
				</div>
				<?php $totalpagado=is_null($desembolso['totalpagado']) ? 0 : $desembolso['totalpagado']; ?>
				<div class="col-md-4">
					<h3><small>TOTAL PAGADO </small>S/.<?php echo number_format($totalpagado,2) ?></h3>
				</div>
				<div class="col-md-4">
					<h3><small>SALDO </small>S/.<?php echo number_format($desembolso['total']-$totalpagado,2) ?></h3>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-12" id="tablakardex">
					<?php if(count($kardex)==0){ ?>
						<div class="alert alert-danger">
							NO EXISTEN REGISTROS DE PAGOS
						</div>

					<?php }else{ ?>
					<table class="table table-bordered table-hover table-striped">
						<tr>
							<th>ITEM</th>
							<th>FECHA HORA PAGO</th>
							<th>IDUSUARIO</th>
							<th>MONTO PAGADO</th>
							<th>ACCION</th>
						</tr>
						<?php $i=0; $total=0; foreach ($kardex as $row) { $i++; $total+=$row['montopagado']; ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $row['fecha_hora_reg'] ?></td>
								<td><?php echo $row['idusuario'] ?></td>
								<td>S/.<?php echo number_format($row['montopagado'],2) ?></td>
								<td class="text-center"><a href="<?php echo base_url() ?>index.php/pagos/eliminarpagokardex/<?php echo $row['iddesembolso'] ?>/<?php echo $row['idkardex'] ?>" title="Eliminar Pago" class="<?php echo $i==count($kardex) ? '' : 'disabled' ?> btn btn-danger btn-xs eliminar"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
							</tr>
						<?php } ?>
						<tr>
							<th colspan="3">ITEM</th>
							<th>S/.<?php echo number_format($total,2); ?></th>
							<th></th>							
						</tr>
					</table>
					<?php } ?>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-hover table-striped">
						<tr>
							<th>DIAS DE MORA</th>
							<th>COSTO MORA S/.</th>
							<th>FECHAHORA</th>
							<th>TOTAL PAGADO S/.</th>
							<th>ACCION</th>
						</tr>
						<?php if(count($listapagomora)>0){ foreach ($listapagomora as $row) { ?>
						<tr>
							<td><?php echo $row['diasmora']; ?></td>
							<td><?php echo $row['diasmora']==0 ? 0 : $row['total']/$row['diasmora']; ?></td>
							<td><?php echo $row['fechahora_reg']; ?></td>
							<td><?php echo $row['total']; ?></td>
							<td class="text-center"><a href="<?php echo base_url() ?>index.php/pagos/eliminarpagomora/<?php echo $row['id'].'/'.$row['iddesembolso']; ?>" title="Eliminar Pago Mora" class="btn btn-danger btn-xs eliminar"><span class="glyphicon glyphicon-remove-sign"></span></a></td>							
						</tr>					
						<?php } }else{ ?>
						<tr>
							<th colspan="4">NO EXISTEN REGISTROS</th>
						</tr>


						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<a href="<?php echo base_url() ?>index.php/pagos/formpago/<?php echo $desembolso['idsolicitud'] ?>" class="btn btn-info">VER PAGOS</a>
			<a href="<?php echo base_url() ?>index.php/solicitud/reportecobranzapdfxcodsolic/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Calendario de Pagos</a>
			<a href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Plan de Pagos</a>			
			<a href="<?php echo base_url() ?>index.php/pagos/posiciondetallepdf/<?php echo $desembolso['idsolicitud'] ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Kardex de Pagos</a>
		</div>
	</div>
</div>