<option value="">--SELECCIONE--</option>
<?php foreach($distritos as $row): ?>
<option value="<?php echo $row['iddistrito'] ?>"><?php echo $row['nombre'] ?></option>
<?php endforeach; ?>