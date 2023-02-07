<form id="configurarcliente" action="<?php echo base_url() ?>index.php/cliente/guardarconfigurarcliente" method="post" class="form-horizontal" role="form">
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">CONFIGURAR CLIENTE</h3>
        </div>
        <div class="panel-body">
            <h2><small>APELLIDOS Y NOMBRES : </small> <?php echo $cliente['apenom'] ?></h2>
            <br>
            <div class="form-group">
                <label for="usuario" class="control-label col-md-2">USUARIO/ASESOR</label>
                <div class="col-md-2">
                    <select name="usuario" id="usuario" class="form-control">
                        <?php if(count($usuarios)>0){ foreach ($usuarios as $row) { ?>
                            <option value="<?php echo $row['codusuario'] ?>" <?php echo ($row['codusuario'] == $cliente['idusuario']) ? 'selected="true"' : ''; ?>><?php echo $row['codusuario'] ?></option>
                        <?php } }else{ ?>
                            <option value="<?php echo $cliente['idusuario'] ?>"><?php echo $cliente['idusuario'] ?></option>   
                        <?php } ?>
                    </select>
                </div>
                <label for="usuario" class="control-label col-md-2"><span class="align-text-bottom"><?php echo $cliente['negocios']; ?></span>&nbsp;NEGOCIO(S)</label>
                <div class="col-md-2">
                    <input type="hidden" name="codcliente" id="codcliente" value="<?php echo $cliente['codcliente'] ?>">
                    <a href="<?php echo base_url() ?>index.php/cliente/vernegocios/<?php echo $cliente['codcliente'] ?>" class="btn btn-link" title="Ver"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;
                    <a data-toggle="modal" href="#formregnegocio" class="btn btn-link" title="Agregar"><span class="glyphicon glyphicon-plus"></span></a>
                </div>
                <label for="usuario" class="control-label col-md-1">AVAL</label>
                <div class="col-md-2">
                    <?php if(!is_null($cliente['dniaval'])){ ?>
                        <h5>DNI :<?php echo $cliente['dniaval'] ?></h5>
                    <?php }else{ ?>
                        <h5>NO TIENE</h5>
                    <?php } ?>
                </div>
                <input type="hidden" id="dni_aval2" name="dni_aval2" value="">
                <div class="col-md-1">
                <?php if(is_null($cliente['dniaval'])){ ?>
                    <a data-toggle="modal" href="#formregaval" onclick="cargardatosaval('<?php echo $cliente['dniaval'] ?>');" id="veraval" class="btn btn-link" title="Agregar"><span class="glyphicon glyphicon-plus"></span></a>
                <?php }else{ ?>
                    <a data-toggle="modal" href="#formregaval" onclick="cargardatosaval('<?php echo $cliente['dniaval'] ?>');" id="veraval" class="btn btn-link" title="Ver"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;
                    <a href="<?php echo base_url() ?>index.php/cliente/eliminaraval/<?php echo $cliente['codcliente'] ?>" class="text-danger eliminar" title="Eliminar Aval"><span class="glyphicon glyphicon-remove"></span></a>
                <?php } ?>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <input type="submit" class="btn btn-primary" value="GUARDAR">
                        <input type="reset" class="btn btn-default" value="LIMPIAR">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- NEGOCIO INICIO -->
<?php $this->view($negocioview); ?>
<!--NEGOCIO FIN -->
</form>

<!--AVAL INICIO -->
<?php $this->view($avalview); ?>
<!--AVAL FIN -->