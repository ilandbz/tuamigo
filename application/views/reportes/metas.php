<div class="container">
<br>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>AVANCE POR ASESOR</h4>
		</div>
		<div class="panel-body">
			<form action="<?= base_url() ?>index.php/asesor/registrarmeta" class="form-horizontal" method="POST">
				<h3>REGISTRAR META</h3>
				<div class="form-group">
					<label class="control-label col-md-1">ASESOR</label>
					<div class="col-md-3">
						<select name="asesor" class="form-control" required="true">
						<?php foreach($asesores as $row){ ?>
							<option value="<?= $row['codusuario'] ?>"><?= $row['apenom'] ?></option>
						<?php } ?>
						</select>			
					</div>
					<label class="control-label col-md-1">CARTERA</label>
					<div class="col-md-2">
						<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">S/.</span>
						  <input type="text" name="cartera" class="form-control" placeholder="0.00" required="true">
						</div>
					</div>
					<label class="control-label col-md-1">CLIENTES</label>
					<div class="col-md-1">
						<input type="number" name="clientes" class="form-control" value="1" required="true">			
					</div>
					<label class="control-label col-md-1">DESEMB.</label>
					<div class="col-md-2">
						<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">S/.</span>
						  <input type="text" name="desembolso" class="form-control" placeholder="0.00" required="true">
						</div>			
					</div>	
				</div>
				<div class="form-group">
					<label class="control-label col-md-1">MORA</label>
					<div class="col-md-2">
						<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">S/.</span>
						  <input type="text" name="saldoxmora" class="form-control" placeholder="0.00" required="true">
						</div>			
					</div>
					<label class="control-label col-md-1">NUEVOS</label>
					<div class="col-md-2">
						<input type="number" name="clientesnuevos" class="form-control" value="1" required="true">
					</div>				
					<div class="col-md-2">
						<button type="submit" class="btn btn-primary" id="registrarmeta">Registrar Meta</button>
					</div>
				</div>
			</form>
			<br>
			<form class="" action="<?= base_url() ?>index.php/asesor/guardarlogros" method="POST">
			<div class="bg-info">
				<h3>METAS POR ASESOR</h3>
				<table class="table table-bordered table-striped table-hover">
					<tr class="">
						<th>IDASESOR</th>
						<th>CARTERA</th>
						<th>CLIENTES</th>
						<th>DESEMBOLSO</th>
						<th>SALDO POR MORA >=8</th>
						<th>NUEVOS</th>
					</tr>
					<?php
					$carterat=0;
					$clientes=0;
					$montodest=0;
					$saldoxmora=0;
					$nuevos=0;
					$i=0;
					foreach($registros as $row){ 
					$saldocapital=is_null($row['saldocapital']) ? 0 : round($row['saldocapital'],2);
					$clientes+=$row['solicitudes'];
					$carterat+=$saldocapital;
					$montodest+=is_null($row['montod']) ? 0 : round($row['montod'],2);
					$saldoxmora+=is_null($row['saldoxmora']) ? 0 : round($row['saldoxmora'],2);
					$nuevos+=is_null($row['nuevos']) ? 0 : $row['nuevos'];
					 ?>
					 <input type="hidden" name="logros[<?= $i ?>][codasesor]" value="<?= $row['idasesor'] ?>">
					 <input type="hidden" name="logros[<?= $i ?>][cartera]" value="<?= $saldocapital ?>">
					 <input type="hidden" name="logros[<?= $i ?>][clientes]" value="<?= $row['solicitudes'] ?>">
					 <input type="hidden" name="logros[<?= $i ?>][desembolsados]" value="<?= $row['montod'] ?>">
					 <input type="hidden" name="logros[<?= $i ?>][saldomora]" value="<?= $row['saldoxmora'] ?>">
					 <input type="hidden" name="logros[<?= $i ?>][clientenuevos]" value="<?= 0 //siempre va ser cero ?>">
					 <input type="hidden" name="logros[<?= $i ?>][tipo]" value="LOGRO">
					 <input type="hidden" name="logros[<?= $i ?>][fecharegistro]" value="<?= date('Y-m-d') ?>"> 
					<tr>
						<td><a title="Ver Logros" href="<?= base_url() ?>index.php/asesor/logroasesor/<?= $row['idasesor'] ?>" class=""><?= $row['idasesor'] ?></a></td>
						<td>S/.<?= $saldocapital ?></td>
						<td><?= $row['solicitudes'] ?></td>
						<td>S/.<?= is_null($row['montod']) ? 0 : round($row['montod'],2) ?></td>
						<td>S/.<?= is_null($row['saldoxmora']) ? 0 : round($row['saldoxmora'],2) ?></td>
						<td><?= is_null($row['nuevos']) ? 0 : $row['nuevos'] ?></td>
					</tr>
					<?php $i++; } ?>
					<tr>
						<th>TOTAL</th>
						<td>S/.<?= $carterat ?></td>
						<td><?= $clientes ?></td>
						<td>S/.<?= $montodest ?></td>
						<td>S/.<?= $saldoxmora ?></td>
						<td><?= $nuevos ?></td>
					</tr>
				</table>
				<input type="hidden" name="fecha" value="<?= date('Y-m-d') ?>" class="form-control">
			</div>
			<div class="panel-footer">

				<button type="submit" class="btn btn-primary">Guardar Logros</button>
			</div>
			</form>
		</div>

	</div>


	
</div>





