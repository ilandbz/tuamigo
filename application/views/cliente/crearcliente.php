<form id="crearclienteform" action="<?php echo base_url() ?>index.php/cliente/guardar_nuevcliente" method="post" class="form-horizontal" role="form">
<div id="contenidocrearcliente" class="container" style="font-size: 10px;">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">REGISTRO DE CLIENTE</h3>
    </div>
    <div class="panel-body">
    <?php $this->view('cliente/regdatospersonacliente'); ?>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary" value="REGISTRAR">
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
<!--CONYUGUE INICIO -->
<?php $this->view($conyugueview); ?>
<!-- CONYUGUE FIN -->
<!--AVAL INICIO -->
<?php $this->view($avalview); ?>
<!--AVAL FIN -->


