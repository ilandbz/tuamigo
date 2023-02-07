<form action="" name="ingconyugue" method="POST" class="form-horizontal">
    <div class="modal fade" tabindex="-1" role="dialog" id="formregconyugue" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-xs-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModal-title">ACTUALIZAR CONYUGUE</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dni_conyugue" class="control-label col-md-2">DNI :</label>
                        <div class="col-md-2">
                            <input class="form-control solo_numeros" id="dni_conyugue" name="dni_conyugue" placeholder="DNI" type="text" maxlength="8" value="<?php echo $conyugue['dniconyugue'] ?>" />
                        </div>
                        <label for="ruc_conyugue" class="control-label col-md-1">RUC :</label>
                        <div class="col-md-2">
                            <input class="form-control solo_numeros" id="ruc_conyugue" name="ruc_conyugue" maxlength="11" placeholder="RUC" type="text" value="<?php echo $conyugue['ruc'] ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombres_conyugue" class="control-label col-md-2">NOMBRES :</label>
                        <div class="col-md-4">
                            <input class="form-control mayuscula" id="nombres_conyugue" value="<?php echo $conyugue['nombres'] ?>" name="nombres_conyugue" placeholder="Nombres" type="text" />
                        </div>
                        <label for="apellidos_conyugue" class="control-label col-md-2">APELLIDOS :</label>
                        <div class="col-md-4">
                            <input class="form-control mayuscula" id="apellidos_conyugue" name="apellidos_conyugue" placeholder="Apellidos" type="text" value="<?php echo $conyugue['apellidos'] ?>" />
                        </div>                
                    </div>
                    <div class="form-group">
                        <label for="fecha_nac_conyugue" class="control-label col-md-2">FECHA NAC :</label>
                        <div class="col-md-4">
                            <input class="form-control" type="date" name="fecha_nac_conyugue" id="fecha_nac_conyugue" value="<?php echo $conyugue['fecha_nac'] ?>">
                        </div>
                        <label for="departamento_conyugue" class="control-label col-md-2">DEPART. NAC:</label>
                        <div class="col-md-4">
                            <select name="departamento_conyugue" id="departamento_conyugue" class="form-control">
                                <?php foreach($departamentos as $row): ?>
                                <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == $conyugue['iddepartamento_nac']) ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>            
                    </div>
                    <div class="form-group">
                        <label for="provincia_conyugue" class="control-label col-md-2">PROVINCIA NAC:</label>
                        <div class="col-md-3">
                            <select name="provincia_conyugue" id="provincia_conyugue" class="form-control">
                                <?php foreach($provinciasconyugue as $row): ?>
                                <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == $conyugue['idprovincia_nac']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label for="distrito_conyugue" class="control-label col-md-3">DISTRITO NAC:</label>
                        <div class="col-md-4">
                            <select name="distrito_conyugue" id="distrito_conyugue" class="form-control">
                                <?php foreach($distritosconyugue as $row): ?>
                                <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == $conyugue['distrito_nac']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>                            
                    </div> 
                    <div class="form-group">
                        <label for="estadociv_conyugue" class="control-label col-md-2">ESTADO CIVIL :</label>
                        <div class="col-md-4">
                            <select name="estadociv_conyugue" id="estadociv_conyugue" class="form-control" disabled="true">
                                <option value="Casado">Casado</option>
                            </select>
                        </div> 
                        <label for="nacionalidad_conyugue" class="control-label col-md-2">NACIONALIDAD</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="nacionalidad_conyugue" id="nacionalidad_conyugue" value="<?php echo $conyugue['nacionalidad'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="grado_inst_conyugue" class="control-label col-md-2">GRADO DE INSTRUCCION :</label>
                        <div class="col-md-4">
                            <select name="grado_inst_conyugue" id="grado_inst_conyugue" class="form-control">
                                <option value="Sin Estudio" <?php echo ($conyugue['grado_instr']=='Sin Estudio') ? 'selected="true"' : '' ?>>Sin Estudio</option>
                                <option value="Primaria Incompleta" <?php echo ($conyugue['grado_instr']=='Primaria Incompleta') ? 'selected="true"' : '' ?>>Primaria Incompleta</option>
                                <option value="Primaria Completa" <?php echo ($conyugue['grado_instr']=='Primaria Completa') ? 'selected="true"' : '' ?>>Primaria Completa</option>
                                <option value="Secundaria Incompleta" <?php echo ($conyugue['grado_instr']=='Secundaria Incompleta') ? 'selected="true"' : '' ?>>Secundaria Incompleta</option>
                                <option value="Secundaria Completa" <?php echo ($conyugue['grado_instr']=='Secundaria Completa') ? 'selected="true"' : '' ?>>Secundaria Completa</option>
                                <option value="Superior Incompleta" <?php echo ($conyugue['grado_instr']=='Superior Incompleta') ? 'selected="true"' : '' ?>>Superior Incompleta</option>
                                <option value="Superior Completa" <?php echo ($conyugue['grado_instr']=='Superior Completa') ? 'selected="true"' : '' ?>>Superior Completa</option>
                            </select>
                        </div> 
                        <label for="profesion_conyugue" class="control-label col-md-2">PROFESION :</label>
                        <div class="col-md-4">
                            <select name="profesion_conyugue" id="profesion_conyugue" class="form-control" <?php echo ($conyugue['profesion']=='') ? 'disabled' : '' ?>>
                                <option value="" <?php echo ($conyugue['profesion']=='') ? 'selected="true"' : '' ?>>--SELECCIONE--</option>
                                <option value="Administración de Empresas" <?php echo ($conyugue['profesion']=='Administración de Empresas') ? 'selected="true"' : '' ?>>Administración de Empresas</option>
                                <option value="Ingeniería Industrial" <?php echo ($conyugue['profesion']=='Ingeniería Industrial') ? 'selected="true"' : '' ?>>Ingeniería Industrial</option>
                                <option value="Ingenieria de Sistemas" <?php echo ($conyugue['profesion']=='Ingenieria de Sistemas') ? 'selected="true"' : '' ?>>Ingenieria de Sistemas</option>                    
                                <option value="Contabilidad" <?php echo ($conyugue['profesion']=='Contabilidad') ? 'selected="true"' : '' ?>>Contabilidad</option>
                                <option value="Economía" <?php echo ($conyugue['profesion']=='Economía') ? 'selected="true"' : '' ?>>Economía</option>
                                <option value="Administración de Negocios Internacionales" <?php echo ($conyugue['profesion']=='Administración de Negocios Internacionales') ? 'selected="true"' : '' ?>>Administración de Negocios Internacionales</option>
                                <option value="Derecho" <?php echo ($conyugue['profesion']=='Derecho') ? 'selected="true"' : '' ?>>Derecho</option>
                                <option value="Ciencias de la Comunicación" <?php echo ($conyugue['profesion']=='Ciencias de la Comunicación') ? 'selected="true"' : '' ?>>Ciencias de la Comunicación</option>                  
                                <option value="Marketing" <?php echo ($conyugue['profesion']=='Marketing') ? 'selected="true"' : '' ?>>Marketing</option>
                                <option value="Psicología" <?php echo ($conyugue['profesion']=='Psicología') ? 'selected="true"' : '' ?>>Psicología</option>
                                <option value="Licenciatura" <?php echo ($conyugue['profesion']=='Licenciatura') ? 'selected="true"' : '' ?>>Licenciatura</option>
                                <option value="Otros" <?php echo ($conyugue['profesion']=='Otros') ? 'selected="true"' : '' ?>>Otros</option>                  
                            </select>
                        </div>             
                    </div>
                    <div class="form-group">
                        <label for="telefono_conyugue" class="control-label col-md-2">TELEFONO/CEL :</label>
                        <div class="col-md-4">
                            <input class="form-control solo_numeros" id="telefono_conyugue" name="telefono_conyugue" placeholder="Telefono" maxlength="9" type="text" value="<?php echo $conyugue['celular'] ?>"/>
                        </div>
                        <label for="email_conyugue" class="control-label col-md-2">EMAIL :</label>
                        <div class="col-md-4">
                            <input class="form-control" id="email_conyugue" name="email_conyugue" placeholder="Email" type="email_conyugue" value="<?php echo $conyugue['email'] ?>"/>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">TIPO DE TRABAJADOR</label>
                        <div class="col-md-4">
                            <label class="radio-inline control-label">
                            <input name="tipotrabajador_conyugue" id="tipotrabdependcony" type="radio" value="DEPENDIENTE" <?php echo ($conyugue['tipotrabajador']=='DEPENDIENTE') ? 'checked="true"' : '' ?>>DEPENDIENTE</label>
                            <label class="radio-inline control-label">
                            <input name="tipotrabajador_conyugue" type="radio" value="INDEPENDIENTE" <?php echo ($conyugue['tipotrabajador']=='INDEPENDIENTE') ? 'checked="true"' : '' ?>>INDEPENDIENTE</label>
                        </div> 
                        <label for="ocupacion_conyugue" class="control-label col-md-2">OCUPACION :</label>
                        <div class="col-md-4">
                            <select name="ocupacion_conyugue" id="ocupacion_conyugue" class="form-control">
                                <option value="Chofer" <?php echo ($conyugue['ocupacion']=='Chofer') ? 'selected="true"' : '' ?>>Chofer</option>
                                <option value="Profesor" <?php echo ($conyugue['ocupacion']=='Profesor') ? 'selected="true"' : '' ?>>Profesor</option>
                                <option value="Contador Publico" <?php echo ($conyugue['ocupacion']=='Contador Publico') ? 'selected="true"' : '' ?>>Contador Publico</option>
                                <option value="Analista" <?php echo ($conyugue['ocupacion']=='Analista') ? 'selected="true"' : '' ?>>Analista</option>
                                <option value="Ingenieria de Sistemas" <?php echo ($conyugue['ocupacion']=='Ingenieria de Sistemas') ? 'selected="true"' : '' ?>>Ingenieria de Sistemas</option>
                                <option value="Vendedor" <?php echo ($conyugue['ocupacion']=='Vendedor') ? 'selected="true"' : '' ?>>Vendedor</option>
                                <option value="Obrero" <?php echo ($conyugue['ocupacion']=='Obrero') ? 'selected="true"' : '' ?>>Obrero</option> 
                                <option value="Asesor de Negocios" <?php echo ($conyugue['ocupacion']=='Asesor de Negocios') ? 'selected="true"' : '' ?>>Asesor de Negocios</option> 
                                <option value="Otros" <?php echo ($conyugue['ocupacion']=='Otros') ? 'selected="true"' : '' ?>>Otros</option> 
                                <option value="Ninguno" <?php echo ($conyugue['ocupacion']=='Ninguno') ? 'selected="true"' : '' ?>>Ninguno</option>
                            </select>
                        </div>                      
                    </div>
                    <div class="form-group">
                        <label for="instituciontrabajo_conyugue" class="control-label col-md-2">INSTITUCION :</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="instituciontrabajo_conyugue" id="instituciontrabajo_conyugue" value="<?php echo $conyugue['institucion_lab'] ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" name="guardarcconyugue">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</form>