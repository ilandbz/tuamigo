<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">REGISTRO DEVOLUCION DOCO</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<h3><small>SALDO CAJA : </small>S/.<?php echo number_format($saldocaja,2) ?>
					<input type="hidden" name="saldocaja" value="<?php echo $saldocaja ?>">
					<?php $resta=0; if($saldocaja<$total){ ?>
						<small class="text-danger">NO ALCANZA EL SALDO EN CAJA</small>
					<?php $resta=$total-$saldocaja; } ?>
					</h3>
				</div>
				<div class="col-md-6">
					<h3><small>SALDO BANCOS : </small>S/.<?php echo number_format($saldobancos,2) ?></h3>
					<input type="hidden" name="saldobancos" value="<?php echo $saldobancos ?>">
				</div>				
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3><small>DESCRIPCION : </small>PAGO POR DEVOLUCION DE DOCO A <?php echo $cliente ?></h3>
					
					
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-12">
							<h2 class="text-primary">
								<small>TOTAL DEVOLUCION</small>
								S/.<?php echo $total ?>
							</h2>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<form action="<?php echo base_url() ?>index.php/ahorros/devolahorros" class="form-horizontal" method="POST" onsubmit="return checkSubmit();">
						<div class="form-group has-success">
							<label for="" class="control-label col-md-4">TOTAL PAGAR</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">S/.</span>
									<input type="text" class="form-control numerosypunto" name="total" value="<?php echo $total ?>" readonly>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8">
								<input type="hidden" name="codigo" value="<?php echo $codigo ?>">
								<input type="hidden" name="descripcioncaja" value="<?php echo 'PAGO POR DEVOLUCION DOCO ID : '.$codigo.', DEL CLIENTE : '.$cliente.' ASESOR : '.$asesor ?>">
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-info pull-right"><span class="glyphicon glyphicon-saved"></span> Registrar En Caja</button>
							</div>

						</div>				
					</form>
				</div>
			</div>
		</div>
	</div>
</div>