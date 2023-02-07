<div class="modal fade" tabindex="-1" role="dialog" id="formregnegocio" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-xs-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModal-title">REGISTRAR NEGOCIO</h4>
            </div>
            <div class="modal-body" style="font-size: 10px;">         
                <div class="form-group">
                    <label for="razon_social" class="control-label col-md-3">RAZON SOCIAL</label>
                    <div class="col-md-6">
                        <input class="form-control mayuscula input-xs" id="razon_social" name="razon_social" placeholder="Razon Social" type="text" />
                    </div>
                    <div class="col-md-3">
                        <button type="button" id="casanegocio" class="btn btn-info pull-right btn-xs">Casa Negocio&nbsp;<span class="glyphicon glyphicon-sort-by-order-alt"></span></button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ruc_neg" class="control-label col-md-2">RUC</label>
                    <div class="col-md-3">
                        <input class="form-control solo_numeros input-xs" id="ruc_neg" name="ruc_neg" placeholder="RUC" type="text" />
                    </div>
                    <label for="telefono_neg" class="control-label col-md-2">TELEFONO</label>
                    <div class="col-md-3">
                        <input class="form-control solo_numeros input-xs" id="telefono_neg" name="telefono_neg" placeholder="TELEFONO" type="text" maxlength="9" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="actividad_neg" class="control-label col-md-2">ACTIVIDAD</label>
                    <div class="col-md-3">
                        <select name="actividad_neg" id="actividad_neg" class="form-control input-xs">
                            <option value="">SELECCIONE</option>
                            <option value="COMERCIO">COMERCIO</option>
                            <option value="PRODUCCION">PRODUCCION</option>
                            <option value="SERVICIO">SERVICIO</option>                        
                        </select>
                    </div>                                             
                    <label for="inicio_actividades" class="control-label col-md-3">INICIO DE ACTIVIDAD</label>
                    <div class="col-md-4">
                        <input class="form-control input-xs" type="date" name="inicio_actividades" id="inicio_actividades" value="<?php echo date('Y-m-d') ?>">
                    </div> 
                </div>
                <div class="form-group">
                    <label for="actividad_neg_det" class="control-label col-md-2">ESPECIFIQUE</label>
                    <div class="col-md-5">
                        <input class="form-control input-xs" type="text" name="actividad_neg_det" id="actividad_neg_det">
                    </div>  
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <p class="alert-info">DIRECCION DE NEGOCIO</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="condicionnegv" class="control-label col-md-2">TIPO</label>
                    <div class="col-md-4">
                        <select name="condicionnegv" id="condicionnegv" class="form-control input-xs">
                            <option value="">Seleccione</option>
                            <option value="Familiar">Familiar</option>
                            <option value="Propia">Propia</option>
                            <option value="Alquilada">Alquilada</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="departamento_neg" class="control-label col-md-2">DEP.</label>
                    <div class="col-md-3">
                        <select name="departamento_neg" id="departamento_neg" class="form-control input-xs">
                            <?php foreach($departamentos as $row): ?>
                            <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == '10') ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label for="provincia_neg" class="control-label col-md-1">PROV.</label>
                    <div class="col-md-3">
                        <select name="provincia_neg" id="provincia_neg" class="form-control input-xs">
                            <?php foreach($provincias as $row): ?>
                            <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == '186') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label for="distrito_neg" class="control-label col-md-1">DIST.</label>
                    <div class="col-md-2">
                        <select name="distrito_neg" id="distrito_neg" class="form-control input-xs">
                            <?php foreach($distritos as $row): ?>
                            <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == '0831') ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-2">TIPO DE VIA</label>
                    <div class="col-md-8" align="right">
                        <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Avenida" checked="true">Avenida</label>
                        <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Jiron">Jiron</label>
                        <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Calle">Calle</label>
                        <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Pasaje">Pasaje</label>
                        <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Prolongacion">Prol.</label>
                        <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Otro">Otro</label>&nbsp;
                    </div> 
                    <div class="col-md-2">
                        <input type="text" class="form-control input-sm input-xs" name="otrotipovia_neg">                
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-2">NOMBRE VIA</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control input-xs" name="nombrevia_neg">
                    </div>     
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-2">INMUEBLE</label>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group input-group-xs">
                                    <span class="input-group-addon">Nro</span>
                                    <input type="text" class="form-control" placeholder="" name="Nro_dom_neg">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-xs">
                                    <span class="input-group-addon">Interior</span>
                                    <input type="text" class="form-control" placeholder="" name="interior_dom_neg">
                                </div>
                            </div>
                            <div class="col-md-3">   
                                <div class="input-group input-group-xs">
                                    <span class="input-group-addon">Mz/Lote</span>
                                    <input type="text" class="form-control" placeholder="" name="mz_dom_neg">
                                </div>
                            </div>
                            <div class="col-md-3"> 
                                <div class="input-group input-group-xs">
                                    <span class="input-group-addon">Lote</span>
                                    <input type="text" class="form-control" placeholder="" name="lote_dom_neg">
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-2">TIPO DE ZONA</label>
                    <div class="col-md-8" align="right">
                        <label class="radio-inline control-label"><input name="tipozona_neg" type="radio" value="Urbanizacion" checked>Urbanizacion</label>
                        <label class="radio-inline control-label"><input name="tipozona_neg" type="radio" value="Asentamiento Humano">Asen. Hum.</label>
                        <label class="radio-inline control-label"><input name="tipozona_neg" type="radio" value="Cooperativa">Cooperativa</label>
                        <label class="radio-inline control-label"><input name="tipozona_neg" type="radio" value="PP.JJ.">PP.JJ.</label>
                        <label class="radio-inline control-label"><input name="tipozona_neg" type="radio" value="Otro">Otro</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control input-xs" name="otrotipozona_neg">                
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombrezona_neg" class="control-label col-md-2">ZONA</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-xs" name="nombrezona_neg" id="nombrezona_neg">
                    </div>
                    <label for="" class="control-label col-md-1">REF.</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control input-xs" name="referencia_neg">
                    </div> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="guardarnegociovalidar" class="btn btn-primary" data-dismiss="modal">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>