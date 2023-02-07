    <label for="ruc" class="control-label col-md-1">RUC</label>
    <div class="col-md-2">
        <input class="form-control solo_numeros input-xs" id="ruc" name="ruc" maxlength="11" placeholder="RUC" type="text" />
    </div> 
    <label for="sexo" class="control-label col-md-1">SEXO :</label>
    <div class="col-md-2">
        <label class="radio-inline"><input type="radio" value="M" name="sexo" checked>Hombre</label>
        <label class="radio-inline"><input type="radio" value="F" name="sexo">Mujer</label>
    </div>
    <label for="fecha_nac" class="control-label col-md-1">FECHA NAC</label>
    <div class="col-md-2">
        <input class="form-control input-xs" type="date" name="fecha_nac" id="fecha_nac" required>
    </div>
</div>
<div class="form-group">
    <label for="nombres" class="control-label col-md-1">NOMBRES</label>
    <div class="col-md-2">
        <input class="form-control mayuscula input-xs" id="nombres" name="nombres" maxlength="20" placeholder="Nombres" onkeyup="mayus(this);" type="text" required/>
    </div>
    <label for="apellidos" class="control-label col-md-1">Ape. Paterno</label>
    <div class="col-md-2">
        <input class="form-control mayuscula input-xs" id="apellidos" name="apellidos" maxlength="20" placeholder="Apellido Paterno" onkeyup="mayus(this);" type="text" required/>
    </div>
    <label for="apellidos2" class="control-label col-md-1">Ape. Materno</label>
    <div class="col-md-2">
        <input class="form-control mayuscula input-xs" id="apellidos2" maxlength="20" name="apellidos2" placeholder="Apellido Materno" onkeyup="mayus(this);" type="text" required/>
    </div> 
    <label for="estadociv" class="control-label col-md-1">Estado Civil</label>
    <div class="col-md-2">
        <select name="estadociv" id="estadociv" class="form-control input-xs">
            <option value="Soltero">Soltero</option>
            <option value="Casado">Casado</option>
            <option value="Conviviente">Conviviente</option>
            <option value="Viudo">Viudo</option>
            <option value="Divorciado">Divorciado</option>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a data-toggle="modal" title="Ver Conyugue" href="#formregconyugue" id="verconyugue" style="display: none;" class="">Ver</a>
        <input id="dni_conyugue2" name="dni_conyugue2" placeholder="DNI" type="hidden" maxlength="8" />
    </div> 
</div>
<p class="alert-info">NACIMIENTO</p>
<div class="form-group">
    <label for="departamento_nac" class="control-label col-md-1">Departamento</label>
    <div class="col-md-2">
        <select name="departamento_nac" id="departamento_nac" class="form-control input-xs">
            <?php foreach($departamentos as $row): ?>
            <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == '10') ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
     <label for="provincia_nac" class="control-label col-md-1">Provincia</label>
    <div class="col-md-2">
        <select name="provincia_nac" id="provincia_nac" class="form-control input-xs">
            <?php foreach($provincias as $row): ?>
            <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == '186') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <label for="distrito_nac" class="control-label col-md-1">Distrito</label>
    <div class="col-md-2">
        <select name="distrito_nac" id="distrito_nac" class="form-control input-xs" required>
            <?php foreach($distritos as $row): ?>
            <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == '0831') ? 'selected="true"' : ''; ?>><?php echo substr($row['nombre'], 0,20) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <label for="nacionalidadc" class="control-label col-md-1">Nacionalidad</label>
    <div class="col-md-2">
        <input class="form-control input-xs" type="text" name="nacionalidadc" id="nacionalidadc" value="PERUANO">
    </div>                 
</div>
<p class="alert-info">DOMICILIO Y CONTACTO</p>
<div class="form-group">
    <label for="tipovivienda" class="control-label col-md-1">Tipo</label>
    <div class="col-md-2">
        <select name="tipovivienda" id="tipovivienda" class="form-control input-xs" required>
            <option value="">Seleccione</option>
            <option value="Familiar">Familiar</option>
            <option value="Propia">Propia</option>
            <option value="Alquilada">Alquilada</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="departamento_domic" class="control-label col-md-1">Departamento</label>
    <div class="col-md-2">
        <select name="departamento_domic" id="departamento_domic" class="form-control input-xs">
            <?php foreach($departamentos as $row): ?>
            <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == '10') ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <label for="provincia_domic" class="control-label col-md-1">Provincia</label>
    <div class="col-md-2">
        <select name="provincia_domic" id="provincia_domic" class="form-control input-xs">
            <?php foreach($provincias as $row): ?>
            <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == '186') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <label for="distrito_domic" class="control-label col-md-1">Distrito</label>
    <div class="col-md-2">
        <select name="distrito_domic" id="distrito_domic" class="form-control input-xs" required>
            <?php foreach($distritos as $row): ?>
            <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == '0831') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>        
<div class="form-group">
    <label for="tipovia" class="control-label col-md-1">Tipo de Via</label>
    <div class="col-md-5" align="right">
        <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Avenida" checked="true">Avenida</label>
        <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Jiron">Jiron</label>
        <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Calle">Calle</label>
        <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Pasaje">Pasaje</label>
        <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Prolongacion">Prolongacion</label>
        <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Otro">Otro</label>&nbsp;
    </div>                
    <div class="col-md-2">
        <input type="text" class="form-control input-xs" name="otrotipovia" placeholder="Otro tipo de via">                
    </div>
    <label for="nombrevia" class="control-label col-md-1">Nombre Via</label>
    <div class="col-md-3">
        <input type="text" class="form-control input-xs" name="nombrevia" id="nombrevia" placeholder="Via">
    </div>
</div>
<div class="form-group">
    <label for="" class="control-label col-md-1">Inmueble</label>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-3">
                <div class="input-group input-group-xs">
                    <span class="input-group-addon">Nro</span>
                    <input type="text" class="form-control" name="Nro_dom" placeholder="S/N">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group input-group-xs">
                    <span class="input-group-addon">Interior</span>
                    <input type="text" class="form-control" placeholder="S/N" name="interior_dom">
                </div>
            </div>
            <div class="col-md-3">   
                <div class="input-group input-group-xs">
                    <span class="input-group-addon">Mz</span>
                    <input type="text" class="form-control" placeholder="MZ" name="mz_dom">
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="input-group input-group-xs">
                    <span class="input-group-addon">Lote</span>
                    <input type="text" class="form-control" placeholder="Lt" name="lote_dom">
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="" class="control-label col-md-1">Tipo de Zona</label>
    <div class="col-md-5" align="right">
        <label class="radio-inline control-label"><input name="tipozona" type="radio" value="Urbanizacion" checked="true">Urbanizacion</label>
        <label class="radio-inline control-label"><input name="tipozona" type="radio" value="Asentamiento Humano">Asentamiento Humano</label>
        <label class="radio-inline control-label"><input name="tipozona" type="radio" value="Cooperativa">Cooperativa</label>
        <label class="radio-inline control-label"><input name="tipozona" type="radio" value="PP.JJ.">PP.JJ.</label>
        <label class="radio-inline control-label"><input name="tipozona" type="radio" value="Otro">Otro</label>
    </div>
    <div class="col-md-2">
        <input type="text" class="form-control input-xs" name="otrotipozona" placeholder="Otro Tipo de Zona">                
    </div>
    <label for="nombrezona" class="control-label col-md-1">Nombre</label>
    <div class="col-md-3">
        <input type="text" class="form-control input-xs" name="nombrezona" id="nombrezona" placeholder="Zona">
    </div>                 
</div>
<div class="form-group">
    <label for="referencia" class="control-label col-md-1">Referencia: </label>
    <div class="col-md-6">
        <input type="text" class="form-control input-xs" name="referencia" id="referencia" placeholder="Referencia">
    </div>
</div>
<div class="form-group">
    <label for="telefono" class="control-label col-md-1">Telefono/Cel</label>
    <div class="col-md-2">
        <input class="form-control solo_numeros input-xs" id="telefono" name="telefono" placeholder="Telefono" maxlength="9" type="text" required/>
    </div> 
    <label for="email" class="control-label col-md-1">Email</label>
    <div class="col-md-3">
        <input class="form-control input-xs" id="email" name="email" placeholder="Email" type="email" value="    " />
    </div>
</div>
