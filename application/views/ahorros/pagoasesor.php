<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">HABILITAR CUENTA ASESOR DOCO</h3>
		</div>
		<div class="panel-body">
	<form action="<?php echo base_url() ?>index.php/ahorros/grdsaldoasesor" class="form-horizontal" method="POST" onsubmit="return checkSubmit()">
		<div class="form-group">
			<div class="col-md-7">
				<div class="input-group">
					<span class="input-group-addon">ASESOR</span>
					<select name="idasesor" id="idasesor" class="form-control" required>
						<option value="">--SELECCIONE--</option>
						<?php foreach($asesores as $row) : ?>
							<option value="<?php echo $row['codusuario'] ?>"><?php echo $row['apenom'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input-group">
					<span class="input-group-addon">MONTO</span>
					<input type="text" name="montoasesor" class="form-control numerosypunto" placeholder="S/.0.00" value="" required>
				</div>
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-info">GUARDAR</button>
			</div>				
		</div>
		<h3><small>INGRESO EN CAJA POR ASESORES : </small>S/.<?php echo is_null($ingresocajaasesor) ? '0.00' : $ingresocajaasesor ?></h3>
	</form>
	<form action="<?php echo base_url() ?>index.php/ahorros/actualizarsaldos" name="actualizarsaldosasesor" method="POST">
		<h3>SALDO DE ASESORES EN EL SISTEMA DE PAGOS</h3>
		<table class="table table-striped">
			<tr>
				<th>CODUSUARIO</th>
				<th>DNI</th>
				<th width="30%">SALDO
				<?php if($this->session->userdata('tipouser')==3){ ?>
					<button type="submit" name="guardar" class="btn btn-success pull-right"><span class="glyphicon glyphicon-floppy-disk"></span></button>
				<?php } ?>
				</th>
			</tr>
			<?php 
			$total=0;
			foreach($pagoasesor as $row) : 
				$total=$total+(is_null($row['saldoahorros']) ? '0.00' : $row['saldoahorros']);
			?>
			<tr>
				<td><?php echo $row['codusuario'] ?></td>
				<td><?php echo $row['dni'] ?></td>
				<td>
					<div class="col-md-3">
						<a title="Ver Operaciones de Asesor" href="<?php echo base_url() ?>index.php/pagos/veroperacionesasesor/<?php echo $row['codusuario'] ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
					</div>
					<div class="input-group col-md-8">
						<span class="input-group-addon">S/. </span>
						<input type="text" class="form-control numerosypunto" name="saldoasesor[<?php echo $row['codusuario'] ?>][saldo]" value="<?php echo (is_null($row['saldoahorros']) ? '0.00' : $row['saldoahorros']) ?>">
						<input type="hidden" name="saldoasesor[<?php echo $row['codusuario'] ?>][id]" value="<?php echo $row['codusuario'] ?>">
					</div>
				</td>	
			</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="2"></td>
				<td align="center"><h4>S/.<?php echo number_format($total,2) ?></h4></td>
			</tr>
		</table>
	</form>
		</div>
	</div>
</div>

