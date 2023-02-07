<form name="actaval" action="<?php echo base_url() ?>index.php/cliente/actualizaravalpersona/<?php echo $cliente['codcliente'] ?>" class="form-horizontal" method="POST">
    <div class="modal fade" tabindex="-1" role="dialog" id="formregaval" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-xs-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModal-title">MODIFICAR AVAL</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dni_aval" class="control-label col-md-2">DNI :</label>
                        <div class="col-md-2">
                            <input class="form-control solo_numeros input-xs" id="dni_aval" name="dni_aval" placeholder="DNI" type="text" maxlength="8" value="<?php echo $aval['dniaval'] ?>" required/>
                            <input type="hidden" name="dniavaloriginal" value="<?php echo $aval['dniaval'] ?>">
                            <input type="hidden" name="dnicliente" value="<?php echo $persona['dni'] ?>">
                            <input type="hidden" name="codcliente" value="<?php echo $cliente['codcliente'] ?>">
                        </div>
                        <label for="ruc_aval" class="control-label col-md-1">RUC :</label>
                        <div class="col-md-2">
                            <input class="form-control solo_numeros input-xs" id="ruc_aval" name="ruc_aval" maxlength="11" placeholder="RUC" type="text" value="<?php echo $aval['ruc'] ?>" />
                        </div> 
                        <label for="sexoaval" class="control-label col-md-1">SEXO :</label>
                        <div class="col-md-2">
                            <input type="checkbox" value="M" name="sexoaval" <?php echo ($aval['sexo']=='M') ? 'checked="true"' : '' ?> class="sexocheck">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombres_aval" class="control-label col-md-2">NOMBRES</label>
                        <div class="col-md-3">
                            <input class="form-control mayuscula input-xs" id="nombres_aval" name="nombres_aval" placeholder="Nombres" type="text" value="<?php echo $aval['nombres'] ?>" required />
                        </div>
                        <label for="apellidos_aval" class="control-label col-md-1">APELLIDOS</label>
                        <div class="col-md-3">
                            <input class="form-control mayuscula input-xs" id="apellidos_aval" name="apellidos_aval" placeholder="Apellido Paterno" type="text" value="<?php echo $aval['apellidos'] ?>" required />
                        </div>
                        <div class="col-md-3">
                            <input class="form-control mayuscula input-xs" id="apellidos2_aval" maxlength="25" name="apellidos2_aval" placeholder="Apellido Materno" value="<?php echo $aval['apellidos2'] ?>" type="text" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nac_aval" class="control-label col-md-2">FECHA NAC :</label>
                        <div class="col-md-4">
                            <input class="form-control input-xs" type="date" name="fecha_nac_aval" id="fecha_nac_aval" value="<?php echo $aval['fecha_nac'] ?>" required>
                        </div>
                        <label for="departamento_aval" class="control-label col-md-2">DEPART. NAC:</label>
                        <div class="col-md-4">
                            <select name="departamento_aval" id="departamento_aval" class="form-control input-xs">
                                <?php foreach($departamentos as $row): ?>
                                <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == $aval['iddepartamento_nac']) ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>            
                    </div>
                    <div class="form-group">
                        <label for="provincia_aval" class="control-label col-md-2">PROVINCIA NAC:</label>
                        <div class="col-md-3">
                            <select name="provincia_aval" id="provincia_aval" class="form-control input-xs">
                                <?php foreach($provincias_avalnac as $row): ?>
                                <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == $aval['idprovincia_nac']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label for="distrito_aval" class="control-label col-md-3">DISTRITO NAC:</label>
                        <div class="col-md-4">
                            <select name="distrito_aval" id="distrito_aval" class="form-control input-xs" required>
                                <?php foreach($distritos_avalnac as $row): ?>
                                <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == $aval['distrito_nac']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>                          
                    </div> 
                    <div class="form-group">
                        <label for="estadociv_aval" class="control-label col-md-2">ESTADO CIVIL :</label>
                        <div class="col-md-4">
                            <select name="estadociv_aval" id="estadociv_aval" class="form-control input-xs" required>
                                <option value="Soltero" <?php echo ('Soltero' == $aval['estadocivil']) ? 'selected="true"' : ''; ?>>Soltero</option>
                                <option value="Casado" <?php echo ('Casado' == $aval['estadocivil']) ? 'selected="true"' : ''; ?>>Casado</option>
                                <option value="Conviviente" <?php echo ('Conviviente' == $aval['estadocivil']) ? 'selected="true"' : ''; ?>>Conviviente</option>
                                <option value="Viudo" <?php echo ('Viudo' == $aval['estadocivil']) ? 'selected="true"' : ''; ?>>Viudo</option>
                                <option value="Divorciado" <?php echo ('Divorciado' == $aval['estadocivil']) ? 'selected="true"' : ''; ?>>Divorciado</option>
                            </select>
                        </div> 
                        <label for="nacionalidad_aval" class="control-label col-md-2">NACIONALIDAD</label>
                        <div class="col-md-4">
                            <input class="form-control input-xs" type="text" name="nacionalidad_aval" id="nacionalidad_aval" value="<?php echo $aval['nacionalidad'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="grado_inst_aval" class="control-label col-md-2">GRADO DE INSTRUCCION :</label>
                        <div class="col-md-4">
                            <select name="grado_inst_aval" id="grado_inst_aval" class="form-control input-xs">
                                    <option value="Primaria Incompleta" <?php echo ('Primaria Incompleta' == $aval['grado_instr']) ? 'selected="true"' : ''; ?>>Sin Estudio</option>
                                    <option value="Primaria Incompleta" <?php echo ('Primaria Incompleta' == $aval['grado_instr']) ? 'selected="true"' : ''; ?>>Primaria Incompleta</option>
                                    <option value="Primaria Completa" <?php echo ('Primaria Completa' == $aval['grado_instr']) ? 'selected="true"' : ''; ?>>Primaria Completa</option>
                                    <option value="Secundaria Incompleta" <?php echo ('Secundaria Incompleta' == $aval['grado_instr']) ? 'selected="true"' : ''; ?>>Secundaria Incompleta</option>
                                    <option value="Secundaria Completa" <?php echo ('Secundaria Completa' == $aval['grado_instr']) ? 'selected="true"' : ''; ?>>Secundaria Completa</option>
                                    <option value="Superior Incompleta" <?php echo ('Superior Incompleta' == $aval['grado_instr']) ? 'selected="true"' : ''; ?>>Superior Incompleta</option>
                                    <option value="Superior Completa" <?php echo ('Superior Completa' == $aval['grado_instr']) ? 'selected="true"' : ''; ?>>Superior Completa</option>
                            </select>
                        </div> 
                        <label for="profesion_aval" class="control-label col-md-2">PROFESION :</label>
                        <div class="col-md-4">
                            <select name="profesion_aval" id="profesion_aval" class="form-control input-xs" <?php echo ($aval['profesion']=='') ? 'disabled' : '' ?>>
                                <option value="">--SELECCIONE--</option>
                                <option value="Administración de Empresas" <?php echo ('Administración de Empresas' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Administración de Empresas</option>
                                <option value="Ingeniería Industrial" <?php echo ('Ingeniería Industrial' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Ingeniería Industrial</option>
                                <option value="Ingenieria de Sistemas" <?php echo ('Ingenieria de Sistemas' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Ingenieria de Sistemas</option>
                                <option value="Contabilidad" <?php echo ('Contabilidad' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Contabilidad</option>
                                <option value="Economía" <?php echo ('Economía' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Economía</option>
                                <option value="Administración de Negocios Internacionales" <?php echo ('Administración de Negocios Internacionales' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Administración de Negocios Internacionales</option>
                                <option value="Derecho" <?php echo ('Derecho' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Derecho</option>
                                <option value="Ciencias de la Comunicación" <?php echo ('Ciencias de la Comunicación' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Ciencias de la Comunicación</option>
                                <option value="Marketing" <?php echo ('Marketing' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Marketing</option>
                                <option value="Psicología" <?php echo ('Psicología' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Psicología</option>
                                <option value="Licenciatura" <?php echo ('Licenciatura' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Licenciatura</option>
                                <option value="Otros" <?php echo ('Otros' == $aval['profesion']) ? 'selected="true"' : ''; ?>>Otros</option>
                            </select>
                        </div>             
                    </div>
                    <div class="form-group">
                        <label for="telefono_aval" class="control-label col-md-2">TELEFONO/CEL :</label>
                        <div class="col-md-4">
                            <input class="form-control solo_numeros input-xs" id="telefono_aval" name="telefono_aval" placeholder="Telefono" maxlength="9" type="text" value="<?php echo $aval['celular'] ?>" />
                        </div> 
                        <label for="email_aval" class="control-label col-md-2">EMAIL :</label>
                        <div class="col-md-4">
                            <input class="form-control input-xs" id="email_aval" name="email_aval" placeholder="Email" type="email" value="<?php echo $aval['email']  ?>" />
                        </div>                                                       
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">TIPO DE TRABAJADOR</label>
                        <div class="col-md-4">
                            <label class="radio-inline control-label"><input name="tipotrabajador_aval" id="tipotrabajadordep_aval" type="radio" value="DEPENDIENTE" <?php echo ($aval['tipotrabajador']=='DEPENDIENTE') ? 'checked="true"' : '' ?>>DEPENDIENTE</label>
                            <label class="radio-inline control-label"><input id="avalno" name="tipotrabajador_aval" type="radio" value="INDEPENDIENTE" <?php echo ($aval['tipotrabajador']=='INDEPENDIENTE') ? 'checked="true"' : '' ?>>INDEPENDIENTE</label>
                        </div> 
                        <label for="ocupacion_aval" class="control-label col-md-2">OCUPACION :</label>
                        <div class="col-md-4">
                            <select name="ocupacion_aval" id="ocupacion_aval" class="form-control input-xs">
                                <option value="Chofer" <?php echo ($aval['ocupacion'] == 'Chofer') ? 'selected="true"' : ''; ?>>Chofer</option>
                                <option value="Profesor" <?php echo ($aval['ocupacion'] == 'Profesor') ? 'selected="true"' : ''; ?>>Profesor</option>
                                <option value="Contador Publico" <?php echo ($aval['ocupacion'] == 'Contador Publico') ? 'selected="true"' : ''; ?>>Contador Publico</option>
                                <option value="Analista" <?php echo ($aval['ocupacion'] == 'Analista') ? 'selected="true"' : ''; ?>>Analista</option>
                                <option value="Ingenieria de Sistemas" <?php echo ($aval['ocupacion'] == 'Ingenieria de Sistemas') ? 'selected="true"' : ''; ?>>Ingenieria de Sistemas</option>
                                <option value="Vendedor" <?php echo ($aval['ocupacion'] == 'Vendedor') ? 'selected="true"' : ''; ?>>Vendedor</option>
                                <option value="Obrero" <?php echo ($aval['ocupacion'] == 'Obrero') ? 'selected="true"' : ''; ?>>Obrero</option> 
                                <option value="Asesor de Negocios" <?php echo ($aval['ocupacion'] == 'Asesor de Negocios') ? 'selected="true"' : ''; ?>>Asesor de Negocios</option> 
                                <option value="Otros" <?php echo ($aval['ocupacion'] == 'Otros') ? 'selected="true"' : ''; ?>>Otros</option> 
                                <option value="Ninguno" <?php echo ($aval['ocupacion'] == 'Ninguno') ? 'selected="true"' : ''; ?>>Ninguno</option>
                            </select>
                        </div>                          
                    </div>
                    <div class="form-group">
                        <label for="instituciontrabajo_aval" class="control-label col-md-2 input-xs">INSTITUCION DONDE LABORA:</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="instituciontrabajo_aval" id="instituciontrabajo_aval" value="<?php echo $aval['institucion_lab'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <p class="alert-info">DOMICILIO</p>
                        </div>            
                    </div>
                    <div class="form-group">
                        <label for="tipovivienda_aval" class="control-label col-md-2">TIPO DE VIVIENDA</label>
                        <div class="col-md-4">
                            <select name="tipovivienda_aval" id="tipovivienda_aval" class="form-control input-xs" required>
                                <option value="Familiar" <?php echo ('Familiar' == $aval['tipovivienda']) ? 'selected="true"' : ''; ?>>Familiar</option>
                                <option value="Propia" <?php echo ('Propia' == $aval['tipovivienda']) ? 'selected="true"' : ''; ?>>Propia</option>
                                <option value="Alquilada" <?php echo ('Alquilada' == $aval['tipovivienda']) ? 'selected="true"' : ''; ?>>Alquilada</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="departamento_dom_aval" class="control-label col-md-2">DEPARTAMENTO :</label>
                        <div class="col-md-2">
                            <select name="departamento_dom_aval" id="departamento_dom_aval" class="form-control input-xs">
                                <?php foreach($departamentos as $row): ?>
                                <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == $aval['iddepartamento_domic']) ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label for="provincia_dom_aval" class="control-label col-md-2">PROVINCIA :</label>
                        <div class="col-md-2">
                            <select name="provincia_dom_aval" id="provincia_dom_aval" class="form-control input-xs">
                                <?php foreach($provincias_avaldomic as $row): ?>
                                <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == $aval['idprovincia_domic']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label for="distrito_dom_aval" class="control-label col-md-2">DISTRITO :</label>
                        <div class="col-md-2">
                            <select name="distrito_dom_aval" id="distrito_dom_aval" class="form-control input-xs">
                                <?php foreach($distritos_avaldomic as $row): ?>
                                <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == $aval['distrito_domic']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>        
                    <div class="form-group">
                        <label for="tipovia_aval" class="control-label col-md-2">TIPO DE VIA: </label>
                        <div class="col-md-7" align="right">
                            <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Avenida" <?php echo ($aval['tipovia']=='Avenida') ? 'checked' : '' ?>>Avenida</label>
                            <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Jiron" <?php echo ($aval['tipovia']=='Jiron') ? 'checked' : '' ?>>Jiron</label>
                            <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Calle" <?php echo ($aval['tipovia']=='Calle') ? 'checked' : '' ?>>Calle</label>
                            <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Pasaje" <?php echo ($aval['tipovia']=='Pasaje') ? 'checked' : '' ?>>Pasaje</label>
                            <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Prolongacion" <?php echo ($aval['tipovia']=='Prolongacion') ? 'checked' : '' ?>>Prolongacion</label>
                            <?php 
if($aval['tipovia']!='Avenida' && $aval['tipovia']!='Jiron' && $aval['tipovia']!='Calle' && $aval['tipovia']!='Pasaje' && $aval['tipovia']!='Prolongacion'){ $estado=1; }else{ $estado =0; } ?>

                                <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Otro" <?php echo ($estado==1) ? 'checked' : '' ?>>Otro</label>&nbsp;


                        </div>                
                        <div class="col-md-3">
                            <input type="text" class="form-control input-xs" name="otrotipovia_aval" value="<?php echo ($estado==1) ? $aval['tipovia'] : '' ?>">                
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombrevia_aval" class="control-label col-md-2">NOMBRE VIA: </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-xs" name="nombrevia_aval" id="nombrevia_aval" value="<?php echo $aval['nombrevia'] ?>">
                        </div>     
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-2">N° DE INMUEBLE: </label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-xs">
                                        <span class="input-group-addon">Nro</span>
                                        <input type="text" class="form-control" name="Nro_dom_aval" placeholder="" value="<?php echo $aval['Nro'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-xs">
                                        <span class="input-group-addon">Interior</span>
                                        <input type="text" class="form-control" placeholder="" name="interior_dom_aval" value="<?php echo $aval['interior'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">   
                                    <div class="input-group input-group-xs">
                                        <span class="input-group-addon">Mz</span>
                                        <input type="text" class="form-control" placeholder="" name="mz_dom_aval" value="<?php echo $aval['mz'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3"> 
                                    <div class="input-group input-group-xs">
                                        <span class="input-group-addon">Lote</span>
                                        <input type="text" class="form-control" placeholder="" name="lote_dom_aval" value="<?php echo $aval['lote'] ?>">
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-2">TIPO DE ZONA: </label>
                        <?php
                        if($aval['tipozona']!='Urbanizacion' && $aval['tipozona']!='Asentamiento Humano' && $aval['tipozona']!='Cooperativa' && $aval['tipozona']!='PP.JJ.'){ 
                            $estadotzaval=1;
                         }else{ 
                            $estadotzaval=0;
                         }
                         ?>
                    <div class="col-md-7" align="right">
                    <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Urbanizacion" <?php echo ($aval['tipozona']=='Urbanizacion') ? 'checked' : '' ?>>Urbanizacion</label>
                    <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Asentamiento Humano" <?php echo ($aval['tipozona']=='Asentamiento Humano') ? 'checked' : '' ?>>Asentamiento Humano</label>
                    <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Cooperativa" <?php echo ($aval['tipozona']=='Cooperativa') ? 'checked' : '' ?>>Cooperativa</label>
                    <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="PP.JJ." <?php echo ($aval['tipozona']=='PP.JJ.') ? 'checked' : '' ?>>PP.JJ.</label>
                    <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Otro" <?php echo ($estadotzaval==1) ? 'checked' : '' ?>>Otro</label>

                    </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control input-xs" name="otrotipozona_aval" value="<?php echo ($estadotzaval==1) ? $aval['tipozona'] : '' ?>">                
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombrezona_aval" class="control-label col-md-2">NOMBRE DE ZONA: </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control input-xs" name="nombrezona_aval" id="nombrezona_aval" value="<?php echo $aval['nombrezona'] ?>">
                        </div>     
                    </div>
                    <div class="form-group">
                        <label for="referencia_aval" class="control-label col-md-2">REFERENCIA: </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control input-xs" name="referencia_aval" id="referencia_aval" value="<?php echo $aval['referencia'] ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="submit" class="btn btn-primary" data-dismiss="modal">Guardar Cambios</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" name="actavalbtn">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</form>