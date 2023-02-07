<h3><?= $registro['apenom']; ?></h3>
<h3><small>SALDO : </small>S/.<?= number_format($registro['saldo'],2); ?></h3>
<input type="text" name="saldo" value="<?= $registro['saldo'] ?>">
