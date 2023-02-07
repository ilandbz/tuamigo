<div class="container">
	<form name="guardarcaja" action="<?php echo base_url() ?>index.php/caja/regpagoscuotasvarios" method="POST">
<?php foreach($lista as $row){ ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">REGISTRO DE PAGOS DE CUOTAS CAJA</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4"><h4><small>FECHA : </small><?php echo date("d-m-Y H:i:s",strtotime($row['fecha_reg'])); ?></h4></div>
					<div class="col-md-4"><h4><small>ID SOLICITUD : </small><?php echo $row['idsolicitud'] ?></h4></div>
					<div class="col-md-4"><h4><small>ID DESEMBOLSO : </small><?php echo $row['iddesembolso'] ?></h4></div>
				</div>
				<div class="row">
					<div class="col-md-4"><h4><small>TOTAL : </small>S/.<?php echo number_format($row['total'],2) ?></h4></div>
					<div class="col-md-4"><h4></h4>	</div>
					<div class="col-md-4"></div>
				</div>
					
				<h4><small>CONCEPTO : </small><?php echo $row['descripcion'] ?></h4>	
				<input type="hidden" name="caja[<?php echo $row['iddesembolso'] ?>][monto]" value="<?php echo $row['total']; ?>">
				<input type="hidden" name="caja[<?php echo $row['iddesembolso'] ?>][descripcion]" value="<?php echo $row['descripcion'] ?>">
				<input type="hidden" name="caja[<?php echo $row['iddesembolso'] ?>][fechareg]" value="<?php echo date("Y-m-d H:i:s",strtotime($row['fecha_reg'])); ?>">
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-12">
						<a href="<?php echo base_url() ?>index.php/pagos/formpago/<?php echo $row['idsolicitud'] ?>" class="btn btn-info">VER PAGOS</a>

					</div>
				</div>
			</div>
		</div>
<?php } ?>
	<button type="submit" id="regcpcajarcs" class="btn btn-success pull-right"><span class="glyphicon glyphicon-saved"></span> Registrar En Caja</button>

<br><br>

	</form>





	
</div>