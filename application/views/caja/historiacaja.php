<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">SALDO : S/. <?php echo $saldo; ?>&nbsp; USUARIO : <?php echo $this->session->userdata('idusuario'); ?></h3>
	</div>
	<div class="panel-body">

	<h3>BUSQUEDA POR FECHA</h3>
	<div class="row">
		<div class="col-lg-3">
			<div class="input-group input-group-sm">
				<input type="date" name="fecha" id="fecha" value="<?= date('Y-m-d') ?>" class="form-control">
				  <div class="input-group-btn">
				  	<button class="btn btn-primary" title="Buscar" id="buscarhistoriacaja"><span class="glyphicon glyphicon-search"></span></button>
				  </div>
			</div>
			
		</div>		
	</div>
	<br>
	<br>
	<div class="small">
		<div id="resultado">
			<?php $this->view('caja/tablacaja') ?>		
		</div>
	</div>
	</div>
</div>