<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">LISTA DE REGISTROS A EMITIR COMPROBANTES FECHA <?= $fecha ?></h3>
		</div>
		<div class="panel-body">
			<!-- REPORTE GENERAL -->
			<?php $sumreporte=
				array(
						'importe'	=> 0,
					); 
			?>
			<table border="1" class="table table-striped table-bordered table-hover small">
			<!-- <table class="table-wrapper-scroll-y my-custom-scrollbar"> -->
				<thead>
					<tr>
						<th width="4%">NRO</th>
						<th width="5%">SERIE</th>
						<th width="8%">NRO</th>
						<th width="8%">FECHA EMISION</th>
						<th width="8%">FECHA VENCIMIENTO</th>
						<th>APELLIDOS Y NOMBRES</th>
						<th width="10%">INPORTE</th>
						<th>ESTADO</th>
						<th>ACCION</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=1; if(!is_null($vistareporte)){ foreach($vistareporte as $row) : ?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?= $row['serie'] ?></td>
					<td><?= $row['nro'] ?></td>
					<td><?= $row['fechaemision'] ?></td>
					<td><?= $row['fechavencimiento'] ?></td>
					<td><?= substr($row['apenom'], 0, 28) ?></td>
					<td>S/.<?= number_format(round($row['importe'],1),2)  ?></td>
					<td><?= $row['estado'] ?></td>
					<td align="center">
						<div class="btn-group" role="group" aria-label="...">
							<?php switch ($row['estado']) {
								case 'REGISTRADO':
									echo '<button type="button" class="btn btn-primary verdetallecomprobante" title="Detalle" value="'.$row['id'].'"><span class="glyphicon glyphicon-th-list"></span></button>';
									echo '<a href="'.base_url().'index.php/facturador/eliminarcomprobante/'.$row['id'].'" class="btn btn-danger eliminar" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>';			
									break;
								case 'EMITIDO':
									echo '<button type="button" class="btn btn-primary verdetallecomprobante" title="Detalle" value="'.$row['id'].'"><span class="glyphicon glyphicon-th-list"></span></button>';
									echo '<a target="_blank" href="'.base_url().'index.php/facturador/vercomprobanteidcomprobante/'.$row['id'].'" class="btn btn-success" title="Imprimir"><span class="glyphicon glyphicon-print"></span></a>';
									echo '<a href="'.base_url().'index.php/facturador/generartxtfacturadorboleta/'.$row['id'].'" class="btn btn-warning" title="Generar Comprobantes Electronicos"><span class="glyphicon glyphicon-new-window"></span></a>';
									break;
								case 'ENVIADO':
									echo '<button type="button" class="btn btn-primary verdetallecomprobante" title="Detalle" value="'.$row['id'].'"><span class="glyphicon glyphicon-th-list"></span></button>';
									echo '<a target="_blank" href="'.base_url().'/facturador/" class="btn btn-success" title="Imprimir"><span class="glyphicon glyphicon-print"></span></a>';
									break;
								default:
									echo 'NINGUNO';
									break;
							} ?>
						</div>
					</td>
				</tr>
				<?php 
				$i++; 
				$sumreporte['importe']=$sumreporte['importe']+round($row['importe'],1);
				endforeach ; } 
				?>
			    </tbody>
				<thead>
					<tr class="success">
						<th><?php echo $i-1; ?></th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th align="right">TOTAL</th>
						<th></th>
						<th></th>
						<th>S/.<?php echo number_format(round($sumreporte['importe'],1),2) ?></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
			</table>		
		</div>
		<div class="panel-footer">
			<a href="<?= base_url() ?>index.php/facturador/generarnrocomprobante/<?= $fecha ?>" class="btn btn-warning">EMITIR</a>
		</div>
	</div>
</div>
<div class="modal fade" id="verdetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETALLE DE COMPROBANTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="cuerpomodal">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  
      </div>
    </div>
  </div>
</div>