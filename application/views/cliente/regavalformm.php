<form name="regavalact" action="<?php echo base_url() ?>index.php/cliente/regnuevaval/<?php echo $cliente['codcliente'] ?>" method="POST">
    <div class="modal fade" tabindex="-1" role="dialog" id="formregaval" aria-hidden="true">
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
                        <label for="dni_aval" class="control-label col-md-2">DNI :</label>
                        <div class="col-md-2">
                            <input class="form-control solo_numeros" id="dni_aval" name="dni_aval" placeholder="DNI" type="text" maxlength="8" required />
                        </div>
                        <label for="ruc_aval" class="control-label col-md-1">RUC :</label>
                        <div class="col-md-2">
                            <input class="form-control solo_numeros" id="ruc_aval" name="ruc_aval" maxlength="11" placeholder="RUC" type="text"/>
                        </div> 
                        <label for="sexoaval" class="control-label col-md-1">SEXO :</label>
                        <div class="col-md-2">
                            <input type="checkbox" value="M" name="sexoaval" checked="true" class="sexocheck">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombres_aval" class="control-label col-md-2">NOMBRES :</label>
                        <div class="col-md-2">
                            <input class="form-control mayuscula" id="nombres_aval" name="nombres_aval" placeholder="Nombres" type="text" required />
                        </div>
                        <label for="apellidos_aval" class="control-label col-md-2">AP. PAT :</label>
                        <div class="col-md-2">
                            <input class="form-control mayuscula" id="apellidos_aval" name="apellidos_aval" placeholder="Apellido Paterno" type="text" required />
                        </div>



                    <label for="apellidos2" class="control-label col-md-1">AP. MAT :</label>
                    <div class="col-md-2">
                        <input class="form-control mayuscula" id="apellidos2" maxlength="25" name="apellidos2" placeholder="Apellido Materno" type="text" required/>
                    </div>    





                    </div>
                    <div class="form-group">
                        <label for="fecha_nac_aval" class="control-label col-md-2">FECHA NAC :</label>
                        <div class="col-md-4">
                            <input class="form-control" type="date" name="fecha_nac_aval" id="fecha_nac_aval" required>
                        </div>
                        <label for="departamento_aval" class="control-label col-md-2">DEPART. NAC:</label>
                        <div class="col-md-4">
                            <select name="departamento_aval" id="departamento_aval" class="form-control">
                                <?php foreach($departamentos as $row): ?>
                                <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == '10') ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>            
                    </div>
                    <div class="form-group">
                        <label for="provincia_aval" class="control-label col-md-2">PROVINCIA NAC:</label>
                        <div class="col-md-3">
                            <select name="provincia_aval" id="provincia_aval" class="form-control">
                                <?php foreach($provinciasr as $row): ?>
                                <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == '186') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label for="distrito_aval" class="control-label col-md-3">DISTRITO NAC:</label>
                        <div class="col-md-4">
                            <select name="distrito_aval" id="distrito_aval" class="form-control" required>
                                <?php foreach($distritosr as $row): ?>
                                <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == '0831') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>                            
                    </div> 
                    <div class="form-group">
                        <label for="estadociv_aval" class="control-label col-md-2" required>ESTADO CIVIL :</label>
                        <div class="col-md-4">
                            <select name="estadociv_aval" id="estadociv_aval" class="form-control">
                                <option value="Soltero">Soltero</option>
                                <option value="Casado">Casado</option>
                                <option value="Conviviente">Conviviente</option>
                                <option value="Viudo">Viudo</option>
                                <option value="Divorciado">Divorciado</option>
                            </select>
                        </div> 
                        <label for="nacionalidad_aval" class="control-label col-md-2">NACIONALIDAD</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="nacionalidad_aval" id="nacionalidad_aval" value="PERUANO">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="grado_inst_aval" class="control-label col-md-2">GRADO DE INSTRUCCION :</label>
                        <div class="col-md-4">
                            <select name="grado_inst_aval" id="grado_inst_aval" class="form-control" required>
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
                        <label for="profesion_aval" class="control-label col-md-2">PROFESION :</label>
                        <div class="col-md-4">
                            <select name="profesion_aval" id="profesion_aval" class="form-control" disabled>
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
                        <label for="telefono_aval" class="control-label col-md-2">TELEFONO/CEL :</label>
                        <div class="col-md-4">
                            <input class="form-control solo_numeros" id="telefono_aval" name="telefono_aval" placeholder="Telefono" maxlength="9" type="text"/>
                        </div> 
                        <label for="email_aval" class="control-label col-md-2">EMAIL :</label>
                        <div class="col-md-4">
                            <input class="form-control" id="email_aval" name="email_aval" placeholder="Email" type="email"/>
                        </div>                                                       
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">TIPO DE TRABAJADOR</label>
                        <div class="col-md-4">
                            <label class="radio-inline control-label"><input name="tipotrabajador_aval" id="tipotrabajadordep_aval" type="radio" value="DEPENDIENTE" checked="true">DEPENDIENTE</label>
                            <label class="radio-inline control-label"><input id="avalno" name="tipotrabajador_aval" type="radio" value="INDEPENDIENTE">INDEPENDIENTE</label>
                        </div> 
                        <label for="ocupacion_aval" class="control-label col-md-2">OCUPACION :</label>
                        <div class="col-md-4">
                            <select name="ocupacion_aval" id="ocupacion_aval" class="form-control">
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
                    </div>
                    <div class="form-group">
                        <label for="instituciontrabajo_aval" class="control-label col-md-2">INSTITUCION DONDE LABORA:</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="" name="instituciontrabajo_aval" id="instituciontrabajo_aval">
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
                            <select name="tipovivienda_aval" id="tipovivienda_aval" class="form-control input-sm" required>
                                <option value="">Seleccione</option>
                                <option value="Familiar">Familiar</option>
                                <option value="Propia">Propia</option>
                                <option value="Alquilada">Alquilada</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="departamento_dom_aval" class="control-label col-md-2">DEPARTAMENTO :</label>
                        <div class="col-md-2">
                            <select name="departamento_dom_aval" id="departamento_dom_aval" class="form-control">
                                <?php foreach($departamentos as $row): ?>
                                <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == '10') ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label for="provincia_dom_aval" class="control-label col-md-2">PROVINCIA :</label>
                        <div class="col-md-2">
                            <select name="provincia_dom_aval" id="provincia_dom_aval" class="form-control">
                                <?php foreach($provinciasr as $row): ?>
                                <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == '186') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label for="distrito_dom_aval" class="control-label col-md-2">DISTRITO :</label>
                        <div class="col-md-2">
                            <select name="distrito_dom_aval" id="distrito_dom_aval" class="form-control">
                                <?php foreach($distritosr as $row): ?>
                                <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == '0831') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>        
                    <div class="form-group">
                        <label for="tipovia_aval" class="control-label col-md-2">TIPO DE VIA: </label>
                        <div class="col-md-7" align="right">
                            <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Avenida" checked="true">Avenida</label>
                            <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Jiron">Jiron</label>
                            <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Calle">Calle</label>
                            <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Pasaje">Pasaje</label>
                            <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Prolongacion">Prolongacion</label>
                            <label class="radio-inline control-label"><input name="tipovia_aval" type="radio" value="Otro">Otro</label>&nbsp;
                        </div>                
                        <div class="col-md-3">
                            <input type="text" class="form-control input-sm" name="otrotipovia_aval">                
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombrevia_aval" class="control-label col-md-2">NOMBRE VIA: </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nombrevia_aval" id="nombrevia_aval">
                        </div>     
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-2">N° DE INMUEBLE: </label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon">Nro</span>
                                        <input type="text" class="form-control" name="Nro_dom_aval" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon">Interior</span>
                                        <input type="text" class="form-control" placeholder="" name="interior_dom_aval">
                                    </div>
                                </div>
                                <div class="col-md-3">   
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon">Mz</span>
                                        <input type="text" class="form-control" placeholder="" name="mz_dom_aval">
                                    </div>
                                </div>
                                <div class="col-md-3"> 
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon">Lote</span>
                                        <input type="text" class="form-control" placeholder="" name="lote_dom_aval">
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-2">TIPO DE ZONA: </label>
                        <div class="col-md-7" align="right">
                            <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Urbanizacion" checked="true">Urbanizacion</label>
                            <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Asentamiento Humano">Asentamiento Humano</label>
                            <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Cooperativa">Cooperativa</label>
                            <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="PP.JJ.">PP.JJ.</label>
                            <label class="radio-inline control-label"><input name="tipozona_aval" type="radio" value="Otro">Otro</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control input-sm" name="otrotipozona_aval">                
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombrezona_aval" class="control-label col-md-2">NOMBRE DE ZONA: </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="nombrezona_aval" id="nombrezona_aval">
                        </div>     
                    </div>
                    <div class="form-group">
                        <label for="referencia_aval" class="control-label col-md-2">REFERENCIA: </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="referencia_aval" id="referencia_aval">
                        </div>
                    </div>
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" name="guardarnuevaval" data-dismiss="modal">Guardar</button>
                    <!-- <button type="button" class="btn btn-primary" data-dismiss="modal" name="guardarnuevaval">Guardar</button> -->
                </div>
            </div>
        </div>
    </div>
</form>