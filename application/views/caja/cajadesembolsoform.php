<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">REGISTRO DESEMBOLSO CAJA Y BANCOS</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<h3><small>SALDO CAJA : </small>S/.<?php echo number_format($saldocaja,2) ?>
					<input type="hidden" name="saldocaja" value="<?php echo $saldocaja ?>">
					<?php $resta=0; if($saldocaja<$desembolso['monto']){ ?>
						<small class="text-danger">NO ALCANZA EL SALDO EN CAJA</small>
					<?php $resta=$desembolso['monto']-$saldocaja; } ?>
					</h3>
				</div>
				<div class="col-md-6">
					<h3><small>SALDO BANCOS : </small>S/.<?php echo number_format($saldobancos,2) ?></h3>
					<input type="hidden" name="saldobancos" value="<?php echo $saldobancos ?>">
				</div>				
			</div>
			<br>
			<div class="row">
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-12">
							<h2 class="text-primary">
								<small>TOTAL DESEMBOLSO</small>
								S/.<?php echo $desembolso['monto'] ?>
							</h2>
							<small>SEGURO DESGRAVAMEN DESEMBOLSO ID : <?php echo $desembolso['iddesembolso'] ?>, CLIENTE : <?php echo $desembolso['apenom'] ?> ASESOR : <?php echo $desembolso['idasesor'] ?> Monto : <?php echo is_null($polizareg) ? 0 : $polizareg['monto'] ?></small>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<form action="<?php echo base_url() ?>index.php/caja/regdesembolso" class="form-horizontal" method="POST" onsubmit="return checkSubmit();">
						<div class="form-group has-success">
							<label for="" class="control-label col-md-4">TOTAL PAGAR</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">S/.</span>
<!-- 									<input type="text" class="form-control numerosypunto" name="totalpagardes" value="<?php echo $desembolso['monto'] ?>" readonly> -->
									<input type="text" class="form-control numerosypunto" name="totalpagardes" value="<?php echo $totaldescaja ?>" readonly>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8">
								<input type="hidden" name="iddesembolso" value="<?php echo $desembolso['iddesembolso'] ?>">
								<input type="hidden" name="montopoliza" value="<?php echo is_null($polizareg) ? 0 : $polizareg['monto'] ?>">
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-info pull-right" <?php echo $saldocaja<$desembolso['monto'] ? 'disabled' : '' ?>><span class="glyphicon glyphicon-saved"></span> Registrar En Caja</button>
							</div>
							<div class="col-md-2">
								<?php if($saldocaja<$desembolso['monto']){ ?>
								<button type="button" id="tbancos" class="btn btn-warning" title="Transferir de Bancos"><span class="glyphicon glyphicon-retweet"></span></button>
								<input type="hidden" name="resta" value="<?php echo $resta ?>">
								<?php } ?>
							</div>
						</div>				
					</form>
				</div>
			</div>
		</div>
	</div>
</div>