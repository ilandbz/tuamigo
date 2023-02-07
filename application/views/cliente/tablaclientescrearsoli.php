<?php if(count($clientes)==0){ ?>
    <span class="alert-warning">NO EXISTEN REGISTROS</span>
<?php }else{ ?>
    <table class="table table-bordered table-hover table-condensed small">
        <tr class="success">
            <th>ITEM</th>
            <th>COD</th>
            <th>DNI</th>
            <th>APELLIDOS Y NOMBRES</th>
            <th>DIRECCION</th>
            <th>FECH. REGISTRO</th>
            <th></th>                            
        </tr>
        <?php $i=0; foreach($clientes as $row) : $i++; ?>
        <?php
        $direccion = $row['tipovia'].' '.$row['nombrevia'].' NRO : '.$row['nro'].', Interior : '.$row['interior'].', MZ : '.$row['mz'].', Lote : '.$row['lote'].', '.$row['tipozona'].':'.$row['nombrezona'].', REF:'.$row['referencia'];
         ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><a class="nounderline" href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $row['codcliente'] ?></</td>
            <td><a class="nounderline" href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $row['dni'] ?></</td>
            <td><a class="nounderline" href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $row['apenom'] ?></</td>
            <td><a class="nounderline" href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $direccion ?></</td>
            <td><a class="nounderline" href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $row['fecha_registro'] ?></</td>
            <td><a title="Crear Solicitud" href="<?php echo base_url(); ?>index.php/solicitud/formsolicitud/<?php echo $row['codcliente'] ?>" class=""><span class="glyphicon glyphicon-edit"></span></a></a></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php } ?>