<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
		  	SOLICITUD&nbsp;<?php echo $solicitud['idsolicitud'] ?>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-2">
					<h4><small>IDSOLICITUD : </small><?php echo $solicitud['idsolicitud'] ?></h4>
                    <input type="hidden" name="idsolicitud" value="<?php echo $solicitud['idsolicitud'] ?>">
				</div>
				<div class="col-md-3">
					<h4><small>COD CLIENTE : </small><a href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $solicitud['codcliente'] ?>"><?php echo $solicitud['codcliente'] ?></a></h4>
				</div>
				<div class="col-md-7">
					<h4><small>APELLIDOS Y NOMBRES : </small><?php echo $solicitud['apenom'] ?>&nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $solicitud['codcliente'] ?>" class="text-info"><span class="glyphicon glyphicon-eye-open"></span></a></h4>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
					<h4><small>ESTADO : </small><?php echo $solicitud['estado'] ?></h4>
				</div>
				<div class="col-md-4">
					<h4><small>PRODUCTO : </small><?php echo $solicitud['producto'] ?></h4>
				</div>
				<div class="col-md-4">
					<h4><small>TIPO PLAZO : </small><?php echo $solicitud['tipoplazo'] ?></h4>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
					<h4><small>MONTO : </small>S/. <?php echo $solicitud['monto'] ?></h4>
				</div>
				<div class="col-md-4">
					<h4><small>SALDO : </small>S/. <?php echo isset($pagodesembolso['saldo']) ? $pagodesembolso['saldo'] : '0.00' ?></h4>
				</div>
				<div class="col-md-4">
					<h4><small>DIAS MORA : </small><?php echo isset($pagodesembolso['moradias']) ? $pagodesembolso['moradias'] : 0 ?></h4>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
					<h4><small>DNI : </small><?php echo $solicitud['dni'] ?></h4>
				</div>
				<div class="col-md-4">
					<h4><small>TIPO : </small><?php echo $solicitud['tipo'] ?></h4>
				</div>
				<div class="col-md-4">
					<h4><small>IDASESOR : </small><?php echo $solicitud['idasesor'] ?>&nbsp;&nbsp;
                    <?php if($this->session->userdata('tipouser')==1){ ?>
                        <a href="#formcambasesor" data-toggle="modal" title="Modificar" class="text-info"><span class="glyphicon glyphicon-pencil"></span></a>
                    <?php } ?>
                    </h4>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
					<h4><small>OBSERVACION : </small><?php echo ($observacion['descripcion']=='') ? 'NINGUNO' : ''; ?></h4>
				</div>					
			</div>
		    <div class="form-group">
		    	<div class="col-md-12">
		    		<a href="<?php echo base_url() ?>index.php/solicitud/solicitudpdf/<?php echo $solicitud['idsolicitud'] ?>" target="_blank" class="btn btn-info btn-sm">SOLICITUD <span class="glyphicon glyphicon-print"></span></a>
		    		<a href="<?php echo base_url(); ?>index.php/solicitud/estadosfinancieros/<?php echo $solicitud['idsolicitud']; ?>" target="_blank" class="btn btn-info btn-sm">ESTADOS FINANCIEROS <span class="glyphicon glyphicon-print"></span></a>
		    	</div>
		    </div>
		</div>
	</div>
</div>
<div class="modal fade form-horizontal" tabindex="-1" role="dialog" id="formcambasesor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-xs-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModal-title">CAMBIAR ASESOR</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="fecha_nac_conyugue" class="control-label col-md-3">ASESOR</label>
                    <div class="col-md-5">
                        <select name="idasesor" id="idasesor" class="form-control">
                            <?php foreach ($asesores as $fila) { ?>
                                <option value="<?php echo $fila['codusuario'] ?>" <?php echo $fila['codusuario']==$solicitud['idasesor'] ? 'selected="selected"' : '' ?>><?php echo $fila['codusuario'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" name="guardarasesor" id="guardarasesor">Guardar</button>
            </div>
        </div>
    </div>
</div>