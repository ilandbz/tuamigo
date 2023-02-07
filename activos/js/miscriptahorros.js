var link = "http://localhost/tuamigo/";
//var link = "https://amigoemprendedor.com/";
//var link = "https://amigoemprendedor.com/";
//var link = "http://192.168.1.254/tuamigo/";

$("select[name=departamento_nac]").change(function () {   
	var idDepa = $(this).val();
	$.get(link+"index.php/cliente/cargar_provincias/"+idDepa,function(data){
		$('select[name=provincia_nac]').prop('disabled', false);
		$("select[name=provincia_nac]").html(data);	
	});
});
$("select[name=provincia_nac]").change(function () {
	var idDist = $(this).val();
	$.get(link+"index.php/cliente/cargar_distritos/"+idDist,function(data){
		$('select[name=distrito_nac]').prop('disabled', false);
		$("select[name=distrito_nac]").html(data);
	});
});
$("select[name=departamento_domic]").change(function () {
	var idDepa = $(this).val();
	$.get(link+"index.php/cliente/cargar_provincias/"+idDepa,function(data){
		$('select[name=provincia_domic]').prop('disabled', false);
		$("select[name=provincia_domic]").html(data);
	});
});
$("select[name=provincia_domic]").change(function () {   
	var idDist = $(this).val();
	$.get(link+"index.php/cliente/cargar_distritos/"+idDist,function(data){
		$('select[name=distrito_domic]').prop('disabled', false);
		$("select[name=distrito_domic]").html(data);
	});
});
$("select[name=departamento]").change(function () {   
	var idDepa = $(this).val();
	$.get(link+"index.php/cliente/cargar_provincias/"+idDepa,function(data){
		$('select[name=provincia]').prop('disabled', false);
		$("select[name=provincia]").html(data);
	});
});
$("select[name=provincia]").change(function () {   
	var idDist = $(this).val();
	$.get(link+"index.php/cliente/cargar_distritos/"+idDist,function(data){
		$('select[name=distrito]').prop('disabled', false);
		$("select[name=distrito]").html(data);
	});
});
$("#montopagar").keyup(function(e) {
	var valor = $(this).val();
	$('input[name=montototalpagar]').val(valor);
});
$('.cargarsiexistedni').change(function (){
	var dni = $(this).val();
	var tipo = $('input[name=tipo]').val();	
	$.post(link+"index.php/cliente/existepersona",{ 
		dni:dni
		},
		function(data){
			if(data=='true'){
				$.get(link+"index.php/cliente/cargarformclientepersona/"+dni,function(data){
					$.get(link+"index.php/cliente/existecliente/"+dni+"/"+tipo,function(data){
						if(data=='true'){
							$('#contenidocrearcliente').html('<br><br><br><div class="alert alert-danger"><h3>YA EXISTE CLIENTE CON EL DNI '+dni+'</h3></div>"');
							return false;					
						}
					});
					cargardatospordni(dni);
				}, "json");
			}
		});
});
$('.checkpagar').change(function (){
	var codigo=$(this).val();
	if($(this).is(':checked')){
		$('#monto'+codigo).removeAttr('disabled');
		$('#estado'+codigo).removeAttr('disabled');
		$('#iddesembolso'+codigo).removeAttr('disabled');
		$('#saldo'+codigo).removeAttr('disabled');
	}else{
	    var valor_input = $('#monto'+codigo).val(); 
	    var valoranterior=parseFloat(document.getElementById('totalapagar').value);
	    document.getElementById('totalapagar').value=(valoranterior-parseFloat(valor_input)).toFixed(2);
		$('#monto'+codigo).val('');
		$('#monto'+codigo).attr('disabled', 'disabled');
		$('#estado'+codigo).attr('disabled', 'disabled');
		$('#iddesembolso'+codigo).attr('disabled', 'disabled');
		$('#saldo'+codigo).attr('disabled', 'disabled');
	}
});

function cargardatospordni(dni){
	$.post(link+"index.php/cliente/existepersona",{
		dni : dni
		},
		function(data){
			if(data=='true'){
				$.get(link+"index.php/cliente/cargarformclientepersona/"+dni,function(data){
					$('#ruc').val(data.ruc);
					if(data.sexo=='F'){
						$('input[name=sexo]').click();
					}
					$('#nombres').val(data.nombres);
					$('input[name=apellidos]').val(data.apellidos);
					$('input[name=apellidos2]').val(data.apellidos2);
					$('input[name=fecha_nac]').val(data.fecha_nac);
					$("select[name=departamento_nac]").val(data.iddepartamento_nac);
					$.get(link+"index.php/cliente/cargar_provincias/"+data.iddepartamento_nac,function(data2){
						$("select[name=provincia_nac]").html(data2);
						$("select[name=provincia_nac]").val(data.idprovincia_nac);
					});
					$.get(link+"index.php/cliente/cargar_distritos/"+data.idprovincia_nac,function(data2){
						$("select[name=distrito_nac]").html(data2);
						$("select[name=distrito_nac]").val(data.distrito_nac);
					});
					$("select[name=estadociv]").val(data.estadocivil);
					if(data.estadocivil=='Casado' || data.estadocivil=='Conviviente'){
						$('#verconyugue').show();
						$('input[name=dni_conyugue2]').val(data.dniconyugue);
						$('input[name=dni_conyugue]').val(data.dniconyugue);
						$('input[name=dni_conyugue]').focusout();
					}
					$("input[name=nacionalidadc]").val(data.nacionalidad);
					$("select[name=grado_inst]").val(data.grado_instr);
					$("select[name=profesionc]").val(data.profesion);
					$("input[name=telefono]").val(data.celular);
					$("input[name=email]").val(data.email);
					$("select[name=tipovivienda]").val(data.tipovivienda);
					$("select[name=departamento]").val(data.iddepartamento_domic);
					$.get(link+"index.php/cliente/cargar_provincias/"+data.iddepartamento_domic,function(data2){
						$("select[name=provincia]").html(data2);	
						$("select[name=provincia]").val(data.idprovincia_domic);
					});
					$.get(link+"index.php/cliente/cargar_distritos/"+data.idprovincia_domic,function(data2){
						$("select[name=distrito]").html(data2);
						$("select[name=distrito]").val(data.distrito_domic);
					});
					$('input:radio[name="tipovia"]').filter('[value="'+data.tipovia+'"]').attr('checked', true);
					$('input[name=nombrevia]').val(data.nombrevia);	
					$('input[name=Nro_dom]').val(data.Nro);		
					$('input[name=interior_dom]').val(data.interior);
					$('input[name=mz_dom]').val(data.mz);
					$('input[name=lote_dom]').val(data.lote);
					$('input:radio[name="tipozona"]').filter('[value="'+data.tipozona+'"]').attr('checked', true);
					$('input[name=nombrezona]').val(data.nombrezona);
					$('input[name=referencia]').val(data.referencia);
					$('input:radio[name="tipotrabajadorc"]').filter('[value="'+data.tipotrabajador+'"]').attr('checked', true);
					$('select[name=ocupacionc]').val(data.ocupacion);
					$('input[name=instituciontrabajo]').val(data.institucion_lab);
				}, "json");
			}
		});	
}
$('form[name=buscarclientesahorros] input[name=apenomclie]').keyup(function(){
	var apenomclie = $(this).val();
	$.post(link+"index.php/ahorros/cargarlista", 
		{
			apenomclie : apenomclie
		}, 
		function(data){
			$('#listasolicitudes').html(data);
		}
	);
});
$('#bscapenomsda').click(function (){
	var bscapenomsda = $('input[name=apenomclie]').val();
	if(bscapenomsda!=''){
		$('#vistasolicitudesdesembapro').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
		$.post(link+"index.php/ahorros/resultbusquedaapagar",{ 
			apenom : bscapenomsda
		},
		function(data){
			$('#vistasolicitudesdesembapro').html(data);
		});	
	}
});
$('#bscapenomsdadev').click(function (){
	var bscapenomsda = $('input[name=apenomclie]').val();
	if(bscapenomsda!=''){
		$('#vistasolicitudesdesembapro').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
		$.post(link+"index.php/ahorros/bscapenomsdadev",{ 
			apenom : bscapenomsda
		},
		function(data){
			$('#vistasolicitudesdesembapro').html(data);
		});	
	}
});

$('#agregarinteresdev').click(function (){
	var saldoactual = $('input[name=saldo]').val();
	var interes = $('input[name=interes]').val();
	var totaldevolver = parseFloat(saldoactual)+parseFloat(interes);
	$('input[name=totaldevolver]').val(totaldevolver);
});
$('#agregarctarjeta').click(function (){
	var saldoactual = $('input[name=saldo]').val();
	var costotarjeta = $('input[name=costotarjeta]').val();
	var totaldevolver = parseFloat(saldoactual)-parseFloat(costotarjeta);
	$('input[name=totaldevolver]').val(totaldevolver);
});

function sptotal(objInput, saldoreg){
    var valor_input = objInput.value; 
    var valoranterior=parseFloat(document.getElementById('totalapagar').value);
	if(valor_input>saldoreg){ 
		alert('EL MONTO ES MAYOR AL SALDO'); 
	}else{
	    if(valor_input != ''){
	    	total = (valoranterior+parseFloat(valor_input)).toFixed(2);
	    	document.getElementById('totalapagar').value=total;
	    	$('#mostrarpagoacumulado').html('S/.'+total);
	    	$(objInput).attr('readonly', 'true');
	    }	
	}
}
function validarpagosasesor(){
	if(parseFloat($('input[name=saldoasesor2]').val()) < parseFloat($('#totalapagar').val())){
		alert('Saldo Insuficiente');
		location.reload();
		return false;
	}else{
		$('#btnguardarpaga').attr('disabled', 'disabled');
		$('#solicitudescobranzaasesor').addClass("hide");
		$('#mensajedecarga').html('<div align="center">ENVIANDO REGISTROS ... <br><img src="'+link+'activos/images/Loading_icon.gif"></div>');
		return true;
	}
}
$('input[name=mvuelto]').click(function (){
	var vuelto=0;
	var montototalpagar=$('#montototalpagar').val();
	var mrecibido = $('#mrecibido').val();
	vuelto=(mrecibido-montototalpagar).toFixed(2);
	if(vuelto<0){
		vuelto=0;
	}
	$(this).val(vuelto);
});
$('select[name=descripcion]').change(function (){
	var valor = $(this).val();
	if(valor=='DEPOSITO PLAZO FIJO'){
		$('select[name=frecuencia]').html('<option value="DPF">Fija</option>');
	}else if(valor=='AHORRO PARA EL FUTURO'){
		$('select[name=frecuencia]').html('<option value="DIARIO">Diario</option><option value="SEMANAL">Semanal</option><option value="MENSUAL">Mensual</option>');
	}else{
		$('select[name=frecuencia]').html('<option value="DIARIO">Diario</option>');
		$('select[name=plazo]').html('<option value="4">4 MESES</option>');
		$('input[name=montosolic]').val('4');
		$('input[name=montosolic]').attr('readonly', 'true');
		$('input[name=fechainicio]').val('2021-09-15');		
	}
});
$('#buscarrdoco').click(function (){
	var fechaini = $('input[name=fechaini]').val();
	var fechafin = $('input[name=fechafin]').val();
	var estadosolic = $('select[name=estadosolic]').val();
	var asesor = $('select[name=asesor]').val();
	var agenciabsc = $('select[name=agenciabsc]').val();	
	$('#resultadobusqueda').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/report/cargarlistdocojs",{ //REPORTE GENERAL ENTRE FECHAS
		fechaini : fechaini,
		fechafin : fechafin,
		estadosolic : estadosolic,
		asesor : asesor,
		agenciabsc : agenciabsc
		},
		function(data){
			$("#resultadobusqueda").html(data);
		});
});
$('#buscardocoreport').click(function (){
	alert('FALTA TERMINAR');
});
$(".devolverconfirm").click(function (){
    if(window.confirm("ESTA SEGURO DE DEVOLVER?")==false){
        return false;
    }
});


$('input[name=codigo]').keypress(function (e){
	var codigo = $(this).val();
    if(e.which == 13) {
		if(codigo!=''){
			location.href=link+'index.php/ahorros/pagoform/'+codigo;
		}
    }
});

$("#bsccuentaahorros").click(function (){
	var codigo = $('input[name=codigo]').val();
	location.href=link+'index.php/ahorros/pagoform/'+codigo;
    
});


