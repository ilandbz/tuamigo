<div class="container">
    <div class="panel panel-default">
        <div class="panel panel-heading">
            <h3 class="panel-title">LISTA DE CLIENTES</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive small" id="tablaclientesase">
                <table class="table table-bordered table-hover table-condensed small">
                    <tr class="success">
                        <th width="4%">ITEM</th>
                        <th width="5%">COD</th>
                        <th width="8%">DNI</th>
                        <th width="20%">APELLIDOS Y NOMBRES</th>
                        <th width="24%">DIRECCION</th>
                        <th width="10%">FECH. REGISTRO</th>
                        <th width="10%">ESTADO</th>
                        <th width="8%">ASESOR</th>
                        <th width="14%"></th>
                    </tr>
                    <?php $i=0; foreach($clientes as $row) : $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><a class="nounderline" href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $row['codcliente'] ?></a></td>
                        <td><a class="nounderline" href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $row['dni'] ?></a></td>
                        <td><a class="nounderline" href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $row['apenom'] ?></a></td>
                        <td><?php $direccion = $row['tipovia'].' '.$row['nombrevia'].' NRO : '.$row['nro'].', Interior : '.$row['interior'].', MZ : '.$row['mz'].', Lote : '.$row['lote'].', '.$row['tipozona'].':'.$row['nombrezona'].', REF:'.$row['referencia']; ?>
                            <span title="<?php echo $direccion ?>"><?php echo substr($direccion, 0, 80).' ....'; ?></span>
                        </td>
                        <td><?php echo $row['fecha_registro'] ?></td>
                        <td><?php echo $row['estado'] ?></td>
                        <td><?php echo $row['idusuario'] ?></td>
                        <td align="center">
                            <div class="btn-group btn-group-xs">
                                <a href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>" title="Ver Cliente" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a href="<?php echo base_url() ?>index.php/cliente/formactualizarpersona/<?php echo $row['dni'] ?>" title="Editar Persona" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                <?php if($this->session->userdata('tipouser')==5 || $this->session->userdata('tipouser')==3){ ?>
                                <a href="<?php echo base_url() ?>index.php/ahorros/configurarcliente/<?php echo $row['codcliente'] ?>" class="btn btn-primary" title="Configurar Cliente"><span class="glyphicon glyphicon-wrench"></span></a>
                                <?php } ?>
                                <a href="<?php echo base_url() ?>index.php/ahorros/eliminar/<?php echo $row['codcliente'] ?>" title="Eliminar Cliente" class="eliminar btn btn-danger<?php echo ($row['estado']!='INSCRITO' ? ' disabled' : '') ?>"><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div> 
        </div>
    </div>
</div>
