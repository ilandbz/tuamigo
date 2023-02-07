<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url() ?>activos/css/miestilo2.css">
	<title>FINANCIERA TU AMIGO</title>
<style type="text/css">
	@page {
	    margin-top: 0.3em;
	    margin-left: 2em;
	    margin-right: 2em;
	    font-size:9px;
	}
	table.mitabla {
	    border-collapse: collapse;
	}
	table.mitabla, table.mitabla th, table.mitabla td {
	    border: 1px solid black;
	}
	table.mitabla td {
		padding : 3px;
	}
</style>
</head>
<body>
	<div class="container-fluid" style="padding-left:40px;">
		<br>
		<div align="left">
			<img src="<?= base_url() ?>activos/images/emprender.jpg" alt="" width="140px">
		</div>
		<table width="100%">
			<tr>
				<th colspan="6">CALENDARIO DE PAGOS</th>
			</tr>
			<tr>
				<th align="left">FECHA DES.</th>
				<td align="left"><?php echo $desembolso['fecha_hora'] ?></td>
				<th align="left">Monto</th>
				<td align="left">S/.<?php echo $desembolso['monto'] ?></td>
				<th align="left">Plazo</th>
				<td align="left"><?php echo $solicitud['cantplazo'] ?>&nbsp;<?php echo ($desembolso['unidplazo']=='Dias') ? 'Dias' : 'Semanas'; ?></td>
			</tr>
			<tr>
				<th align="left">Cliente</th>
				<td align="left" colspan="3"><?php echo $cliente['apenom'] ?></td>				
				<th align="left">IDCLIENTE</th>
				<td align="left"><?php echo $cliente['codcliente'] ?></td>
			</tr>
			<tr>
				<th align="left">DIR domic</th>
				<td colspan="5"><?php echo $cliente['tipovia'].' '.$cliente['nombrevia'].' NRO : '.$cliente['nro'].', Interior : '.$cliente['interior'].', MZ : '.$cliente['mz'].', Lote : '.$cliente['lote'].', '.$cliente['tipozona'].':'.$cliente['nombrezona'].', REF:'.$cliente['referencia'] ?></td>
			</tr>
			<tr>
				<th align="left">DIR. Negocio</th>
				<td colspan="5"><?php 
					if(!is_null($negocio)){
						$direccion = $negocio['tipovia'].' '.$negocio['nombrevia'].' NRO : '.$negocio['Nro'].', Interior : '.$negocio['interior'].', MZ : '.$negocio['mz'].', Lote : '.$negocio['lote'].', '.$negocio['tipozona'].':'.$negocio['nombrezona'].', REF: '.$negocio['referencia']; 
					}else{
						$direccion = 'NO TIENE NEGOCIO';
					}
					echo $direccion;
				?></td>
			</tr>
		</table>
		<table width="100%" class="mitabla">
			<tr>
				<th width="5%">N°</th>
				<th width="15%">FECHA PROG.</th>
				<th width="10%">DIA</th>
				<th width="10%">CUOTA</th>
				<th width="15%">MONTO PAGADO</th>
				<th>FEC. PAGO</th>
				<th>SALDO</th>
				<th>FIRMA</th>
			</tr>			
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>S/.<?php echo number_format($desembolso['total'],2); ?></td>		
				<td></td>		
			</tr>
			<?php 
			foreach($cuotapagos as $row){  ?>
				<tr>
					<td><?php echo $row['nrocuota']; ?></td>
					<td><?php echo substr($row['fecha_prog'], 8, 2).'-'.substr($row['fecha_prog'], 5, 2).'-'.substr($row['fecha_prog'], 0, 4); ?></td>
					<td><?php echo $row['nombredia']; ?></td>
					<td>S/.<?php echo number_format($row['cuota'],2); ?></td>
					<td></td>
					<td></td>
					<td>S/.<?php echo number_format($row['saldo'],2); ?></td>
					<td></td>
				</tr>
			<?php } ?>
		</table>
		<table width="100%">
			<tr>
				<th align="left">ASESOR</th>
				<td align="left"><?php echo $asesor['apenom'] ?></td>
				<th align="left">CELULAR</th>
				<td align="left"><?php echo $asesor['celular'] ?></td>
				<td rowspan="2" align="center"><img src="<?= base_url() ?>index.php/pagos/generarbarcode/<?= $desembolso['idsolicitud'] ?>" /></td>
			</tr>
			<tr>
				<td style="font-size: 9px;" colspan="2">
					Por cada dia de atraso se le cobrara una mora de S/.<?php echo $desembolso['costomora'] ?>
				</td>
				<td colspan="2">
					<?php if($cliente['agencia']=='HUANUCO'){ ?>
						Jr. Tarapaca 335 Fono: 062-286809
					<?php }elseif($cliente['agencia']=='HUANUCO2'){ ?>
						Jr. Gral Prado cuadra 6 Psje. El Inca 129 2do. Piso<br>
						Jr. Tarapaca 335 Fono: 062-286809
					<?php }else{ ?>
						Jr. Tito Jaime 697 Fono: 062-797215
					<?php } ?>
				</td>
			</tr>
		</table>		
		<br><br>
		<div align="left">
			<img src="<?= base_url() ?>activos/images/emprender.jpg" alt="" width="140px">
		</div>
		<table width="100%">
			<tr>
				<th colspan="6">CALENDARIO DE PAGOS</th>
			</tr>
			<tr>
				<th align="left">FECHA DES.</th>
				<td align="left"><?php echo $desembolso['fecha_hora'] ?></td>
				<th align="left">Monto</th>
				<td align="left"><?php echo $desembolso['monto'] ?></td>
				<th align="left">Plazo</th>
				<td align="left"><?php echo $solicitud['cantplazo'] ?>&nbsp;<?php echo ($desembolso['unidplazo']=='Dias') ? 'Dias' : 'Semanas'; ?></td>
			</tr>
			<tr>
				<th align="left">Cliente</th>
				<td align="left" colspan="3"><?php echo $cliente['apenom'] ?></td>				
				<th align="left">IDCLIENTE</th>
				<td align="left"><?php echo $cliente['codcliente'] ?></td>
			</tr>
			<tr>
				<th align="left">DIR domic</th>
				<td colspan="5"><?php echo $cliente['tipovia'].' '.$cliente['nombrevia'].' NRO : '.$cliente['nro'].', Interior : '.$cliente['interior'].', MZ : '.$cliente['mz'].', Lote : '.$cliente['lote'].', '.$cliente['tipozona'].':'.$cliente['nombrezona'].', REF:'.$cliente['referencia'] ?></td>
			</tr>
			<tr>
				<th align="left">DIR. Negocio</th>
				<td colspan="5"><?php 
					if(!is_null($negocio)){
						$direccion = $negocio['tipovia'].' '.$negocio['nombrevia'].' NRO : '.$negocio['Nro'].', Interior : '.$negocio['interior'].', MZ : '.$negocio['mz'].', Lote : '.$negocio['lote'].', '.$negocio['tipozona'].':'.$negocio['nombrezona'].', REF: '.$negocio['referencia']; 
					}else{
						$direccion = 'NO TIENE NEGOCIO';
					}
					echo $direccion;
				?></td>
			</tr>
		</table>
		<table width="100%" class="mitabla">
			<tr>
				<th width="5%">N°</th>
				<th width="15%">FECHA PROG.</th>
				<th width="10%">DIA</th>
				<th width="10%">CUOTA</th>
				<th width="15%">MONTO PAGADO</th>
				<th>FEC. PAGO</th>
				<th>SALDO</th>
				<th>FIRMA</th>
			</tr>			
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>S/.<?php echo number_format($desembolso['total'],2); ?></td>		
				<td></td>		
			</tr>
			<?php 
			foreach($cuotapagos as $row){  ?>
				<tr>
					<td><?php echo $row['nrocuota']; ?></td>
					<td><?php echo substr($row['fecha_prog'], 8, 2).'-'.substr($row['fecha_prog'], 5, 2).'-'.substr($row['fecha_prog'], 0, 4); ?></td>
					<td><?php echo $row['nombredia']; ?></td>
					<td>S/.<?php echo number_format($row['cuota'],2); ?></td>
					<td></td>
					<td></td>
					<td>S/.<?php echo number_format($row['saldo'],2); ?></td>
					<td></td>
				</tr>
			<?php } ?>
		</table>
		<table width="100%">
			<tr>
				<th align="left">CLIENTE</th>
				<td align="left"><?php echo $cliente['apenom'] ?></td>
				<th align="left">CELULAR</th>
				<td align="left"><?php echo $cliente['celular'] ?></td>
				<td rowspan="2" align="center"><img src="<?= base_url() ?>index.php/pagos/generarbarcode/<?= $desembolso['idsolicitud'] ?>" /></td>
			</tr>
			<tr>
				<td style="font-size: 9px;">
					Por cada dia de atraso se le cobrara una mora de S/.<?php echo $desembolso['costomora'] ?>
				</td>
				<td colspan="3">
					<?php if($cliente['agencia']=='HUANUCO'){ ?>
						Jr. Tarapaca 335 Fono: 062-286809
					<?php }elseif($cliente['agencia']=='HUANUCO2'){ ?>
						Jr. Gral Prado cuadra 6 Psje. El Inca 129 2do. Piso<br>
						Jr. Tarapaca 335 Fono: 062-286809
					<?php }else{ ?>
						Jr. Tito Jaime 697 Fono: 062-797215
					<?php } ?>
				</td>
			</tr>
		</table>

	</div>
</body>
</html>
