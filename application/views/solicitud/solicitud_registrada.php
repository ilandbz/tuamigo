<div class="container">
	<div class="alert alert-success">

<div class="row">
	<div class="col-md-10">
		<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>	
		SOLICITUD REGISTRADO CON EXITO	
	</div>
	<div class="col-md-2">
<?php if($this->session->userdata('tipouser')==2){ ?>
		<a href="<?php echo base_url() ?>index.php/solicitud/form_evaluacion/<?php echo $solicitud['idsolicitud'] ?>" class="btn btn-block"><span class="glyphicon glyphicon-check"></span> Evaluar</a>
<?php } ?>
	</div>
</div>
	<div class="pull-right">
	</div>
	</div>
	<h3>IDSOLICITUD : <span class="label label-info"><?php echo $solicitud['idsolicitud'] ?></span></h3>

</div>