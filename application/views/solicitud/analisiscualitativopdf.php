<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
	<title>FINANCIERA EMPRENDER</title>
	<style>
		body{
			font-size: 11px;
		}
	</style>
</head>
<body>

<div align="center">
	<img src="<?= base_url() ?>activos/images/emprender.jpg" alt="">

		<h3>ANALISIS CUALITATIVO</h3>
	</div>
<hr>
<p>I. UNIDAD FAMILIAR</p>
<hr>

<table width="100%">
	<tr>
		<th colspan="3" align="left">1. TIPO DE GARANTIA</th>
	</tr>
	<tr>
		<td width="80%">REAL CONSTITUIDA A FAVOR DE LA INSTITUCION (HIPOTECA Y/O PRENDA)</td>
		<td>4</td>
		<td><?php echo ($analisiscualitativo['tipogarantia']=='4' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>SIMPLE</td>
		<td>2</td>
		<td><?php echo ($analisiscualitativo['tipogarantia']=='2' ? 'X' : '');?></td>
	</tr>
	<tr>
		<th colspan="3" align="left">2. CARGA FAMILIAR</th>
	</tr>	
	<tr>
		<td>NO TIENE DEPENDIENTES</td>
		<td>4</td>
		<td><?php echo ($analisiscualitativo['cargafamiliar']=='4' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>TIENE DEPENDIENTES NO VULNERABLES</td>
		<td>2</td>
		<td><?php echo ($analisiscualitativo['cargafamiliar']=='2' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>TIENE DEPENDIENTES MENORES A 5 AÑOS</td>
		<td>1</td>
		<td><?php echo ($analisiscualitativo['cargafamiliar']=='1' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>TIENE ALGUN DEPENDIENTE CON ENFERMEDADES FRECUENTE Y/O GRAVE</td>
		<td>0</td>
		<td><?php echo ($analisiscualitativo['cargafamiliar']=='0' ? 'X' : '');?></td>
	</tr>
	
	<tr>
		<td>MENOR DE 64 AÑOS</td>
		<td>3</td>
		<td><?php echo ($analisiscualitativo['riesgoedadmax']=='3' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>MAYOR O IGUAL A 64 AÑOS</td>
		<td>1</td>
		<td><?php echo ($analisiscualitativo['riesgoedadmax']=='1' ? 'X' : '');?></td>
	</tr>
	<tr>
		<th>TOTAL PUNTAJE UNIDAD FAMILIAR</th>
		<td colspan="2"><?php echo $analisiscualitativo['totunidfamiliar']; ?></td>
	</tr>
</table>
<hr>
<p>II. UNIDAD EMPRESARIAL</p>
<hr>
<table width="100%">
	<tr>
		<th colspan="3" align="left">1. TIENE ANTECEDENTES CREDITICIOS</th>
	</tr>
	<tr>
		<td width="80%">CREDITOS EN NUESTRA ENTIDAD</td>
		<td>5</td>
		<td><?php echo ($analisiscualitativo['antecedentescred']=='5' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>CREDITOS EN OTRAS ENTIDADES DEL SISTEMA FINANCIERO</td>
		<td>4</td>
		<td><?php echo ($analisiscualitativo['antecedentescred']=='4' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>CREDITO CON PROVEEDORES</td>
		<td>3</td>
		<td><?php echo ($analisiscualitativo['antecedentescred']=='3' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>NO HA TENIDO CREDITOS</td>
		<td>1</td>
		<td><?php echo ($analisiscualitativo['antecedentescred']=='1' ? 'X' : '');?></td>
	</tr>
	<tr>
		<th colspan="3" align="left">2. RECORD PAGO DEL ULTIMO PRESTAMO</th>
	</tr>

	<tr>
		<td>FUE CON PAGOS OPORTUNOS EN SU FECHA DE PAGO</td>
		<td>7</td>
		<td><?php echo ($analisiscualitativo['recorpagoult']=='7' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>FUE CON RETRASO MENOR A 8 DIAS<</td>
		<td>5</td>
		<td><?php echo ($analisiscualitativo['recorpagoult']=='5' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>FUE CON RETRASO ENTRE 9 Y 30 DIAS</td>
		<td>2</td>
		<td><?php echo ($analisiscualitativo['recorpagoult']=='2' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>FUE CON RETRASO MAYOR A 30 DIAS O NO HA TENIDO PRESTAMOS</td>
		<td>1</td>
		<td><?php echo ($analisiscualitativo['recorpagoult']=='1' ? 'X' : '');?></td>
	</tr>
	<tr>
		<th colspan="3" align="left">3. NIVEL DE DESARROLLO DEL NEGOCIO</th>
	</tr>	
	<tr>
		<td>ACUMULACION AMPLIADA</td>
		<td>4</td>
		<td><?php echo ($analisiscualitativo['niveldesarr']=='4' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>ACUMULACION SIMPLE</td>
		<td>3</td>
		<td><?php echo ($analisiscualitativo['niveldesarr']=='3' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>EMERGENTE</td>
		<td>2</td>
		<td><?php echo ($analisiscualitativo['niveldesarr']=='2' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>SOBREVIVENCIA</td>
		<td>1</td>
		<td><?php echo ($analisiscualitativo['niveldesarr']=='1' ? 'X' : '');?></td>
	</tr>
	<tr>
		<th colspan="3" align="left">4. TIEMPO FUNCIONAMIENTO DEL NEGOCIO</th>
	</tr>
	<tr>
		<td>MAYOR A 3 AÑOS</td>
		<td>4</td>
		<td><?php echo ($analisiscualitativo['niveldesarr']=='4' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>ENTRE 1 Y 3 AÑOS</td>
		<td>3</td>
		<td><?php echo ($analisiscualitativo['niveldesarr']=='3' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>MENOR A 1 AÑO</td>
		<td>2</td>
		<td><?php echo ($analisiscualitativo['niveldesarr']=='2' ? 'X' : '');?></td>
	</tr>
	<tr>
		<th colspan="3" align="left">5. CONTROLA SUS INGRESOS Y EGRESOS</th>
	</tr>	
	<tr>
		<td>SUFICIENTE Y ADECUADAMENTE REGISTRADA</td>
		<td>3</td>
		<td><?php echo ($analisiscualitativo['control_ingegre']=='3' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>SUFICIENTE PERO INADECUADAMENTE REGISTRADA</td>
		<td>2</td>
		<td><?php echo ($analisiscualitativo['control_ingegre']=='2' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>INSUFICIENTE</td>
		<td>1</td>
		<td><?php echo ($analisiscualitativo['control_ingegre']=='1' ? 'X' : '');?></td>
	</tr>
	<tr>
		<th colspan="3" align="left">6. LAS VENTAS TOTALES SE DECLARAN</th>
	</tr>	
	<tr>
		<td>FORMALMENTE DE MANERA PARCIAL</td>
		<td>2</td>
		<td><?php echo ($analisiscualitativo['vent_totdec']=='2' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>NO LAS DECLARA</td>
		<td>0</td>
		<td><?php echo ($analisiscualitativo['vent_totdec']=='0' ? 'X' : '');?></td>
	</tr>
	<tr>
		<th colspan="3" align="left">7. COMPORTAMIENTO DEL SUBSECTOR</th>
	</tr>	
	<tr>
		<td>BAJO RIESGO</td>
		<td>4</td>
		<td><?php echo ($analisiscualitativo['compsubsector']=='4' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>MEDIANO RIESGO</td>
		<td>2</td>
		<td><?php echo ($analisiscualitativo['compsubsector']=='2' ? 'X' : '');?></td>
	</tr>
	<tr>
		<td>ALTO RIESGO</td>
		<td>0</td>
		<td><?php echo ($analisiscualitativo['compsubsector']=='0' ? 'X' : '');?></td>
	</tr>
	<tr>
		<th>TOTAL PUNTAJE UNIDAD EMPRESARIAL</th>
		<td colspan="2"><?php echo $analisiscualitativo['totunidempresa']; ?></td>
	</tr>
</table>
<hr>
<p align="right"><b>PUNTAJE</b> : <?php echo $analisiscualitativo['total'] ?></p>

</body>
</html>