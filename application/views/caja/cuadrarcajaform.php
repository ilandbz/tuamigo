<div class="container">
<?php 
$agencia = $this->session->userdata('agencia');
 ?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $agencia ?></h3>
		</div>
		<div class="panel-body">
		<?php if($this->session->userdata('tipouser')==3){ ?>
			<div class="row">
				<div class="col-md-6">
					<h2><small>CAJA HUANUCO: </small> S/.<?php echo number_format($saldohco,2) ?></h2>
					<h2><small>CAJA HUANUCO2: </small> S/.<?php echo number_format($saldohco2,2) ?></h2>
					<h2><small>CAJA TINGO MARIA: </small> S/.<?php echo number_format($saldotma,2) ?></h2>
				</div>
				<div class="col-md-6">
					<h2><small>BANCO HUANUCO : </small> S/.<?php echo number_format($bancohuanuco,2) ?>&nbsp;<a href="<?php echo base_url() ?>index.php/caja/formbancos" title="Administrar Bancos" class="btn btn-link btn-sm"><span class="glyphicon glyphicon-compressed"></span></a></h2>
					<h2><small>BANCO HUANUCO2 : </small> S/.<?php echo number_format($bancohuanuco2,2) ?>&nbsp;<a href="<?php echo base_url() ?>index.php/caja/formbancos" title="Administrar Bancos" class="btn btn-link btn-sm"><span class="glyphicon glyphicon-compressed"></span></a></h2>
					<h2><small>BANCO TINGO MARIA : </small> S/.<?php echo number_format($bancotm,2) ?>&nbsp;<a href="<?php echo base_url() ?>index.php/caja/formbancos" title="Administrar Bancos" class="btn btn-link btn-sm"><span class="glyphicon glyphicon-compressed"></span></a></h2>					
				</div>
			</div>
			<form action="<?php echo base_url() ?>index.php/caja/cdcaja" class="form-horizontal" method="POST" name="cuadrarcaja">
				<div class="form-group">
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">DIA</span>
							<input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">AGENCIA</span>
							<select name="agencia" id="agencia" class="form-control">
								<option value="HUANUCO">HUANUCO</option>
								<option value="HUANUCO2">HUANUCO2</option>
								<option value="TINGO MARIA">TINGO MARIA</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<button class="btn btn-success" type="submit" id="cuadrarregcaja"><span class="glyphicon glyphicon-check"></span>&nbsp;Cuadrar</button>	
					</div>
				</div>
			</form>
		<?php }else{ ?>
			<div class="row">
				<div class="col-md-6">
					<h2><small>CAJA <?php echo $agencia ?>: </small> S/.<?php echo number_format($saldo,2) ?></h2>
				</div>
			</div>
			<form action="<?php echo base_url() ?>index.php/caja/cdcaja" class="form-horizontal" method="POST" name="cuadrarcaja">
				<div class="form-group">
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">DIA</span>
							<input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon">AGENCIA</span>
							<select name="agencia" id="agencia" class="form-control">
								<option value="<?php echo $agencia ?>"><?php echo $agencia ?></option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<button class="btn btn-success" type="submit" id="cuadrarregcaja"><span class="glyphicon glyphicon-check"></span>&nbsp;Cuadrar</button>	
					</div>
				</div>
			</form>


		<?php } ?>



		</div>
	</div>
</div>