<div class="container-fluid">
<?php if($registropagoasesorc['estado']=='ENVIADO'){ ?>
<h1><small>SALDO : </small>S/. <?php echo $registropagoasesorc['saldo']; ?></h1>
	<a href="<?php echo base_url() ?>index.php/pagos/confirmarpagoasesor/<?php echo $registropagoasesorc['id']; ?>" class="btn btn-lg btn-success">MONTO CONFORME&nbsp;<span class="glyphicon glyphicon-check"></span></a>
<?php }else{ ?>
	<form name="guardarpagosasesor" id="guardarpagosasesor" action="<?php echo base_url() ?>index.php/pagos/realizapago2" class="form-horizontal" method="POST" onsubmit="return validarpagosasesor()">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h class="panel-title">COBRANZA ASESOR </h>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<div class="col-md-6">
						<h3 class="text-primary"><small>SALDO : </small>S/. <span id="mostrarsaldo"><?php echo $saldo; ?></span></h3>
						<input type="hidden" name="saldoasesor2" value="<?php echo $saldo; ?>">
					</div>
					<div class="col-md-2">

					</div>
					<div id="mensajepagoacumulado" class="col-md-4 hidden">
						<h3 class="text-info">PAGO ACUMULADO : <span id="mostrarpagoacumulado">S/. 0.00</span></h3>
					</div>					
				</div>
				<h3>SOLICITUDES DESEMBOLSADOS POR ASESOR</h3>
				<div id="solicitudescobranzaasesor" class="small">
					<?php $this->view('pagos/tablalistacobranzaasesor'); ?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="mensajedecarga" class="small">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
					</div>
					<div class="col-md-2">
						FECHA DE PAGO : 
					</div>
					<div class="col-md-2">
						<input type="text" value="<?php echo date('Y-m-d') ?>" class="form-control input-sm" readonly>
					</div>
					<div class="col-md-2">
						<button type="submit" id="btnguardarpaga" class="btn btn-success pull-right">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
					</div>
				</div>
			</div>
		</div>
	</form>	
	<?php } ?>
	<br>
</div>
