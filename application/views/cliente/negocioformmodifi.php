<div class="container">
    <h3>CLIENTE : <?php echo $cliente['apenom'] ?></h3>
    <form id="negociomodif" action="<?php echo base_url() ?>index.php/cliente/actualizarnegocio" method="post" class="form-horizontal" role="form">
    <div class="panel panel-info">
      <div class="panel-heading">
        NEGOCIO ID <?php echo $negocio['idnegocio'] ?>
      </div>
      <div class="panel-body" style="font-size: 10px;">
        <div class="form-group">
            <label for="razon_social" class="control-label col-md-1">RAZON SOC.</label>
            <div class="col-md-3">
                <input type="hidden" name="idnegocio" value="<?php echo $negocio['idnegocio'] ?>">
                <input type="hidden" name="codcliente" value="<?php echo $negocio['codcliente'] ?>">
                <input class="form-control mayuscula input-xs" id="razon_social" name="razon_social" placeholder="Razon Social" type="text" value="<?php echo $negocio['razonsocial'] ?>" />
            </div>
            <label for="ruc_neg" class="control-label col-md-1">RUC</label>
            <div class="col-md-2">
                <input class="form-control solo_numeros input-xs" id="ruc_neg" name="ruc_neg" placeholder="RUC" type="text" value="<?php echo $negocio['ruc'] ?>" />
            </div>
            <label for="telefono_neg" class="control-label col-md-1">TELEFONO</label>
            <div class="col-md-2">
                <input class="form-control solo_numeros input-xs" id="telefono_neg" name="telefono_neg" placeholder="TELEFONO" type="text" maxlength="9" value="<?php echo $negocio['tel_cel'] ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="actividad_neg" class="control-label col-md-1">ACTIVIDAD</label>
            <div class="col-md-2">
                <select name="actividad_neg" id="actividad_neg" class="form-control input-xs">
                    <option value="COMERCIO" <?php echo $negocio['actividad']=='COMERCIO' ? 'selected="selected"' : ''; ?>>COMERCIO</option>
                    <option value="PRODUCCION" <?php echo $negocio['actividad']=='PRODUCCION' ? 'selected="selected"' : ''; ?>>PRODUCCION</option>
                    <option value="SERVICIO" <?php echo $negocio['actividad']=='SERVICIO' ? 'selected="selected"' : ''; ?>>SERVICIO</option>
                </select>
            </div> 
            <label for="actividad_neg_det" class="control-label col-md-1">ESPECIFIQUE :</label>
            <div class="col-md-2">
                <input class="form-control input-xs" type="text" name="actividad_neg_det" id="actividad_neg_det" value="<?php echo $negocio['actividad_espec'] ?>">
            </div>
            <label for="condicionnegv" class="control-label col-md-1">TIPO NEG.</label>
            <div class="col-md-2">
                <select name="condicionnegv" id="condicionnegv" class="form-control input-xs">
                    <option value="Familiar" <?php echo $negocio['condicionvi']=='Familiar' ? 'selected="selected"' : ''; ?>>Familiar</option>
                    <option value="Propia" <?php echo $negocio['condicionvi']=='Propia' ? 'selected="selected"' : ''; ?>>Propia</option>
                    <option value="Alquilada" <?php echo $negocio['condicionvi']=='Alquilada' ? 'selected="selected"' : ''; ?>>Alquilada</option>
                </select>
            </div>
            <label for="inicio_actividades" class="control-label col-md-1">INICIO ACT.</label>
            <div class="col-md-2">
                <input class="form-control input-xs" type="date" name="inicio_actividades" id="inicio_actividades" value="<?php echo $negocio['inicio_actividad'] ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <p class="alert-info">DIRECCION</p>
            </div>
        </div>
        <div class="form-group">
            <label for="departamento_neg" class="control-label col-md-2">DEPARTAMENTO :</label>
            <div class="col-md-2">
                <select name="departamento_neg" id="departamento_neg" class="form-control input-xs">
                    <?php foreach($departamentos as $row): ?>
                    <option value="<?php echo $row['iddepartamento'] ?>" <?php echo ($row['iddepartamento'] == $negocio['iddepartamento']) ? 'selected="true"' : ''; ?> ><?php echo $row['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label for="provincia_neg" class="control-label col-md-2">PROVINCIA :</label>
            <div class="col-md-2">
                <select name="provincia_neg" id="provincia_neg" class="form-control input-xs">
                    <?php foreach($provincias as $row): ?>
                    <option value="<?php echo $row['idprovincia'] ?>" <?php echo ($row['idprovincia'] == $negocio['idprovincia']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label for="distrito_neg" class="control-label col-md-2">DISTRITO :</label>
            <div class="col-md-2">
                <select name="distrito_neg" id="distrito_neg" class="form-control input-xs">
                    <?php foreach($distritos as $row): ?>
                    <option value="<?php echo $row['iddistrito'] ?>" <?php echo ($row['iddistrito'] == $negocio['distrito_neg']) ? 'selected="true"' : ''; ?>><?php echo $row['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-md-2">TIPO DE VIA: </label>
            <div class="col-md-5" align="right">
                <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Avenida" <?php echo ($negocio['tipovia']=='Avenida') ? 'checked' : '' ?>>Avenida</label>
                <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Jiron" <?php echo ($negocio['tipovia']=='Jiron') ? 'checked' : '' ?>>Jiron</label>
                <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Calle" <?php echo ($negocio['tipovia']=='Calle') ? 'checked' : '' ?>>Calle</label>
                <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Pasaje" <?php echo ($negocio['tipovia']=='Pasaje') ? 'checked' : '' ?>>Pasaje</label>
                <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Prolongacion" <?php echo ($negocio['tipovia']=='Prolongacion') ? 'checked' : '' ?>>Prolongacion</label>&nbsp;
                <?php
                    if($negocio['tipovia']!='Avenida' && $negocio['tipovia']!='Jiron' && $negocio['tipovia']!='Calle' && $negocio['tipovia']!='Pasaje' && $negocio['tipovia']!='Prolongacion'){ 
                        $aux=1;
                    }else{
                        $aux=0;
                    }
                 ?>
                <label class="radio-inline control-label"><input name="tipovia_neg" type="radio" value="Otro" <?php echo $aux==1 ? 'checked="true"' : '' ?>>Otro</label>&nbsp;
            </div> 
            <div class="col-md-1">
                <input type="text" class="form-control input-xs" name="otrotipovia_neg" value="<?php echo $aux==1 ? $negocio['tipovia'] : ''; ?>">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control input-xs" name="nombrevia_neg" value="<?php echo $negocio['nombrevia'] ?>">
            </div>           
        </div>
        <div class="form-group">
            <label for="" class="control-label col-md-2">N° DE INMUEBLE: </label>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group input-group-xs">
                            <span class="input-group-addon">Nro</span>
                            <input type="text" class="form-control" placeholder="" name="Nro_dom_neg" value="<?php echo $negocio['Nro'] ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group input-group-xs">
                            <span class="input-group-addon">Interior</span>
                            <input type="text" class="form-control" placeholder="" name="interior_dom_neg" value="<?php echo $negocio['interior'] ?>">
                        </div>
                    </div>
                    <div class="col-md-2">   
                        <div class="input-group input-group-xs">
                            <span class="input-group-addon">Mz/Lote</span>
                            <input type="text" class="form-control" placeholder="" name="mz_dom_neg" value="<?php echo $negocio['mz'] ?>">
                        </div>
                    </div>
                    <div class="col-md-2"> 
                        <div class="input-group input-group-xs">
                            <span class="input-group-addon">Lote</span>
                            <input type="text" class="form-control" placeholder="" name="lote_dom_neg" value="<?php echo $negocio['lote'] ?>">
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-md-2">TIPO DE ZONA: </label>
            <div class="col-md-5" align="right">
            <label class="radio-inline control-label"><input name="tipozona_neg" type="radio" value="Urbanizacion" <?php echo ($negocio['tipozona']=='Urbanizacion') ? 'checked' : '' ?>>Urbanizacion</label>
            <label class="radio-inline control-label"><input name="tipozona_neg" type="radio" value="Asentamiento Humano" <?php echo ($negocio['tipozona']=='Asentamiento Humano') ? 'checked' : '' ?>>Asentamiento Humano</label>
            <label class="radio-inline control-label"><input name="tipozona_neg" type="radio" value="Cooperativa" <?php echo ($negocio['tipozona']=='Cooperativa') ? 'checked' : '' ?>>Cooperativa</label>
            <label class="radio-inline control-label"><input name="tipozona_neg" type="radio" value="PP.JJ." <?php echo ($negocio['tipozona']=='PP.JJ.') ? 'checked' : '' ?>>PP.JJ.</label>
            <?php
                if($negocio['tipovia']!='Avenida' && $negocio['tipovia']!='Jiron' && $negocio['tipovia']!='Calle' && $negocio['tipovia']!='Pasaje' && $negocio['tipovia']!='Prolongacion'){ 
                    $aux2=1;
                }else{
                    $aux2=0;
                }
             ?>
            <label class="radio-inline control-label"><input name="tipozona_neg" type="radio" value="Otro" <?php echo $aux2==1 ? 'checked="true"' : '' ?>>Otro</label>
            </div>
            <div class="col-md-1">
                <input type="text" class="form-control input-xs" name="otrotipozona_neg" value="<?php echo $aux2==1 ? $negocio['tipozona'] : ''; ?>">                   
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control input-xs" name="nombrezona_neg" id="nombrezona_neg" value="<?php echo $negocio['nombrezona'] ?>">
            </div>            
        </div>
        <div class="form-group">
            <label for="" class="control-label col-md-2">REFERENCIA: </label>
            <div class="col-md-5">
                <input type="text" class="form-control input-xs" name="referencia_neg" value="<?php echo $negocio['referencia'] ?>">
            </div>                   
        </div>
      </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-primary" data-dismiss="modal" name="actavalbtn">Guardar Cambios</button>
        </div>
    </div>
    </form>
</div>