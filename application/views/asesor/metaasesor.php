<div class="container">
<?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?>
	<p class="well lead">ASESOR <?php echo $asesor['apenom'] ?></p>
	<div class="bg-info">
		<table class="table table-bordered table-striped">
			<tr>
				<th width="16%">MES</th>
				<th width="16%" align="center">CARTERA</th>
				<th width="16%" align="center">CLIENTES</th>
				<th width="16%" align="center">CLIENTES NUEVOS</th>				
				<th width="16%" align="center">DESEMBOLSOS</th>
				<th width="16%" align="center">SALDO POR MORA</th>
			</tr>
			<?php if(($logrosmesanterior['cartera']*3.5)/100<$logrosmesanterior['saldomora']){//si va ser 35% 0 15% en saldo mora ?>
			<?php 
				$porccartera=20;
				$porccliente=20;
				$porcclientenuevo=15;
				$porcdesembolso=10;
				$porcsaldomora=35;
				$condicionmora=true;
					}else{ ?>
			<?php
				$porccartera=40;
				$porccliente=20;
				$porcclientenuevo=15;
				$porcdesembolso=15;
				$porcsaldomora=10;
				$condicionmora=false;	} ?>
				<tr class="bg-warning"><!-- SEGUNDA FILA -->
					<!-- SI LA MORA ES MENOR AL 3.5% DE LA CARTERA CIERRE SU PESO EN MORA ES 10%, Y CUANDO LA MORA ES MAYOR ES 35% ($logrosmesanterior['cartera']*3.5)*100 -->
					<td align="left">PESOS </td>
					<td align="center"><?= $porccartera ?>%</td>
					<td align="center"><?= $porccliente ?>%</td>
					<td align="center"><?= $porcclientenuevo ?>%</td>
					<td align="center"><?= $porcdesembolso ?>%</td>
					<td align="center"><?= $porcsaldomora ?>%</td>
				</tr>
			<tr>
				<td>
				<?php

				$fechalogro=$logrosmesanterior['fecharegistro'];
				$mesindex=substr($logrosmesanterior['fecharegistro'], 5, 2);
				if($mesindex==1){
					$mesindex=11;
				}else{
					$mesindex-=1;
				}
				echo $meses[intval($mesindex)];
				
				?>	
				</td>
				<td align="right">S/.<?= $logrosmesanterior['cartera'] ?></td>
				<td align="center"><?= $logrosmesanterior['clientes'] ?></td>
				<td align="center"><?= $logrosmesanterior['clientenuevos'] ?></td>
				<td align="right">S/.<?= $logrosmesanterior['desembolsados'] ?></td>
				<td align="right">S/.<?= $logrosmesanterior['saldomora'] ?></td>
			</tr>
			<tr>
			<?php if(is_null($meta)){ 
				$meta['cartera']=1;
				$meta['clientes']=1;
				$meta['desembolsados']=1;
				$meta['moramayor8']=1;
				$meta['saldomora']=1;
				$meta['clientenuevos']=1;
				?>
				<td>META</td>
				<td colspan="5" align="center">NO HAY REGISTROS</td>
			<?php }else{ ?>
				<td>META</td>
				<td align="right">S/.<?= $meta['cartera'] ?></td>
				<td align="center"><?= $meta['clientes'] ?></td>
				<td align="center"><?= $meta['clientenuevos'] ?></td>				
				<td align="right">S/.<?= $meta['desembolsados'] ?></td>
				<td align="right">S/.<?= $meta['saldomora'] ?></td>
			<?php } ?>
			</tr>
			<tr>
				<td>SUMA</td>
				<td align="right">S/.<?= number_format($meta['cartera']+$logrosmesanterior['cartera'],2) ?></td>
				<td align="center"><?= $meta['clientes']+$logrosmesanterior['clientes'] ?></td>
				<td align="center"><?= $meta['clientenuevos']+$logrosmesanterior['clientenuevos'] ?></td>				
				<td align="right">S/.<?= number_format($meta['desembolsados']+$logrosmesanterior['desembolsados'], 2) ?></td>
				<td align="right">S/.<?= number_format($logrosmesanterior['saldomora']-$meta['saldomora'],2) ?></td>
			</tr>
			<tr>
				<td><?php $mesactual = date('m'); $nombremes = $meses[intval($mesactual)-1]; echo $nombremes; ?></td>
				<td align="right">S/.<?= round($registro['saldocapital'], 2) ?></td>
				<td align="center"><?= $registro['solicitudes'] ?></td>
				<td align="center"><?= $desembolsados['nuevos'] ?></td>				
				<td align="right">S/.<?= number_format($desembolsados['monto'],2) ?></td>
				<td align="right">S/.<?= number_format($registro['saldoxmora'],2) ?></td>

			</tr>
			<tr>
<?php
	if($meta['saldomora']==0){
		$meta['saldomora']=1;
		if($registro['saldoxmora']==0){
			$logrosmesanterior['saldomora']=30;//PARA QUE SEA POSITIVO
		}
	}
	if($meta['clientenuevos']==0){
		$meta['clientenuevos']=1;
	}	
	$porcentajes=array(
		'cartera'	=> round((($registro['saldocapital']-$logrosmesanterior['cartera'])/$meta['cartera'])*100,2), 
		'clientes'	=> round((($registro['solicitudes']-$logrosmesanterior['clientes'])/$meta['clientes'])*100,2),
		'clientesnuevos' => round((($desembolsados['nuevos']-$logrosmesanterior['clientenuevos'])/$meta['clientenuevos'])*100,2),
		'desembolsos' => round((($desembolsados['monto']-$logrosmesanterior['desembolsados'])/$meta['desembolsados'])*100,2),
		'saldomora'  => round((($logrosmesanterior['saldomora']-$registro['saldoxmora'])/$meta['saldomora'])*100,2)
	);
	$porcentajes['cartera']=($porcentajes['cartera']<0) ? 0 : $porcentajes['cartera'];
	$porcentajes['clientes']=($porcentajes['clientes']<0) ? 0 : $porcentajes['clientes'];
	$porcentajes['clientesnuevos']=($porcentajes['clientesnuevos']<0) ? 0 : $porcentajes['clientesnuevos'];
	$porcentajes['desembolsos']=($porcentajes['desembolsos']<0) ? 0 : $porcentajes['desembolsos'];
	$porcentajes['saldomora']=($porcentajes['saldomora']<0) ? 0 : $porcentajes['saldomora'];

	$porcentajes['cartera']=($porcentajes['cartera']>100) ? 100 : $porcentajes['cartera'];
	$porcentajes['clientes']=($porcentajes['clientes']>100) ? 100 : $porcentajes['clientes'];
	$porcentajes['clientesnuevos']=($porcentajes['clientesnuevos']>100) ? 100 : $porcentajes['clientesnuevos'];
	$porcentajes['desembolsos']=($porcentajes['desembolsos']>100) ? 100 : $porcentajes['desembolsos'];
	$porcentajes['saldomora']=($porcentajes['saldomora']>100) ? 100 : $porcentajes['saldomora'];
	$porcentajeacumulado=0;
  ?>
				<td>PORCENTAJE</td>
				<td align="right"><?= $porcentajes['cartera'] ?>%</td>
				<td align="center"><?= $porcentajes['clientes'] ?>%</td>
				<td align="center"><?= $porcentajes['clientesnuevos'] ?>%</td>				
				<td align="right"><?= $porcentajes['desembolsos'] ?>%</td>
				<td align="right"><?= $porcentajes['saldomora'] ?>%</td>
			</tr>
			<tr>
				<td align="center">RESULTADO FINAL</td>
				<td align="center"><b><?php echo number_format(($porcentajes['cartera']*$porccartera)/100,2); $porcentajeacumulado+=($porcentajes['cartera']*$porccartera)/100; ?>%</b>

				</td>
				<td align="center"><b><?php echo ($porcentajes['clientes']*$porccliente)/100; $porcentajeacumulado+=($porcentajes['clientes']*$porccliente)/100; ?>%</b>
				</td>
				<td align="center"><b><?php echo ($porcentajes['clientesnuevos']*$porcclientenuevo)/100; $porcentajeacumulado+=($porcentajes['clientesnuevos']*$porcclientenuevo)/100; ?>%</b>

				</td>				
				<td align="center"><b><?php echo ($porcentajes['desembolsos']*$porcdesembolso)/100; $porcentajeacumulado+=($porcentajes['desembolsos']*$porcdesembolso)/100; ?>%</b>
				</td>
				<td align="center"><b><?php echo ($porcentajes['saldomora']*$porcsaldomora)/100; $porcentajeacumulado+=($porcentajes['saldomora']*$porcsaldomora)/100; ?>%</b>
				</td>
			</tr>
			<tr>
				<?php 
					// if($porcentajeacumulado<50 || $logrosmesanterior['saldomora']<$registro['saldoxmora']){
					// 	$porcentajeacumulado=0;
					// }
				 ?>
				<th></th>
				<td colspan="5" align="center" class="text-danger"><h4><?= number_format($porcentajeacumulado, 2) ?>%</h4></td>
			</tr>
		</table>	
	</div>
</div>