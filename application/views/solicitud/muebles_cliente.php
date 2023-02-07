<div class="table-responsive small">
	<table class="table table-striped">
		<tr>
			<th>DESCRIPCION</th>
			<th>VALOR</th>
			<th></th>
		</tr>
		<?php foreach($muebles as $row) : ?>
		<tr>
			<td><?php echo $row['descripcion'] ?></td>
			<td><?php echo $row['cantidad'] ?></td>
			<td><a href="<?php echo $row['id'] ?>" class="btn btn-danger btn-xs eliminarmueble"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<script>
$(".eliminarmueble").click(function(){
	var id = $(this).attr("href");
	$.get(link+"index.php/solicitud/eliminarmueblecliente/"+id,function(data){
		if(data=='true'){
			cargar_mueblescliente();
		}
	});
	return false;
});	
</script>