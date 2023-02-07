<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">CAJA AGENCIA <?php echo $this->session->userdata('agencia') ?></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<h2><small>CAJA : </small> S/.<?php echo number_format($saldo,2) ?></h2>
				</div>
				<div class="col-md-6">
				</div>
			</div>
			<div class="row">
			<?php if($this->session->userdata('tipouser')==3){ ?>
				<div class="col-md-6">
					<h2 class="text-success"><small>TOTAL : </small>S/. <?php echo number_format($saldo,2) ?></h2>
				</div>
			<?php } ?>	
			</div>
			<form action="" class="form-horizontal ">
				<div class="form-group">
					<label for="" class="control-label col-md-2">ENTRE FECHAS : </label>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">DESDE</span>
							<input type="date" class="form-control" id="fechadetcaja" name="fechadetcaja" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">HASTA</span>
							<input type="date" class="form-control" id="fechadetcajafin" name="fechadetcajafin" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-3">
						<button class="btn btn-default" type="button" id="buscarxtipoc"><span class="glyphicon glyphicon-search"></span></button>				
					</div>
				</div>
			</form>
			<div id="tabladetcaja">
				<?php $this->view('caja/cajadettabla'); ?>
			</div>
		</div>
	</div>
</div>