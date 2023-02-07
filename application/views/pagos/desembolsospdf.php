
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FINANCIERA TU AMIGO</title>
</head>
<body>

<style type="text/css">
table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}
	
</style>


<div style="font-size:12px; margin-top:20px">

<div align="center">
	<h2>DESEMBOLSOS A LA FECHA DE <?php echo $fecha; ?></h2>
</div>

<table width="100%">
	<tr>
		<th>ID Asesor</th>
		<th>Fecha Hora Desem.</th>
		<th>Id Solicitud</th>
		<th>Apellidos y Nombres</th>
		<th>Monto</th>
		<th>Tipo</th>
	</tr>
	<?php $total=0; foreach($desembolsos as $row){ ?>
	<tr>
		<td><?php echo $row['idasesor'] ?></td>
		<td><?php echo $row['fecha_hora'] ?></td>
		<td><?php echo $row['idsolicitud'] ?></td>
		<td><?php echo $row['apenom'] ?></td>
		<td>S/.<?php echo number_format($row['monto'],2); $total+=$row['monto']; ?></td>
		<td><?php echo $row['tipo'] ?></td>
	</tr>
	<?php } ?>
	<tr>
		<th colspan="4" align="right">TOTAL</th>
		<th>S/.<?php echo number_format($total,2); ?></th>
		<th></th>
	</tr>
</table>
</div>
</body>
</html>
