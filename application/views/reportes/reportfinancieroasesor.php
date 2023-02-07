<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">REPORTE FINANCIERO POR ASESOR ID : <?php echo $idasesor ?></h3>
	</div>
	<div class="panel-body" style="font-size:11px;">
		<form action="<?php echo base_url() ?>index.php/report/" method="POST" class="form-horizontal">
			<div class="row">
				<label for="fechainicial" class="control-label col-md-3">PAGOS DESDE : </label>
				<div class="col-md-2">
					<input type="date" value="2018-01-01" name="fechainicialfp" class="form-control">
				</div>
				<label for="fechafinal" class="control-label col-md-3">HASTA LA FECHA : </label>
				<div class="col-md-2">
					<input type="date" value="<?php echo date('Y-m-d') ?>" name="fechafinalfp" class="form-control">
				</div>
				<div class="col-md-2">
					<button type="button" class="btn btn-success" title="Buscar" id="buscarrpaporfechapago"><span class="glyphicon glyphicon-search"></span></button>
				</div>					
			</div>
		</form>
		<br>
		<div id="tablabsfechas">
		<?php $this->view($tabla); ?>
		</div>
		<div class="row">
			<div class="col-md-6">
				<a href="<?php echo base_url() ?>index.php/report/reportesaldogralpdf" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> IMPRIMIR</a>&nbsp;
				<button onclick="tableToExcel('reportegral', 'REPORTE GENERAL')" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Formato Xls</button>
			</div>
		</div>
	</div>
</div>