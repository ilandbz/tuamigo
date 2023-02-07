<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
	<title>FINANCIERA EMPRENDER</title>

<style type="text/css">
body{
	font-size: 12px;

}
table.mitabla {
  border-collapse: collapse;
}

table.mitabla, table.mitabla th, table.mitabla td {
  border: 1px solid black;
}
</style>
</head>
<body>
<img src="<?= base_url() ?>activos/images/emprender.jpg" alt="" width="120px">
	<div align="center">
		<h3>PLAN DE PAGOS</h3>
	</div>
	<table width="100%">
		<tr>
			<td>CODCLIENTE : <?php echo $desembolso['codcliente'] ?></td>
			<td colspan="3">APELLIDOS Y NOMBRES : <?php echo $desembolso['apenom'] ?></td>
		</tr>
		<tr>
			<td>IDSOLICITUD : <?php echo $desembolso['idsolicitud'] ?></td><td>ASESOR : <?php echo $desembolso['idasesor'] ?></td>
			<td>FECHA SOLICITUD : <?php echo $desembolso['fecha'] ?></td><td>MONTO : S/.<?php echo $desembolso['monto'] ?></td>
		</tr>
		<tr>
			<td>FECHA DESEMBOLSO : <?php echo substr($desembolso['fecha_hora'], 0, 10) ?></td><td>INTERES : <?php echo $desembolso['interes'] ?></td>
			<td>PLAZO : <?php echo $desembolso['plazo'].' '.$desembolso['unidplazo'] ?></td><td>TOTAL : S/.<?php echo $desembolso['total'] ?></td>
		</tr>
	</table>
	<h4>LISTA DE CUOTAS</h4>
	<table class="mitabla" width="100%" class="conborde">
		<tr>
			<th>NRO</th>
			<th>DIA LETRAS</th>
			<th>FECHA PROG.</th>
			<th>CUOTA</th>
			<th>PAGO</th>
			<th>MONTO PAGADO</th>
			<th>SALDO</th>			
			<th>FECHA DE PAGO</th>
			<th>MORA (días)</th>
		</tr>
		<?php 
$sumamora=0;
$aux=0;
$saldo=$desembolso['total'];
		foreach($cuotaspago as $row) :
					if($aux==0){
						if(($row['estado']==1 && $row['montopagado']<$row['cuota']) || $row['estado']==0){
							$row['mora']=$moraactual;
							$aux=1;
						}			
					}

		 ?>
		<tr>
			<td><?php echo $row['nrocuota'] ?></td>
			<td><?php echo $row['nombredia'] ?></td>
			<td><?php echo $row['fecha_prog'] ?></td>
			<td><?php echo $row['cuota'] ?></td>
			<td><?php echo $row['estado']==1 ? 'SI' : 'NO' ?></td>
			<td><?php echo $row['montopagado'];
			$saldo= $saldo-$row['montopagado'];
			 ?></td>
			 <td>S/.<?php echo number_format($saldo,2); ?></td>
			<td><?php 
				if(!is_null($row['montopagado']) && $row['montopagado']<$row['cuota']){
					echo '';
				}else{
					echo (is_null($row['fechapago']) ? '' : $row['fechapago']);
				}
			 ?></td>
			<td><?php echo $row['mora']; 
			?></td>
		</tr>
		<?php
		$sumamora=$sumamora+$row['mora'];
		endforeach; 
		?>
		<?php $diasmorapagado=is_null($desembolso['pagomora']) ? 0 : $desembolso['pagomora']; ?>
	<tr>
		<td colspan="8" align="right">TOTAL DIAS MORA </td><td align="center"><?php echo $sumamora ?></td>	
	</tr>
	<tr>
		<td colspan="8" align="right">DEUDA MORA </td><td align="center">S/.<?php echo number_format($sumamora*$desembolso['costomora'],2); ?></td>	
	</tr>	
	<tr>
		<td colspan="8" align="right">TOTAL MORA PAGADO</td><td align="center">S/.<?php echo number_format($desembolso['pagomora']*$desembolso['costomora'],2) ?></td>	
	</tr>
	</table>

<br>
<br>
<br>
<br>
	<b>IMPRESION : </b><?php echo date('d-m-Y') ?> 

</body>
</html>