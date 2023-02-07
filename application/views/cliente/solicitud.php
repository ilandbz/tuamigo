<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">CLIENTES INSCRITOS</h3>
        </div>    
        <div class="panel-body">
            <div id="contenido_solicitud">
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon">APELLIDOS Y NOMBRES</span>
                            <input type="text" name="apenomclientetcs" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                       <div class="input-group">
                          <input type="text" class="form-control solo_numeros" id="codcliente" name="codcliente" placeholder="CODIGO CLIENTE">
                          <span class="input-group-btn">
                            <button id="bsc_codcliente" class="btn btn-default" maxlength="8" type="button"><span class="glyphicon glyphicon-search"></span></button>
                          </span>
                        </div>
                    </div>
                </div>
                <br>
                <div id="tablavistaclientescrearsolic">
                    <?php $this->view('cliente/tablaclientescrearsoli'); ?>
                </div>
            </div>
        </div>
    </div>
</div>





