	<script type="text/javascript" src="<?php echo base_url() ?>activos/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>activos/bootstrap3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>activos/js/scriptgeneral.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>activos/js/miscriptahorros.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>activos/js/jquery-ui.js"></script>	
	<script>
	$( function() {
	var availableTags = [<?php echo $lista ?>];
	$( "#apenomclie" ).autocomplete({
	  source: availableTags
	});
	} );
	</script>
</body>
</html>