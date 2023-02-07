<?php $sumreporte=
	array(
			'capital' 		=> 0, 
			'interes' 		=> 0,
			'mora'	  		=> 0,
			'promtasa'		=> 0,
			'saldocapital'	=> 0,
			'saldointeres'	=> 0,
			'sumdiasatras'	=> 0,
			'capitalpagado'	=> 0,
			'interespagado'	=> 0
		); 
?>
<div id="contenidoprincipal">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">REPORTE GENERAL</h3>
		</div>
		<div class="panel-body" style="font-size:11px;">
			<div class="row">
				<form action="<?php echo base_url() ?>index.php/report/cargarreportf" method="POST" class="form-horizontal">
					<label for="fechainicial" class="control-label col-md-3">DESEMBOLSADOS DESDE : </label>
					<div class="col-md-2">
						<input type="date" value="2018-01-01" name="fechainicial" id="fechainicial" class="form-control">
					</div>
					<label for="fechafinal" class="control-label col-md-3">HASTA LA FECHA : </label>
					<div class="col-md-2">
						<input type="date" value="<?php echo date('Y-m-d') ?>" name="fechafinal" id="fechafinal" class="form-control">
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-info" title="Buscar" id="buscarfreportegral"><span class="glyphicon glyphicon-search"></span></button>
					</div>
				</form>
			</div>
			<hr>
			<div class="row">
				<form action="<?php echo base_url() ?>index.php/report/fechapagos" method="POST" class="form-horizontal">
					<label for="fechainicial" class="control-label col-md-3">PAGOS DESDE : </label>
					<div class="col-md-2">
						<input type="date" value="2018-01-01" name="fechainicial" id="fechainicial" class="form-control">
					</div>
					<label for="fechafinal" class="control-label col-md-3">HASTA LA FECHA : </label>
					<div class="col-md-2">
						<input type="date" value="<?php echo date('Y-m-d') ?>" name="fechafinal" id="fechafinal" class="form-control">
					</div>
					<div class="col-md-2">
						<button type="submit" class="btn btn-success" title="Buscar" id="buscarfreportegral"><span class="glyphicon glyphicon-search"></span></button>
					</div>					
				</form>
			</div>
			<br><br>
			<div id="tablabsfechas">
				<table class="table table-striped table-bordered table-hover small">
					<tr>
						<th width="4%">NRO</th>
						<th width="5%">ID SOL.</th>
						<th width="6%">FECHA DES.</th>
						<th width="6%">DNI</th>
						<th width="15%">APELLIDOS Y NOMBRES</th>
						<th>DIRECCION</th>
						<th width="6%">CAPITAL</th>
						<th>INTERES</th>
						<th width="6%">MORA</th>
						<th>TASA</th>
						<th width="6%">SALDO CAPITAL</th>
						<th width="6%">SALDO INTERES</th>
						<th width="5%">DIAS RETRASO</th>
						<th width="6%">CAPITAL PAGADO</th>
						<th width="6%">INTERES PAGADO</th>
					</tr>
					<?php $total = array(
					'capital' => 0, ); 
					?>
					<?php $i=1; foreach($vistareporte as $row) : ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row['idsolicitud'] ?></td>
						<td><?php echo substr($row['fecha_hora'], 0,10) ?></td>
						<td><?php echo $row['dni'] ?></td>
						<td><?php echo $row['apenom'] ?></td>
						<td><?php echo $row['direccion_dom'] ?></td>
						<td>S/.<?php echo $row['capital'] ?></td>
						<td>S/.<?php echo $row['interes'] ?></td>
						<td>S/.<?php echo number_format($row['mora']*$row['costomora'],2) ?></td>
						<td><?php echo $row['tasa'] ?>%</td>
						<td>S/.<?php echo number_format(round($row['saldocapital'],1),2) ?></td>
						<td>S/.<?php echo number_format(round($row['saldointeres'],1),2) ?></td>
						<td><?php echo (is_null($row['mora']) ? 0 : $row['mora']) ?></td>
						<td>S/.<?php echo number_format(round($row['capitalpagado'],1),2) ?></td>
						<td>S/.<?php echo number_format(round($row['interespagado'],1),2)  ?></td>
					</tr>
					<?php 
					$i++; 
					$sumreporte['capital']=$sumreporte['capital']+$row['capital'];
					$sumreporte['interes']=$sumreporte['interes']+$row['interes'];		
					$sumreporte['mora']=$sumreporte['mora']+$row['mora'];
					$sumreporte['promtasa']=$sumreporte['promtasa']+$row['tasa'];
					$sumreporte['saldocapital']=$sumreporte['saldocapital']+$row['saldocapital'];
					$sumreporte['saldointeres']=$sumreporte['saldointeres']+$row['saldointeres'];
					$sumreporte['sumdiasatras']=$sumreporte['sumdiasatras']+(is_null($row['mora']) ? 0 : $row['mora']);
					$sumreporte['capitalpagado']=$sumreporte['capitalpagado']+$row['capitalpagado'];
					$sumreporte['interespagado']=$sumreporte['interespagado']+$row['interespagado'];		
					endforeach; 
					?>
					<tr class="success">
						<td colspan="6" align="right">
							TOTAL
						</td>
						<td>S/.<?php echo $sumreporte['capital'] ?></td>
						<td>S/.<?php echo $sumreporte['interes'] ?></td>
						<td>S/.<?php echo number_format($sumreporte['mora'],2) ?></td>
						<td><?php echo number_format(round($sumreporte['promtasa'],1),2) ?>%</td>
						<td>S/.<?php echo number_format(round($sumreporte['saldocapital'],1),2) ?></td>
						<td>S/.<?php echo number_format(round($sumreporte['saldointeres'],1),2) ?></td>
						<td><?php echo $sumreporte['sumdiasatras'] ?></td>
						<td>S/.<?php echo number_format(round($sumreporte['capitalpagado'],1),2) ?></td>
						<td>S/.<?php echo number_format(round($sumreporte['interespagado'],1),2) ?></td>
					</tr>
				</table>

			<div class="row">
				<div class="col-md-6">
						<a href="<?php echo base_url() ?>index.php/report/reportesaldogralpdf" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> IMPRIMIR</a>&nbsp;
						<button onclick="tableToExcel('reportegral', 'REPORTE GENERAL')" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Formato Xls</button>
				</div>
			</div>
			<table id="reportegral" class="hidden">
				<tr>
					<th>NRO </th>
					<th>ID SOL.</th>
					<th>FECHA DES.</th>
					<th>APELLIDOS Y NOMBRES </th>
					<th>DIRECCION </th>
					<th>CAPITAL (S/.)</th>
					<th>INTERES (S/.)</th>
					<th>MORA (S/.)</th>
					<th>TASA </th>
					<th>SALDO CAPITAL (S/.)</th>
					<th>SALDO INTERES (S/.)</th>
					<th>DIAS RETRASO (S/.)</th>
					<th>CAPITAL PAGADO (S/.)</th>
					<th>INTERES PAGADO (S/.)</th>
					<th>ASESOR</th>
				</tr>
				<?php $total = array(
				'capital' => 0, ); 
				?>
				<?php $i=1; foreach($vistareporte as $row) : ?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $row['idsolicitud'] ?></td>
					<td><?php echo substr($row['fecha_hora'], 0,10) ?></td>
					<td><?php echo $row['apenom'] ?></td>
					<td><?php echo $row['direccion_dom'] ?></td>
					<td><?php echo $row['capital'] ?></td>
					<td><?php echo $row['interes'] ?></td>
					<td><?php echo number_format($row['mora']*$row['costomora'],2) ?></td>
					<td><?php echo $row['tasa'] ?>%</td>
					<td><?php echo number_format(round($row['saldocapital'],1),2) ?></td>
					<td><?php echo number_format(round($row['saldointeres'],1),2) ?></td>
					<td><?php echo (is_null($row['mora']) ? 0 : $row['mora']) ?></td>
					<td><?php echo number_format(round($row['capitalpagado'],1),2) ?></td>
					<td><?php echo number_format(round($row['interespagado'],1),2)  ?></td>
					<td><?php echo $row['idasesor'] ?></td>
				</tr>
				<?php $i++; endforeach; ?>
				<tr class="success">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td align="right">
						TOTAL
					</td>
					<td><?php echo $sumreporte['capital'] ?></td>
					<td><?php echo $sumreporte['interes'] ?></td>
					<td><?php echo $sumreporte['mora'] ?></td>
					<td><?php echo number_format(round($sumreporte['promtasa'],1),2) ?>%</td>
					<td><?php echo number_format(round($sumreporte['saldocapital'],1),2) ?></td>
					<td><?php echo number_format(round($sumreporte['saldointeres'],1),2) ?></td>
					<td><?php echo $sumreporte['sumdiasatras'] ?></td>
					<td><?php echo number_format(round($sumreporte['capitalpagado'],1),2) ?></td>
					<td><?php echo number_format(round($sumreporte['interespagado'],1),2) ?></td>
					<td></td>
				</tr>
			</table>			
			</div>

		</div>
	</div>

</div>


