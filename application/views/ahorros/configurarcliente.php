<form id="configurarcliente" action="<?php echo base_url() ?>index.php/cliente/guardarconfigurarcliente" method="post" class="form-horizontal" role="form">
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">CONFIGURAR CLIENTE DOCO</h3>
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
                <div class="col-md-2">
                    <input type="hidden" name="codcliente" id="codcliente" value="<?php echo $cliente['codcliente'] ?>">
                </div>
                <div class="col-md-2">
                 <input type="hidden" id="dni_aval2" name="dni_aval2" value="">
                </div>
                <div class="col-md-1">

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
</form>