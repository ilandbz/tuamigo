<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">PERFIL DE USUARIO</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<h4><small>IDUSUARIO : </small><?php echo $usuario['codusuario'] ?></h4>
				</div>
				<div class="col-md-8">
					<h4><small>APELLIDOS Y NOMBRES : </small><?php echo $usuario['apenom'] ?></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<h4><small>DNI : </small><?php echo $usuario['dni'] ?></h4>
				</div>
				<div class="col-md-2">
					<h4><small>SEXO : </small><?php echo $usuario['sexo'] ?></h4>
				</div>
				<div class="col-md-2">
					<h4><small>EDAD : </small><?php echo $edad ?></h4>
				</div>
				<div class="col-md-3">
					<h4><small>ESTADO CIVIL : </small><?php echo $usuario['estadocivil'] ?></h4>
				</div>
				<div class="col-md-3">
					<h4><small>NACIONALIDAD : </small><?php echo $usuario['nacionalidad'] ?></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<h4><small>CELULAR : </small><?php echo $usuario['celular'] ?></h4>
				</div>
				<div class="col-md-4">
					<h4><small>EMAIL : </small><?php echo $usuario['email'] ?></h4>
				</div>
				<div class="col-md-4">
					<h4><small>TIPO : </small><?php 
					if($usuario['tipo']==2){
						echo 'Asesor Financiero';
					}elseif($usuario['tipo']==3){
						echo 'Operaciones';
					}else{
						echo 'Gerente';
						} ?>
					</h4>
				</div>					
			</div>	
			<div class="row">
				<div class="col-md-12">
					<h4><small>DOMICILIO : </small><?php echo $personausuario['tipovia'] ?>&nbsp;<?php echo $personausuario['nombrevia'] ?>&nbsp;Nro : <?php echo $personausuario['Nro'] ?>&nbsp;Interior : <?php echo $personausuario['interior'] ?>&nbsp;Mz. : <?php echo $personausuario['mz'] ?>&nbsp;Lote : <?php echo $personausuario['lote'] ?>&nbsp;<?php echo $personausuario['tipozona'] ?> : <?php echo $personausuario['nombrezona'] ?>&nbsp;REF : <?php echo $personausuario['referencia'] ?></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<a href="<?php echo base_url() ?>index.php/inicio/actualizarusuarioform/<?php echo $usuario['codusuario'] ?>" class="btn btn-primary">MODIFICAR <span class="glyphicon glyphicon-pencil"></span></a>
					<a href="<?php echo base_url() ?>index.php/inicio/cambclaveform" class="btn btn-danger pull-right">CAMBIAR CLAVE <span class="glyphicon glyphicon-cog"></span></a>					
				</div>
				<div class="col-md-4">

				</div>				
			</div>
		</div>
	</div>
</div>
