<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
	<title>FINANCIERA EMPRENDER</title>
	<style>
		th{
			padding-top: 40px;
		}
	</style>
</head>
<body>
<br>
	<div align="center">
		<img src="<?= base_url() ?>activos/images/emprender.jpg" alt="">
		<br>
		<h3>PROPUESTA DE CREDITO</h3>
	</div>
		<table width="100%">
			<tr>
				<td>
					ID SOLICITUD
				</td>
				<td>
					<?php echo $solicitud['idsolicitud'] ?>
				</td>
				<td>
					TITULAR
				</td>
				<td>
					<?php echo $solicitud['apenom']; ?>
				</td>
			</tr>
			<tr>
				<td>
					FECHA SOLIC
				</td>
				<td>
					<?php echo $solicitud['fecha'] ?>
				</td>
				<td>
					Monto
				</td>
				<td>
					<?php echo $solicitud['monto'] ?>
				</td>
				
			</tr>
		</table>


<table width="100%" align="left">
	<tr>
		<th align="left">UNIDAD FAMILIAR(CONYUGUE, HIJOS)</th>
	</tr>
	<tr>
		<td align="justify"><?php echo $propuestacred['unidad_familiar'] ?></td>
	</tr>
	<tr>
		<th align="left">EXPERIENCIA CREDITICIA Y NEGOCIO</th>
	</tr>
	<tr>	
		<td align="justify"><?php echo $propuestacred['experiencia_cred'] ?></td>
	</tr>
	<tr>
		<th align="left">DESTINO DEL PRESTAMO</th>
	</tr>
	<tr>	
		<td align="justify"><?php echo $propuestacred['destino_prest'] ?></td>
	</tr>
	<tr>
		<th align="left">REFERENCIAS PERSONALES Y COMERCIALES</th>
	</tr>
	<tr>	
		<td align="justify"><?php echo $propuestacred['referencias'] ?></td>
	</tr>
</table>

</body>
</html>