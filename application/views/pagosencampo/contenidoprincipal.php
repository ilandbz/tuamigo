<div class="container">
	<form id="solcliente" action="<?php echo base_url() ?>index.php/pagosencampo/guardarmontoencampo" method="post" role="form">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">INGRESAR MONTO DE CREDITO</h3>
	        </div>
	        <div class="panel-body">
	            <div class="form-group">
	                <label for="dni">CODIGO DE DESEMBOLSO</label>
	                <div class="input-group input-group-lg">
	                	<input class="form-control form-control-lg" id="iddesembolso" name="iddesembolso" placeholder="CODIGO" type="text" maxlength="8" value="" />
						<span class="input-group-btn">
							<button class="btn btn-default" id="buscardes" name="buscardes" type="button">Go!</button>
						</span>                	
	                </div>
	            </div>
	            <div class="form-group">
	            	<label for="dni">MONTO</label>
					<div class="input-group input-group-lg">
					  <span class="input-group-addon" id="sizing-addon1">S/.</span>
					  <input type="text" class="form-control numerosypunto" name="monto" placeholder="0.00" aria-describedby="sizing-addon1" readonly="true">
					</div>
	            </div>
	            <div id="resultado">
	            	
	            </div>    
	        </div>   
	        <div class="panel-footer">
	            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> GUARDAR</button>
	            <a href="<?php echo base_url() ?>index.php/pagosencampo/cerrarsesion" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-ok"></span> Cerrar Session</a>
	        </div>
	    </div>
	</form>
	<table class="table table-striped" style="background:grey">
		<tr>
			<th>NRO</th>
			<th>iddesembolso</th>
			<th>Cliente</th>
			<th>Monto Pagado</th>
			<th>Fecha Hora</th>
			<th>Accion</th>
		</tr>
		<?php $suma=0; $i=0; foreach ($registros as $row) { $i++; ?>
		<tr>
			<td><?= $i ?></td>
			<th><?= $row['iddesembolso'] ?></th>
			<th><?= $row['cliente'] ?></th>
			<th><?= $row['montopagado']; $suma+=$row['montopagado'] ?></th>
			<th><?= $row['fecha_hora_reg'] ?></th>
			<td><a href="<?= base_url() ?>index.php/pagosencampo/eliminarpago/<?= $row['id'] ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
		</tr>
		<?php } ?>
		<tr>
			<th colspan="3">TOTAL</th>
			<td><?= $suma ?></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	<form action="<?= base_url() ?>index.php/pagos/sincronizarpagoscmapo" method="POST">
<?php 
$saldoasesor=is_null($saldoasesorhoy['saldo']) ? 0 : $saldoasesorhoy['saldo'];
 ?>


		<input type="text" name="idasesor" value="<?= $this->session->userdata('idusuarioon') ?>">
		<input type="text" name="saldoasesor" value="<?= $saldoasesor ?>">
		<input type="text" name="totalpagado" value="<?= $suma ?>">
		<button type="submit" class="btn btn-success pull-right">Sincronizar</button>
	</form>
	
</div>