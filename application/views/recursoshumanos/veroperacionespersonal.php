<?php $total=$personal['sueldobasico']; ?>
<div class="container">


	<form action="<?php echo base_url() ?>index.php/rrhh/validarformpagosueldo" class="form-horizontal input-sm" name="guardar_solicitud" role="form" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-primary">
			<div class="panel-heading">
				OPERACIONES POR PERSONAL <?= $personal['apenom'] ?>
			</div>
			<div class="panel-body">

			<?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?>


				<div class="form-group">
					<div class="col-md-4">
						<label class="form-label" for="mes">MES</label>
						<input type="hidden" name="dni" value="<?= $personal['dni'] ?>">
						<div class="input-group">
							<select name="mes" class="form-control">
								<?php $i=0; foreach ($meses as $mes) { $i++; ?>					
								<option value="<?= $i ?>" <?= $meshoy==$i ? 'selected="selected"' : '' ?>><?= $mes ?></option>
								<?php } ?>
								
							</select>
							<div class="input-group-btn">
								<button class="btn btn-info" type="button" id="btncargartablamrrhh"><span class="glyphicon glyphicon-search"></span></button>
							</div>
						</div>
					</div>
					<div class="col-md-3 pull-right"><br>
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Realizar pago de Sueldo</button>
					</div>
				</div>
				<div class="bg-success" id="tablamovimientosrrhh">
					<?php $this->view('recursoshumanos/tablamovimientosrrhh') ?>
				</div>
			</div>
			<div class="panel-footer">
			<div class="form-group">
			<div class="col-md-2">
				<a href="<?= base_url() ?>index.php/rrhh/verocuentapersonalbaucher/<?= $dni ?>/<?= $meshoy ?>" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Imprimir</a>
			</div>
			<div class="col-md-2">
				
			</div>				
			</div>

			
			</div>
		</div>
	</form>	



</div>
