<div class="container">
	<form action="<?php echo base_url() ?>index.php/inicio/cambiarclave" class="form-horizontal" method="POST">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">CAMBIAR CLAVE</h3>		
			</div>
			<div class="panel-body">

					<div class="form-group">
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-addon">Clave</span>
								<input type="password" class="form-control" name="claveusuario" placeholder="Clave" required="required">
							</div>
						</div>
						<div class="col-md-4">

						</div>
						<div class="col-md-4">

						</div>									
					</div>
					<div class="form-group">
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-addon">Nueva Clave</span>
								<input type="password" class="form-control" name="nuevaclave" id="nuevaclave" placeholder="Nueva Clave" required="required">
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-addon">Confirmar Clave</span>
								<input type="password" class="form-control" name="confirmclave" id="confirmclave" placeholder="Nueva Clave" required="required">
							</div>
						</div>					
					</div>

			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</form>	

</div>

<script type="text/javascript">
var password = document.getElementById("nuevaclave")
  , confirm_password = document.getElementById("confirmclave");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Claves no son Iguales");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>






