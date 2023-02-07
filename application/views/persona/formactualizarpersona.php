<div  style="font-size: 10px;">
<div class="container">
<form id="solcliente" action="<?php echo base_url() ?>index.php/cliente/actualizarpersona" method="post" class="form-horizontal" role="form">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">ACTUALIZAR PERSONA</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="dni" class="control-label col-md-1">DNI</label>
                <input type="hidden" name="dnipersona" value="<?php echo $persona['dni'] ?>">
                <div class="col-md-2">
                    <input class="form-control input-sm solo_numeros input-xs" id="dni" name="dni" placeholder="DNI" type="text" maxlength="8" value="<?php echo $persona['dni'] ?>" />
                </div>
                <label for="ruc" class="control-label col-md-1">RUC</label>
                <div class="col-md-2">
                    <input class="form-control input-xs solo_numeros" id="ruc" name="ruc" maxlength="11" placeholder="RUC" type="text" value="<?php echo $persona['ruc'] ?>" />
                </div> 
                <label for="sexo" class="control-label col-md-1">SEXO</label>
                <div class="col-md-2">
                    <label class="radio-inline"><input type="radio" value="M" name="sexo"<?php echo $persona['sexo']=='M' ? ' checked' : '' ?>>Hombre</label>
                    <label class="radio-inline"><input type="radio" value="F" name="sexo"<?php echo $persona['sexo']=='F' ? ' checked' : '' ?>>Mujer</label>
                </div>
                <label for="fecha_nac" class="control-label col-md-1">FECHA NAC</label>
                <div class="col-md-2">
                    <input class="form-control input-xs" type="date" name="fecha_nac" id="fecha_nac" value="<?php echo $persona['fecha_nac'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="nombres" class="control-label col-md-1">Nombres</label>
                <div class="col-md-2">
                    <input class="form-control input-xs mayuscula" id="nombres" name="nombres" placeholder="Nombres" type="text" value="<?php echo $persona['nombres'] ?>" />
                </div>
                <label for="apellidos" class="control-label col-md-1">Ape. Paterno</label>
                <div class="col-md-2">
                    <input class="form-control input-xs mayuscula" id="apellidos" name="apellidos" placeholder="Apellido Paterno" type="text" value="<?php echo $persona['apellidos'] ?>" />
                </div>
                <label for="apellidos2" class="control-label col-md-1">Ape. Materno</label>
                <div class="col-md-2">
                    <input class="form-control mayuscula input-xs" id="apellidos2" maxlength="25" name="apellidos2" placeholder="Apellido Materno" type="text" value="<?php echo $persona['apellidos2'] ?>" required/>
                </div>
                <label for="estadociv" class="control-label col-md-1">Estado Civil</label>
                <div class="col-md-2">
                    <select name="estadociv" id="estadociv" class="form-control input-xs" onchange="<?php echo isset($conyugue) ? "cargardatosconyugue('".$persona['dniconyugue']."')" : "" ?>">
                        <option value="Soltero" <?php echo ('Soltero' == $persona['estadocivil']) ? 'selected="true"' : ''; ?>>Soltero</option>
                        <option value="Casado" <?php echo ('Casado' == $persona['estadocivil']) ? 'selected="true"' : ''; ?>>Casado</option>
                        <option value="Conviviente" <?php echo ('Conviviente' == $persona['estadocivil']) ? 'selected="true"' : ''; ?>>Conviviente</option>
                        <option value="Viudo" <?php echo ('Viudo' == $persona['estadocivil']) ? 'selected="true"' : ''; ?>>Viudo</option>
                        <option value="Divorciado" <?php echo ('Divorciado' == $persona['estadocivil']) ? 'selected="true"' : ''; ?>>Divorciado</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a data-toggle="modal" href="#formregconyugue" id="verconyugue" <?php echo ('Casado' == $persona['estadocivil'] || 'Conviviente' == $persona['estadocivil']) ? '' : 'style="display: none;"'; ?> onclick="cargardatosconyugue('<?php echo $persona['dniconyugue'] ?>');">Ver Conyugue</a>
                    <input id="dni_conyugue2" name="dni_conyugue2" value="<?php echo $persona['dniconyugue'] ?>" placeholder="DNI" type="hidden" />
                    <input type="hidden" name="estadocivanterior" value="<?php echo $persona['estadocivil'] ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p class="alert-info">NACIMIENTO</p>
                </div>            
            </div>
            <div class="form-group">
                <label for="departamento_nac" class="control-label col-md-1">Departamento</label>
                <div class="col-md-2">
                    <select name="departamento_nac" id="departamento_nac" class="form-control input-xs">
                        <?php foreach($departamentos as $row): ?>
                        <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == $persona['iddepartamento_nac']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label for="provincia_nac" class="control-label col-md-1">Provincia</label>
                <div class="col-md-2">
                    <select name="provincia_nac" id="provincia_nac" class="form-control input-xs">
                        <?php foreach($provincias_nac as $row): ?>
                        <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == $persona['idprovincia_nac']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label for="distrito_nac" class="control-label col-md-1">Distrito</label>
                <div class="col-md-2">
                    <select name="distrito_nac" id="distrito_nac" class="form-control input-xs" required>
                        <?php foreach($distritos_nac as $row): ?>
                        <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == $persona['distrito_nac']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label for="nacionalidad" class="control-label col-md-1">Nacionalidad</label>
                <div class="col-md-2">
                    <input class="form-control input-xs" type="text" name="nacionalidad" id="nacionalidad" value="<?php echo $persona['nacionalidad'] ?>">
                </div>                    
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p class="alert-info">DOMICILIO</p>
                </div>
            </div>
            <div class="form-group">
                <label for="tipovivienda" class="control-label col-md-1">Tipo</label>
                <div class="col-md-2">
                    <select name="tipovivienda" id="tipovivienda" class="form-control input-xs" required>
                        <option value="">Seleccione</option>
                        <option value="Familiar" <?php echo ($persona['tipovivienda']=='Familiar') ? 'selected' : '' ?>>Familiar</option>
                        <option value="Propia" <?php echo ($persona['tipovivienda']=='Propia') ? 'selected' : '' ?>>Propia</option>
                        <option value="Alquilada" <?php echo ($persona['tipovivienda']=='Alquilada') ? 'selected' : '' ?>>Alquilada</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="departamento" class="control-label col-md-1">Departamento</label>
                <div class="col-md-2">
                    <select name="departamento" id="departamento" class="form-control input-xs">
                        <?php foreach($departamentos as $row): ?>
                        <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == $persona['iddepartamento_domic']) ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label for="provincia" class="control-label col-md-1">Provincia</label>
                <div class="col-md-2">
                    <select name="provincia" id="provincia" class="form-control input-xs">
                        <?php foreach($provincias_domic as $row): ?>
                        <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == $persona['idprovincia_domic']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label for="distrito" class="control-label col-md-1">Distrito</label>
                <div class="col-md-2">
                    <select name="distrito" id="distrito" class="form-control input-xs" required>
                        <?php foreach($distritos_domic as $row): ?>
                        <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == $persona['distrito_domic']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>        
            <div class="form-group">
                <label for="tipovia" class="control-label col-md-1">Tipo de Via</label>
                <div class="col-md-5" align="right">
                    <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Avenida" <?php echo ($persona['tipovia']=='Avenida') ? 'checked' : '' ?>>Avenida</label>
                    <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Jiron" <?php echo ($persona['tipovia']=='Jiron') ? 'checked' : '' ?>>Jiron</label>
                    <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Calle" <?php echo ($persona['tipovia']=='Calle') ? 'checked' : '' ?>>Calle</label>
                    <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Pasaje" <?php echo ($persona['tipovia']=='Pasaje') ? 'checked' : '' ?>>Pasaje</label>
                    <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Prolongacion" <?php echo ($persona['tipovia']=='Prolongacion') ? 'checked' : '' ?>>Prolongacion</label>

                <?php if($persona['tipovia']!='Avenida' && $persona['tipovia']!='Jiron' && $persona['tipovia']!='Calle' && $persona['tipovia']!='Pasaje' && $persona['tipovia']!='Prolongacion'){ ?>
                    <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Otro" checked>Otro</label>&nbsp;
                </div>                
                <div class="col-md-3">
                    <input type="text" class="form-control input-xs" name="otrotipovia" value="<?php echo $persona['tipovia'] ?>">
                <?php }else{ ?>
                    <label class="radio-inline control-label"><input name="tipovia" type="radio" value="Otro">Otro</label>&nbsp;
                </div>                
                <div class="col-md-2">
                    <input type="text" class="form-control input-xs" name="otrotipovia" value="">
                <?php } ?>
                </div>
                <label for="nombrevia" class="control-label col-md-1">Nombre Via</label>
                <div class="col-md-3">
                    <input type="text" class="form-control input-xs" name="nombrevia" id="nombrevia" value="<?php echo $persona['nombrevia'] ?>">
                </div>     
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-1">Inmueble</label>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group input-group-xs">
                                <span class="input-group-addon">Nro</span>
                                <input type="text" class="form-control input-sm" name="Nro_dom" placeholder="" value="<?php echo $persona['Nro'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-xs">
                                <span class="input-group-addon">Interior</span>
                                <input type="text" class="form-control input-sm" placeholder="" name="interior_dom" value="<?php echo $persona['interior'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">   
                            <div class="input-group input-group-xs">
                                <span class="input-group-addon">Mz</span>
                                <input type="text" class="form-control input-sm" placeholder="" name="mz_dom" value="<?php echo $persona['mz'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="input-group input-group-xs">
                                <span class="input-group-addon">Lote</span>
                                <input type="text" class="form-control input-sm" placeholder="" name="lote_dom" value="<?php echo $persona['lote'] ?>">
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-1">Tipo de Zona</label>
                <div class="col-md-5" align="right">
                    <label class="radio-inline control-label"><input name="tipozona" type="radio" value="Urbanizacion" <?php echo ($persona['tipozona']=='Urbanizacion') ? 'checked' : '' ?>>Urbanizacion</label>
                    <label class="radio-inline control-label"><input name="tipozona" type="radio" value="Asentamiento Humano" <?php echo ($persona['tipozona']=='Asentamiento Humano') ? 'checked' : '' ?>>Asentamiento Humano</label>
                    <label class="radio-inline control-label"><input name="tipozona" type="radio" value="Cooperativa" <?php echo ($persona['tipozona']=='Cooperativa') ? 'checked' : '' ?>>Cooperativa</label>
                    <label class="radio-inline control-label"><input name="tipozona" type="radio" value="PP.JJ." <?php echo ($persona['tipozona']=='PP.JJ.') ? 'checked' : '' ?>>PP.JJ.</label>
                    <?php if($persona['tipozona']!='Urbanizacion' && $persona['tipozona']!='Asentamiento Humano' && $persona['tipozona']!='Cooperativa' && $persona['tipozona']!='PP.JJ.'){ 
                        $estadopers=1;
                     }else{ 
                        $estadopers=0;
                     } ?> 
                    <label class="radio-inline control-label"><input name="tipozona" type="radio" value="Otro" <?php echo ($estadopers==1) ? 'checked' : '' ?>>Otro</label>

                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control input-xs" name="otrotipozona" value="<?php echo ($estadopers==1) ? $persona['tipozona'] : ''; ?>">
                </div>
                <label for="nombrezona" class="control-label col-md-1">Nombre Zona</label>
                <div class="col-md-3">
                    <input type="text" class="form-control input-xs" name="nombrezona" id="nombrezona" value="<?php echo $persona['nombrezona'] ?>">
                </div>     
            </div>
            <div class="form-group">
                <label for="referencia" class="control-label col-md-1">Referencia</label>
                <div class="col-md-6">
                    <input type="text" class="form-control input-xs" name="referencia" id="referencia" value="<?php echo $persona['referencia'] ?>">
                </div>
            </div>
            <p class="alert-info">
                TRABAJO
            </p>
            <div class="form-group">
                <label class="control-label col-md-1">Tipo</label>
                <div class="col-md-3">
                    <label class="radio-inline control-label"><input name="tipotrabajador" id="tipotrabdepend" type="radio" value="DEPENDIENTE" <?php echo ($persona['tipotrabajador'] == 'DEPENDIENTE') ? 'checked="true"' : ''; ?>>DEPENDIENTE</label>
                    <label class="radio-inline control-label"><input name="tipotrabajador" type="radio" value="INDEPENDIENTE" <?php echo ($persona['tipotrabajador'] == 'INDEPENDIENTE') ? 'checked="true"' : ''; ?>>INDEPENDIENTE</label><br><br>
                </div> 
                <label for="ocupacion" class="control-label col-md-1">Ocupacion</label>
                <div class="col-md-3">
                    <select name="ocupacion" id="ocupacion" class="form-control input-xs">
                        <option value="">--SELECCIONE--</option>
                        <option value="Chofer" <?php echo ($persona['ocupacion'] == 'Chofer') ? 'selected="true"' : ''; ?>>Chofer</option>
                        <option value="Profesor" <?php echo ($persona['ocupacion'] == 'Profesor') ? 'selected="true"' : ''; ?>>Profesor</option>
                        <option value="Contador Publico" <?php echo ($persona['ocupacion'] == 'Contador Publico') ? 'selected="true"' : ''; ?>>Contador Publico</option>
                        <option value="Analista" <?php echo ($persona['ocupacion'] == 'Analista') ? 'selected="true"' : ''; ?>>Analista</option>
                        <option value="Ingenieria de Sistemas" <?php echo ($persona['ocupacion'] == 'Ingenieria de Sistemas') ? 'selected="true"' : ''; ?>>Ingenieria de Sistemas</option>
                        <option value="Vendedor" <?php echo ($persona['ocupacion'] == 'Vendedor') ? 'selected="true"' : ''; ?>>Vendedor</option>
                        <option value="Obrero" <?php echo ($persona['ocupacion'] == 'Obrero') ? 'selected="true"' : ''; ?>>Obrero</option> 
                        <option value="Asesor de Negocios" <?php echo ($persona['ocupacion'] == 'Asesor de Negocios') ? 'selected="true"' : ''; ?>>Asesor de Negocios</option> 
                        <option value="Otros" <?php echo ($persona['ocupacion'] == 'Otros') ? 'selected="true"' : ''; ?>>Otros</option> 
                        <option value="Ninguno" <?php echo ($persona['ocupacion'] == 'Ninguno') ? 'selected="true"' : ''; ?>>Ninguno</option>
                    </select>
                </div>
                <label for="institucion_lab" class="control-label col-md-1">Institucion</label>
                <div class="col-md-3">
                    <input type="text" class="form-control input-xs" name="institucion_lab" id="institucion_lab" value="<?php echo $persona['institucion_lab'] ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p class="alert-info">OTROS</p>
                </div>            
            </div>
            <div class="form-group">
                <label for="grado_inst" class="control-label col-md-1">Grado Instruccion</label>
                <div class="col-md-3">
                    <select name="grado_inst" id="grado_inst" class="form-control input-xs" required>
                        <option value="Primaria Incompleta" <?php echo ('Primaria Incompleta' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Sin Estudio</option>
                        <option value="Primaria Incompleta" <?php echo ('Primaria Incompleta' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Primaria Incompleta</option>
                        <option value="Primaria Completa" <?php echo ('Primaria Completa' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Primaria Completa</option>
                        <option value="Secundaria Incompleta" <?php echo ('Secundaria Incompleta' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Secundaria Incompleta</option>
                        <option value="Secundaria Completa" <?php echo ('Secundaria Completa' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Secundaria Completa</option>
                        <option value="Superior Incompleta" <?php echo ('Superior Incompleta' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Superior Incompleta</option>
                        <option value="Superior Completa" <?php echo ('Superior Completa' == $persona['grado_instr']) ? 'selected="true"' : ''; ?>>Superior Completa</option>
                    </select>
                </div> 
                <label for="profesionc" class="control-label col-md-1">Profesion</label>
                <div class="col-md-4">
                <?php if('Superior Completa' == $persona['grado_instr']){ ?>
                    <select name="profesionc" id="profesionc" class="form-control input-xs">
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
                <?php }else{ ?>
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
                <?php } ?>
                </div>             
            </div>
            <div class="form-group">
                <label for="telefono" class="control-label col-md-1">TELEFONO/CEL</label>
                <div class="col-md-2">
                    <input class="form-control input-xs solo_numeros" id="telefono" name="telefono" placeholder="Telefono" maxlength="9" type="text" value="<?php echo $persona['celular'] ?>" required/>
                </div> 
                <label for="email" class="control-label col-md-1">Email</label>
                <div class="col-md-3">
                    <input class="form-control input-xs" id="email" name="email" placeholder="Email" type="email" value="<?php echo $persona['email'] ?>"/>
                </div>             
            </div>
        </div>   
        <div class="panel-footer">
            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> Guardar Cambios</button>
            <button type="reset" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span> Restablecer</button>
        </div>
    </div>
</form> 
</div>
<?php
// GUARDAR MEDIANTE SCRIPT
$this->view($conyugueview);
?>



</div>