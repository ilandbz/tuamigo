<div class="container">
	<form action="" method="POST">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">REGISTRO DE PAGOS DE CUOTAS CAJA</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4"><h4><small>FECHA : </small><?php echo date("Y-m-d H:i:s",strtotime($fecha)); ?></h4></div>
					<div class="col-md-4"><h4><small>ID SOLICITUD : </small><?php echo $cuentaahorros['codigo'] ?></h4></div>
					<div class="col-md-4"></div>
				</div>
				<div class="row">
					<div class="col-md-4"><h4><small>TOTAL : </small>S/.<?php echo number_format($monto,2) ?></h4></div>
					<div class="col-md-4"><h4><small>TOTAL AHORRADO: </small>S/.<?php echo number_format($cuentaahorros['totalpagado'],2) ?></h4>	</div>
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
						<a href="<?php echo base_url() ?>index.php/ahorros/verpagos/<?php echo $cuentaahorros['codigo'] ?>" class="btn btn-info">VER PAGOS</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>