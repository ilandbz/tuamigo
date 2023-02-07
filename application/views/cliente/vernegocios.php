<div class="panel panel-info">

  <div class="panel-heading">
	NEGOCIOS DE <?php echo $cliente['apenom'] ?>
  </div>
  <div class="panel-body" style="font-size: 10px;">

    <table class="table table-bordered table-striped">
		<tr>
			<th width="6%">ITEM</th>
			<th>Razon social</th>
			<th>RUC</th>
			<th>Telefono</th>
			<th>Actividad</th>
			<th>Act. Especifica</th>
			<th>Inicio de Actividades</th>
			<th>Lugar</th>
			<th>Direccion</th>
			<th>Referencia</th>
			<th>Condicion</th>
		</tr>
		<?php $i=0; foreach ($negocios as $row) { $i++; ?>
			<td><?php echo $i; ?>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/cliente/formmodifnegocio/<?php echo $row['idnegocio'] ?>" class="" title="Modificar Negocio"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/cliente/eliminarnegocio/<?php echo $row['idnegocio'] ?>" class="text-danger eliminar" title="Eliminar Negocio"><span class="glyphicon glyphicon-remove"></span></a></td>
			<td><?php echo $row['razonsocial'] ?></td>
			<td><?php echo $row['ruc'] ?></td>
			<td><?php echo $row['tel_cel'] ?></td>
			<td><?php echo $row['actividad'] ?></td>
			<td><?php echo $row['actividad_espec'] ?></td>
			<td><?php echo $row['inicio_actividad'] ?></td>
			<td><?php echo $row['departamento'].' - '.$row['provincia'].' - '.$row['distrito'] ?></td>
			<td><?php echo $row['tipovia'].' '.$row['nombrevia'].' NRO.'.$row['Nro'].' Interior '.$row['interior'].' Mz '.$row['mz'].' Lote '.$row['lote'].' - '.$row['tipozona'].' '.$row['nombrezona'] ?></td>
			<td><?php echo $row['referencia'] ?></td>
			<td><?php echo $row['condicionvi'] ?></td>
		<?php } ?>
    </table>
  </div>
</div>
