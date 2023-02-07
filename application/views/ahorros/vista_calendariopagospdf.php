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
	    margin-top: 14px;
	    margin-left: 2em;
	    margin-right: 2em;
	    font-size:9px;
	    margin-bottom: 2px;
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
	table.pie{
		font-size: 9px;
	}
</style>
</head>
<body>
<div class="container-fluid">
<br><br>
	<table width="100%">
		<tr>
			<td width="49%">
			<br>
				<table width="100%">
					<tr>
						<th colspan="6">AHORRO PARA EL FUTURO</th>
					</tr>
					<tr>
						<th align="left">FECHA </th>
						<td align="left"><?php echo $cuentaahorros['fecha_registro'] ?></td>
						<th align="left">Monto</th>
						<td align="left">S/.<?php echo $cuentaahorros['monto'] ?></td>
						<th align="left">Plazo</th>
						<td align="left"><?php echo $cuentaahorros['plazo'] ?>&nbsp;<?php echo $cuentaahorros['tipoplazo']; ?></td>
					</tr>
					<tr>
						<th align="left">Cliente</th>
						<td align="left" colspan="3"><?php echo $cliente['apenom'] ?></td>				
						<th align="left">Frecuencia</th>
						<td align="left"><?php echo $cuentaahorros['frecuencia'] ?></td>
					</tr>
				</table>
				<?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?>
				<?php $mes=intval(substr($cuentaahorros['fechainicio'], 5,2)); ?>
				<table width="100%" class="mitabla">
					<tr>
						<?php 
						$plazo=$cuentaahorros['plazo'];
						for($i=0; $i<=$plazo; $i++){ ?>
							<th colspan="<?php echo $i==0 ? 3 : 2 ?>">
								<?php
								$mes = $mes==13 ? 1 : $mes;
								echo $meses[$mes-1];
								$mes++; ?>
							</th>
						<?php } ?>
					</tr>
					<tr>
						<td>Nro</td>
						<?php for($i=0; $i<=$plazo; $i++){ ?>
						<td>Monto</td>
						<td>Firma</td>
						<?php } ?>						
					</tr>
					<?php for($i=1; $i<=32; $i++){ ?>
					<tr>
						<td><?php echo $i==32 ? 'T' : $i ?></td>
						<?php for($c=0; $c<=$plazo; $c++){ ?>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<?php } ?>							
					</tr>
					<?php } ?>
				</table>
				<table class="pie" width="100%">
					<tr>
						<th align="left">ASESOR</th><td align="left"><?php echo $asesor['apenom'] ?></td>
						<th>CEL:</th><td><?php echo $asesor['celular'] ?></td>
					</tr>
					<tr>
						<th colspan="2"><br><br><br>____________________________ <br>
					Firma</th>
						<td colspan="2" align="right"><br><img src="<?= base_url() ?>index.php/pagos/generarbarcode/<?= $cuentaahorros['codigo'] ?>" /></td>
					</tr>
				</table>
			</td>
			<td width="2%">&nbsp;</td>
			<td width="49%">
			<br>
				<table width="100%">
					<tr>
						<th colspan="6">AHORRO PARA EL FUTURO</th>
					</tr>
					<tr>
						<th align="left">FECHA </th>
						<td align="left"><?php echo $cuentaahorros['fecha_registro'] ?></td>
						<th align="left">Monto</th>
						<td align="left">S/.<?php echo $cuentaahorros['monto'] ?></td>
						<th align="left">Plazo</th>
						<td align="left"><?php echo $cuentaahorros['plazo'] ?>&nbsp;<?php echo $cuentaahorros['tipoplazo']; ?></td>
					</tr>
					<tr>
						<th align="left">Cliente</th>
						<td align="left" colspan="3"><?php echo $cliente['apenom'] ?></td>				
						<th align="left">Frecuencia</th>
						<td align="left"><?php echo $cuentaahorros['frecuencia'] ?></td>
					</tr>
				</table>
				<?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?>
				<?php $mes=intval(substr($cuentaahorros['fechainicio'], 5,2)); ?>
				<table width="100%" class="mitabla">
					<tr>
						<?php 
						$plazo=$cuentaahorros['plazo'];
						for($i=0; $i<=$plazo; $i++){ ?>
							<th colspan="<?php echo $i==0 ? 3 : 2 ?>">
								<?php
								$mes = $mes==13 ? 1 : $mes;
								echo $meses[$mes-1];
								$mes++; ?>
							</th>
						<?php } 
						?>
					</tr>
					<tr>
						<td>Nro</td>
						<td>Monto</td>
						<td>Firma</td>
						<td>Monto</td>
						<td>Firma</td>
						<td>Monto</td>
						<td>Firma</td>
						<td>Monto</td>
						<td>Firma</td>
						<td>Monto</td>
						<td>Firma</td>
						<td>Monto</td>
						<td>Firma</td>
						<td>Monto</td>
						<td>Firma</td>						
					</tr>
					<?php for($i=1; $i<=32; $i++){ ?>
					<tr>
						<td><?php echo $i==32 ? 'T' : $i ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>							
					</tr>
					<?php } ?>
				</table>
				<table class="pie" width="100%">
					<tr>
						<th align="left">ASESOR</th><td align="left"><?php echo $asesor['apenom'] ?></td>
						<th>CEL:</th><td><?php echo $asesor['celular'] ?></td>
					</tr>
					<tr>
						<th colspan="2"><br><br><br>____________________________ <br>
					Firma</th>
						<td colspan="2" align="right"><br><img src="<?= base_url() ?>index.php/pagos/generarbarcode/<?= $cuentaahorros['codigo'] ?>" /></td>
					</tr>
				</table>	
			</td>
		</tr>
	</table>
</div>
</body>
</html>
