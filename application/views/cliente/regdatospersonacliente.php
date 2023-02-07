<input type="hidden" name="codcliente" id="codcliente" value="">
<div class="form-group">
    <label for="dni" class="control-label col-md-1">DNI</label>
    <div class="col-md-2" >
        <input class="form-control solo_numeros cargarsiexistedni input-xs" id="dni" name="dni" placeholder="DNI" type="text" maxlength="8" required />
        <input type="hidden" name="tipo" value="CREDITO">
    </div>
<?php $this->view('persona/formregpersonagral'); //datos persona generales ?>
<p class="alert-info">TRABAJO</p>
<div class="form-group">
    <label class="control-label col-md-1">Tipo</label>
    <div class="col-md-3">
        <label class="radio-inline"><input name="tipotrabajadorc" id="tipotrabdepend" type="radio" value="DEPENDIENTE" checked="true">Dependiente</label>
        <label class="radio-inline"><input name="tipotrabajadorc" type="radio" value="INDEPENDIENTE">Independiente</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a data-toggle="modal" href="#formregnegocio" id="vernegocio" style="display: none; font-size: 10px;">Ver Negocio</a>
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
<p class="alert-info">OTROS</p>
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
            <option value="Administración de Empresas">Administración de Empresas</option>
            <option value="Ingeniería Industrial">Ingeniería Industrial</option>
            <option value="Ingenieria de Sistemas">Ingenieria de Sistemas</option>                    
            <option value="Contabilidad">Contabilidad</option>
            <option value="Economía">Economía</option>
            <option value="Administración de Negocios Internacionales">Administración de Negocios Internacionales</option>
            <option value="Derecho">Derecho</option>
            <option value="Ciencias de la Comunicación">Ciencias de la Comunicación</option>                  
            <option value="Marketing">Marketing</option>
            <option value="Psicología">Psicología</option>
            <option value="Licenciatura">Licenciatura</option>
            <option value="Otros">Otros</option>                    
        </select>
    </div>
    <label class="control-label col-md-1">Aval</label>
    <div class="col-md-2">
        <label class="radio-inline control-label"><input name="poseeaval" type="radio" value="SI">SI</label>
        <label class="radio-inline control-label"><input id="avalno" name="poseeaval" type="radio" value="NO" checked="true">NO</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a data-toggle="modal" href="#formregaval" id="veraval" style="display: none; font-size: 10px;" class="">Ver Aval</a>      
    </div>
    <input id="dni_aval2" name="dni_aval2" placeholder="DNI" type="hidden" maxlength="8" />                       
</div>
