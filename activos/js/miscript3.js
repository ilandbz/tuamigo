var link = "http://amigoemprendedor.com/";
//var link = "http://localhost/tuamigo/";
//var link = "https://amigoemprendedor.com/";
//var link = "http://192.168.1.254/tuamigo/";
$('#guardar_observacioneva').click(function (){
	var observacionsol = prompt("INGRESA LA OBSERVACION", "");
    if (observacionsol != null && observacionsol!='') {
		var codsolicitud = $('#nrosolicitud').val();
		$.post(link+"index.php/solicitud/observarsolicitud",{ 
			observacionsol : observacionsol,
			codsolicitud : codsolicitud
		},
		function(data){
			if(data=='false'){
				alert('No se pudo guardar la observacion consulte a su soporte');
			}else{
				location.href=link+'index.php/solicitud/solicitudesevaluacion';		
			}
		});
    }
});
$('#observardes').click(function (){
	var observacionsol = prompt("INGRESA LA OBSERVACION", "");
    if (observacionsol != null && observacionsol!='') {
		var codsolicitud = $('#idsolicitud_des').val();
		$.post(link+"index.php/solicitud/observarsolicitud",{ 
			observacionsol : observacionsol,
			codsolicitud : codsolicitud
		},
		function(data){
			if(data=='false'){
				alert('No se pudo guardar la observacion consulte a su soporte');
			}else{
				location.href=link+'index.php/pagos/listpdesembolso';		
			}
		});
    }
});
$('#btn_rechazarasesor').click(function (){
	var mensaje = prompt("INGRESA EL MOTIVO", "");
	var codsolicitud = $('#nrosolicitud').val();
	//var codsolicitud = $('#codsolicitud').val();
    if (mensaje != null) {
		$.post(link+"index.php/solicitud/rechazar_evalsolicitud",{ 
			mensaje : mensaje,
			codsolicitud : codsolicitud
		},
		function(data){
			alert(data);
		});
    }
});
$('#observacionestado').change(function (){
	var nrosolicitud = $('#nrosolicitud').val();
	var idobservacion = $('#idobservacion').val();
 	$.get(link+"index.php/solicitud/resolverobservacion/"+idobservacion,function(data){
 		if(data=='true'){
			location.href=link+'index.php/solicitud/evaluar/'+nrosolicitud;
 		}
 	});
});
$('.producto1').attr('disabled', 'true');
$('.producto2').attr('disabled', 'true');
$('.producto3').attr('disabled', 'true');
$("input:text[name='tasainteres']").keyup(function(){
	var interes = $(this).val();
	var monto = $("input:text[name='montosolic']").val();
	var total = parseFloat(monto)*(1+(parseFloat(interes)/100));
	$("input:text[name='totalpago']").val(total.toFixed(2));
});
function calcularsaldo(n){
	var valor = n;
	var saldo = $('input[name=saldoasesor]').val();
	saldo = parseFloat(saldo)-parseFloat(valor);
	$('input[name=saldoasesor]').val(saldo.toFixed(2));
	$('input[name=saldoasesor2]').val(saldo.toFixed(2));
	if(saldo<0){
		alert('El saldo no alcanza');
	}
}
$('.sipago').change(function (){
	var n=$(this).data("item-price")
	calcularsaldo(n);
});
var mp =0;
$('.montopagar').change(function (){
	var n=$(this).val();	
	var sald=$('input[name=saldoasesor]').val();
	sald=parseFloat(sald)+parseFloat(mp);
	$('input[name=saldoasesor]').val(sald.toFixed(2));
	calcularsaldo(n);
});
var nav4 = window.Event ? true : false; 
function acceptNum(evt){  
	var key = nav4 ? evt.which : evt.keyCode;  
	return (key <= 13 || (key >= 48 && key <= 57) || key==46); 
}
$("#bscidsolsda").click(function (){
	var idsolicitudbsd = $('input[name=idsolicitudbsd]').val();
	if(idsolicitudbsd!=''){

		location.href=link+'index.php/pagos/pagoporidsolicitud/'+idsolicitudbsd;
		// $('#vistasolicitudesdesembapro').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	 // 	$.get(link+"index.php/pagos/solicitudesdeseaprobidsol/"+idsolicitudbsd,function(data){
	 // 		$('#vistasolicitudesdesembapro').html(data);
	 // 	});	
	 }
});
$('#asesorbscsd').change(function(){
	var asesorbscsd = $('select[name=asesorbscsd]').val();
	var tipoplazo = $('select[name=tipoplazobsc]').val();	
	if(asesorbscsd!=''){
		$('#vistasolicitudesdesembapro').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	 	$.get(link+"index.php/pagos/solicitudesdeseaprobases/"+asesorbscsd,function(data){
	 		$('#vistasolicitudesdesembapro').html(data);
	 	});			
	 }
});
$('#bsccodclientesda').click(function (){
	var codcliente = $('input[name=codcliente]').val();
	if(codcliente!=''){
		$('#vistasolicitudesdesembapro').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	 	$.get(link+"index.php/pagos/solicitudesdeseaprobcc/"+codcliente,function(data){
	 		$('#vistasolicitudesdesembapro').html(data);
	 	});			
	}
});
$('#bscdniclientesda').click(function (){
	var dnicliente = $('input[name=dnicliente]').val();
	if(dnicliente!=''){
		$('#vistasolicitudesdesembapro').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	 	$.get(link+"index.php/pagos/solicitudesdeseaprobdni/"+dnicliente,function(data){
	 		$('#vistasolicitudesdesembapro').html(data);
	 	});			
	}
});
$('#bscapenomsda').click(function (){

	var bscapenomsda = $('input[name=apenomclie]').val();
	if(bscapenomsda!=''){
		$('#vistasolicitudesdesembapro').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
		$.post(link+"index.php/pagos/solicitudesdeseaprobapenom",{ 
			apenom : bscapenomsda
		},
		function(data){
			$('#vistasolicitudesdesembapro').html(data);
		});
	}
});
$('input[name=apenomclie]').keypress(function (e){
	var bscapenomsda = $(this).val();
    if(e.which == 13) {
		if(bscapenomsda!=''){
			$.post(link+"index.php/pagos/solicitudesdeseaprobapenom",{ 
				apenom : bscapenomsda
			},
			function(data){
				$('#vistasolicitudesdesembapro').html(data);
			});		
		}
    }
});
$('#bscfechasda').click(function (){
	var fecha_buscsd = $('input[name=fecha_buscsd]').val();
	$('#vistasolicitudesdesembapro').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/pagos/solicitudesdeseaprobfecha",{ 
		fecha : fecha_buscsd
	},
	function(data){
		$('#vistasolicitudesdesembapro').html(data);
	});	
});
$('input[name=moracheck]').change(function (){
	calcularmontopagou();
});
$('input[name=cuotascheck]').change(function (){
	calcularmontopagou();
});
function calcularmontopagou(){
	var montopagar = 0;
	var montomora = 0;
	if($('input[name=cuotascheck]').is(':checked')){
		var montopagar = $('input[name=montopagar]').val();
	}
	if($('input[name=moracheck]').is(':checked')){
		var montomora = $('input[name=montomora]').val();
	}	
	var montototalpagar = parseFloat(montopagar) + parseFloat(montomora);
	$('input[name=montototalpagar]').val(montototalpagar.toFixed(2));	
}
$('#nrocuotaspg').change(function (){
	var nrocuotas = $(this).val();
	var iddesembolso= $('input[name=iddesembolso]').val();
	var nrocuotamenor= $('input[name=nrocuotamenor]').val();
	$.post(link+"index.php/pagos/montototalporcantcuotas",{ 
		nrocuotas : nrocuotas,
		iddesembolso : iddesembolso,
		nrocuotamenor : nrocuotamenor
	},
	function(data){
		$('input[name=montopagar]').val(data);
	});	
});
var statSend = false;
function validarpagos2(){
	var montototalpagar = $('input[name=montototalpagar]').val();
	var montopagar = $('input[name=montopagar]').val();//solo de cuotas
	var saldototal=$('input[name=saldototal]').val();

	
	if(parseFloat(montopagar)>parseFloat(saldototal) && $('input[name=cuotascheck]').is(':checked')){
		alert("EL MONTO SOBREPASA EL SALDO" + montopagar + ' ' + saldototal);
		return false;
	}
	if(montototalpagar=='' || montototalpagar=='0.00' || isNaN(montototalpagar)){
		alert('EL MONTO NO ES VALIDO');
		return false;
	}else{
	    if (!statSend) {
	        statSend = true;
	        return true;
	    } else {
	        return false;
	    }
	}
}
$('input[name=montopagar]').change(function (){
	calcularmontopagou();
});
$('input[name=rdbfechapago]').change(function (){
	if($(this).is(':checked')){
 		$("input[name=fechapago]").removeAttr("readonly");
	}
});
function validarpagos3(){
	var montopagar = $('input[name=montopagar]').val();
	var saldototal=$('input[name=saldototal]').val();
	var saldoasesor = $('input[name=saldoasesor_c]').val();
	if(parseFloat(saldoasesor)>=parseFloat(montopagar)){
		if(parseFloat(montopagar)>parseFloat(saldototal)){
			alert("EL MONTO SOBREPASA EL SALDO");
			return false;
		}
		if(montopagar=='' || montopagar=='0.00'){
			alert('EL MONTO NO ES VALIDO');
			return false;
		}else{
		    if (!statSend) {
		        statSend = true;
		        return true;
		    } else {
		        return false;
		    }
		}		
	}else{
		alert("NO ALCANZA EL SALDO DEL ASESOR");
		alert('EL MAYOR ES :' + montopagar + ' SOBRE '+saldoasesor);
		return false;
	}
}

$('#guardarasesor').click(function (){
	var idsolicitud=$('input[name=idsolicitud]').val();
	var idasesor=$("select[name=idasesor]").val();
		$.post(link+"index.php/asesor/existeasesor",{ 
			idasesor : idasesor
		},
		function(data){
			if(data=='false'){
				alert('No existe el asesor');
			}else{
				$.post(link+"index.php/solicitud/cambiarasesorsol",{ 
					idasesor : idasesor,
					idsolicitud : idsolicitud
				},
				function(data){
					if(data=='true'){
						alert('Actualizado');
						location.reload();
					}
				});
			}
		});	
});
$('#guardarpagocb').click(function (){

$('#guardarpagocb').attr('disabled', 'true');
	
$('form[name=realizapagocb]').submit();

 	// $.get(link+"index.php/caja/cantasesorconsaldo",function(data){
 		
 	// 	// if(data=='true'){
	 // 	// 	if(confirm('EXISTEN ASESORES CON SALDO')==true){
	 // 	// 		$('form[name=cerrarcajaform]').submit();
	 // 	// 	} 			
 	// 	// }else{
 	// 	// 	$('form[name=cerrarcajaform]').submit();
 	// 	// }
 	// });
});
$('input[name=pagobancoscheck]').change(function (){
	$('input[name=pagobancos]').removeAttr("readonly");
});
$('input[name=pagocaja]').change(function (){
	var pagocaja=$(this).val();	
	var saldocaja=$('input[name=saldocaja]').val();
	var saldobancos=$('input[name=saldobancos]').val();
	if(parseFloat(pagocaja)>parseFloat(saldocaja)){
		alert('NO ALCANZA EL SALDO EN CAJA');
		$(this).val(saldocaja);
		pagocaja = saldocaja;
	}
	var total = $('input[name=totalpagardes]').val();
	var pagobancos=parseFloat(total)-parseFloat(pagocaja);
	$('input[name=pagobancos]').val(pagobancos);
	$('input[name=nsaldocaja]').val(parseFloat(saldocaja)-parseFloat(pagocaja));
	$('input[name=nsaldobancos]').val(parseFloat(saldobancos)-parseFloat(pagobancos));	
});
$('input[name=pagobancos]').change(function (){
	var pagobancos=$(this).val();	
	var saldocaja=$('input[name=saldocaja]').val();
	var saldobancos=$('input[name=saldobancos]').val();
	if(parseFloat(pagobancos)>parseFloat(saldobancos)){
		alert('NO ALCANZA EL SALDO EN BANCOS');
		$(this).val(saldobancos);
		pagobancos = saldobancos;
	}
	var total = $('input[name=totalpagardes]').val();
	var pagocaja=parseFloat(total)-parseFloat(pagobancos);
	$('input[name=pagocaja]').val(pagocaja);
	$('input[name=nsaldocaja]').val(parseFloat(saldocaja)-parseFloat(pagocaja));
	$('input[name=nsaldobancos]').val(parseFloat(saldobancos)-parseFloat(pagobancos));		
});

$('#buscaringresosfechas').click(function(){
	var fechadetcajaingreso=$('#fechadetcajaingreso').val();
	var fechadetcajaingresohasta=$('#fechadetcajaingresohasta').val();	
	$.get(link+"index.php/caja/cargarvistaingentrefechas/"+fechadetcajaingreso+"/"+fechadetcajaingresohasta,function(data){
		$('#tabladetcaja').html(data);
	});
});

$('#buscaregresosfechas').click(function(){
	var fechadetcajagasto=$('#fechadetcajagasto').val();
	var fechadetcajagastofin=$('#fechadetcajagastofin').val();	
	$.get(link+"index.php/caja/cargarvistacajaegresoef/"+fechadetcajagasto+"/"+fechadetcajagastofin,function(data){
		$('#tabladetcaja').html(data);
	});
});



$('#regcpcaja').click(function(){
	var monto = $('input[name=monto]').val();
	var descripcion = $('input[name=descripcion]').val();
	var fechareg = $('input[name=fechareg]').val();	
    if (!statSend) {
        statSend = true;
		$.post(link+"index.php/caja/regpagoscuotas",{ 
			monto : monto,
			descripcion : descripcion,
			fechareg : fechareg
		},
		function(data){
			if(data=='false'){
				alert('No se pudo Registrar')				
			}else{
				alert("REGISTRADO");
				//document.getElementById("btnimprimir").href=link+'index.php/pagos/vaucher/'+data;
				$('#regcpcaja').attr('disabled', 'true');
			}
		});
        return true;
    } else {
        return false;
    }
});
$('#buscarxtipoc').click(function (){
	var fechainicio = $('#fechadetcaja').val();
	var fechafin = $('#fechadetcajafin').val();
	$.get(link+"index.php/caja/cargardetcajaeft/"+fechainicio+"/"+fechafin,function(data){
		$('#tabladetcaja').html(data);
	});
});



$('#tipoplazobsc').change(function (){
	var tipoplazo = $(this).val();
	var asesor = $('#asesorbscsd').val();	
	if(tipoplazo!=''){
	$('#vistasolicitudesdesembapro').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/pagos/solicitudesdeseaprobtipoplazo",{ 
	 		tipoplazo : tipoplazo,
	 		asesor : asesor
	 	},
	 	function(data){
	 		$('#vistasolicitudesdesembapro').html(data);
		});	
	}
});
$('#tbancos').click(function (){
	var resta = $('input[name=resta]').val();
	var montotransferir = prompt("TRANSFERIR DE BANCOS", resta);
	var saldocaja = $('input[name=saldocaja]').val();
	if(montotransferir!=''){
		$.post(link+'index.php/caja/transfdebancos', {
			montotransferir : montotransferir
			}, function(data){
				if(data=='true'){
					location.reload();
				}
			});
	}
});
function calcularmontomora(){
	var diasmora = $('input[name=diasmora]').val();
	var costomora=$('input[name=costomora]').val();
	return (diasmora*costomora).toFixed(2);;
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

$('select[name=tipocomprobante]').change(function (){
	var value = $(this).val();
	if(value=='Ninguno'){
		$('input[name=ruc]').attr("readonly","readonly");
		$('input[name=razonsocial]').attr("readonly","readonly");
		$('input[name=nrocomprobante]').attr("readonly","readonly");
	}
});
$('select[name=estadosolicitud]').change(function (){
	var estado = $(this).val();
	if(estado!=''){
	$('#vistasolicitudesdesembapro').html('<div align="center"><img src="'+link+'activos/images/Loading_icon.gif"></div>');
	$.post(link+"index.php/pagos/solicitudesporestado",{ 
	 		estado : estado
	 	},
	 	function(data){
	 		$('#vistasolicitudesdesembapro').html(data);
		});	
	}
});
$('#buscarhistoriacaja').click(function (){
	var fecha = $('input[name=fecha]').val();
	$.post(link+"index.php/caja/cargardethistoriacaja",{ 
	 		fecha : fecha
	 	},
	 	function(data){
	 		$('#resultado').html(data);
		});		
});
$("#enviarcrcs").click(function (){
    var url=$(this).attr("href");
    var monto=$('input[name=totalapagardeuda]').val();
    if(window.confirm("ESTA SEGURO DE CANCELAR EL MONTO DE S/."+monto+"?")==true){
        window.location.href = url;
    }
    return false;
});
$("#generar_barcode").click(function() {
	var data = $("#data").val();
	$("#imagen").html('<img src="'+link+'index.php/pagos/generarbarcode"/>');
	// $("#imagen").html('<img src="barcode\\barcode.php?text='+data+'&size=90&codetype=Code39&print=true"/>');
	$("#data").val('');
});
$('input[name=idsolicitudbsd]').keypress(function (e){
	var idsolicitud = $(this).val();
    if(e.which == 13) {
		if(idsolicitud!=''){
			location.href=link+'index.php/pagos/pagoporidsolicitud/'+idsolicitud;
		}
    }
});