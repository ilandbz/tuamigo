<div class="container">
		<div class="panel panel-danger">
			<div class="panel-heading">
				PAGO DE SUELDO REALIZADO
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<h3><small>TOTAL ENTREGADO : </small>S/.<?= number_format($regsueldo['total'],2) ?></h3>
					</div>
					<div class="col-md-4">
						<h3><small>FECHA HORA : </small><?= $regsueldo['fechareg'] ?></h3>
					</div>
				</div>
				
			</div>
			<div class="panel-footer">
				<a href="<?= base_url() ?>index.php/rrhh/pagorealizadobaucher/<?= $regsueldo['dni'] ?>/<?= $regsueldo['mes'] ?>" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Imprimir Vaucher</a>
			</div>
		</div>
</div>