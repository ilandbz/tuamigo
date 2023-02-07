<!-- REPORTE GENERAL -->
<?php $sumreporte=
	array(
			'capital' 		=> 0, 
			'interes' 		=> 0,
			'mora'			=> 0,
			'morapagado'  	=> 0,
			'promtasa'		=> 0,
			'saldocapital'	=> 0,
			'saldointeres'	=> 0,
			'sumdiasatras'	=> 0,
			'diasacum'		=> 0,
			'capitalpagado'	=> 0,
			'interespagado'	=> 0
		); 
?>
<table class="table table-striped table-bordered table-hover small">
<!-- <table class="table table-striped table-bordered table-hover table-fixed small"> -->
	<thead>
		<tr>
			<th width="4%">NRO</th>
			<th width="5%">ID SOL.</th>
			<th width="5%">F. DES.</th>
			<th width="5%">DNI</th>
			<th width="17%">APELLIDOS Y NOMBRES</th>
			<th width="5%">CAPITAL</th>
			<th width="5%">INTERES</th>
			<th width="5%">TASA</th>
			<th width="8%">SALDO CAPITAL</th>
			<th width="8%">SALDO INTERES</th>
			<th width="5%">DIAS R.</th><!--DIAS RETRASO-->
			<th width="5%">MORA</th>
			<th width="8%">CAP. PAGADO</th>
			<th width="8%">INT. PAGADO</th>
			<th width="6%">IDASESOR</th>
		</tr>
	</thead>
	<tbody>
	<?php $i=1; if(!is_null($vistareporte)){ foreach($vistareporte as $row) : ?>
	<tr>
		<td width="4%"><?php echo $i ?></td>
		<td width="5%"><a href="<?php echo base_url() ?>index.php/pagos/plandepagosopdf/<?php echo $row['idsolicitud'] ?>" target="_blank"><?php echo $row['idsolicitud'] ?></a></td>
		<td width="5%"><?php echo substr($row['fecha_hora'], 8,2).'/'.substr($row['fecha_hora'], 5,2).'/'.substr($row['fecha_hora'], 2,2) ?></td>
		<td width="5%"><?php echo $row['dni'] ?></td>
		<td width="17%"><?php echo substr($row['apenom'], 0, 28) ?></td>
		<td width="5%">S/.<?php echo $row['capital'] ?></td>
		<td width="5%">S/.<?php echo $row['interes'] ?></td>
		<td width="5%"><?php echo $row['tasa'] ?>%</td>
		<td width="8%">S/.<?php echo number_format(round($row['saldocapital'],1),2) ?></td>
		<td width="8%">S/.<?php echo number_format(round($row['saldointeres'],1),2) ?></td>
		<td width="5%"><?php echo $row['diasatrasados']; ?></td>
		<td width="5%"><?php echo $row['mora']; ?></td>
		<td width="8%">S/.<?php echo number_format(round($row['capitalpagado'],1),2) ?></td>
		<td width="8%">S/.<?php echo number_format(round($row['interespagado'],1),2)  ?></td>
		<td width="6%"><?php echo $row['idasesor']  ?></td>
	</tr>
	<?php 
	$i++; 
	$sumreporte['capital']=$sumreporte['capital']+$row['capital'];
	$sumreporte['interes']=$sumreporte['interes']+$row['interes'];	
	$sumreporte['mora']=$sumreporte['mora']+($row['mora']*$row['costomora']);			
	$sumreporte['morapagado']=$sumreporte['morapagado']+($row['pagomora']*$row['costomora']);
	$sumreporte['promtasa']=$sumreporte['promtasa']+$row['tasa'];
	$sumreporte['saldocapital']=$sumreporte['saldocapital']+round($row['saldocapital'],1);
	$sumreporte['saldointeres']=$sumreporte['saldointeres']+round($row['saldointeres'],1);
	$sumreporte['sumdiasatras']=$sumreporte['sumdiasatras']+$row['diasatrasados'];
	$sumreporte['diasacum']=$sumreporte['diasacum']+$row['mora'];
	$sumreporte['capitalpagado']=$sumreporte['capitalpagado']+round($row['capitalpagado'],1);
	$sumreporte['interespagado']=$sumreporte['interespagado']+round($row['interespagado'],1);
	endforeach ; } 
	?>
    </tbody>
	<thead>
		<tr class="success">
			<th width="4%"><?php echo $i-1; ?></th>
			<th width="5%">&nbsp;</th>
			<th width="5%">&nbsp;</th>
			<th width="5%">&nbsp;</th>
			<th width="17%" align="right">TOTAL</th>
			<th width="5%">S/.<?php echo $sumreporte['capital'] ?></th>
			<th width="5%">S/.<?php echo $sumreporte['interes'] ?></th>
			<th width="5%"><?php echo number_format(round($sumreporte['promtasa']/($i==1 ? $i : ($i-1)),1),2) ?>%</th>
			<th width="8%">S/.<?php echo number_format(round($sumreporte['saldocapital'],1),2) ?></th>
			<th width="8%">S/.<?php echo number_format(round($sumreporte['saldointeres'],1),2) ?></th>
			<th width="5%"><?php echo number_format(round($sumreporte['sumdiasatras'],1),2) ?></th>
			<th width="5%"><?php echo number_format(round($sumreporte['diasacum'],1),2) ?></th>
			<th width="8%">S/.<?php echo number_format(round($sumreporte['capitalpagado'],1),2) ?></th>
			<th width="8%">S/.<?php echo number_format(round($sumreporte['interespagado'],1),2) ?></th>
			<th width="6%">&nbsp;</th>
		</tr>
	</thead>
</table>
<!-- EXCEL --><!-- EXCEL -->
<!-- EXCEL -->
<!-- EXCEL -->
<!-- EXCEL --><!-- EXCEL -->
<!-- EXCEL -->
<!-- EXCEL -->
<!-- EXCEL --><!-- EXCEL -->
<!-- EXCEL -->
<!-- EXCEL -->
<!-- EXCEL --><!-- EXCEL -->
<!-- EXCEL -->
<!-- EXCEL -->
<!-- EXCEL -->
<!-- EXCEL -->
<!-- EXCEL -->
<!-- EXCEL -->

<table id="reportegral" class="hidden" style="font-size:8px;">
	<tr>
		<th>NRO </th>
		<th>ID SOL.</th>
		<th>FECHA DES.</th>
		<th>APELLIDOS Y NOMBRES </th>
		<th>CAPITAL</th>
		<th>INTERES</th>
		<th>SALDO CAPITAL</th>
		<th>SALDO INTERES</th>
		<th>DIAS RETRASO </th>
		<th>DIAS ACUMULADO </th>
		<th>CAPITAL PAGADO</th>
		<th>INTERES PAGADO</th>
		<th>ASESOR</th>
		<th>NEGOCIO</th>
		<th>CELULAR</th>
		<th>ULTIM. PAGO</th>
		<th>TIPO DE PLAZO</th>
	</tr>
	<?php $total = array(
	'capital' => 0, ); 
	?>
	<?php $i=1; if(!is_null($vistareporte)){ foreach($vistareporte as $row) : ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row['idsolicitud'] ?></td>
		<td><?php echo substr($row['fecha_hora'], 0,10) ?></td>
		<td><?php echo $row['apenom'] ?></td>
		<td><?php echo $row['capital'] ?></td>
		<td><?php echo $row['interes'] ?></td>
		<td><?php echo number_format(round($row['saldocapital'],1),2) ?></td>
		<td><?php echo number_format(round($row['saldointeres'],1),2) ?></td>
		<td width="5%"><?php echo $row['diasatrasados'] ?></td>
		<td><?php echo (is_null($row['mora']) ? 0 : $row['mora']) ?></td>
		<td><?php echo number_format(round($row['capitalpagado'],1),2) ?></td>
		<td><?php echo number_format(round($row['interespagado'],1),2)  ?></td>
		<td><?php echo $row['idasesor'] ?></td>
		<td><?php echo $row['negocio'] ?></td>
		<td><?php echo $row['celular'] ?></td>
		<td><?php echo !is_null($row['ultimafechapago']) ? date("d/m/y", strtotime($row['ultimafechapago'])) : $row['ultimafechapago']; ?></td>
		<td><?php echo $row['tipoplazo'] ?></td>
	</tr>
	<?php $i++; endforeach; } ?>
	<tr class="success">
		<td></td>
		<td></td>
		<td></td>
		<td align="right">
			TOTAL
			<?php $i=($i==1 ? 2 : $i) ?>
		</td>
		<td><?php echo $sumreporte['capital'] ?></td>
		<td><?php echo $sumreporte['interes'] ?></td>
		<td><?php echo $sumreporte['mora'] ?></td>
		<td><?php echo number_format($sumreporte['morapagado'],2) ?></td>
		<td><?php echo number_format(round($sumreporte['promtasa']/($i-1),1),2) ?>%</td>
		<td><?php echo number_format(round($sumreporte['saldocapital'],1),2) ?></td>
		<td><?php echo number_format(round($sumreporte['saldointeres'],1),2) ?></td>
		<td><?php echo number_format(round($sumreporte['sumdiasatras'],1),2) ?></td>
		<td><?php echo number_format(round($sumreporte['diasacum'],1),2) ?></td>
		<td><?php echo number_format(round($sumreporte['capitalpagado'],1),2) ?></td>
		<td><?php echo number_format(round($sumreporte['interespagado'],1),2) ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>		
	</tr>
</table>

