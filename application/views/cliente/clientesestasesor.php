<table class="table table-bordered table-hover table-condensed">
    <tr class="success">
        <th width="5%">COD</th>
        <th width="10%">DNI</th>
        <th width="25%">APELLIDOS Y NOMBRES</th>
        <th width="26%">DIRECCION</th>
        <th width="10%">FECH. REGISTRO</th>
        <th width="10%">ESTADO</th>
        <th width="13%"></th>
    </tr>
    <?php foreach($clientes as $row) : ?>
    <tr>
        <td><a class="nounderline" href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $row['codcliente'] ?></a></td>
        <td><a class="nounderline" href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $row['dni'] ?></a></td>
        <td><a class="nounderline" href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>"><?php echo $row['apenom'] ?></a></td>
        <td><?php
            $direccion = $row['tipovia'].' '.$row['nombrevia'].' NRO : '.$row['nro'].', Interior : '.$row['interior'].', MZ : '.$row['mz'].', Lote : '.$row['lote'].', '.$row['tipozona'].':'.$row['nombrezona'].', REF:'.$row['referencia'];
            echo $direccion ?>
         </td>
        <td><?php echo $row['fecha_registro'] ?></td>
        <td><?php echo $row['estado'] ?></td>
        <td>
            <div class="btn-group btn-group-sm">
                <a href="<?php echo base_url() ?>index.php/cliente/ver/<?php echo $row['codcliente'] ?>" title="Ver Cliente" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="<?php echo base_url() ?>index.php/cliente/formactualizarpersona/<?php echo $row['dni'] ?>" title="Modificar Cliente" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="<?php echo base_url() ?>index.php/cliente/eliminar/<?php echo $row['codcliente'] ?>" title="Eliminar Cliente" class="eliminar btn btn-danger<?php echo ($row['estado']!='INSCRITO' ? ' disabled' : '') ?>"><span class="glyphicon glyphicon-remove"></span></a>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</table>