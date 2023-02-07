<div class="container">
	<form action="<?php echo base_url() ?>index.php/caja/regegdoco" class="form-horizontal" method="POST" onsubmit="return checkSubmit()">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">DEVOLUCION DOCO</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="montogasto" class="control-label col-md-2">MONTO</label>
					<div class="col-md-2">
						<input type="text" class="form-control numerosypunto" id="montogasto" name="montogasto" value="" placeholder="S/. 0.00" required>
					</div>
					<div class="col-md-offset-4 col-md-2">
						<button type="submit" class="btn btn-primary pull-right">Guardar</button>
					</div>
				</div>
				<div class="form-group">
					<label for="conceptogasto" class="control-label col-md-2">CONCEPTO</label>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon">EG. DOCO : </span>
							<textarea name="conceptogasto" id="conceptogasto" placeholder="Concepto" class="form-control" rows="2" required></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>