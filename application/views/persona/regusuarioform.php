<div class="container">
    <form action="<?php echo base_url() ?>index.php/inicio/registrar_usuario" class="form-horizontal small" method="POST">
    <div class="panel panel-default" style="font-size: 10px;">
      <div class="panel-heading">
        <h3 class="panel-title">CREACION DE USUARIO</h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
            <label for="tipouser" class="control-label col-md-1">Tipo</label>
            <div class="col-md-2">
                <?php if($this->session->userdata('tipouser')==1){ ?>
                <select name="tipouser" id="tipouser" class="form-control input-xs" required>
                    <option value="">SELECCIONE</option>
                    <option value="2">ASESOR</option>
                    <option value="3">OPERACIONES</option>
                    <option value="4">COBRANZA</option>
                    <option value="5">GERENTE AGENCIA</option>                
                    <option value="6">OPERACIONES AGENCIA</option>
                </select>
                <?php }else{ ?>
               <select name="tipouser" id="tipouser" class="form-control input-xs" required>
                    <option value="2">ASESOR</option>
                </select>
                <?php } ?>
            </div> 
            <label for="agencia" class="control-label col-md-1">Agencia</label>
            <div class="col-md-2">
                <select name="agencia" id="agencia" class="form-control input-xs" required>
                <?php if($this->session->userdata('tipouser')==5) { ?>
                    <option value="<?php echo $this->session->userdata('agencia') ?>"><?php echo $this->session->userdata('agencia') ?></option>                
                <?php }else{ ?>
                    <option value="">Seleccione</option>
                    <option value="HUANUCO">HUANUCO</option>
                    <option value="HUANUCO2">Huanuco2</option>
                    <option value="TINGO MARIA">TINGO MARIA</option>
                <?php } ?>
                </select>
            </div>
            <label for="clave" class="control-label col-md-1">Clave</label>
            <div class="col-md-2">
                <input class="form-control input-xs" id="clave" name="clave" placeholder="Clave" maxlength="9" type="password" required/>
            </div> 
            <label for="claverepite" class="control-label col-md-1">Repite Clave</label>
            <div class="col-md-2">
                <input class="form-control input-xs" id="claverepite" name="claverepite" placeholder="Repite Clave" type="password" required autofocus/>
            </div>  
        </div>
        <div class="form-group">
            <label for="dni" class="control-label col-md-1">DNI</label>
            <div class="col-md-2">
                <input class="form-control solo_numeros input-xs cargarsiexistedni" id="dni" name="dni" placeholder="DNI" type="text" maxlength="8" required autofocus />
            </div>
        <?php $this->view('persona/formregpersonagral'); //datos persona generales ?>      
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