<div class="modal fade form-horizontal" tabindex="-1" role="dialog" id="formregaval" aria-hidden="true" style="font-size: 10px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-xs-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModal-title">REGISTRAR AVAL</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="dni_aval" class="control-label col-md-2">DNI</label>
                    <div class="col-md-2">
                        <input class="form-control solo_numeros input-xs" id="dni_aval" name="dni_aval" placeholder="DNI" type="text" maxlength="8" required />
                    </div>
                    <label for="ruc_aval" class="control-label col-md-1">RUC</label>
                    <div class="col-md-2">
                        <input class="form-control solo_numeros input-xs" id="ruc_aval" name="ruc_aval" maxlength="11" placeholder="RUC" type="text"/>
                    </div> 
                    <label for="sexoaval" class="control-label col-md-1">SEXO</label>
                    <div class="col-md-2">
                        <label class="radio-inline"><input type="radio" value="M" name="sexoaval" id="avalvaron" checked>Hombre</label>
                        <label class="radio-inline"><input type="radio" value="F" name="sexoaval" id="avalmujer">Mujer</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombres_aval" class="control-label col-md-2">NOMBRES</label>
                    <div class="col-md-3">
                        <input class="form-control mayuscula input-xs" id="nombres_aval" name="nombres_aval" placeholder="Nombres" type="text" required />
                    </div>
                    <label for="apellidos_aval" class="control-label col-md-1">APELLIDOS </label>
                    <div class="col-md-3">
                        <input class="form-control mayuscula input-xs" id="apellidos_aval" name="apellidos_aval" placeholder="Paterno" type="text" required />
                    </div>
                    <div class="col-md-3">
                        <input class="form-control mayuscula input-xs" id="apellidos_aval2" maxlength="25" name="apellidos_aval2" placeholder="Materno" onkeypress="mayus(this);" type="text" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_nac_aval" class="control-label col-md-2">FECHA NAC</label>
                    <div class="col-md-4">
                        <input class="form-control input-xs" type="date" name="fecha_nac_aval" id="fecha_nac_aval" required>
                    </div>
                    <label for="departamento_aval" class="control-label col-md-2">DEPART. NAC</label>
                    <div class="col-md-4">
                        <select name="departamento_aval" id="departamento_aval" class="form-control input-xs">
                            <?php foreach($departamentos as $row): ?>
                            <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == '10') ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>            
                </div>
                <div class="form-group">
                    <label for="provincia_aval" class="control-label col-md-2">PROVINCIA NAC</label>
                    <div class="col-md-3">
                        <select name="provincia_aval" id="provincia_aval" class="form-control input-xs">
                            <?php foreach($provincias as $row): ?>
                            <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == '186') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label for="distrito_aval" class="control-label col-md-3">DISTRITO NAC:</label>
                    <div class="col-md-4">
                        <select name="distrito_aval" id="distrito_aval" class="form-control input-xs" required>
                            <?php foreach($distritos as $row): ?>
                            <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == '0831') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>                            
                </div> 
                <div class="form-group">
                    <label for="estadociv_aval" class="control-label col-md-2" required>ESTADO CIVIL</label>
                    <div class="col-md-4">
                        <select name="estadociv_aval" id="estadociv_aval" class="form-control input-xs">
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Conviviente">Conviviente</option>
                            <option value="Viudo">Viudo</option>
                            <option value="Divorciado">Divorciado</option>
                        </select>
                    </div> 

                    <label for="grado_inst_aval" class="control-label col-md-2">GRADO DE INSTRUCCION</label>
                    <div class="col-md-4">
                        <select name="grado_inst_aval" id="grado_inst_aval" class="form-control input-xs" required>
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
                </div>
                <div class="form-group">

                    <label for="profesion_aval" class="control-label col-md-2">PROFESION</label>
                    <div class="col-md-4">
                        <select name="profesion_aval" id="profesion_aval" class="form-control input-xs" disabled>
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
                    <label for="telefono_aval" class="control-label col-md-2">TELEFONO/CEL</label>
                    <div class="col-md-4">
                        <input class="form-control solo_numeros input-xs" id="telefono_aval" name="telefono_aval" placeholder="Telefono" maxlength="9" type="text"/>
                    </div> 



                </div>
                <div class="form-group">
                    <label for="email_aval" class="control-label col-md-2">EMAIL</label>
                    <div class="col-md-4">
                        <input class="form-control input-xs" id="email_aval" name="email_aval" placeholder="Email" type="email"/>
                    </div>      
                    <label class="control-label col-md-2">TIPO DE TRABAJADOR</label>
                    <div class="col-md-4">
                        <label class="radio-inline control-label"><input name="tipotrabajador_aval" id="tipotrabajadordep_aval" type="radio" value="DEPENDIENTE" checked="true">DEPENDIENTE</label>
                        <label class="radio-inline control-label"><input id="tipotrabajadorinde_aval" name="tipotrabajador_aval" type="radio" value="INDEPENDIENTE">INDEPENDIENTE</label>
                    </div>                                                                      
                </div>
                <div class="form-group">

                    <label for="ocupacion_aval" class="control-label col-md-2">OCUPACION</label>
                    <div class="col-md-4">
                        <select name="ocupacion_aval" id="ocupacion_aval" class="form-control input-xs">
                            <option value="">--SELECCIONE--</option>
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
                    <label for="instituciontrabajo_aval" class="control-label col-md-2">INSTITUCION DONDE LABORA</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-xs" value="" name="instituciontrabajo_aval" id="instituciontrabajo_aval">
                    </div>                                           
                </div>

                    <p class="alert-info">DOMICILIO</p>         
                <div class="form-group">
                    <label for="tipovivienda_aval" class="control-label col-md-2">TIPO DE VIVIENDA</label>
                    <div class="col-md-4">
                        <select name="tipovivienda_aval" id="tipovivienda_aval" class="form-control input-xs" required>
                            <option value="">Seleccione</option>
                            <option value="Familiar">Familiar</option>
                            <option value="Propia">Propia</option>
                            <option value="Alquilada">Alquilada</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="departamento_dom_aval" class="control-label col-md-2">DEPARTAMENTO</label>
                    <div class="col-md-2">
                        <select name="departamento_dom_aval" id="departamento_dom_aval" class="form-control input-xs">
                            <?php foreach($departamentos as $row): ?>
                            <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == '10') ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label for="provincia_dom_aval" class="control-label col-md-2">PROVINCIA</label>
                    <div class="col-md-2">
                        <select name="provincia_dom_aval" id="provincia_dom_aval" class="form-control input-xs">
                            <?php foreach($provincias as $row): ?>
                            <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == '186') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label for="distrito_dom_aval" class="control-label col-md-2">DISTRITO</label>
                    <div class="col-md-2">
                        <select name="distrito_dom_aval" id="distrito_dom_aval" class="form-control input-xs">
                            <?php foreach($distritos as $row): ?>
                            <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == '0831') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>        
                <div class="form-group">
                    <label for="tipovia_aval" class="control-label col-md-2">TIPO DE VIA</label>
                    <div class="col-md-7" align="right">
                        <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Avenida" checked="true">Avenida</label>
                        <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Jiron">Jiron</label>
                        <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Calle">Calle</label>
                        <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Pasaje">Pasaje</label>
                        <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Prolongacion">Prolongacion</label>
                        <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Otro">Otro</label>&nbsp;
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-xs" name="otrotipovia_aval">                
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombrevia_aval" class="control-label col-md-2">NOMBRE VIA</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control input-xs" name="nombrevia_aval" id="nombrevia_aval">
                    </div>     
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-2">N° DE INMUEBLE</label>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group input-group-xs">
                                    <span class="input-group-addon">Nro</span>
                                    <input type="text" class="form-control input-xs" name="Nro_dom_aval" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-xs">
                                    <span class="input-group-addon">Interior</span>
                                    <input type="text" class="form-control input-xs" placeholder="" name="interior_dom_aval">
                                </div>
                            </div>
                            <div class="col-md-3">   
                                <div class="input-group input-group-xs">
                                    <span class="input-group-addon">Mz</span>
                                    <input type="text" class="form-control input-xs" placeholder="" name="mz_dom_aval">
                                </div>
                            </div>
                            <div class="col-md-3"> 
                                <div class="input-group input-group-xs">
                                    <span class="input-group-addon">Lote</span>
                                    <input type="text" class="form-control input-xs" placeholder="" name="lote_dom_aval">
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-2">TIPO DE ZONA</label>
                    <div class="col-md-7" align="right">
                        <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Urbanizacion" checked="true">Urbanizacion</label>
                        <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Asentamiento Humano">Asentamiento Humano</label>
                        <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Cooperativa">Cooperativa</label>
                        <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="PP.JJ.">PP.JJ.</label>
                        <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Otro">Otro</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-xs" name="otrotipozona_aval">                
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombrezona_aval" class="control-label col-md-2">NOMBRE DE ZONA</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control input-xs" name="nombrezona_aval" id="nombrezona_aval">
                    </div>     
                </div>
                <div class="form-group">
                    <label for="referencia_aval" class="control-label col-md-2">REFERENCIA</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control input-xs" name="referencia_aval" id="referencia_aval">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" name="guardarpersonaaval" data-dismiss="modal">Guardar</button>

            </div>
        </div>
    </div>
</div>