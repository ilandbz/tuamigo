<div class="container-fluid">
	<form action="<?php echo base_url() ?>index.php/inicio/registrarip" class="form-horizontal" method="POST" name="cuadrarcaja">
	<div class="form-group">
		<h3><small>IP HUANUCO: </small><?= $iphuanuco ?></h3>
		<h3><small>IP HUANUCO2: </small><?= $iphuanuco2 ?></h3>
		<h3><small>IP TINGO MARIA: </small><?= $iptingo ?></h3>

	</div>
		<div class="form-group">
			<div class="col-md-3">
				<div class="input-group">
					<span class="input-group-addon">AGENCIA</span>
					<select name="agencia" id="agencia" class="form-control">
						<option value="HUANUCO" <?php echo $this->session->userdata('agencia')=='HUANUCO' ? 'selected="selected"' : '' ?>>HUANUCO</option>
						<option value="HUANUCO2" <?php echo $this->session->userdata('agencia')=='HUANUCO2' ? 'selected="selected"' : '' ?>>HUANUCO2</option>
						<option value="TINGO MARIA" <?php echo $this->session->userdata('agencia')=='TINGO MARIA' ? 'selected="selected"' : '' ?>>TINGO MARIA</option>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input-group">
					<span class="input-group-addon">IP</span>
					<input type="" class="form-control" name="ip">
				</div>
			</div>
			<div class="col-md-3">
				<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-check"></span>&nbsp;Registrar</button>	
			</div>
		</div>
	</form>
</div>