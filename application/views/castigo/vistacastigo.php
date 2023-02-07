<link rel="stylesheet" href="<?php echo base_url() ?>activos/css/jquery-ui.css">
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">SOLICITUDES DESEMBOLSADOS A PAGAR</h3>		
		</div>
		<div class="panel-body">
			<div id="vistasolicitudesdesembapro">
				<?php 
				$this->view('castigo/tablasoldesapro');
				 ?>
			</div>
		</div>
			<div class="panel-footer">
				<div id="resultadobusqueda" style="font-size:11px;">
				</div>
				<div class="row">
					<div class="col-md-10">
						
					</div>
					<div class="col-md-2">
						<button class="btn btn-primary" title="DESCARGAR" type="button" onclick="tableToExcel('tablacastigo', 'LISTA CASTIGO')"><span class="glyphicon glyphicon-download-alt"></span></button>
					</div>
				</div>
			</div>
	</div>
</div>






