<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">HUANUCO</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<h2><small>CAJA HUANUCO: </small> S/.<?php echo number_format($saldohco,2) ?></h2>
					</div>
					<div class="col-md-6">
						<h2><small>BANCO HUANUCO : </small> S/.<?php echo number_format($bancohuanuco,2) ?>&nbsp;<a href="<?php echo base_url() ?>index.php/caja/formbancos" title="Administrar Bancos" class="btn btn-link btn-sm"><span class="glyphicon glyphicon-compressed"></span></a></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h2 class="text-success"><small>TOTAL : </small>S/. <?php echo number_format($saldohco+$bancohuanuco,2) ?></h2>
					</div>
				</div>
				<div id="tabladetcaja">
					<?php 
					$data['registros'] = $registroshco;
					$data['registros2'] = $registros2hco;
					$this->view('caja/cajadettabla', $data); 
					?>
				</div>
			</div>
		</div>		
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">TINGO MARIA</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<h2><small>CAJA TINGO MARIA: </small> S/.<?php echo number_format($saldotma,2) ?></h2>
					</div>
					<div class="col-md-6">
						<h2><small>BANCO TINGO MARIA : </small> S/.<?php echo number_format($bancotm,2) ?>&nbsp;<a href="<?php echo base_url() ?>index.php/caja/formbancos" title="Administrar Bancos" class="btn btn-link btn-sm"><span class="glyphicon glyphicon-compressed"></span></a></h2>					
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h2 class="text-success"><small>TOTAL : </small>S/. <?php echo number_format($saldotma+$bancotm,2) ?></h2>
					</div>
				</div>
				<div id="tabladetcaja">
					<?php
					$data['registros'] = $registrostma;
					$data['registros2'] = $registros2tma; 
					$this->view('caja/cajadettabla', $data); 
					?>
				</div>
			</div>
		</div>		
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">HUANUCO 2</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<h2><small>CAJA HUANUCO 2: </small> S/.<?php echo number_format($saldohco2,2) ?></h2>
					</div>
					<div class="col-md-6">
						<h2><small>BANCO HUANUCO 2 : </small> S/.<?php echo number_format($bancohco2,2) ?>&nbsp;<a href="<?php echo base_url() ?>index.php/caja/formbancos" title="Administrar Bancos" class="btn btn-link btn-sm"><span class="glyphicon glyphicon-compressed"></span></a></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h2 class="text-success"><small>TOTAL : </small>S/. <?php echo number_format($saldohco2+$bancohco2,2) ?></h2>
					</div>
				</div>
				<div id="tabladetcaja">
					<?php 
					$data['registros'] = $registroshco2;
					$data['registros2'] = $registros2hco2;
					$this->view('caja/cajadettabla', $data); 
					?>
				</div>
			</div>
		</div>		
	</div>
	<div class="col-md-6">
		
	</div>
</div>