<form id="conyugue" action="" method="post" class="form-horizontal" role="form" style="font-size: 10px;">    
    <div class="modal fade form-horizontal" tabindex="-1" role="dialog" id="formregconyugue" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-xs-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModal-title">REGISTRAR CONYUGUE</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dni_conyugue" class="control-label col-md-1">DNI</label>
                        <div class="col-md-3">
                            <input class="form-control solo_numeros input-xs" id="dni_conyugue" name="dni_conyugue" placeholder="DNI" type="text" maxlength="8" value="<?php echo isset($conyugue) ? $conyugue['dni'] : '' ?>" />
                        </div>
                        <label for="ruc_conyugue" class="control-label col-md-1">RUC</label>
                        <div class="col-md-3">
                            <input class="form-control solo_numeros input-xs" id="ruc_conyugue" name="ruc_conyugue" maxlength="11" placeholder="RUC" type="text"/>
                        </div>
                        <label for="sexoconyugue" class="control-label col-md-1">SEXO</label>
                        <div class="col-md-3">
                            <label class="radio-inline"><input type="radio" value="M" name="sexoconyugue" id="conyuguevaron" checked>Hombre</label>
                            <label class="radio-inline"><input type="radio" value="F" name="sexoconyugue" id="conyuguemujer">Mujer</label>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="nombres_conyugue" class="control-label col-md-2">NOMBRES</label>
                        <div class="col-md-4">
                            <input class="form-control mayuscula input-xs" id="nombres_conyugue" name="nombres_conyugue" placeholder="Nombres" type="text" />
                        </div>
                        <label for="apellidopat_conyugue" class="control-label col-md-2">APE. PAT.</label>
                        <div class="col-md-4">
                            <input class="form-control mayuscula input-xs" id="apellidopat_conyugue" name="apellidopat_conyugue" placeholder="Paterno" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apellidomat_conyugue" class="control-label col-md-2">APE. MAT.</label>
                        <div class="col-md-4">
                            <input class="form-control mayuscula input-xs" id="apellidomat_conyugue" name="apellidomat_conyugue" placeholder="Materno" type="text" />
                        </div>
                        <label for="estadociv_conyugue" class="control-label col-md-2">ESTADO CIVIL</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control input-xs" name="estadociv_conyugue" disabled="true" value="<?php echo isset($persona) ? $persona['estadocivil'] : '' ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <p class="alert-info">NACIMIENTO</p>
                        </div>            
                    </div>
                    <div class="form-group">
                        <label for="fecha_nac_conyugue" class="control-label col-md-2">FECHA NAC</label>
                        <div class="col-md-4">
                            <input class="form-control input-xs" type="date" name="fecha_nac_conyugue" id="fecha_nac_conyugue">
                        </div>
                        <label for="departamento_conyugue" class="control-label col-md-2">DEPART.</label>
                        <div class="col-md-3">
                            <select name="departamento_conyugue" id="departamento_conyugue" class="form-control input-xs">
                                <?php foreach($departamentos as $row): ?>
                                <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == '10') ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>                         
                    </div> 
                    <div class="form-group">
                        <label for="provincia_conyugue" class="control-label col-md-2">PROVINCIA.</label>
                        <div class="col-md-3">
                            <select name="provincia_conyugue" id="provincia_conyugue" class="form-control input-xs">
                                <?php foreach($provincias as $row): ?>
                                <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == '186') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-1"></div>                                  
                        <label for="distrito_conyugue" class="control-label col-md-2">DISTRITO</label>
                        <div class="col-md-3">
                            <select name="distrito_conyugue" id="distrito_conyugue" class="form-control input-xs">
                                <?php foreach($distritos as $row): ?>
                                <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == '0831') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <p class="alert-info">OTROS</p>
                        </div>            
                    </div>
                    <div class="form-group">
                        <label for="grado_inst_conyugue" class="control-label col-md-2">ESTUDIOS</label>
                        <div class="col-md-4">
                            <select name="grado_inst_conyugue" id="grado_inst_conyugue" class="form-control input-xs">
                                <option value="">SELECCIONE</option>
                                <option value="Sin Estudio">Sin Estudio</option>
                                <option value="Primaria Incompleta">Primaria Incompleta</option>
                                <option value="Primaria Completa">Primaria Completa</option>
                                <option value="Secundaria Incompleta">Secundaria Incompleta</option>
                                <option value="Secundaria Completa">Secundaria Completa</option>
                                <option value="Superior Incompleta">Superior Incompleta</option>
                                <option value="Superior Completa">Superior Completa</option>
                            </select>
                        </div> 
                        <label for="profesion_conyugue" class="control-label col-md-2">PROFESION</label>
                        <div class="col-md-4">
                            <select name="profesion_conyugue" id="profesion_conyugue" class="form-control input-xs" disabled>
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
                    </div>
                    <div class="form-group">
                        <label for="telefono_conyugue" class="control-label col-md-2">TELEFONO/CEL</label>
                        <div class="col-md-3">
                            <input class="form-control solo_numeros input-xs" id="telefono_conyugue" name="telefono_conyugue" placeholder="Telefono" maxlength="9" type="text"/>
                        </div>
                        <label for="email_conyugue" class="control-label col-md-2">EMAIL</label>
                        <div class="col-md-5">
                            <input class="form-control input-xs" id="email_conyugue" name="email_conyugue" placeholder="Email" type="email_conyugue"/>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">TIPO DE TRABAJADOR</label>
                        <div class="col-md-4">
                            <label class="radio-inline control-label"><input name="tipotrabajador_conyugue" id="tipotrabdependcony" type="radio" value="DEPENDIENTE" checked="true">DEPEND.</label>
                            <label class="radio-inline control-label"><input name="tipotrabajador_conyugue" id="tipotrabindependcony" type="radio" value="INDEPENDIENTE">INDEPEND.</label>
                        </div> 
                        <label for="ocupacion_conyugue" class="control-label col-md-2">OCUPACION</label>
                        <div class="col-md-4">
                            <select name="ocupacion_conyugue" id="ocupacion_conyugue" class="form-control input-xs">
                                <option value="">--SELECCIONE--</option>
                                <option value="Chofer">Chofer</option>
                                <option value="Profesor">Profesor</option>
                                <option value="Contador Publico">Contador Publico</option>
                                <option value="Analista">Analista</option>
                                <option value="Ingenieria de Sistemas">Ingenieria de Sistemas</option>
                                <option value="Vendedor">Vendedor</option>
                                <option value="Obrero">Obrero</option> 
                                <option value="Asesor de Negocios">Asesor de Negocios</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Electricidad">Electricidad</option>
                                <option value="Otros">Otros</option> 
                                <option value="Ninguno">Ninguno</option>
                            </select>
                        </div>                      
                    </div>
                    <div class="form-group hidden" id="instituciontrabajo_conyugue">
                        <label for="instituciontrabajo_conyugue" class="control-label col-md-2">INSTITUCION :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-xs" value="" name="instituciontrabajo_conyugue" id="instituciontrabajo_conyugue">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" name="guardarcconyugue">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>