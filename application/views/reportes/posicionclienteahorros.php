<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">POSICION DEL CLIENTE</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-8">
				<h4><small>Apellidos y Nombres : </small><?php echo $cliente['apenom']; ?></h4>					
			</div>
			<div class="col-md-4">
				<h4><small>MOROSIDAD : </small><?php echo 0;//echo (is_null($promediomoros)) ? 0 : number_format($promediomoros,2); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4"><h4><small>DNI : </small><?php echo $cliente['dni'] ?></h4></div>
			<div class="col-md-4"><h4><small>COD : </small><?php echo $cliente['codcliente'] ?></h4></div>
			<div class="col-md-4"><h4><small>ESTADO : </small><?php echo $cliente['estado'] ?></h4></div>
		</div>
		<br>
		<table class="table table-striped small">
			<tr>
				<th>IDSOLICITUD</th>
				<th>FECHA</th>
				<th>MONTO</th>
				<th>PRODUCTO</th>
				<th>PLAZO</th>
				<th>ESTADO</th>
				<th>FUNCIONES</th>
			</tr>
			<?php foreach($solicitudes as $row) : ?>
				<tr>
					<td><?php echo $row['codigo'] ?></td>
					<td><?php echo $row['fecha_registro'] ?></td>
					<td>S/. <?php echo $row['monto'] ?></td>
					<td><?php echo $row['descripcion'] ?></td>
					<td><?php echo $row['plazo'].' '.$row['tipoplazo']; ?></td>
					<td><?php echo $row['estado'] ?></td>
					<td>
						<?php if($row['estado']=='APROBADO' || $row['estado']=='FINALIZADO'){ ?>
						<a target="_blank" href="<?php echo base_url() ?>index.php/ahorros/plandepagosopdf/<?php echo $row['codigo'] ?>" class="btn btn-link" title="Ver Plan de pagos"><span class="glyphicon glyphicon-eye-open"></span></a>
						<a target="_blank" href="<?php echo base_url() ?>index.php/ahorros/kardexpdf/<?php echo $row['codigo'] ?>" class="btn btn-link" title="Kardex de Pagos"><span class="glyphicon glyphicon-list-alt"></span></a>
						<?php } ?>
					</td>
					<td>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>