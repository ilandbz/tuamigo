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
	table.mitabla th, table.mitabla td {
	    border: 1px solid black;
	}
	table.mitabla td {
		padding : 3px;
	}
	table.pie{
		font-size: 9px;
		margin-bottom: 0px;
	}
</style>
</head>
<body>
<div class="container-fluid">
<br><br>

	<table width="50%">
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
	<?php $meses = array(
		'1' 	=> "Enero",
		'2'		=> "Febrero",
		'3'		=> "Marzo",
		'4'		=> "Abril",
		'5'		=> "Mayo",
		'6'		=> "Junio",
		'7'		=> "Julio",
		'8'		=> "Agosto",
		'9'		=> "Septiembre",
		'10' 	=> "Octubre",
		'11'	=> "Noviembre",
		'12'	=> "Diciembre"
		); 
		?>
	<?php $mes=intval(substr($cuentaahorros['fechainicio'], 5,2)); ?>
	<table width="100%" class="mitabla">
		<tr>
			<?php $plazo=$cuentaahorros['plazo']; ?>
			<td>&nbsp;</td>
			<?php
			for($i=1; $i<=$plazo+1; $i++){ ?>
				
				<th colspan="2">
					<?php 
					$mes = $mes==13 ? 1 : $mes;
					echo $meses[$mes];
					$mes++; ?>
				</th>
				<?php
				if($i==5){
					echo '<td style="border: 0px solid yellow;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
				}
			 } 
			?>
		</tr>
		<tr>
			<td>Nro.</td>
			<?php $titulo='Monto'; for($i=1; $i<=(($plazo+1)*2); $i++){ ?>
			<td><?php echo $titulo; ?></td>
			<?php if($i==$plazo+1){ ?>
			<td style="border: 0px solid yellow;">&nbsp;</td>
			<?php } ?>
			<?php $titulo = $titulo=='Monto' ? 'Firma' : 'Monto'; ?> 
			<?php } ?>		
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
<td style="border: 0px solid yellow;">&nbsp;</td>
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
			<td align="left" width="50%">ASESOR : &nbsp;&nbsp;<?php echo $asesor['apenom'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEL:&nbsp;&nbsp;<?php echo $asesor['celular'] ?></td>
			<th></th>
		</tr>
		<tr>
			<td>
				<div align="center">
				<br><br>
					____________________________ <br>
					Firma
				</div>				
			</td>
			<td></td>
		</tr>
	</table>

</div>
</body>
</html>
