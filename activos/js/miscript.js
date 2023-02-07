var link = "http://localhost/tuamigo/";
//var link = "https://amigoemprendedor.com/";
//var link = "http://amigoemprendedor.com/";
//var link = "http://192.168.1.254/tuamigo/";
$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
});
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
$("select[name=departamento_conyugue]").change(function () {   
	var idDepa = $(this).val();
	$.get(link+"index.php/cliente/cargar_provincias/"+idDepa,function(data){
		$('select[name=provincia_conyugue]').prop('disabled', false);
		$("select[name=provincia_conyugue]").html(data);
	});
});
$("select[name=provincia_conyugue]").change(function () {   
	var idDist = $(this).val();
	$.get(link+"index.php/cliente/cargar_distritos/"+idDist,function(data){
		$('select[name=distrito_conyugue]').prop('disabled', false);
		$("select[name=distrito_conyugue]").html(data);
	});
});
$("select[name=departamento_aval]").change(function () {   
	var idDepa = $(this).val();
	$.get(link+"index.php/cliente/cargar_provincias/"+idDepa,function(data){
		$('select[name=provincia_aval]').prop('disabled', false);
		$("select[name=provincia_aval]").html(data);
	});
});
$("select[name=provincia_aval]").change(function () {   
	var idDist = $(this).val();
	$.get(link+"index.php/cliente/cargar_distritos/"+idDist,function(data){
		$('select[name=distrito_aval]').prop('disabled', false);
		$("select[name=distrito_aval]").html(data);
	});
});
$("select[name=departamento_dom_aval]").change(function () {   
	var idDepa = $(this).val();
	$.get(link+"index.php/cliente/cargar_provincias/"+idDepa,function(data){
		$('select[name=provincia_dom_aval]').prop('disabled', false);
		$("select[name=provincia_dom_aval]").html(data);
	});
});
$("select[name=provincia_dom_aval]").change(function () {   
	var idDist = $(this).val();
	$.get(link+"index.php/cliente/cargar_distritos/"+idDist,function(data){
		$('select[name=distrito_dom_aval]').prop('disabled', false);
		$("select[name=distrito_dom_aval]").html(data);
	});
});
$("select[name=departamento_neg]").change(function () {   
	var idDepa = $(this).val();
	$.get(link+"index.php/cliente/cargar_provincias/"+idDepa,function(data){
		$('select[name=provincia_neg]').prop('disabled', false);
		$("select[name=provincia_neg]").html(data);
	});
});
$("select[name=provincia_neg]").change(function () {   
	var idDist = $(this).val();
	$.get(link+"index.php/cliente/cargar_distritos/"+idDist,function(data){
		$('select[name=distrito_neg]').prop('disabled', false);
		$("select[name=distrito_neg]").html(data);
	});
});
$("#bsc_codcliente").click(function () {   
	var codcliente=$("#codcliente").val();
	location.href=link+'index.php/solicitud/formsolicitud/'+codcliente;
});
$("#codcliente").keypress(function (e) {   
    if(e.which == 13) {
		var codcliente=$(this).val();
		location.href=link+'index.php/solicitud/formsolicitud/'+codcliente;
    }
});
$("#estadociv").change(function () {   
	var estado=$(this).val();
	var sexo=$('input:radio[name="sexo"]:checked').val();
	if(estado=='Casado' || estado=='Conviviente'){
		$('#formregconyugue').modal('show');
		$(this).attr('readonly', 'true');
		$('#verconyugue').show();
		$("input[name=estadociv_conyugue]").val(estado);
		if(sexo=='M'){
			$("#conyuguemujer").attr('checked', true);	
		}else{
			$("#conyuguevaron").attr('checked', true);	
		}
	}
});
$('input:text[name=otrotipovia]').keyup(function (){
	$('input:radio[name="tipovia"]').filter('[value="Otro"]').attr('checked', true);
});
$('input:text[name=otrotipovia_neg]').keyup(function (){
	$('input:radio[name="tipovia_neg"]').filter('[value="Otro"]').attr('checked', true);
});
$('input:text[name=otrotipozona]').keyup(function (){
	$('input:radio[name="tipozona"]').filter('[value="Otro"]').attr('checked', true);
});
$('input:text[name=otrotipozona_neg]').keyup(function (){
	$('input:radio[name="tipozona_neg"]').filter('[value="Otro"]').attr('checked', true);
});
$("#casanegocio").click(function () {   
	var tipovia = $('input:radio[name=tipovia]:checked').val();
	$('input:radio[name="tipovia_neg"]').filter('[value="'+tipovia+'"]').attr('checked', true);
	var otrotipovia = $('input:text[name=otrotipovia]').val();
	$('input:text[name=otrotipovia_neg]').val(otrotipovia);
	var nombrevia = $('input:text[name=nombrevia]').val();
	$('input:text[name=nombrevia_neg]').val(nombrevia);
	var Nro_dom = $('input:text[name=Nro_dom]').val();
	$('input:text[name=Nro_dom_neg]').val(Nro_dom);
	var interior_dom = $('input:text[name=interior_dom]').val();
	$('input:text[name=interior_dom_neg]').val(interior_dom);
	var mz_dom = $('input:text[name=mz_dom]').val();
	$('input:text[name=mz_dom_neg]').val(mz_dom);
	var lote_dom = $('input:text[name=lote_dom]').val();
	$('input:text[name=lote_dom_neg]').val(lote_dom);
	var ruc = $('input:text[name=ruc]').val();
	$('input:text[name=ruc_neg]').val(ruc);
	var otro_dom = $('input:text[name=otro_dom]').val();
	$('input:text[name=otro_dom_neg]').val(otro_dom);
	var tipozona = $('input:radio[name=tipozona]:checked').val();
	$('input:radio[name="tipozona_neg"]').filter('[value="'+tipozona+'"]').attr('checked', true);
	var otrotipozona = $('input:text[name=otrotipozona]').val();
	$('input:text[name=otrotipozona_neg]').val(otrotipozona);
	var nombrezona = $('input:text[name=nombrezona]').val();
	$('input:text[name=nombrezona_neg]').val(nombrezona);	
	var referencia = $('input:text[name=referencia]').val();
	$('input:text[name=referencia_neg]').val(referencia);
});
$('input:radio[name=poseeaval]').click(function (){
	var poseeaval=$(this).val();
	if(poseeaval=='SI'){
		$('#formregaval').modal('show');
		$('#avalno').attr('disabled', 'true');
		$('#veraval').show();	}
});
$('input:radio[name=tipotrabajadorc]').click(function (){
	var tipotrabajadorc=$(this).val();
	if(tipotrabajadorc=='INDEPENDIENTE'){
		$('#formregnegocio').modal('show');
		$('select[name=ocupacionc]').attr('disabled', 'true');
		$('input:text[name=instituciontrabajo]').attr('disabled', 'true');
		$('#vernegocio').show();	
	}
});
$('input:radio[name=tipotrabajador_conyugue]').click(function (){
	var tipotrabajador_conyugue=$(this).val();
	if(tipotrabajador_conyugue=='INDEPENDIENTE'){
		//$('#tipotrabdependcony').attr('disabled', 'true');
		//$('select[name=ocupacion_conyugue]').attr('disabled', 'true');
		$('#instituciontrabajo_conyugue').removeClass("hidden");
	}
});
$('input:radio[name=tipotrabajador_aval]').click(function (){
	var tipotrabajador_aval=$(this).val();
	if(tipotrabajador_aval=='INDEPENDIENTE'){
		$('#tipotrabajadordep_aval').attr('disabled', 'true');
		$('select[name=ocupacion_aval]').attr('disabled', 'true');
		$('input:text[name=instituciontrabajo_aval]').attr('disabled', 'true');
	}
});
$('#grado_inst').change(function (){
	var grado_inst=$(this).val();
	if(grado_inst!=''){
		if(grado_inst=='Superior Completa' || grado_inst=='Superior Incompleta'){
			$('select[name=profesionc]').prop('disabled', false);
		}else{
			$('select[name=profesionc]').val("");
			$('select[name=profesionc]').prop('disabled', true);
		}
	}
});
$('#grado_instu').change(function (){
	var grado_inst=$(this).val();
	if(grado_inst!=''){
		if(grado_inst=='Superior Completa'){
			$('select[name=profesion]').prop('disabled', false);
		}else{
			$('select[name=profesion]').val("");
			$('select[name=profesion]').prop('disabled', true);
		}
	}
});
$('#grado_inst_conyugue').change(function (){//conyugue
	var grado_inst=$(this).val();
	if(grado_inst!=''){
		if(grado_inst=='Superior Completa' || grado_inst=='Superior Incompleta'){
			$('select[name=profesion_conyugue]').prop('disabled', false);
		}else{
			$('select[name=profesion_conyugue]').val("");
			$('select[name=profesion_conyugue]').prop('disabled', true);
		}
	}
});
$('#grado_inst_aval').change(function (){
	var grado_inst=$(this).val();
	if(grado_inst!=''){
		if(grado_inst=='Superior Completa'){
			$('select[name=profesion_aval]').prop('disabled', false);
		}else{
			$('select[name=profesion_aval]').val("");
			$('select[name=profesion_aval]').prop('disabled', true);
		}
	}
});
function cambiarprovinciaselect(valor){
	$("select[name=provincia_nac]").val(valor).trigger("change");
}
function existepersona(){
	var dni = $('#dni').val();
	$.post(link+"index.php/cliente/existepersona",{ 
		dni:dni
		},
		function(data){
			if(data=='true'){
				alert('Ya existe la persona');
				return false;
			}else{
				return true;
			}
		});
}
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
$('.siexistepersona').change(function (){
	var dni = $(this).val();
	$.post(link+"index.php/cliente/existepersona",{ 
		dni:dni
		},
		function(data){
			if(data=='true'){
				$('#contenidocrearpersona').html('<br><br><br><div class="alert alert-danger"><h3>YA EXISTE EL REGISTRO CON EL DNI <a href="'+link+'index.php/cliente/verpersona/'+dni+'">'+dni+'</a></h3></div>"');
			}
		});
});
$('input[name=dni_aval]').change(function (){
	var dni = $(this).val();
	$.post(link+"index.php/cliente/existepersona",{ 
		dni:dni
		},
		function(data){
			if(data=='true'){
				$.get(link+"index.php/cliente/cargarformclientepersona/"+dni,function(data){
					$('#ruc_aval').val(data.ruc);
					if(data.sexo=='F'){
						$('input[name=sexoaval]').click();
					}
					$('#nombres_aval').val(data.nombres);
					$('input[name=apellidos_aval]').val(data.apellidos);
					$('input[name=apellidos_aval2]').val(data.apellidos2);			
					$('input[name=fecha_nac_aval]').val(data.fecha_nac);
					$("select[name=departamento_aval]").val(data.iddepartamento_nac);
					$.get(link+"index.php/cliente/cargar_provincias/"+data.iddepartamento_nac,function(data2){
						$("select[name=provincia_aval]").html(data2);	
						$("select[name=provincia_aval]").val(data.idprovincia_nac);
					});
					$.get(link+"index.php/cliente/cargar_distritos/"+data.idprovincia_nac,function(data2){
						$("select[name=distrito_aval]").html(data2);
						$("select[name=distrito_aval]").val(data.distrito_nac);
					});
					$("select[name=estadociv_aval]").val(data.estadocivil);
					$("input[name=nacionalidad_aval]").val(data.nacionalidad);
					$("select[name=grado_inst_aval]").val(data.grado_instr);
					$("select[name=profesion_aval]").val(data.profesion);
					$("input[name=telefono_aval]").val(data.celular);
					$("input[name=email_aval]").val(data.email);
					$('input:radio[name="tipotrabajador_aval"]').filter('[value="'+data.tipotrabajador+'"]').attr('checked', true);
					$('select[name=ocupacion_aval]').val(data.ocupacion);
					$('input[name=instituciontrabajo_aval]').val(data.institucion_lab);
					$("select[name=tipovivienda_aval]").val(data.tipovivienda);
					$("select[name=departamento_dom_aval]").val(data.iddepartamento_domic);
					$.get(link+"index.php/cliente/cargar_provincias/"+data.iddepartamento_domic,function(data2){
						$("select[name=provincia_dom_aval]").html(data2);	
						$("select[name=provincia_dom_aval]").val(data.idprovincia_domic);
					});
					$.get(link+"index.php/cliente/cargar_distritos/"+data.idprovincia_domic,function(data2){
						$("select[name=distrito_dom_aval]").html(data2);
						$("select[name=distrito_dom_aval]").val(data.distrito_domic);
					});
					$('input:radio[name="tipovia_aval"]').filter('[value="'+data.tipovia+'"]').attr('checked', true);
					$('input[name=nombrevia_aval]').val(data.nombrevia);	
					$('input[name=Nro_dom_aval]').val(data.Nro);	
					$('input[name=interior_dom_aval]').val(data.interior);
					$('input[name=mz_dom_aval]').val(data.mz);
					$('input[name=lote_dom_aval]').val(data.lote);
					$('input:radio[name="tipozona_aval"]').filter('[value="'+data.tipozona+'"]').attr('checked', true);
					$('input[name=nombrezona_aval]').val(data.nombrezona);
					$('input[name=referencia_aval]').val(data.referencia);
					
				}, "json");				
			}
		});	
	//alert(data.apellidos);
});
$('button[name=guardarnuevaval]').click(function (){
	var dnicliente = $("input[name=dnicliente]").val();
	var codcliente = $("input[name=codcliente]").val();
	var dni_aval = $("input[name=dni_aval]").val();
	var ruc_aval = $("input[name=ruc_aval]").val();
	var sexoaval = $("input[name=sexoaval]").prop('checked') ? 'M' : 'F';
	var nombres_aval = $("input[name=nombres_aval]").val();	
	var apellidos_aval = $("input[name=apellidos_aval]").val();	
	var fecha_nac_aval = $("input[name=fecha_nac_aval]").val();	
	var distrito_aval = $("select[name=distrito_aval]").val();	
	var estadociv_aval = $("select[name=estadociv_aval]").val();
	var nacionalidad_aval = $("input[name=nacionalidad_aval]").val();
	var grado_inst_aval = $("select[name=grado_inst_aval]").val();
	var profesion_aval = $("select[name=profesion_aval]").val();
	var telefono_aval = $("input[name=telefono_aval]").val();			
	var email_aval = $("input[name=email_aval]").val();	
	var tipotrabajador_aval=$("input[name=tipotrabajador_aval]").val();	
	var ocupacion_aval = $("input[name=ocupacion_aval]").val();	
	var instituciontrabajo_aval = $("input[name=instituciontrabajo_aval]").val();
	var distrito_dom_aval = $("select[name=distrito_dom_aval]").val();
	var otrotipovia_aval = $("input[name=otrotipovia_aval]").val();
	var tipovia_aval = $("input[name=tipovia_aval]:checked").val();
	tipovia_aval = (tipovia_aval == 'Otro') ? otrotipovia_aval : tipovia_aval;	
	var nombrevia_aval = $("input[name=nombrevia_aval]").val();
	var Nro_dom_aval = $("input[name=Nro_dom_aval]").val();		
	var interior_dom_aval = $("input[name=interior_dom_aval]").val();	
	var mz_dom_aval = $("input[name=mz_dom_aval]").val();	
	var lote_dom_aval = $("input[name=lote_dom_aval]").val();
	var otrotipozona_aval = $("input[name=otrotipozona_aval]").val();		
	var tipozona_aval = $("input[name=tipozona_aval]:checked").val();		
	var tipozona_aval=(tipozona_aval == 'Otro') ? otrotipozona_aval : tipozona_aval;
	var nombrezona_aval = $("input[name=nombrezona_aval]").val();	
	var referencia_aval = $("input[name=referencia_aval]").val();
	var tipovivienda = $("select[name=tipovivienda_aval]").val();		
	$.post(link+"index.php/cliente/regnuevaval/"+codcliente,{ 
	dnicliente : dnicliente,
	codcliente : codcliente,
	dni_aval : dni_aval,
	ruc_aval : ruc_aval,
	sexoaval : sexoaval,
	nombres_aval : nombres_aval,
	apellidos_aval : apellidos_aval,
	fecha_nac_aval : fecha_nac_aval,
	distrito_aval : distrito_aval,
	estadociv_aval : estadociv_aval,
	nacionalidad_aval : nacionalidad_aval,
	grado_inst_aval : grado_inst_aval,
	profesion_aval : profesion_aval,
	telefono_aval : telefono_aval,
	email_aval : email_aval,
	tipotrabajador_aval : tipotrabajador_aval,	
	ocupacion_aval : ocupacion_aval,
	instituciontrabajo_aval : instituciontrabajo_aval,
	distrito_dom_aval : distrito_dom_aval,
	tipovia_aval : tipovia_aval,
	nombrevia_aval : nombrevia_aval,
	Nro_dom_aval : Nro_dom_aval,
	interior_dom_aval : interior_dom_aval,
	mz_dom_aval : mz_dom_aval,
	lote_dom_aval : lote_dom_aval,
	otrotipozona_aval : otrotipozona_aval,
	tipozona_aval : tipozona_aval,
	nombrezona_aval : nombrezona_aval,
	referencia_aval : referencia_aval,
	tipovivienda : tipovivienda
		},
		function(data){
			if(data=='true'){
				alert('Guardado');
			}else{
				alert('No se pudo Guardar');
			}
		});	
});

$('button[name=actavalbtn]').click(function (){
	var dnicliente = $("input[name=dnicliente]").val();
	var codcliente = $("input[name=codcliente]").val();
	var dni_aval = $("input[name=dni_aval]").val();
	var dniavaloriginal = $("input[name=dniavaloriginal]").val();
	var ruc_aval = $("input[name=ruc_aval]").val();
	var sexoaval = $("input[name=sexoaval]").prop('checked') ? 'M' : 'F';
	var nombres_aval = $("input[name=nombres_aval]").val();	
	var apellidos_aval = $("input[name=apellidos_aval]").val();	
	var apellidos2_aval = $("input[name=apellidos2_aval]").val();	
	var fecha_nac_aval = $("input[name=fecha_nac_aval]").val();	
	var distrito_aval = $("select[name=distrito_aval]").val();	
	var estadociv_aval = $("select[name=estadociv_aval]").val();
	var nacionalidad_aval = $("input[name=nacionalidad_aval]").val();
	var grado_inst_aval = $("select[name=grado_inst_aval]").val();
	var profesion_aval = $("select[name=profesion_aval]").val();
	var telefono_aval = $("input[name=telefono_aval]").val();			
	var email_aval = $("input[name=email_aval]").val();	
	var tipotrabajador_aval=$("input[name=tipotrabajador_aval]:checked").val();	
	var ocupacion_aval = $("input[name=ocupacion_aval]").val();	
	var instituciontrabajo_aval = $("input[name=instituciontrabajo_aval]").val();
	var distrito_dom_aval = $("select[name=distrito_dom_aval]").val();
	var otrotipovia_aval = $("input[name=otrotipovia_aval]").val();
	var tipovia_aval = $("input[name=tipovia_aval]:checked").val();
	tipovia_aval = (tipovia_aval == 'Otro') ? otrotipovia_aval : tipovia_aval;	
	var nombrevia_aval = $("input[name=nombrevia_aval]").val();
	var Nro_dom_aval = $("input[name=Nro_dom_aval]").val();		
	var interior_dom_aval = $("input[name=interior_dom_aval]").val();	
	var mz_dom_aval = $("input[name=mz_dom_aval]").val();	
	var lote_dom_aval = $("input[name=lote_dom_aval]").val();
	var otrotipozona_aval = $("input[name=otrotipozona_aval]").val();		
	var tipozona_aval = $("input[name=tipozona_aval]:checked").val();		
	var tipozona_aval=(tipozona_aval == 'Otro') ? otrotipozona_aval : tipozona_aval;
	var nombrezona_aval = $("input[name=nombrezona_aval]").val();	
	var referencia_aval = $("input[name=referencia_aval]").val();	
	var tipovivienda = $("select[name=tipovivienda_aval]").val();
	$.post(link+"index.php/cliente/actualizaravalpersona/"+codcliente,{ 
	dnicliente : dnicliente,
	codcliente : codcliente,
	dni_aval : dni_aval,
	dniavaloriginal : dniavaloriginal,
	ruc_aval : ruc_aval,
	sexoaval : sexoaval,
	nombres_aval : nombres_aval,
	apellidos_aval : apellidos_aval,
	apellidos2_aval : apellidos2_aval,
	fecha_nac_aval : fecha_nac_aval,
	distrito_aval : distrito_aval,
	estadociv_aval : estadociv_aval,
	nacionalidad_aval : nacionalidad_aval,
	grado_inst_aval : grado_inst_aval,
	profesion_aval : profesion_aval,
	telefono_aval : telefono_aval,
	email_aval : email_aval,
	tipotrabajador_aval : tipotrabajador_aval,	
	ocupacion_aval : ocupacion_aval,
	instituciontrabajo_aval : instituciontrabajo_aval,
	distrito_dom_aval : distrito_dom_aval,
	tipovia_aval : tipovia_aval,
	nombrevia_aval : nombrevia_aval,
	Nro_dom_aval : Nro_dom_aval,
	interior_dom_aval : interior_dom_aval,
	mz_dom_aval : mz_dom_aval,
	lote_dom_aval : lote_dom_aval,
	otrotipozona_aval : otrotipozona_aval,
	tipozona_aval : tipozona_aval,
	nombrezona_aval : nombrezona_aval,
	referencia_aval : referencia_aval,
	tipovivienda : tipovivienda
		},
		function(data){
			if(data=='false'){
				alert('NO SE ACTUALIZO');
			}else{
				alert('ACTUALIZADO EL AVAL');
			}
		});	
});
$('button[name=guardarcconyugue]').click(function(){
	var dni = $('input[name=dni_conyugue]').val();
	var apellidos = $('input[name=apellidopat_conyugue]').val();
	var apellidos2 = $('input[name=apellidomat_conyugue]').val();
	var nombres = $('input[name=nombres_conyugue]').val();
	var fecha_nac = $('input[name=fecha_nac_conyugue]').val();
	var distrito_nac = $('select[name=distrito_conyugue]').val();
	var telefono = $('input[name=telefono_conyugue]').val();	
	var sexo=$('input:radio[name="sexoconyugue"]:checked').val();
	var email=$('input[name=email_conyugue]').val();
	var ruc = $('input[name=ruc_conyugue]').val();
	var estadociv=$('input[name=estadociv_conyugue]').val();
	var distrito_domic=distrito_nac;
	var grado_inst = $('select[name=grado_inst_conyugue]').val();
	var profesion = $('select[name=profesion_conyugue]').val();
	var	nacionalidad= 'PERUANO';
	var	tipovia='';
	var	nombrevia='';
	var	Nro_dom='';	
	var	interior_dom='';
	var	mz_dom='';
	var	lote_dom='';
	var	tipozona='';
	var	nombrezona='';
	var	referencia='';
	var tipotrabajador = $('input[name=tipotrabajador_conyugue]:checked').val();
	var ocupacion = $('select[name=ocupacion_conyugue]').val();
	var institucion_lab = $('input[name=instituciontrabajo_conyugue]').val();
	var tipovivienda='';
	if(validardatospersona(dni, apellidos, apellidos2, nombres, fecha_nac, distrito_nac, telefono, email, distrito_domic, grado_inst)==true){
		$.post(link+"index.php/cliente/registraractpersona",{ 
		dni : dni,
		apellidos : apellidos,
		apellidos2 : apellidos2,
		nombres : nombres,
		fecha_nac : fecha_nac,
		distrito_nac : distrito_nac,
		telefono : telefono,	
		sexo : sexo,
		email : email,	
		ruc : ruc,
		estadociv : estadociv,
		distrito_domic : distrito_domic,
		grado_inst : grado_inst,
		profesion : profesion,
		nacionalidad : nacionalidad,
		tipovia : tipovia,
		nombrevia : nombrevia,
		Nro_dom : Nro_dom,
		interior_dom : interior_dom,
		mz_dom : mz_dom,
		lote_dom : lote_dom,
		tipozona : tipozona,
		nombrezona : nombrezona,
		referencia : referencia,
		tipotrabajador : tipotrabajador,
		ocupacion : ocupacion,
		institucion_lab : institucion_lab,
		tipovivienda : tipovivienda
			},
			function(data){
				if(data=='true'){
					alert('Guardado');
					$('#dni_conyugue2').val(dni);
				}else{
					alert('No se pudo Guardar');
				}
			});			
	}else{
		return false;
	}
});
$('button[name=guardarpersonaaval]').click(function (){//REGISTRAR AVAL CON NUEVO CLIENTE
	var dni = $("input[name=dni_aval]").val();
	var ruc = $("input[name=ruc_aval]").val();
	var sexo = $("input[name=sexoaval]:checked").val();
	var nombres = $("input[name=nombres_aval]").val();	
	var apellidos = $("input[name=apellidos_aval]").val();	
	var apellidos2 = $("input[name=apellidos_aval2]").val();	
	var fecha_nac = $("input[name=fecha_nac_aval]").val();	
	var distrito_nac = $("select[name=distrito_aval]").val();	
	var estadociv = $("select[name=estadociv_aval]").val();
	var grado_inst = $("select[name=grado_inst_aval]").val();
	var profesion = $("select[name=profesion_aval]").val();
	var telefono = $("input[name=telefono_aval]").val();
	var email = $("input[name=email_aval]").val();	
	var tipotrabajador=$("input[name=tipotrabajador_aval]").val();	
	var ocupacion = $("input[name=ocupacion_aval]").val();	
	var institucion_lab = $("input[name=instituciontrabajo_aval]").val();
	var distrito_domic = $("select[name=distrito_dom_aval]").val();
	var otrotipovia_aval = $("input[name=otrotipovia_aval]").val();
	var tipovia_aval = $("input[name=tipovia_aval]:checked").val();
	var tipovia = (tipovia_aval == 'Otro') ? otrotipovia_aval : tipovia_aval;	
	var nombrevia = $("input[name=nombrevia_aval]").val();
	var Nro_dom = $("input[name=Nro_dom_aval]").val();		
	var interior_dom = $("input[name=interior_dom_aval]").val();	
	var mz_dom = $("input[name=mz_dom_aval]").val();	
	var lote_dom = $("input[name=lote_dom_aval]").val();
	var otrotipozona_aval = $("input[name=otrotipozona_aval]").val();		
	var tipozona_aval = $("input[name=tipozona_aval]:checked").val();		
	var tipozona=(tipozona_aval == 'Otro') ? otrotipozona_aval : tipozona_aval;
	var nombrezona = $("input[name=nombrezona_aval]").val();	
	var referencia = $("input[name=referencia_aval]").val();
	var tipovivienda = $("select[name=tipovivienda_aval]").val();
	var	nacionalidad= 'PERUANO';
	if(validardatospersona(dni, apellidos, apellidos2, nombres, fecha_nac, distrito_nac, telefono, email, distrito_domic, grado_inst)==true){
		$.post(link+"index.php/cliente/registraractpersona",{ 
			dni : dni,
			apellidos : apellidos,
			apellidos2 : apellidos2,
			nombres : nombres,
			fecha_nac : fecha_nac,
			distrito_nac : distrito_nac,
			telefono : telefono,	
			sexo : sexo,
			email : email,	
			ruc : ruc,
			estadociv : estadociv,
			distrito_domic : distrito_domic,
			grado_inst : grado_inst,
			profesion : profesion,
			nacionalidad : nacionalidad,
			tipovia : tipovia,
			nombrevia : nombrevia,
			Nro_dom : Nro_dom,
			interior_dom : interior_dom,
			mz_dom : mz_dom,
			lote_dom : lote_dom,
			tipozona : tipozona,
			nombrezona : nombrezona,
			referencia : referencia,
			tipotrabajador : tipotrabajador,
			ocupacion : ocupacion,
			institucion_lab : institucion_lab,
			tipovivienda : tipovivienda
			},
			function(data){
				if(data=='true'){
					alert('Guardado');
					$('#dni_aval2').val(dni);
				}else{
					alert('No se pudo Guardar');
				}
			});
	}else{
		return false;
	}

});

function cargardatosconyugue(dni){
	$.post(link+"index.php/cliente/existepersona",{ //REPORTE GENERAL ENTRE FECHAS
		dni : dni
		},
		function(data){
			if(data=='true'){
				$.get(link+"index.php/cliente/cargarformclientepersona/"+dni,function(data){
					$('input[name=ruc_conyugue]').val(data.ruc);
					if(data.sexo=='M'){
						$('#conyuguevaron').click();				
					}else{
						$('#conyuguemujer').click();					
					}
					$('input[name=nombres_conyugue]').val(data.nombres);
					$('input[name=apellidopat_conyugue]').val(data.apellidos);
					$('input[name=apellidomat_conyugue]').val(data.apellidos2);
					$('input[name=fecha_nac_conyugue]').val(data.fecha_nac);
					$("select[name=departamento_conyugue]").val(data.iddepartamento_nac);
					$.get(link+"index.php/cliente/cargar_provincias/"+data.iddepartamento_nac,function(data2){
					 	$("select[name=provincia_conyugue]").html(data2);	
					 	$("select[name=provincia_conyugue]").val(data.idprovincia_nac);
					});
					$.get(link+"index.php/cliente/cargar_distritos/"+data.idprovincia_nac,function(data2){
					 	$("select[name=distrito_conyugue]").html(data2);
					 	$("select[name=distrito_conyugue]").val(data.distrito_nac);
					});
					$("select[name=grado_inst_conyugue]").val(data.grado_instr);
					if(data.profesion!=''){
						$('select[name=profesion_conyugue]').prop('disabled', false);
						$("select[name=profesion_conyugue]").val(data.profesion);						
					}
					$("input[name=telefono_conyugue]").val(data.celular);
					$("input[name=email_conyugue]").val(data.email);
					if(data.tipotrabajador=='DEPENDIENTE'){
						$('#tipotrabdependcony').click();				
					}else{
						$('#tipotrabindependcony').click();					
					}
					$('input:radio[name="tipotrabajador_conyugue"]').filter('[value="'+data.tipotrabajador+'"]').attr('checked', true);
					$('select[name=ocupacion_conyugue]').val(data.ocupacion);
					$('input[name=instituciontrabajo_conyugue]').val(data.institucion_lab);
				}, "json");
			}
		});	
}
function cargardatosaval(dni){
	$.post(link+"index.php/cliente/existepersona",{
		dni : dni
		},
		function(data){
			if(data=='true'){
				$.get(link+"index.php/cliente/cargarformclientepersona/"+dni,function(data){
					$('input[name=dni_aval]').val(data.dni);
					$('input[name=ruc_aval]').val(data.ruc);
					if(data.sexo=='M'){
						$('#avalvaron').click();				
					}else{
						$('#avalmujer').click();					
					}
					$('input[name=nombres_aval]').val(data.nombres);
					$('input[name=apellidos_aval]').val(data.apellidos);
					$('input[name=apellidos_aval2]').val(data.apellidos2);
					$("select[name=estadociv_aval]").val(data.estadocivil);
					$('input[name=fecha_nac_aval]').val(data.fecha_nac);
					$("select[name=departamento_aval]").val(data.iddepartamento_nac);
					$.get(link+"index.php/cliente/cargar_provincias/"+data.iddepartamento_nac,function(data2){
					 	$("select[name=provincia_aval]").html(data2);	
					 	$("select[name=provincia_aval]").val(data.idprovincia_nac);
					});
					$.get(link+"index.php/cliente/cargar_distritos/"+data.idprovincia_nac,function(data2){
					 	$("select[name=distrito_aval]").html(data2);
					 	$("select[name=distrito_aval]").val(data.distrito_nac);
					});
					$("select[name=grado_inst_aval]").val(data.grado_instr);
					if(data.profesion!=''){
						$('select[name=profesion_aval]').prop('disabled', false);
						$("select[name=profesion_aval]").val(data.profesion);						
					}
					$("input[name=telefono_aval]").val(data.celular);
					$("input[name=email_aval]").val(data.email);
					if(data.tipotrabajador=='DEPENDIENTE'){
						$('#tipotrabajadordep_aval').click();				
					}else{
						$('#tipotrabajadorinde_aval').click();					
					}
					//$('input:radio[name="tipotrabajador_conyugue"]').filter('[value="'+data.tipotrabajador+'"]').attr('checked', true);
					$('select[name=ocupacion_aval]').val(data.ocupacion);
					$('input[name=instituciontrabajo_aval]').val(data.institucion_lab);
					$("select[name=tipovivienda_aval]").val(data.tipovivienda);
					$("select[name=departamento_dom_aval]").val(data.iddepartamento_domic);

					$.get(link+"index.php/cliente/cargar_provincias/"+data.iddepartamento_domic,function(data2){
					 	$("select[name=provincia_aval]").html(data2);	
					 	$("select[name=provincia_aval]").val(data.idprovincia_domic);
					});
					$.get(link+"index.php/cliente/cargar_distritos/"+data.idprovincia_domic,function(data2){
					 	$("select[name=distrito_dom_aval]").html(data2);	
					 	$("select[name=distrito_dom_aval]").val(data.distrito_domic);
					});
					if(data.tipovia!='Avenida' && data.tipovia!='Jiron' && data.tipovia!='Calle' && data.tipovia!='Pasaje' && data.tipovia!='Prolongacion'){
						$('input:radio[name="tipovia_aval"]').filter('[value="Otro"]').attr('checked', true);
						$("input[name=otrotipovia_aval]").val(data.tipovia);
					}else{
						$('input:radio[name="tipovia_aval"]').filter('[value="'+data.tipovia+'"]').attr('checked', true);
					}
					$("input[name=nombrevia_aval]").val(data.nombrevia);
					$("input[name=Nro_dom_aval]").val(data.Nro);
					$("input[name=interior_dom_aval]").val(data.interior);					
					$("input[name=mz_dom_aval]").val(data.mz);
					$("input[name=lote_dom_aval]").val(data.lote);
					if(data.tipozona!='Urbanizacion' && data.tipozona!='Asentamiento Humano' && data.tipozona!='Cooperativa' && data.tipozona!='PP.JJ.'){
						$('input:radio[name="tipozona_aval"]').filter('[value="Otro"]').attr('checked', true);
						$("input[name=otrotipozona_aval]").val(data.tipozona);
					}else{
						$('input:radio[name="tipozona_aval"]').filter('[value="'+data.tipozona+'"]').attr('checked', true);
					}
					$("input[name=nombrezona_aval]").val(data.nombrezona);
					$("input[name=referencia_aval]").val(data.referencia);
				}, "json");
			}
		});	
}
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
$('input[name=dni]').focusout(function(){
	var dni = $('input[name=dni]').val();
	cargardatospordni(dni);
});



$('input[name=dni_conyugue]').focusout(function(){
	var dni = $('input[name=dni_conyugue]').val();
	cargardatosconyugue(dni);
});
$('select[name=estad_clientebsc]').change(function (){
	var estado = $(this).val();
	if(estado!=''){
		$.get(link+"index.php/cliente/cargarlista/"+estado,function(data){
			$("#tablaclientesase").html(data);
		});		
	}
});
$('#buscarfreportegral').click(function (){
	var fechainicial = $('input[name=fechaini]').val();
	var fechafinal = $('input[name=fechafin]').val();
	var estadosolic = $('select[name=estadosolic]').val();
	var asesor = $('select[name=asesor]').val();
	var agencia = $('select[name=agenciabsc]').val();
	$('#resultadobusqueda').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/report/cargarreportegeneral",{ //REPORTE GENERAL ENTRE FECHAS
		fechainicial : fechainicial,
		fechafinal : fechafinal,
		estadosolic : estadosolic,
		asesor : asesor,
		agencia : agencia
		},
		function(data){
			$("#resultadobusqueda").html(data);
		});	
});

$('#bscreporteinfocorp').click(function (){
	var fechainicial = $('input[name=fechaini]').val();
	var fechafinal = $('input[name=fechafin]').val();
	var estadosolic = $('select[name=estadosolic]').val();
	var agencia = $('select[name=agenciabsc]').val();
	var asesor = $('select[name=asesor]').val();
	$('#resultadobusqueda').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/report/cargarreporinfocorp",{ //REPORTE GENERAL ENTRE FECHAS
		fechainicial : fechainicial,
		fechafinal : fechafinal,
		estadosolic : estadosolic,
		asesor : asesor,
		agencia : agencia
		},
		function(data){
			$("#resultadobusqueda").html(data);
		});	
});

$('#bscpagus').click(function (){
	var fecha=$('input[name=fecha]').val();
	var idusuario=$('input[name=idusuario]').val();
	$('#vistatablakuser').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/report/detpagosusuariofech/"+idusuario,{ 
		fecha : fecha
		},
		function(data){
			$("#vistatablakuser").html(data);
		});	
});

$(".cambmora").click(function(){
	var iddesembolso = $('input[name=iddesembolso]').val();	
	var nrocuota = $(this).data('item-price');	
	var mora=$('input[name=moradias'+nrocuota+']').val();
	$.get(link+"index.php/solicitud/cambiarmora/"+iddesembolso+"/"+nrocuota+"/"+mora,
		function(data){
			if(data=='true'){
				alert('Actualizado');
			}else{
				alert('No se pudo actualizar');
			}
	});
});
$('input[name=apenomclientetcs]').keyup(function(){
	var apenom=$(this).val();
		$.post(link+"index.php/solicitud/tablaclientesapenom_asesor",{ 
			apenom : apenom
		},
		function(data){
			$('#tablavistaclientescrearsolic').html(data);
		});
});

$('input[name=montotransferencia]').change(function (){
	var transfdesde = $('select[name=transfdesde]').val();
	var saldobancos=$('input[name=saldobancos]').val();
	var saldocaja=$('input[name=saldocaja]').val();	
	if(transfdesde=='BANCOS'){
		if(parseFloat(saldobancos)<parseFloat($(this).val())){
			alert('EL MONTO SOBREPASA EL SALDO EN BANCOS');
			$('button[name=enviartransferencia]').attr('disabled', true);
		}else{
			$('button[name=enviartransferencia]').attr('disabled', false);
		}
	}else{
		if(parseFloat(saldocaja)<parseFloat($(this).val())){
			alert('EL MONTO SOBREPASA EL SALDO EN CAJA');
			$('button[name=enviartransferencia]').attr('disabled', true);
		}else{
			$('button[name=enviartransferencia]').attr('disabled', false);
		}
	}
});



$('.checkpagar').change(function (){
	var iddesembolso=$(this).val();
	if($(this).is(':checked')){
		//$('#monto'+iddesembolso).removeAttr('readonly');
		$('#monto'+iddesembolso).removeAttr('disabled');
		$('#estado'+iddesembolso).removeAttr('disabled');
		$('#iddesembolso'+iddesembolso).removeAttr('disabled');
		$('#saldo'+iddesembolso).removeAttr('disabled');
	}else{
	    var valor_input = $('#monto'+iddesembolso).val(); 
	    var valoranterior=parseFloat(document.getElementById('totalapagar').value);
	    document.getElementById('totalapagar').value=(valoranterior-parseFloat(valor_input)).toFixed(2);
		$('#monto'+iddesembolso).val('');
		//$('#monto'+iddesembolso).attr('readonly', 'readonly');
		$('#monto'+iddesembolso).attr('disabled', 'disabled');
		$('#estado'+iddesembolso).attr('disabled', 'disabled');
		$('#iddesembolso'+iddesembolso).attr('disabled', 'disabled');
		$('#saldo'+iddesembolso).attr('disabled', 'disabled');
	}
});
$('button[name=calcularmbtn]').click(function (){
	var fechainicio=$('#fechaini').val();
	var fechafinal=$('#fechaact').val();
	var tipoplazo=$('#tipoplazo').val();
	if(tipoplazo!=''){
		$.post(link+"index.php/pagos/obtenermora_dform",{
			fechainicio : fechainicio,
			fechafinal : fechafinal,
			tipoplazo : tipoplazo
		},function(data){
			$('#resultadomora').html(data);
		});		
	}else{
		$('#resultadomora').html('Seleccione tipo de Plazo');
	}
});
$('select[name=tipocaja]').change(function (){
	var tipo = $(this).val();
	var ingespecifico = '<option value="TODOS">TODOS</option><option value="pc">PAGO CUOTAS</option><option value="mora">MORA</option><option value="transf">TRANSFERENCIA</option><option value="doco">DOCO</option>';
	var salespecifico='<option value="TODOS">TODOS</option><option value="des">DESEMBOLSO</option><option value="transf">TRANSFERENCIA</option><option value="gasto">GASTOS</option><option value="doco">DOCO</option>';
	switch (tipo){
		case 'INGRESO' : 
			$('select[name=tipocajaespec]').prop('disabled', false);
			$('select[name=tipocajaespec]').html(ingespecifico);
			break;
		case 'SALIDA' :
			$('select[name=tipocajaespec]').prop('disabled', false);
			$('select[name=tipocajaespec]').html(salespecifico);
			break;
		case 'TODOS' :
			$('select[name=tipocajaespec]').html(ingespecifico);
			$('select[name=tipocajaespec]').prop('disabled', true);
			break;
		default :
	}
});
$('#agenciabsc').change(function (){
	var	agencia = $(this).val();
	$.post(link+"index.php/report/cargarselectasesorxagencia",{
		agencia : agencia
	},function(data){
		$('#asesor').html(data);
	});
});


$('#buscarxtipoc').click(function (){
	var	fechaini = $('input[name=fechaini]').val();
	var	fechafin = $('input[name=fechafin]').val();
	var	tipo = $('select[name=tipocaja]').val();
	var tipocajaespec = $('select[name=tipocajaespec]').val();
	var	usuario = $('select[name=usuario]').val();
	var agencia = $('select[name=agencia]').val();
	$.post(link+"index.php/report/cargarrepcajafdesc2",{
		fechaini : fechaini,
		fechafin : fechafin,
		tipo : tipo,
		tipocajaespec : tipocajaespec,
		usuario : usuario,
		agencia : agencia
	},function(data){
		$('#resultadobusqueda').html(data);
	});
});
$('#buscarldesem').click(function (){
	var	fechaini = $('input[name=fechaini]').val();
	var	fechafin = $('input[name=fechafin]').val();
	var	asesor = $('select[name=asesor]').val();
	var	agencia = $('select[name=agenciabsc]').val();	
	$.post(link+"index.php/report/cargardesemb",{
		fechaini : fechaini,
		fechafin : fechafin,
		asesor : asesor,
		agencia : agencia
	},function(data){
		$('#resultadobusqueda').html(data);
	});
});
$('#buscarpagosreport').click(function (){
	var	fechaini = $('input[name=fechaini]').val();
	var	fechafin = $('input[name=fechafin]').val();
	var	tipo = $('select[name=tipopagos]').val();
	var usuario = $('select[name=usuarios]').val();
	$.post(link+"index.php/report/cargarreppagos",{
		fechaini : fechaini,
		fechafin : fechafin,
		tipo : tipo,
		usuario : usuario
	},function(data){
		$('#resultadobusqueda').html(data);
	});
});
$('input[name=cajadesc]').keyup(function (){
	var	fechaini = $('input[name=fechaini]').val();
	var	fechafin = $('input[name=fechafin]').val();
	var	descripcion = $(this).val();
	$.post(link+"index.php/report/cargarrepcajafdesc",{
		fechaini : fechaini,
		fechafin : fechafin,
		descripcion : descripcion
	},function(data){
		$('#resultadobusqueda').html(data);
	});
});
$('input[name=apenomrp]').keyup(function (){
	var	fechaini = $('input[name=fechaini]').val();
	var	fechafin = $('input[name=fechafin]').val();
	var	apenom = $(this).val();
	$.post(link+"index.php/report/cargarporapenomrp",{
		fechaini : fechaini,
		fechafin : fechafin,
		apenom : apenom
	},function(data){
		$('#resultadobusqueda').html(data);
	});
});
$('#buscrf').click(function (){
	var	estado = $('select[name=estadosolic]').val();
	var	fechainipagos = $('input[name=fechainipagos]').val();
	var	fechafinpagos = $('input[name=fechafinpagos]').val();
	var	asesor = $('select[name=asesor]').val();
	var	agencia = $('select[name=agenciabsc]').val();
	$('#resultadobusqueda').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/report/cargarreportefinancierocastigo",{	
		estado : estado,
		fechainipagos : fechainipagos,
		fechafinpagos : fechafinpagos,
		asesor : asesor,
		agencia : agencia
	},function(data){
		$('#resultadobusqueda').html(data);
	});
});
$('#buscrepclientes').click(function (){
	var	fechainireg = $('input[name=fechainireg]').val();
	var	fechafinreg = $('input[name=fechafinreg]').val();
	var	estado = $('select[name=estado]').val();
	var	asesor = $('select[name=asesor]').val();
	$('#resultadobusqueda').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/report/cargarrepclientes",{	
		fechainireg : fechainireg,
		fechafinreg : fechafinreg,
		estado : estado,
		asesor : asesor
	},function(data){
		$('#resultadobusqueda').html(data);
	});
});
$('#cargarmetageren').click(function (){
	var	estado = $('select[name=estado]').val();
	var	asesor = $('select[name=asesor]').val();
	$('#resultadobusqueda').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/report/cargarmetasrep",{	
		estado : estado,
		asesor : asesor
	},function(data){
		$('#resultadobusqueda').html(data);
	});
});
$('#cargarmetapp').click(function (){
	var	metafechai = $('input[name=metafechai]').val();
	var	metafechaf = $('input[name=metafechaf]').val();
	var	estado = $('select[name=estado]').val();
	var	asesor = $('select[name=asesor]').val();
	$('#resultadobusqueda').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/report/cargarmetapp",{	
		metafechai : metafechai,
		metafechaf : metafechaf,
		estado : estado,
		asesor : asesor
	},function(data){
		$('#resultadobusqueda').html(data);
	});
});
$('#guardarnegocio').click(function (){
	var codcliente = $('input[name=codcliente]').val();	
	var idnegocio = $('input[name=idnegocio]').val();
	var razon_social = $('input[name=razon_social]').val();
	var ruc_neg = $('input[name=ruc_neg]').val();
	var telefono_neg = $('input[name=telefono_neg]').val();
	var inicio_actividades = $('input[name=inicio_actividades]').val();
	var actividad_neg = $('select[name=actividad_neg]').val();
	var actividad_neg_det = $('input[name=actividad_neg_det]').val();
	var condicionnegv = $('select[name=condicionnegv]').val();
	var distrito_neg  = $('select[name=distrito_neg]').val();
	var otrotipovia_neg = $('input[name=otrotipovia_neg]').val();
	var tipovia_neg = $('input:radio[name=tipovia_neg]:checked').val();	
	var nombrevia_neg = $('input[name=nombrevia_neg]').val();
	var Nro_dom_neg = $('input[name=Nro_dom_neg]').val();
	var interior_dom_neg = $('input[name=interior_dom_neg]').val();
	var mz_dom_neg = $('input[name=mz_dom_neg]').val();
	var lote_dom_neg = $('input[name=lote_dom_neg]').val();
	var otrotipozona_neg = $('input[name=otrotipozona_neg]').val();
	var tipozona_neg = $('input:radio[name=tipozona_neg]:checked').val();
	var nombrezona_neg = $('input[name=nombrezona_neg]').val();
	var referencia_neg = $('input[name=referencia_neg]').val();
	$.post(link+"index.php/cliente/guardarnegocio",{
		codcliente : codcliente,
		idnegocio : idnegocio,
		razon_social : razon_social,
		ruc_neg : ruc_neg,
		telefono_neg : telefono_neg,
		inicio_actividades : inicio_actividades,
		actividad_neg : actividad_neg,
		actividad_neg_det : actividad_neg_det,
		condicionnegv : condicionnegv,
		distrito_neg : distrito_neg,
		otrotipovia_neg : otrotipovia_neg,
		tipovia_neg : tipovia_neg,
		nombrevia_neg : nombrevia_neg,
		Nro_dom_neg : Nro_dom_neg,
		interior_dom_neg : interior_dom_neg,
		mz_dom_neg : mz_dom_neg,
		lote_dom_neg : lote_dom_neg,
		otrotipozona_neg : otrotipozona_neg,
		tipozona_neg : tipozona_neg,
		nombrezona_neg : nombrezona_neg,
		referencia_neg : referencia_neg
	},function(data){
		alert(data);
	});
});
$('#guardarnegociovalidar').click(function (){
	var codcliente = $('input[name=codcliente]').val();
	var inicio_actividades = $('input[name=inicio_actividades]').val();
	var actividad_neg = $('select[name=actividad_neg]').val();
	var actividad_neg_det = $('input[name=actividad_neg_det]').val();
	var distrito_neg  = $('select[name=distrito_neg]').val();
	if(validardatosnegocio(inicio_actividades, actividad_neg, actividad_neg_det, distrito_neg)==true){
		if(codcliente!=''){
			var razon_social = $('input[name=razon_social]').val();
			var ruc_neg = $('input[name=ruc_neg]').val();
			var telefono_neg = $('input[name=telefono_neg]').val();
			var condicionnegv = $('select[name=condicionnegv]').val();
			var otrotipovia_neg = $('input[name=otrotipovia_neg]').val();
			var tipovia_neg = $('input:radio[name=tipovia_neg]:checked').val();	
			var nombrevia_neg = $('input[name=nombrevia_neg]').val();
			var Nro_dom_neg = $('input[name=Nro_dom_neg]').val();
			var interior_dom_neg = $('input[name=interior_dom_neg]').val();
			var mz_dom_neg = $('input[name=mz_dom_neg]').val();
			var lote_dom_neg = $('input[name=lote_dom_neg]').val();
			var otrotipozona_neg = $('input[name=otrotipozona_neg]').val();
			var tipozona_neg = $('input:radio[name=tipozona_neg]:checked').val();
			var nombrezona_neg = $('input[name=nombrezona_neg]').val();
			var referencia_neg = $('input[name=referencia_neg]').val();
			$.post(link+"index.php/cliente/guardarnegocio",{
				codcliente : codcliente,
				razon_social : razon_social,
				ruc_neg : ruc_neg,
				telefono_neg : telefono_neg,
				inicio_actividades : inicio_actividades,
				actividad_neg : actividad_neg,
				actividad_neg_det : actividad_neg_det,
				condicionnegv : condicionnegv,
				distrito_neg : distrito_neg,
				otrotipovia_neg : otrotipovia_neg,
				tipovia_neg : tipovia_neg,
				nombrevia_neg : nombrevia_neg,
				Nro_dom_neg : Nro_dom_neg,
				interior_dom_neg : interior_dom_neg,
				mz_dom_neg : mz_dom_neg,
				lote_dom_neg : lote_dom_neg,
				otrotipozona_neg : otrotipozona_neg,
				tipozona_neg : tipozona_neg,
				nombrezona_neg : nombrezona_neg,
				referencia_neg : referencia_neg
			},function(data){
				if(data=='true'){
					alert('Registrado exitosamente');
				}else{
					alert('No se pudo registro');
				}
				location.href=link+'index.php/cliente/configurarcliente/'+codcliente;				
			});
		}
	}else{
		return false;
	}
});
$('#registrarmeta').click(function (){
	// var asesor = $('input[name=asesor]').val();
	// var cartera = $('input[name=cartera]').val();
	// var clientes = $('select[name=clientes]').val();
	// var saldoxmora = $('input[name=saldoxmora]').val();
	// var clientesnuevos  = $('select[name=clientesnuevos]').val();
	// 	$.post(link+"index.php/asesor/registrarmeta",{
	// 		asesor : asesor,
	// 		cartera : cartera,
	// 		clientes : clientes,
	// 		saldoxmora : saldoxmora,
	// 		clientesnuevos : clientesnuevos
	// 	},function(data){
	// 		if(data=='true'){
	// 			alert('Registrado exitosamente');
	// 		}else{
	// 			alert('No se pudo registro');
	// 		}
	// 		location.href=link+'index.php/cliente/configurarcliente/'+codcliente;				
	// 	});


});

function validardatospersona(dni, apellidos, apellidos2, nombres, fecha_nac, distrito_nac, telefono, email, distrito_domic, grado_inst){
	if(dni==''){
		alert('INGRESE DNI');
		return false;
	}
	if(nombres==''){
		alert('INGRESE NOMBRES');
		return false;
	}	
	if(apellidos==''){
		alert('INGRESE APELLIDO PATERNO');
		return false;
	}
	if(apellidos2==''){
		alert('INGRESE APELLIDO MATERNO');
		return false;
	}
	if(fecha_nac==''){
		alert('INGRESE FECHA DE NACIMIENTO');
		return false;
	}
	if(distrito_nac==''){
		alert('INGRESE DISTRITO DE NACIMIENTO');
		return false;
	}
	// if(telefono==''){
	// 	alert('INGRESE CELULAR');
	// 	return false;
	// }
	if(distrito_domic==''){
		alert('INGRESE DISTRITO DE DOMICILIO');
		return false;
	}
	if(grado_inst==''){
		alert('INGRESE ESTUDIOS');
		return false;
	}
	return true;
}
function validardatosnegocio(inicio_actividades, actividad_neg, actividad_neg_det, distrito_neg){
	if(inicio_actividades==''){
		alert('INGRESE INICIO DE ACTIVIDADES');
		return false;
	}
	if(actividad_neg==''){
		alert('INGRESE ACTIVIDAD DEL NEGOCIO');
		return false;
	}
	if(actividad_neg_det==''){
		alert('INGRESE ACTIVIDAD DEL NEGOCIO ESPECIFICO');
		return false;
	}
	if(distrito_neg==''){
		alert('INGRESE DISTRITO DEL NEGOCIO');
		return false;
	}	
	return true;
}

var statSend = false;
function validarpagosasesor(){
	if(statSend==true){
		return false;
	}else{
		statSend = true;
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
}
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

$('.verdetallecomprobante').click(function (){
var idcomprobante=$(this).val();
  $('#verdetalle').modal('show');
  $.get(link+"index.php/facturador/verdetcomprobante/"+idcomprobante,function(data){
    $('#cuerpomodal').html(data);
  });

});
$('#btncargartablamrrhh').click(function(){
	var mes = $('select[name=mes]').val();
	var dni = $('input[name=dni]').val();
	  $.get(link+"index.php/rrhh/cargartablamovimientosrrhh/"+mes+"/"+dni,function(data){
	    $('#tablamovimientosrrhh').html(data);
	  });
});
$('#btncargarmovsueldo').click(function (){
	var	dnipersonal = $('select[name=personal]').val();
	if(dnipersonal!=''){
		var	mes = $('select[name=mes]').val();		
		$.get(link+"index.php/rrhh/cargartablamovimientosrrhh/"+mes+"/"+dnipersonal,function(data){
			$('#movimientos').html(data);
		});		
	}
});
$('#btnbuscarrepsueldos').click(function (){
	var	fechainireg = $('input[name=fechainireg]').val();
	var	fechafinreg = $('input[name=fechafinreg]').val();
	var	personal = $('select[name=personal]').val();
	$('#resultadobusqueda').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/rrhh/cargartablasueldos",{	
		fechainireg : fechainireg,
		fechafinreg : fechafinreg,
		personal : personal
	},function(data){
		$('#resultadobusqueda').html(data);
	});
});
$('#personal').change(function(){
	var dni = $(this).val();
	if(dni!=''){
		$.get(link+"index.php/rrhh/cargarnombremessueldo/"+dni,function(data){
			$('input[name=mes]').val(data);
		});
	}
});