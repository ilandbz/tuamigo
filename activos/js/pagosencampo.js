//var link = "https://amigoemprendedor.com/";
var link = "http://localhost/tuamigo/";
$("button[name=buscardes]").click(function () {  
	var iddesembolso = $('input[name=iddesembolso]').val();
	if(iddesembolso!=''){
		$('input[name=monto]').removeAttr('readonly');
		$.get(link+"index.php/pagosencampo/cargardesembolso/"+iddesembolso,function(data){
			$('#resultado').html(data);
		});		
	}
});