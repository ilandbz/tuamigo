<div class="container">
	<form action="<?php echo base_url() ?>index.php/caja/regpagoscuotas" method="POST">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">REGISTRO DE PAGOS DE CUOTAS CAJA</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4"><h4><small>FECHA : </small><?php echo date("Y-m-d H:i:s",strtotime($fecha)); ?></h4></div>
					<div class="col-md-4"><h4><small>ID SOLICITUD : </small><?php echo $desembolso['idsolicitud'] ?></h4></div>
					<div class="col-md-4"><h4><small>ID DESEMBOLSO : </small><?php echo $desembolso['iddesembolso'] ?></h4></div>
				</div>
				<div class="row">
					<div class="col-md-4"><h4><small>TOTAL : </small>S/.<?php echo number_format($monto,2) ?></h4></div>
					<div class="col-md-4"><h4><small>SALDO CLIENTE: </small>S/.<?php echo number_format($desembolso['saldo'],2) ?></h4>	</div>
					<div class="col-md-4"></div>
				</div>
					
				<h4><small>CONCEPTO : </small><?php echo $concepto ?></h4>

				<input type="hidden" name="monto" value="<?php echo $monto; ?>">
				<input type="hidden" name="descripcion" value="<?php echo $concepto ?>">
				<input type="hidden" name="fechareg" value="<?php echo date("Y-m-d H:i:s",strtotime($fecha)); ?>">

			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-12">
						<a href="<?php echo base_url() ?>index.php/pagos/formpago/<?php echo $desembolso['idsolicitud'] ?>" class="btn btn-info">VER PAGOS</a>
						<a id="btnimprimir" title="imprimir" target="_blank" href="<?= base_url() ?>index.php/pagos/vaucher/<?= $regkardex['iddesembolso'] ?>/<?= $regkardex['idkardex'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-print"></span></a>
						<button type="button" id="regcpcaja" class="btn btn-success pull-right"><span class="glyphicon glyphicon-saved"></span> Registrar En Caja</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>