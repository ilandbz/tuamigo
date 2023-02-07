<form id="crearclienteform" action="<?php echo base_url() ?>index.php/ahorros/registrarcliente" method="post" class="form-horizontal" role="form">
    <div id="contenidocrearcliente" class="container" style="font-size: 10px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">REGISTRO DE CLIENTE DE AHORROS</h3>
        </div>
        <div class="panel-body">
            <input type="hidden" name="codcliente" id="codcliente" value="">
            <div class="form-group">
                <label for="dni" class="control-label col-md-1">DNI</label>
                <div class="col-md-2" >
                    <input class="form-control solo_numeros input-xs cargarsiexistedni" id="dni" name="dni" placeholder="DNI" type="text" maxlength="8" required />
                    <input type="hidden" name="tipo" value="AHORROS">
                </div>
            <?php $this->view('persona/formregpersonagral'); //datos persona generales ?>
            <div class="form-group">
                <label for="nombres" class="control-label col-md-1">ASESOR</label>
                <div class="col-md-2">
                    <select name="asesor" id="asesor" class="form-control input-xs" required="true">
                        <option value="">--SELECCIONE--</option>        
                        <?php foreach($usuarios as $row){ ?>
                        <option value="<?php echo $row['codusuario'] ?>"><?php echo $row['codusuario'] ?></option>
                        <?php } ?>
                    </select>                    
                </div>
            </div>
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
</form>
