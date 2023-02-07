<option value="">--SELECCIONE--</option>
<?php foreach($provincias as $row): ?>
<option value="<?php echo $row['idprovincia'] ?>"><?php echo $row['nombre'] ?></option>
<?php endforeach; ?>