<div class="container-fluid">
    <form action="<?php echo base_url() ?>index.php/inicio/actualizarusuario" class="form-horizontal small input-sm" method="POST">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">ACTUALIZACION DE USUARIO</h3>
          </div>
          <div class="panel-body">
   <div class="form-group">
        <label for="sexo" class="control-label col-md-2">SEXO :</label>
        <div class="col-md-3">
            <select name="sexo" id="sexo" class="form-control">
                <option value="M" <?php echo $persona['sexo']=='M' ? 'selected="selected"' : '' ?>>Masculino</option>
                <option value="F" <?php echo $persona['sexo']=='F' ? 'selected="selected"' : '' ?>>Femenino</option>
            </select>
        </div>
        <label for="tipouser" class="control-label col-md-2">TIPO DE USUARIO :</label>
        <div class="col-md-3">
            <select name="tipouser" id="tipouser" class="form-control input-sm" required>
                <option value="2" <?php echo $usuario['tipo']=='2' ? 'selected="selected"' : '' ?>>ASESOR</option>
                <option value="3" <?php echo $usuario['tipo']=='3' ? 'selected="selected"' : '' ?>>OPERACIONES</option>
                <option value="4" <?php echo $usuario['tipo']=='4' ? 'selected="selected"' : '' ?>>COBRANZA</option>
                <option value="5" <?php echo $usuario['tipo']=='5' ? 'selected="selected"' : '' ?>>GERENTE AGENCIA</option>                
                <option value="6" <?php echo $usuario['tipo']=='6' ? 'selected="selected"' : '' ?>>OPERACIONES AGENCIA</option>
            </select>
        </div>  
    </div>
    <div class="form-group">
        <label for="dni" class="control-label col-md-2">DNI :</label>
        <div class="col-md-2">
            <input class="form-control solo_numeros dnisolicitud" id="dni" name="dni" placeholder="DNI" type="text" value="<?php echo $persona['dni'] ?>" maxlength="8" required autofocus />
            <input type="hidden" name="dniinicial" value="<?php echo $persona['dni'] ?>">
        </div>
        <label for="ruc" class="control-label col-md-1">RUC :</label>
        <div class="col-md-2">
            <input class="form-control solo_numeros" id="ruc" name="ruc" maxlength="11" placeholder="RUC" type="text" value="<?php echo $persona['ruc'] ?>" />
        </div> 
    </div>
    <div class="form-group">
        <label for="nombres" class="control-label col-md-2">NOMBRES :</label>
        <div class="col-md-4">
            <input class="form-control mayuscula" id="nombres" name="nombres" value="<?php echo $persona['nombres'] ?>" placeholder="Nombres" type="text" required autofocus />
        </div>
        <label for="apellidos" class="control-label col-md-2">AP. PAT :</label>
        <div class="col-md-4">
            <input class="form-control mayuscula" id="apellidos" name="apellidos" placeholder="Apellido Paterno" type="text" value="<?php echo $persona['apellidos'] ?>" required autofocus />
        </div>


        <label for="apellidos2" class="control-label col-md-1">AP. MAT :</label>
        <div class="col-md-2">
            <input class="form-control mayuscula" id="apellidos2" maxlength="25" name="apellidos2" placeholder="Apellido Materno" value="<?php echo $persona['apellidos2'] ?>" onkeypress="mayus(this);" type="text" required/>
        </div>

    </div>
    <div class="form-group">
        <label for="fecha_nac" class="control-label col-md-2">FECHA NAC :</label>
        <div class="col-md-4">
            <input class="form-control" type="date" name="fecha_nac" id="fecha_nac" value="<?php echo $persona['fecha_nac'] ?>">
        </div>
        <label for="departamento_nac" class="control-label col-md-2">DEPART. NAC:</label>
        <div class="col-md-4">
            <select name="departamento_nac" id="departamento_nac" class="form-control">
                <?php foreach($departamentos as $row): ?>
                <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == $persona['iddepartamento_nac']) ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>            
    </div>
    <div class="form-group">
        <label for="provincia_nac" class="control-label col-md-2">PROVINCIA NAC:</label>
        <div class="col-md-3">
            <select name="provincia_nac" id="provincia_nac" class="form-control">
                <?php foreach($provincias as $row): ?>
                <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == $persona['idprovincia_nac']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <label for="distrito_nac" class="control-label col-md-3">DISTRITO NAC:</label>
        <div class="col-md-4">
            <select name="distrito_nac" id="distrito_nac" class="form-control" required>
                <?php foreach($distritos as $row): ?>
                <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == $persona['distrito_nac']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>                            
    </div> 
    <div class="form-group">
        <label for="estadociv" class="control-label col-md-2">ESTADO CIVIL :</label>
        <div class="col-md-4">
            <select name="estadociv" id="estadociv" class="form-control">
                <option value="Soltero" <?php echo ('Soltero' == $persona['estadocivil']) ? 'selected="true"' : ''; ?>>Soltero</option>
                <option value="Casado" <?php echo ('Casado' == $persona['estadocivil']) ? 'selected="true"' : ''; ?>>Casado</option>
                <option value="Conviviente" <?php echo ('Conviviente' == $persona['estadocivil']) ? 'selected="true"' : ''; ?>>Conviviente</option>
                <option value="Viudo" <?php echo ('Viudo' == $persona['estadocivil']) ? 'selected="true"' : ''; ?>>Viudo</option>
                <option value="Divorciado" <?php echo ('Divorciado' == $persona['estadocivil']) ? 'selected="true"' : ''; ?>>Divorciado</option>
            </select>
        </div> 
        <label for="nacionalidad" class="control-label col-md-2">NACIONALIDAD</label>
        <div class="col-md-4">
            <input class="form-control" type="text" name="nacionalidad" id="nacionalidad" value="PERUANO">
        </div>
    </div>
    <div class="form-group">
        <label for="grado_instu" class="control-label col-md-2">GRADO DE INSTRUCCION :</label>
        <div class="col-md-4">
            <select name="grado_instu" id="grado_instu" class="form-control" required>
                <option value="Primaria Incompleta" <?php echo ('Primaria Incompleta' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Sin Estudio</option>
                <option value="Primaria Incompleta" <?php echo ('Primaria Incompleta' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Primaria Incompleta</option>
                <option value="Primaria Completa" <?php echo ('Primaria Completa' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Primaria Completa</option>
                <option value="Secundaria Incompleta" <?php echo ('Secundaria Incompleta' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Secundaria Incompleta</option>
                <option value="Secundaria Completa" <?php echo ('Secundaria Completa' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Secundaria Completa</option>
                <option value="Superior Incompleta" <?php echo ('Superior Incompleta' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Superior Incompleta</option>
                <option value="Superior Completa" <?php echo ('Superior Completa' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Superior Completa</option>
            </select>
        </div> 
        <label for="profesion" class="control-label col-md-2">PROFESION :</label>
        <div class="col-md-4">
            <select name="profesion" id="profesion" class="form-control" <?php echo ($persona['profesion'] == '') ? 'disabled' : '';?> >
                <option value="">--SELECCIONE--</option>
                    <option value="Administración de Empresas" <?php echo ('Administración de Empresas' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Administración de Empresas</option>
                    <option value="Ingeniería Industrial" <?php echo ('Ingeniería Industrial' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Ingeniería Industrial</option>
                    <option value="Ingenieria de Sistemas" <?php echo ('Ingenieria de Sistemas' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Ingenieria de Sistemas</option>
                    <option value="Contabilidad" <?php echo ('Contabilidad' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Contabilidad</option>
                    <option value="Economía" <?php echo ('Economía' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Economía</option>
                    <option value="Administración de Negocios Internacionales" <?php echo ('Administración de Negocios Internacionales' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Administración de Negocios Internacionales</option>
                    <option value="Derecho" <?php echo ('Derecho' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Derecho</option>
                    <option value="Ciencias de la Comunicación" <?php echo ('Ciencias de la Comunicación' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Ciencias de la Comunicación</option>
                    <option value="Marketing" <?php echo ('Marketing' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Marketing</option>
                    <option value="Psicología" <?php echo ('Psicología' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Psicología</option>
                    <option value="Licenciatura" <?php echo ('Licenciatura' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Licenciatura</option>
                    <option value="Otros" <?php echo ('Otros' == $persona['profesion']) ? 'selected="true"' : ''; ?>>Otros</option>                     
            </select>
        </div>             
    </div>
    <div class="form-group">
        <label for="telefono" class="control-label col-md-2">TELEFONO/CEL :</label>
        <div class="col-md-4">
            <input class="form-control solo_numeros" id="telefono" value="<?php echo $persona['celular'] ?>" name="telefono" placeholder="Telefono" maxlength="9" type="text" required/>
        </div> 
        <label for="email" class="control-label col-md-2">EMAIL :</label>
        <div class="col-md-4">
            <input class="form-control" id="email" name="email" placeholder="Email" type="email" value="<?php echo $persona['email'] ?>" autofocus/>
        </div>          
    </div>   
          </div>
          <div class="panel-footer">
            <div class="row">
              <div class="col-lg-offset-10 col-md-2">
                  <button type="submit" name="crearuser_btn" id="crearuser_btn" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
              </div>
            </div>
          </div>
        </div>
   </form>
</div>