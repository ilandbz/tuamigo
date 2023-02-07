<div class="container">
<?php 
$mas=0;
$menos=0;
 ?>
	<form action="<?php echo base_url() ?>index.php/rrhh/registrarsueldop" class="form-horizontal input-sm" name="guardar_solicitud" role="form" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-primary">
			<div class="panel-heading">
				SUELDO
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
					    <h3><small>PERSONAL : </small><?= $resumenes['apenom'] ?></h3>	
					    <input type="hidden" name="dni" value="<?= $resumenes['dni'] ?>">
					    <input type="hidden" name="apenom" value="<?= $resumenes['apenom'] ?>">		
					</div>
					<?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?>
					<div class="col-md-2">
						<h3><small>MES : </small><?= $meses[intval($mes)-1] ?></h3>
						<input type="hidden" name="mes" value="<?= $mes ?>">
						<input type="hidden" name="nombremes" value="<?= $meses[intval($mes)-1] ?>">
					</div>
					<div class="col-md-3">
						<h3><small>SUELDO : </small>S/.<?= number_format($resumenes['sueldobasico'], 2) ?></h3>
						<input type="hidden" name="sueldo" value="<?= $resumenes['sueldobasico'] ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
					    <h3><small>MOVILIDAD : </small>S/.<?= number_format($resumenes['movilidad'],2) ?></h3>	
					    <input type="hidden" name="movilidad" value="<?= $resumenes['movilidad'] ?>">		
					</div>	
					<div class="col-md-3">
					    <h3><small>BONIFICACIONES : </small>S/.<?= number_format($resumenes['bono'],2) ?></h3>
					    <input type="hidden" name="bono" value="<?= $resumenes['bono'] ?>">
					</div>
					<div class="col-md-3">
					    <h3><small>ALIMENTACION : </small>S/.<?= number_format($resumenes['alimentacion'],2) ?></h3>
					    <input type="hidden" name="alimentacion" value="<?= $resumenes['alimentacion'] ?>">					
					</div>
					<div class="col-md-3">
					    <h3><small>ASIGNACION : </small>S/.<?= number_format($resumenes['asignacion'],2) ?></h3>
					    <input type="hidden" name="asignacion" value="<?= $resumenes['asignacion'] ?>">			
					</div>
					<?php $mas=number_format($resumenes['movilidad'],2)+number_format($resumenes['bono'],2)+number_format($resumenes['alimentacion'],2)+number_format($resumenes['asignacion'],2);
					$menos=($resumenes['afp'])+($resumenes['adelantos'])+($resumenes['dscto']);
					 ?>
				</div>
				<div class="row">
					<div class="col-md-3">
					    <h3><small>AFP : </small>S/.<?= number_format($resumenes['afp'],2) ?></h3>
					    <input type="hidden" name="afp" value="<?= $resumenes['afp'] ?>">	
					</div>
					<div class="col-md-3">
					    <h3><small>ADELANTO : </small>S/.<?= number_format($resumenes['adelantos'],2) ?></h3>
					    <input type="hidden" name="adelantos" value="<?= $resumenes['adelantos'] ?>">					
					</div>
					<div class="col-md-3">
					    <h3><small>DSCTOS : </small>S/.<?= number_format($resumenes['dscto'],2) ?></h3>	
					    <input type="hidden" name="dscto" value="<?= $resumenes['dscto'] ?>">			
					</div>
					<div class="col-md-3">
						<h3><small>FECHA REG. : </small><?= date('d-m-Y') ?></h3>
					</div>								
				</div>
				<div class="row">
					<div class="col-md-3">
					<?php $total=($resumenes['sueldobasico'])-$menos ?>
					    <h3><small>TOTAL MENSUAL : </small>S/.<?= number_format($total,2) ?></h3>
					    <input type="hidden" name="sueldototalmensual" value="<?= $total ?>">		
					</div>
					<div class="col-md-6">
						
					</div>
					<div class="col-md-3">
					    <h2 class="text-primary"><small>A PAGAR : </small>S/.<?= number_format($resumenes['sueldobasico']-$menos,2) ?></h2>
					    <input type="hidden" name="montocajasueldo" value="<?= $resumenes['sueldobasico']-$menos ?>">								
					</div>
				</div>
				<br>
				<br>
				<div id="movimientos">
					<?php $this->view('recursoshumanos/tablamovimientosrrhh') ?>
				</div>
			</div>
			<div class="panel-footer">
				<a href="<?= base_url() ?>index.php/rrhh/verocuentapersonalbaucher/<?= $resumenes['dni'] ?>/<?= intval($mes)-1 ?>" class="btn btn-warning"><span class="glyphicon glyphicon-print"></span></a>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> CONFIRMAR PAGO DE SUELDO</button>
			</div>
		</div>
	</form>	
</div>