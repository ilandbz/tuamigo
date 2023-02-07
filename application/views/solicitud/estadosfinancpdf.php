<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FINANCIERA TU AMIGO</title>
	<style type="text/css">
		@page {
		    margin-top: 0.8em;
		    margin-left: 4.8em;
		    margin-right: 0.4em;
		    margin-bottom: 0.8em;
		}
		.micontenidoef{
			font-size: 9px;
		}
		table.conborde tr,table.conborde tr{
		    border: 1px solid black;
		}
	</style>
</head>
<body>
<div align="center">
	<img src="<?= base_url() ?>activos/images/emprender.jpg" alt="">
</div>
<div align="center">
	<h4>ESTADOS FINANCIEROS</h4>
</div>
<div class="micontenidoef">
	
	<table width="100%" class="conborde">
		<tr>
			<td width="50%" align="center">
				CLIENTE : <?php echo $cliente['apenom'] ?>&nbsp;&nbsp;&nbsp;SOLICITUD&nbsp;<?php echo $solicitud['idsolicitud'] ?>
				<br>
				BALANCE al <?php echo substr($solicitud['fecha'], 8,2).'-'. substr($solicitud['fecha'], 5,2).'-'. substr($solicitud['fecha'], 0,4); ?>&nbsp;Nuevos Soles
				<table width="100%">
					<tr>
						<th colspan="2" align="left"><hr>Activo Corriente</th>
					</tr>
					<tr>
						<td>Caja</td>
						<td>S/.<?php echo $detbalance['activocaja'] ?></td>
					</tr>
					<tr>
						<td>Bancos</td>
						<td>S/.<?php echo $detbalance['activobancos'] ?></td>
					</tr>
					<tr>
						<td>Cuentas por Cobrar</td>
						<td>S/.<?php echo $detbalance['activoctascobrar'] ?></td>
					</tr>
					<tr>
						<td>Inventarios</td>
						<td>S/.<?php echo $detbalance['activoinventarios'] ?></td>
					</tr>
					<tr>
						<td>TOTAL</td>
						<td>S/.<?php echo $detbalance['totalacorriente'] ?></td>
					</tr>
					<tr>
						<th colspan="2" align="left"><hr>Activo No Corriente</th>
					</tr>
					<tr>
						<td>MUEBLES MAQUINARIA Y EQUIPO</td>
						<td>S/.<?php echo $detbalance['activomueble'] ?></td>
					</tr>	
					<tr>
						<td>OTROS ACTIVOS</td>
						<td>S/.<?php echo $detbalance['activootrosact'] ?></td>
					</tr>
					<tr>
						<td>DEPRECIACION, AMORTIZACION Y AGOTAMIENTO ACUMULADO</td>
						<td>S/.<?php echo $detbalance['activodepre'] ?></td>
					</tr>
					<tr>
						<td>TOTAL</td>
						<td>S/.<?php echo $detbalance['totalancorriente'] ?></td>
					</tr>
					<tr>
						<th colspan="2" align="left"><hr>Pasivo Corriente</th>
					</tr>
					<tr>
						<td>DEUDAS CON PROVEEDORES</td>
						<td>S/.<?php echo $detbalance['pasivodeudaprove'] ?></td>
					</tr>
					<tr>
						<td>DEUDAS CON ENTIDADES FINANCIERAS</td>
						<td>S/.<?php echo $detbalance['pasivodeudaent'] ?></td>
					</tr>
					<tr>
						<td>DEUDAS CON EMPRENDER</td>
						<td>S/.<?php echo $detbalance['pasivodeudaemprender'] ?></td>
					</tr>
					<tr>
						<td>TOTAL</td>
						<td>S/.<?php echo $detbalance['totalpcorriente'] ?></td>
					</tr>
					<tr>
						<th colspan="2" align="left"><hr>Pasivo No Corriente</th>
					</tr>
					<tr>
						<td>PASIVO LARGO PLAZO</td>
						<td>S/.<?php echo $detbalance['pasivolargop'] ?></td>
					</tr>	
					<tr>
						<td>OTRAS CUENTAS POR PAGAR</td>
						<td>S/.<?php echo $detbalance['otrascuentaspagar'] ?></td>
					</tr>
					<tr>
						<td>TOTAL</td>
						<td>S/.<?php echo $detbalance['totalpncorriente'] ?></td>
					</tr>
					<tr>
						<td colspan="2"><hr></td>
					</tr>
					<tr>
						<th align="left">PATRIMONIO</th>
						<td><?php echo $balance['patrimonio'] ?></td>
					</tr>
					<tr>
						<th align="left">PASIVO + PATRIMONIO</th>
						<td><?php echo number_format($balance['patrimonio']+$balance['total_pasivo'],2) ?></td>
					</tr>	
					<tr>
						<th align="left">CAPITAL DE TRABAJO</th>
						<td><?php echo number_format($detbalance['totalacorriente']-$detbalance['pasivodeudaprove'],2) ?></td>
					</tr>															
				</table>
			</td>
			<td width="50%">
				MARGEN DE VENTAS
				<table width="100%">
					<tr>
						<th></th>
						<td>
							<div>PROD. 1</div>				
						</td>
						<td>

							<div>PROD. 2 </div>
						</td>
						<td>

							<div>PROD. 3</div>
						</td>
					</tr>
					<tr>
						<th align="left">DESCRIPCION DEL PRODUCTO</th>
						<td><?php echo (isset($detperdidasganancias[0]['descripcion'])) ? $detperdidasganancias[0]['descripcion'] : '' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['descripcion'])) ? $detperdidasganancias[1]['descripcion'] : '' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['descripcion'])) ? $detperdidasganancias[2]['descripcion'] : '' ?></td>
					</tr>
					<tr>
						<th align="left">UNIDAD DE MEDIDA</th>
						<td>
							<?php echo (isset($detperdidasganancias[0]['unidadmedida'])) ? $detperdidasganancias[0]['unidadmedida'] : '' ?>
						</td>
						<td>
							<?php echo (isset($detperdidasganancias[1]['unidadmedida'])) ? $detperdidasganancias[1]['unidadmedida'] : '' ?>
						</td>
						<td>
							<?php echo (isset($detperdidasganancias[2]['unidadmedida'])) ? $detperdidasganancias[2]['unidadmedida'] : '' ?>
						</td>
					</tr>
					<tr>
						<th align="left">PRECIO VENTA UNIT.</th>
						<td><?php echo (isset($detperdidasganancias[0]['preciounit'])) ? $detperdidasganancias[0]['preciounit'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['preciounit'])) ? $detperdidasganancias[1]['preciounit'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['preciounit'])) ? $detperdidasganancias[2]['preciounit'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">MATERIA PRIMA PRINCIPAL</th>
						<td><?php echo (isset($detperdidasganancias[0]['primaprincipal'])) ? $detperdidasganancias[0]['primaprincipal'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['primaprincipal'])) ? $detperdidasganancias[1]['primaprincipal'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['primaprincipal'])) ? $detperdidasganancias[2]['primaprincipal'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">MATERIA PRIMA SECUNDARIA</th>
						<td><?php echo (isset($detperdidasganancias[0]['primasecundaria'])) ? $detperdidasganancias[0]['primasecundaria'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['primasecundaria'])) ? $detperdidasganancias[1]['primasecundaria'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['primasecundaria'])) ? $detperdidasganancias[2]['primasecundaria'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">MATERIA PRIMA COMPLEMENTARIA</th>
						<td><?php echo (isset($detperdidasganancias[0]['primacomplement'])) ? $detperdidasganancias[0]['primacomplement'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['primacomplement'])) ? $detperdidasganancias[1]['primacomplement'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['primacomplement'])) ? $detperdidasganancias[2]['primacomplement'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">MATERIA PRIMA</th>
						<td><?php echo (isset($detperdidasganancias[0]['matprima'])) ? $detperdidasganancias[0]['matprima'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['matprima'])) ? $detperdidasganancias[1]['matprima'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['matprima'])) ? $detperdidasganancias[2]['matprima'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">MANO DE OBRA 1</th>
						<td><?php echo (isset($detperdidasganancias[0]['manoobra1'])) ? $detperdidasganancias[0]['manoobra1'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['manoobra1'])) ? $detperdidasganancias[1]['manoobra1'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['manoobra1'])) ? $detperdidasganancias[2]['manoobra1'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">MANO DE OBRA 2</th>
						<td><?php echo (isset($detperdidasganancias[0]['manoobra2'])) ? $detperdidasganancias[0]['manoobra2'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['manoobra2'])) ? $detperdidasganancias[1]['manoobra2'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['manoobra2'])) ? $detperdidasganancias[2]['manoobra2'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">MANO DE OBRA</th>
						<td><?php echo (isset($detperdidasganancias[0]['manoobra'])) ? $detperdidasganancias[0]['manoobra'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['manoobra'])) ? $detperdidasganancias[1]['manoobra'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['manoobra'])) ? $detperdidasganancias[2]['manoobra'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">COSTO PRIMO UNITARIO</th>
						<td><?php echo (isset($detperdidasganancias[0]['costoprimounit'])) ? $detperdidasganancias[0]['costoprimounit'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['costoprimounit'])) ? $detperdidasganancias[1]['costoprimounit'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['costoprimounit'])) ? $detperdidasganancias[2]['costoprimounit'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">PRODUCCION MENSUAL POR PRODUCTO</th>
						<td><?php echo (isset($detperdidasganancias[0]['prodmensual'])) ? $detperdidasganancias[0]['prodmensual'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['prodmensual'])) ? $detperdidasganancias[1]['prodmensual'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['prodmensual'])) ? $detperdidasganancias[2]['prodmensual'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">VENTAS TOTALES POR PRODUCTO</th>
						<td><?php echo (isset($detperdidasganancias[0]['ventastotales'])) ? $detperdidasganancias[0]['ventastotales'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['ventastotales'])) ? $detperdidasganancias[1]['ventastotales'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['ventastotales'])) ? $detperdidasganancias[2]['ventastotales'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">COSTO PRIMO POR PRODUCTO</th>
						<td><?php echo (isset($detperdidasganancias[0]['totcostoprimo'])) ? $detperdidasganancias[0]['totcostoprimo'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['totcostoprimo'])) ? $detperdidasganancias[1]['totcostoprimo'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['totcostoprimo'])) ? $detperdidasganancias[2]['totcostoprimo'] : '0.00' ?></td>
					</tr>
					<tr>
						<th align="left">MARGEN DE VENTAS POR PRODUCTO</th>
						<td><?php echo (isset($detperdidasganancias[0]['margenventas'])) ? $detperdidasganancias[0]['margenventas'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[1]['margenventas'])) ? $detperdidasganancias[1]['margenventas'] : '0.00' ?></td>
						<td><?php echo (isset($detperdidasganancias[2]['margenventas'])) ? $detperdidasganancias[2]['margenventas'] : '0.00' ?></td>
					</tr>
					<tr>
						<td colspan="4">&nbsp;</td>
					</tr>
					<tr>
						<th colspan="2" align="left">TOTAL INGRESO MENSUAL</th>
						<td>
							<?php echo $perdidasganancias['tot_ing_mensual'] ?>
						</td>
					</tr>
					<tr>					
						<th colspan="2" align="left">MARGEN TOTAL</th>
						<td>
							<?php echo $perdidasganancias['tot_cosprimo_m'] ?>
						</td>			
					</tr>
					<tr>
						<th colspan="2" align="left">TOTAL COSTO PRIMO MENSUAL</th>
						<td>
							<?php echo $perdidasganancias['margen_tot'] ?>
						</td>
					</tr>
					<tr>					
						<th colspan="2" align="left">VENTAS AL CREDITO</th>
						<td>
							<?php echo $perdidasganancias['ventas_cred'] ?>
						</td>			
					</tr>
					<tr>
						<th colspan="2" align="left">COSTO PRIMO/VENTAS</th>
						<td colspan="2">
							<?php echo number_format($perdidasganancias['tot_cosprimo_m']/(($perdidasganancias['tot_ing_mensual']==0) ? 1 : $perdidasganancias['tot_ing_mensual']),2); ?>
						</td>
					</tr>
					<tr>					
						<th colspan="2" align="left">IRRECUPERABILIDAD</th>
						<td colspan="2">
							<?php echo $perdidasganancias['irrecuperable'] ?>
						</td>			
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>

<?php 
if(is_null($perdidasgananciasgralanterior)){
	$perdidasgananciasgralanterior['ventas']=0;
	$perdidasgananciasgralanterior['costo']=0;
	$perdidasgananciasgralanterior['utilidad']=0;
	$perdidasgananciasgralanterior['costonegocio']=0;
	$perdidasgananciasgralanterior['utiloperativa']=0;
	$perdidasgananciasgralanterior['otrosing']=0;
	$perdidasgananciasgralanterior['otrosegr']=0;
	$perdidasgananciasgralanterior['gast_fam']=0;
	$perdidasgananciasgralanterior['utilidadneta']=0;
	$perdidasgananciasgralanterior['tipoplazo']=0;
	$perdidasgananciasgralanterior['utilnetdiaria']=0;	
}
 ?>
	<table width="100%">
		<tr>
			<th colspan="4">EVALUACION PERDIDAS GANANCIAS</th>
		</tr>
		<tr>
			<th colspan="2">ACTUAL</th>
			<th colspan="2">ANTERIOR</th>
		</tr>
		<tr>
			<th align="left">Ventas</th>
			<td align="left">S/. <?php echo $perdidasgananciasgral['ventas'] ?></td>
			<th align="left">Ventas</th>
			<td align="left">S/. <?php echo $perdidasgananciasgralanterior['ventas'] ?></td>
		</tr>
		<tr>
			<th align="left">Costo</th>
			<td align="left">S/. <?php echo $perdidasgananciasgral['costo'] ?></td>
			<th align="left">Costo</th>
			<td align="left">S/. <?php echo $perdidasgananciasgralanterior['costo'] ?></td>											
		</tr>
		<tr>
			<th align="left">UTILIDAD</th>
			<td align="left">S/. <?php echo $perdidasgananciasgral['utilidad'] ?></td>
			<th align="left">UTILIDAD</th>
			<td align="left">S/. <?php echo $perdidasgananciasgralanterior['utilidad'] ?></td>
		</tr>
		<tr>
			<th align="left">Gasto Negocio</th>
			<td align="left">S/. <?php echo $perdidasgananciasgral['costonegocio'] ?></td>
			<th align="left">Gasto Negocio</th>
			<td align="left">S/. <?php echo $perdidasgananciasgralanterior['costonegocio'] ?></td>									
		</tr>					
		<tr>
			<th align="left">Utilidad Operativa</th>
			<td align="left">S/. <?php echo $perdidasgananciasgral['utiloperativa'] ?></td>
			<th align="left">Utilidad Operativa</th>
			<td align="left">S/. <?php echo $perdidasgananciasgralanterior['utiloperativa'] ?></td>						
		</tr>
		<tr>
			<th align="left">Otros Ingresos</th>
			<td align="left">S/. <?php echo $perdidasgananciasgral['otrosing'] ?></td>
			<th align="left">Otros Ingresos</th>
			<td align="left">S/. <?php echo $perdidasgananciasgralanterior['otrosing'] ?></td>							
		</tr>					
		<tr>
			<th align="left">Otros Egresos</th>
			<td align="left">S/. <?php echo $perdidasgananciasgral['otrosegr'] ?></td>
			<th align="left">Otros Egresos</th>
			<td align="left">S/. <?php echo $perdidasgananciasgralanterior['otrosegr'] ?></td>					
		</tr>
		<tr>
			<th align="left">Gastos Familiares</th>
			<td align="left">S/. <?php echo $perdidasgananciasgral['gast_fam'] ?></td>
			<th align="left">Gastos Familiares</th>
			<td align="left">S/. <?php echo $perdidasgananciasgralanterior['gast_fam'] ?></td>					
		</tr>					
		<tr>
			<th align="left">Utilidad Neta</th>
			<td align="left">S/. <?php echo $perdidasgananciasgral['utilidadneta'] ?></td>
			<th align="left">Utilidad Neta</th>
			<td align="left">S/. <?php echo $perdidasgananciasgralanterior['utilidadneta'] ?></td>						
		</tr>
		<tr>
			<th align="left">Utilidad Neta <?php echo $solicitud['tipoplazo']=='DIARIO' ? 'Diaria' : 'Semanal' ?></th>
			<td align="left">S/. <?php echo $perdidasgananciasgral['utilnetdiaria'] ?></td>
			<th align="left">Utilidad Neta <?php echo $solicitud['tipoplazo']=='DIARIO' ? 'Diaria' : 'Semanal' ?></th>
			<td align="left">S/. <?php echo $perdidasgananciasgralanterior['utilnetdiaria'] ?></td>						
		</tr>					
	</table>
			</td>
			<td valign="top">
				<table width="100%">
					<tr>
						<th colspan="4" align="left">GASTOS NEGOCIO</th>
					</tr>
					<tr>
						<th align="left">Alquiler</th><td align="left">S/. <?php echo $gastosnegocios['alquiler'] ?></td><th align="left">Servicios</th><td align="left">S/. <?php echo $gastosnegocios['servicios'] ?></td>
					</tr>
					<tr>
						<th align="left">Personal</th><td align="left">S/. <?php echo $gastosnegocios['personal'] ?></td><th align="left">Sunat</th><td align="left">S/. <?php echo $gastosnegocios['sunat'] ?></td>
					</tr>
					<tr>
						<th align="left">Transporte</th><td align="left">S/. <?php echo $gastosnegocios['transporte'] ?></td><th align="left">Gastos Financieros</th><td align="left">S/. <?php echo $gastosnegocios['gastosfinancieros'] ?></td>
					</tr>
					<tr>
						<th align="left">Otros</th><td align="left">S/. <?php echo $gastosnegocios['otros'] ?></td><th></th><td align="left"></td>
					</tr>
					<tr>
						<td colspan="4">&nbsp;</td>
					</tr>
					<tr>
						<th colspan="4" align="left">GASTOS FAMILIARES</th>
					</tr>
					<tr>
						<th align="left">Alimentacion</th><td align="left">S/. <?php echo $gastosfamilliares['alimentacion'] ?></td><th align="left">Alquileres</th><td align="left">S/. <?php echo $gastosfamilliares['alquileres'] ?></td>
					</tr>
					<tr>
						<th align="left">Educacion</th><td align="left">S/. <?php echo $gastosfamilliares['educacion'] ?></td><th align="left">Servicios</th><td align="left">S/. <?php echo $gastosfamilliares['servicios'] ?></td>
					</tr>
					<tr>
						<th align="left">Transporte</th><td align="left">S/. <?php echo $gastosfamilliares['transporte'] ?></td><th align="left">Salud</th><td align="left">S/. <?php echo $gastosfamilliares['salud'] ?></td>
					</tr>
					<tr>
						<th align="left">Otros</th><td align="left">S/. <?php echo $gastosfamilliares['otros'] ?></td><th></th><td align="left"></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="4"><br>
			<br>
			<br></td>
		</tr>

	</table>
	<br>
	<br>
	<br>
	<br>
</div>
	<br>
	<br>
	<br>
	<div align="center">
		<table width="100%">
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</div>

	<script type="text/javascript" src="<?php echo base_url() ?>activos/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>activos/bootstrap3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>activos/js/miscript2.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>activos/js/bootstrap-switch.min.js"></script>
</body>
</html>