<form id="crearclienteform" action="<?php echo base_url() ?>index.php/cliente/registrarpersona" method="post" class="form-horizontal" role="form">
<div id="contenidocrearpersona" class="container" style="font-size: 10px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">REGISTRO DE PERSONA</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="dni" class="control-label col-md-1">DNI</label>
                <div class="col-md-2" >
                    <input class="form-control solo_numeros input-xs siexistepersona" id="dni" name="dni" placeholder="DNI" type="text" maxlength="8" required />
                </div>
            <?php $this->view('persona/formregpersonagral'); //datos persona generales ?>
            <p class="alert-info">TRABAJO</p>
            <div class="form-group">
                <label class="control-label col-md-1">Tipo</label>
                <div class="col-md-3">
                    <label class="radio-inline"><input name="tipotrabajadorc" id="tipotrabdepend" type="radio" value="DEPENDIENTE" checked="true">Dependiente</label>
                    <label class="radio-inline"><input name="tipotrabajadorc" type="radio" value="INDEPENDIENTE">Independiente</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div> 
                <label for="ocupacionc" class="control-label col-md-1">Ocupacion</label>
                <div class="col-md-3">
                    <select name="ocupacionc" id="ocupacionc" class="form-control input-xs">
                        <option value="Ninguno">--SELECCIONE--</option>
                        <option value="Chofer">Chofer</option>
                        <option value="Profesor">Profesor</option>
                        <option value="Contador Publico">Contador Publico</option>
                        <option value="Analista">Analista</option>
                        <option value="Ingenieria de Sistemas">Ingenieria de Sistemas</option>
                        <option value="Vendedor">Vendedor</option>
                        <option value="Obrero">Obrero</option> 
                        <option value="Asesor de Negocios">Asesor de Negocios</option> 
                        <option value="Otros">Otros</option> 
                        <option value="Ninguno">Ninguno</option>
                    </select>
                </div>
                <label for="instituciontrabajo" class="control-label col-md-1">Institucion</label>
                <div class="col-md-2">
                    <input type="text" class="form-control input-xs" value="" name="instituciontrabajo" id="instituciontrabajo">
                </div>
            </div>
            <p class="alert-info">INSTRUCCION</p>        
            <div class="form-group">
                <label for="grado_inst" class="control-label col-md-1">Grado Instruccion</label>
                <div class="col-md-3">
                    <select name="grado_inst" id="grado_inst" class="form-control input-xs" required>
                        <option value="">SELECCIONE</option>
                        <option value="Primaria Incompleta">Sin Estudio</option>
                        <option value="Primaria Incompleta">Primaria Incompleta</option>
                        <option value="Primaria Completa">Primaria Completa</option>
                        <option value="Secundaria Incompleta">Secundaria Incompleta</option>
                        <option value="Secundaria Completa">Secundaria Completa</option>
                        <option value="Superior Incompleta">Superior Incompleta</option>
                        <option value="Superior Completa">Superior Completa</option>
                    </select>
                </div> 
                <label for="profesionc" class="control-label col-md-1">Profesion</label>
                <div class="col-md-4">
                    <select name="profesionc" id="profesionc" class="form-control input-xs" disabled>
                        <option value="">--SELECCIONE--</option>
                        <option value="Administraci??n de Empresas">Administraci??n de Empresas</option>
                        <option value="Ingenier??a Industrial">Ingenier??a Industrial</option>
                        <option value="Ingenieria de Sistemas">Ingenieria de Sistemas</option>                    
                        <option value="Contabilidad">Contabilidad</option>
                        <option value="Econom??a">Econom??a</option>
                        <option value="Administraci??n de Negocios Internacionales">Administraci??n de Negocios Internacionales</option>
                        <option value="Derecho">Derecho</option>
                        <option value="Ciencias de la Comunicaci??n">Ciencias de la Comunicaci??n</option>                  
                        <option value="Marketing">Marketing</option>
                        <option value="Psicolog??a">Psicolog??a</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Otros">Otros</option>                    
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
<!--CONYUGUE INICIO -->
<?php $this->view($conyugueview); ?>
<!-- CONYUGUE FIN -->


