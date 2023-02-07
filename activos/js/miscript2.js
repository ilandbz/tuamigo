var link = "http://amigoemprendedor.com/";
//var link = "http://localhost/tuamigo/";
//var link = "https://amigoemprendedor.com/";
//var link = "http://192.168.1.254/tuamigo/";
$('#btnreset_form').click(function (){
	$("form[name='guardar_solicitud']").trigger('reset');
});
$('#tipoplazo').change(function (){
	var tipoplazo = $(this).val();
		switch(tipoplazo){
			case 'DIARIO':
				$("input[type='number'][name='plazo']").val(30);
				$("#mostrar").html('Dias Hab.');
				break;
			case 'SEMANAL':
				$("input[type='number'][name='plazo']").val(4);
				$("#mostrar").html('Semanas');
				break;
			case 'QUINCENAL':
				$("input[type='number'][name='plazo']").val(2);
				$("#mostrar").html('Quincenas');
				break;		
			case 'MENSUAL':
				$("input[type='number'][name='plazo']").val(1);
				$("#mostrar").html('Mes');	
				break;
		}
});
function sumaractivos(){
	var activocaja = $("#activocaja").val();
	var activobancos = $("#activobancos").val();
	var activoctascobrar = $("#activoctascobrar").val();
	var activoinventarios = $("#activoinventarios").val();	
	return parseFloat(activocaja)+parseFloat(activobancos)+parseFloat(activoctascobrar)+parseFloat(activoinventarios);
}
$("#activoctascobrar").change(function (){
	$('#totalactivocorr').val()=sumaractivos();
});
function sumaranalisiscualitativo(){
	var tipogarantia = $('input:radio[name="tipogarantia"]:checked').val();
	var cargafamiliar = $('input:radio[name="cargafamiliar"]:checked').val();
	var riesgoedadmax = $('input:radio[name="riesgoedadmax"]:checked').val();
	var antecedentescredit = $('input:radio[name="antecedentescredit"]:checked').val();
	var recordultimopago = $('input:radio[name="recordultimopago"]:checked').val();
	var niveldesarro = $('input:radio[name="niveldesarro"]:checked').val();	
	var tiempofuncionamiento = $('input:radio[name="tiempofuncionamiento"]:checked').val();
	var controlasusingegre = $('input:radio[name="controlasusingegre"]:checked').val();
	var lasventastotales = $('input:radio[name="lasventastotales"]:checked').val();
	var comportamientosubsec = $('input:radio[name="comportamientosubsec"]:checked').val();
	tipogarantia = isNaN(tipogarantia) ? 0 : tipogarantia;
	cargafamiliar = isNaN(cargafamiliar) ? 0 : cargafamiliar;
	riesgoedadmax = isNaN(riesgoedadmax) ? 0 : riesgoedadmax;
	antecedentescredit = isNaN(antecedentescredit) ? 0 : antecedentescredit;
	recordultimopago = isNaN(recordultimopago) ? 0 : recordultimopago;
	niveldesarro = isNaN(niveldesarro) ? 0 : niveldesarro;
	tiempofuncionamiento = isNaN(tiempofuncionamiento) ? 0 : tiempofuncionamiento;
	controlasusingegre = isNaN(controlasusingegre) ? 0 : controlasusingegre;
	lasventastotales = isNaN(lasventastotales) ? 0 : lasventastotales;
	comportamientosubsec = isNaN(comportamientosubsec) ? 0 : comportamientosubsec;
	var totalunidadfam = parseInt(tipogarantia)+parseInt(cargafamiliar)+parseInt(riesgoedadmax);
	var totalunidademp = parseInt(antecedentescredit)+parseInt(recordultimopago)+parseInt(niveldesarro)+parseInt(tiempofuncionamiento)+parseInt(controlasusingegre)+parseInt(lasventastotales)+parseInt(comportamientosubsec);
	$('input:text[name="totalunidadfam"]').val(totalunidadfam);	
	$('input:text[name="totalunidademp"]').val(totalunidademp);	
	return parseInt(tipogarantia)+parseInt(cargafamiliar)+parseInt(riesgoedadmax)+parseInt(antecedentescredit)+parseInt(recordultimopago)+parseInt(niveldesarro)+parseInt(tiempofuncionamiento)+parseInt(controlasusingegre)+parseInt(lasventastotales)+parseInt(comportamientosubsec);
}
function sumarbalance(){
	var activocaja = $('input:text[name="activocaja"]').val();
	var activobancos = $('input:text[name="activobancos"]').val();
	var activoctascobrar = $('input:text[name="activoctascobrar"]').val();
	var activoinventarios = $('input:text[name="activoinventarios"]').val();
	var pasivodeudaprove = $('input:text[name="pasivodeudaprove"]').val();
	var pasivodeudaent = $('input:text[name="pasivodeudaent"]').val();	
	var pasivodeudaemprender = $('input:text[name="pasivodeudaemprender"]').val();
	var activomueble = $('input:text[name="activomueble"]').val();
	var activootrosact = $('input:text[name="activootrosact"]').val();
	var activodepre = $('input:text[name="activodepre"]').val();
	var pasivolargop = $('input:text[name="pasivolargop"]').val();
	var otrascuentaspagar = $('input:text[name="otrascuentaspagar"]').val();
	activocaja = (isNaN(activocaja) || activocaja=='') ? 0 : activocaja;
	activobancos = (isNaN(activobancos) || activobancos=='') ? 0 : activobancos;
	activoctascobrar = (isNaN(activoctascobrar) || activoctascobrar=='') ? 0 : activoctascobrar;
	activoinventarios = (isNaN(activoinventarios) || activoinventarios=='') ? 0 : activoinventarios;
	pasivodeudaprove = (isNaN(pasivodeudaprove) || pasivodeudaprove=='') ? 0 : pasivodeudaprove;
	pasivodeudaent = (isNaN(pasivodeudaent) || pasivodeudaent=='') ? 0 : pasivodeudaent;
	pasivodeudaemprender = (isNaN(pasivodeudaemprender) || pasivodeudaemprender=='') ? 0 : pasivodeudaemprender;
	activomueble = (isNaN(activomueble) || activomueble=='') ? 0 : activomueble;
	activootrosact = (isNaN(activootrosact) || activootrosact=='') ? 0 : activootrosact;
	activodepre = (isNaN(activodepre) || activodepre=='') ? 0 : activodepre;
	pasivolargop = (isNaN(pasivolargop) || pasivolargop=='') ? 0 : pasivolargop;
	otrascuentaspagar = (isNaN(otrascuentaspagar) || otrascuentaspagar=='') ? 0 : otrascuentaspagar;
	var totalacorriente = parseFloat(activocaja)+parseFloat(activobancos)+parseFloat(activoctascobrar)+parseFloat(activoinventarios);
	var totalpcorriente = parseFloat(pasivodeudaprove)+parseFloat(pasivodeudaent)+parseFloat(pasivodeudaemprender);
	var totalancorriente = parseFloat(activomueble)+parseFloat(activootrosact)+parseFloat(activodepre);
	var totalpncorriente = parseFloat(pasivolargop)+parseFloat(otrascuentaspagar);
	$('input:text[name="totalactivocorr"]').val(totalacorriente.toFixed(2));	
	$('input:text[name="totalpasivocorr"]').val(totalpcorriente.toFixed(2));
	$('input:text[name="totalactivonocorr"]').val(totalancorriente.toFixed(2));
	$('input:text[name="totalpasivonocorr"]').val(totalpncorriente.toFixed(2));
	var totalactivo=parseFloat(totalacorriente)+parseFloat(totalancorriente);
	var totalpasivo= parseFloat(totalpcorriente)+parseFloat(totalpncorriente);
	var patrimonio = totalactivo-totalpasivo;
	var paspatrimonio = patrimonio+totalpasivo;
	var captrabajo=totalacorriente-totalpcorriente;
	$('input:text[name="totalactivo"]').val(totalactivo.toFixed(2));	
	$('input:text[name="totalpasivo"]').val(totalpasivo.toFixed(2));	
	$('input:text[name="patrimonioemp"]').val(patrimonio.toFixed(2));	
	$('input:text[name="totpatrimonio"]').val(patrimonio.toFixed(2));
	$('input:text[name="paspatrimonio"]').val(paspatrimonio.toFixed(2));	
	$('input:text[name="captrabajo"]').val(captrabajo.toFixed(2));	
}
var puntaje = $("input:text[name='puntajetotal']").val();
$(".anacualitativo").click(function (){
	//puntaje = parseInt(puntaje) + parseInt($(this).val());
	$("input:text[name='puntajetotal']").val(sumaranalisiscualitativo());
});
$("#guardardetinv").click(function (){
    var idsolicitud=$('#codsolicitud').val();
	var inventariomateriales = $('input:text[name="inventariomateriales"]').val();
	var inventarioproductosproc = $('input:text[name="inventarioproductosproc"]').val();
	var inventarioproductoster = $('input:text[name="inventarioproductoster"]').val();
	var totalinventario= parseFloat(inventariomateriales)+parseFloat(inventarioproductosproc)+parseFloat(inventarioproductoster);
	$('input:text[name="activoinventarios"]').val(totalinventario.toFixed(2));
	sumarbalance();
	$.post(link+"index.php/solicitud/guardardetinventariobg",{ 
		idsolicitud : idsolicitud,
		inventariomateriales : inventariomateriales,
		inventarioproductosproc : inventarioproductosproc,
		inventarioproductoster : inventarioproductoster
		},
		function(data){
			if(data=='false'){
				alert('NO SE PUDO GUARDAR');
			}
		});	
});
var totmuebles=0;
$("#agregarmueble").click(function (){
    var idsolicitud=$('#codsolicitud').val();
    var nuevaFila="<tr>";
    var descripcion=$('input:text[name="descripcionmueble"]').val();
	var valor=$('input:text[name="valormueble"]').val();
	if(valor != 0 && descripcion != ''){
		$.post(link+"index.php/solicitud/guardarmueble",{ 
			idsolicitud:idsolicitud,
			descripcion:descripcion,
			valor:valor
			},
			function(data){
				if(data=='true'){
					cargar_mueblescliente();

				}else{
					alert('NO SE REGISTRO');
				}
			});
	}
	$('input:text[name="descripcionmueble"]').val('');
	$('input:text[name="valormueble"]').val('0');
    return false;
});
$("#agregardeudaentidad").click(function (){
	var codsolicitud = $('#codsolicitud').val();
    var nuevaFila="<tr>";
    var descripcion=$('input:text[name="entidadfinanc"]').val();
	var valor=$('input:text[name="cantidaddebef"]').val();
	if(valor != 0 && descripcion != ''){
		$.post(link+"index.php/solicitud/guardardef",{ 
			codsolicitud:codsolicitud,
			descripcion:descripcion,
			valor:valor
			},
			function(data){
				if(data=='true'){
					cargar_deudaentidades();

				}else{
					alert('NO SE REGISTRO');
				}
			});
	}
	$('input:text[name="entidadfinanc"]').val('');
	$('input:text[name="cantidaddebef"]').val('0');
    return false;
});


$('.producto2').attr('disabled', 'true');
$('.producto3').attr('disabled', 'true');
$("input:checkbox[name='aproducto2']").click(function(){
	if ($(this).is(':checked')){
		$('.producto2').attr('disabled', false);
	}else{
		$('.producto2').attr('disabled', true);
		$('.numerosypunto.producto2').val(0.00);
		$('input[name=descproducto2]').val('');
	}
});
$("input:checkbox[name='aproducto3']").click(function(){
	if ($(this).is(':checked')){
		$('.producto3').attr('disabled', false);
	}else{
		$('.producto3').attr('disabled', true);
		$('.producto3').val(0.00);
		$('input[name=descproducto3]').val('');
	}
});
$("select.producto1").change(function(){
	if($(this).val()=='Semanal'){
		$("input:text[name='produccionmensprod1']").val(4);			
	}else if($(this).val()=='Mensual'){
		$("input:text[name='produccionmensprod1']").val(1);			
	}else{
		$("input:text[name='produccionmensprod1']").val(26);	
	}
	var precioventa=$("input:text[name='precioventaunit1']").val();
	var produccionmensprod1 = $("input:text[name='produccionmensprod1']").val();
	var total = parseFloat(precioventa)*parseFloat(produccionmensprod1);
	$("input:text[name='ventastotprod1']").val(total.toFixed(2));	
	sumacostoprimprod();
});
$("select.producto2").change(function(){
	if($(this).val()=='Semanal'){
		$("input:text[name='produccionmensprod2']").val(4);			
	}else if($(this).val()=='Mensual'){
		$("input:text[name='produccionmensprod2']").val(1);			
	}else{
		$("input:text[name='produccionmensprod2']").val(26);	
	}
	var precioventa=$("input:text[name='precioventaunit2']").val();
	var produccionmensprod2 = $("input:text[name='produccionmensprod2']").val();
	var total = parseFloat(precioventa)*parseFloat(produccionmensprod2);
	$("input:text[name='ventastotprod2']").val(total.toFixed(2));	
	sumacostoprimprod();	
});
$("select.producto3").change(function(){
	if($(this).val()=='Semanal'){
		$("input:text[name='produccionmensprod3']").val(4);
	}else if($(this).val()=='Mensual'){
		$("input:text[name='produccionmensprod3']").val(1);			
	}else{
		$("input:text[name='produccionmensprod3']").val(26);
	}
	var precioventa=$("input:text[name='precioventaunit3']").val();
	var produccionmensprod3 = $("input:text[name='produccionmensprod3']").val();
	var total = parseFloat(precioventa)*parseFloat(produccionmensprod3);
	$("input:text[name='ventastotprod3']").val(total.toFixed(2));	
	sumacostoprimprod();
});
$("input:text[name='precioventaunit1']").change(function(){
	var precioventa=$(this).val();
	var produccionmensprod1 = $("input:text[name='produccionmensprod1']").val();
	var total = parseFloat(precioventa)*parseFloat(produccionmensprod1);
	$("input:text[name='ventastotprod1']").val(total.toFixed(2));	
	sumacostoprimprod();		
});
$("input:text[name='precioventaunit2']").change(function(){
	var precioventa=$(this).val();
	var produccionmensprod2 = $("input:text[name='produccionmensprod2']").val();
	var total = parseFloat(precioventa)*parseFloat(produccionmensprod2);
	$("input:text[name='ventastotprod2']").val(total.toFixed(2));	
	sumacostoprimprod();		
});
$("input:text[name='precioventaunit3']").change(function(){
	var precioventa=$(this).val();
	var produccionmensprod3 = $("input:text[name='produccionmensprod3']").val();
	var total = parseFloat(precioventa)*parseFloat(produccionmensprod3);
	$("input:text[name='ventastotprod3']").val(total.toFixed(2));
	sumacostoprimprod();	
});
function sumacostoprimprod(){
	var materiaprima1 = $("input:text[name='materiaprima1']").val();
	var materiaprima2 = $("input:text[name='materiaprima2']").val();
	var materiaprima3 = $("input:text[name='materiaprima3']").val();

	var manoobra1 = $("input:text[name='manoobra1']").val();
	var manoobra2 = $("input:text[name='manoobra2']").val();
	var manoobra3 = $("input:text[name='manoobra3']").val();

	var produccionmensprod1 = $("input:text[name='produccionmensprod1']").val();
	var produccionmensprod2 = $("input:text[name='produccionmensprod2']").val();
	var produccionmensprod3= $("input:text[name='produccionmensprod3']").val();

	var total1 = (parseFloat(materiaprima1)+parseFloat(manoobra1))*produccionmensprod1;
	var total2 = (parseFloat(materiaprima2)+parseFloat(manoobra2))*produccionmensprod2;
	var total3 = (parseFloat(materiaprima3)+parseFloat(manoobra3))*produccionmensprod3;

	$("input:text[name='costoprimprod1']").val(total1.toFixed(2));
	$("input:text[name='costoprimprod2']").val(total2.toFixed(2));
	$("input:text[name='costoprimprod3']").val(total3.toFixed(2));

	$("input:text[name='costoprimounit1']").val((parseFloat(materiaprima1)+parseFloat(manoobra1)).toFixed(2));
	$("input:text[name='costoprimounit2']").val((parseFloat(materiaprima2)+parseFloat(manoobra2)).toFixed(2));
	$("input:text[name='costoprimounit3']").val((parseFloat(materiaprima3)+parseFloat(manoobra3)).toFixed(2));

	var costoprimounit1 = $("input:text[name='costoprimounit1']").val();
	var costoprimounit2 = $("input:text[name='costoprimounit2']").val();	
	var costoprimounit3 = $("input:text[name='costoprimounit3']").val();

	var costoprimprod1 = $("input:text[name='costoprimprod1']").val();
	var costoprimprod2 = $("input:text[name='costoprimprod2']").val();	
	var costoprimprod3 = $("input:text[name='costoprimprod3']").val();	

	var ventastotprod1 = $("input:text[name='ventastotprod1']").val();
	var ventastotprod2 = $("input:text[name='ventastotprod2']").val();
	var ventastotprod3 = $("input:text[name='ventastotprod3']").val();

	var totmargen1 = (parseFloat(ventastotprod1)-parseFloat(total1))/parseFloat(ventastotprod1);
	var totmargen2 = (parseFloat(ventastotprod2)-parseFloat(total2))/parseFloat(ventastotprod2);
	var totmargen3 = (parseFloat(ventastotprod3)-parseFloat(total3))/parseFloat(ventastotprod3);

	totmargen1=(isNaN(totmargen1)) ? 0 : totmargen1
	totmargen2=(isNaN(totmargen2)) ? 0 : totmargen2
	totmargen3=(isNaN(totmargen3)) ? 0 : totmargen3

	$("input:text[name='margenventasprod1']").val((totmargen1*100).toFixed(2));
	$("input:text[name='margenventasprod2']").val((totmargen2*100).toFixed(2));
	$("input:text[name='margenventasprod3']").val((totmargen3*100).toFixed(2));
	var totingmensual = parseFloat(ventastotprod1)+parseFloat(ventastotprod2)+parseFloat(ventastotprod3);
	var totcostoprimo = parseFloat(costoprimprod1)+parseFloat(costoprimprod2)+parseFloat(costoprimprod3);


	$("input:text[name='totingmensual']").val(totingmensual.toFixed(2));
	$("input:text[name='totcostoprimo']").val(totcostoprimo.toFixed(2));

	var costoprimovent = (totcostoprimo)/(totingmensual);
	$("input:text[name='costoprimovent']").val(costoprimovent.toFixed(2));

	var margtontal = (totingmensual-totcostoprimo)/(totingmensual);
	$("input:text[name='margtontal']").val((margtontal*100).toFixed(2));	
}
$(".matprima1").change(function(){
	var principal=$("input:text[name='materiaprimapri1']").val();
	var secundaria = $("input:text[name='materiaprimasec1']").val();
	var complementaria = $("input:text[name='materiaprimacomp1']").val();	
	var tot = parseFloat(principal)+parseFloat(secundaria)+parseFloat(complementaria);
	$("input:text[name='materiaprima1']").val(tot.toFixed(2));
	sumacostoprimprod();
});
$(".matprima2").change(function(){
	var principal=$("input:text[name='materiaprimapri2']").val();
	var secundaria = $("input:text[name='materiaprimasec2']").val();
	var complementaria = $("input:text[name='materiaprimacomp2']").val();	
	var tot = parseFloat(principal)+parseFloat(secundaria)+parseFloat(complementaria);
	$("input:text[name='materiaprima2']").val(tot.toFixed(2));	
	sumacostoprimprod();
});
$(".matprima3").change(function(){
	var principal=$("input:text[name='materiaprimapri3']").val();
	var secundaria = $("input:text[name='materiaprimasec3']").val();
	var complementaria = $("input:text[name='materiaprimacomp3']").val();	
	var tot = parseFloat(principal)+parseFloat(secundaria)+parseFloat(complementaria);
	$("input:text[name='materiaprima3']").val(tot.toFixed(2));	
	sumacostoprimprod();
});
$(".manoobra1").change(function(){
	var manoobraun1=$("input:text[name='manoobraun1']").val();
	var manoobrados1 = $("input:text[name='manoobrados1']").val();
	var tot = parseFloat(manoobraun1)+parseFloat(manoobrados1);
	$("input:text[name='manoobra1']").val(tot.toFixed(2));	
	sumacostoprimprod();	
});
$(".manoobra2").change(function(){
	var manoobraun2=$("input:text[name='manoobraun2']").val();
	var manoobrados2 = $("input:text[name='manoobrados2']").val();
	var tot = parseFloat(manoobraun2)+parseFloat(manoobrados2);
	$("input:text[name='manoobra2']").val(tot.toFixed(2));		
	sumacostoprimprod();
});
$(".manoobra3").change(function(){
	var manoobraun3=$("input:text[name='manoobraun3']").val();
	var manoobrados3 = $("input:text[name='manoobrados3']").val();
	var tot = parseFloat(manoobraun3)+parseFloat(manoobrados3);
	$("input:text[name='manoobra3']").val(tot.toFixed(2));		
	sumacostoprimprod();
});
function cargar_mueblescliente(){
	var codsolicitud = $('#codsolicitud').val();
	$.get(link+"index.php/solicitud/cargar_mueblescliente/"+codsolicitud,function(data){
	 	$("#tablamuebles").html(data);
	 	$.get(link+"index.php/solicitud/sumacantmuebles/"+codsolicitud,function(data2){
			$('input:text[name="activomueble"]').val(data2);	
			sumarbalance();
	 	});
	});
}
function cargar_deudaentidades(){
	var codsolicitud = $('#codsolicitud').val();
	$.get(link+"index.php/solicitud/cargar_entidadfinan/"+codsolicitud,function(data){
	 	$("#tablaef").html(data);
	 	$.get(link+"index.php/solicitud/totalsumentidadfinan/"+codsolicitud,function(data2){
			$('input:text[name="pasivodeudaent"]').val(data2);	
			sumarbalance();
	 	});
	});
}
$(".eliminarmueble").click(function(){
	var id = $(this).attr("href");
	$.get(link+"index.php/solicitud/eliminarmueblecliente/"+id,function(data){
		if(data=='true'){
			cargar_mueblescliente();
		}
	});
	return false;
});
$(".eliminardeudaentidad").click(function(){
	var id = $(this).attr("href");
	$.get(link+"index.php/solicitud/eliminardef/"+id,function(data){
		if(data=='true'){
			cargar_deudaentidades();
		}
	});
	return false;
});
$("#modificarms").change(function (){
	if($(this).val()=='true'){
 		$("#montosolic").removeAttr("readonly");
	}else{
		$("#montosolic").attr("readonly","readonly");
	}
});
$("#guardar_analcual").click(function (){
	var codsolicitud = $('#codsolicitud').val();
	var tipoenvioac = $('#tipoenvioac').val();	
	var tipogarantia = $('input:radio[name="tipogarantia"]:checked').val();
	var cargafamiliar = $('input:radio[name="cargafamiliar"]:checked').val();
	var riesgoedadmax = $('input:radio[name="riesgoedadmax"]:checked').val();
	var antecedentescredit = $('input:radio[name="antecedentescredit"]:checked').val();
	var recordultimopago = $('input:radio[name="recordultimopago"]:checked').val();
	var niveldesarro = $('input:radio[name="niveldesarro"]:checked').val();	
	var tiempofuncionamiento = $('input:radio[name="tiempofuncionamiento"]:checked').val();
	var controlasusingegre = $('input:radio[name="controlasusingegre"]:checked').val();
	var lasventastotales = $('input:radio[name="lasventastotales"]:checked').val();
	var comportamientosubsec = $('input:radio[name="comportamientosubsec"]:checked').val();
	var totalunidadfam = $('input:text[name="totalunidadfam"]').val();
	var totalunidademp = $('input:text[name="totalunidademp"]').val();
	var puntajetotal = $('input:text[name="puntajetotal"]').val();
	$.post(link+"index.php/solicitud/guardaranalcual",{ 
		codsolicitud : codsolicitud,
		tipogarantia : tipogarantia,
		cargafamiliar : cargafamiliar,
		riesgoedadmax : riesgoedadmax,
		antecedentescredit : antecedentescredit,
		recordultimopago : recordultimopago,
		niveldesarro : niveldesarro,
		tiempofuncionamiento : tiempofuncionamiento,
		controlasusingegre : controlasusingegre,
		lasventastotales : lasventastotales,
		comportamientosubsec : comportamientosubsec,
		totalunidadfam:totalunidadfam,
		totalunidademp:totalunidademp,
		puntajetotal:puntajetotal,
		tipoenvioac:tipoenvioac
		},
		function(data){
			//alert(data);
			if(data=='false'){
				alert('NO SE GUARDO EL REGISTRO DE ANALISIS CUALITATIVO');
			}
		});
});
$("#enviarsolicitud").click(function(){
	var codsolicitud = $('#codsolicitud').val();
	$.get(link+"index.php/solicitud/validarevaluacion/"+codsolicitud,function(data){
		switch(data){
			case '0':
				$("form[name='evaluarform']").submit();
				break;
			case '1':
				alert('NO REGISTRO EL ANALISIS CUALITATIVO');
				break;
			case '2':
				alert('NO SE REGISTRO EL BALANCE GENERAL');
				break;
			case '3':
				alert('NO SE REGISTRO EL ESTADO PERDIDAS GANANCIAS');
				break;
			case '4':
				alert('NO SE REGISTRO PROPUESTA DE CREDITO');
				break;				
			default:
				alert('EXISTE UN ERROR NO SE PUEDE GUARDAR');
		}
	});
});
$('#guardarmontomod').click(function (){
	var nrosolicitud = $('#nrosolicitud').val();
	var montosolic = $('#montosolic').val();
	var fecha_solicitud = $('#fecha_solicitud').val();
	$.post(link+"index.php/solicitud/actualizarmontosolic",{ 
		nrosolicitud : nrosolicitud,
		montosolic : montosolic,
		fecha_solicitud: fecha_solicitud
		},
		function(data){
			alert(data);
			location.href=link+'index.php/solicitud/form_evaluacion/'+nrosolicitud;
		});
});
$("#guardar_balancebtn").click(function (){
	var codsolicitud = $('#codsolicitud').val();	
	var totalactivo = $('input:text[name="totalactivo"]').val();
	var totalpasivo = $('input:text[name="totalpasivo"]').val();
	var totpatrimonio = $('input:text[name="totpatrimonio"]').val();
	var fecha_balance = $('#fecha_balance').val();
//detbalance
	var activocaja = $('input:text[name="activocaja"]').val();
	var activobancos = $('input:text[name="activobancos"]').val();
	var activoctascobrar = $('input:text[name="activoctascobrar"]').val();
	var activoinventarios = $('input:text[name="activoinventarios"]').val();
	var pasivodeudaprove = $('input:text[name="pasivodeudaprove"]').val();
	var pasivodeudaent = $('input:text[name="pasivodeudaent"]').val();	
	var pasivodeudaemprender = $('input:text[name="pasivodeudaemprender"]').val();
	var activomueble = $('input:text[name="activomueble"]').val();
	var activootrosact = $('input:text[name="activootrosact"]').val();
	var activodepre = $('input:text[name="activodepre"]').val();
	var pasivolargop = $('input:text[name="pasivolargop"]').val();
	var otrascuentaspagar = $('input:text[name="otrascuentaspagar"]').val();
	var totalacorriente = $('input:text[name="totalactivocorr"]').val();	
	var totalpcorriente = $('input:text[name="totalpasivocorr"]').val();
	var totalancorriente = $('input:text[name="totalactivonocorr"]').val();
	var totalpncorriente = $('input:text[name="totalpasivonocorr"]').val();

	$.post(link+"index.php/solicitud/regbalance",{ 
		codsolicitud : codsolicitud,
		totalactivo : totalactivo,
		totalpasivo : totalpasivo,
		totpatrimonio : totpatrimonio,
		fecha_balance : fecha_balance,
		//det
		activocaja : activocaja,
		activobancos : activobancos,
		activoctascobrar : activoctascobrar,
		activoinventarios : activoinventarios,
		pasivodeudaprove : pasivodeudaprove,
		pasivodeudaent : pasivodeudaent,
		pasivodeudaemprender : pasivodeudaemprender,
		activomueble : activomueble,
		activootrosact : activootrosact,
		activodepre : activodepre,
		pasivolargop : pasivolargop,
		otrascuentaspagar : otrascuentaspagar,
		totalacorriente : totalacorriente,
		totalpcorriente : totalpcorriente,
		totalancorriente : totalancorriente,
		totalpncorriente : totalpncorriente
		},
		function(data){
			if(data=='false'){
				alert('NO SE PUDO GUARDAR EL BALANCE');
			}
		});
});
function guardar_perdganbtnvc(){
	var codsolicitud = $('#codsolicitud').val();
	var totingmensual = $('input:text[name="totingmensual"]').val();
	var margtontal = $('input:text[name="margtontal"]').val();	
	var totcostoprimo = $('input:text[name="totcostoprimo"]').val();
	var ventcredito = $('input:text[name="ventcredito"]').val();
	var irrecuperabilidad = $('input:text[name="irrecuperabilidad"]').val();
	var cant=1;
	if ($('input:checkbox[name="aproducto2"]').is(':checked')){
		cant=2;
	}else{
		$.get(link+"index.php/solicitud/eliminarproductdetpg/"+codsolicitud+"/"+2,function(data){});		
	}
	if ($('input:checkbox[name="aproducto3"]').is(':checked')){
		cant=3;
	}else{
		$.get(link+"index.php/solicitud/eliminarproductdetpg/"+codsolicitud+"/"+3,function(data){});		
	}
	//DET PERDIDAS GANANCIAS
	var descproducto1 = $('input:text[name="descproducto1"]').val();
	var descproducto2 = $('input:text[name="descproducto2"]').val();
	var descproducto3 = $('input:text[name="descproducto3"]').val();
	var unidmedida1 = $('select[name="unidmedida1"]').val();
	var unidmedida2 = $('select[name="unidmedida2"]').val();
	var unidmedida3 = $('select[name="unidmedida3"]').val();
	var precioventaunit1 = $('input:text[name="precioventaunit1"]').val();
	var precioventaunit2 = $('input:text[name="precioventaunit2"]').val();
	var precioventaunit3 = $('input:text[name="precioventaunit3"]').val();
	var materiaprimapri1 = $('input:text[name="materiaprimapri1"]').val();
	var materiaprimapri2 = $('input:text[name="materiaprimapri2"]').val();
	var materiaprimapri3 = $('input:text[name="materiaprimapri3"]').val();
	var materiaprimasec1 = $('input:text[name="materiaprimasec1"]').val();
	var materiaprimasec2 = $('input:text[name="materiaprimasec2"]').val();
	var materiaprimasec3 = $('input:text[name="materiaprimasec3"]').val();	
	var materiaprimacomp1 = $('input:text[name="materiaprimacomp1"]').val();
	var materiaprimacomp2 = $('input:text[name="materiaprimacomp2"]').val();
	var materiaprimacomp3 = $('input:text[name="materiaprimacomp3"]').val();	
	var materiaprima1 = $('input:text[name="materiaprima1"]').val();
	var materiaprima2 = $('input:text[name="materiaprima2"]').val();
	var materiaprima3 = $('input:text[name="materiaprima3"]').val();	
	var manoobraun1 = $('input:text[name="manoobraun1"]').val();
	var manoobraun2 = $('input:text[name="manoobraun2"]').val();
	var manoobraun3 = $('input:text[name="manoobraun3"]').val();
	var manoobrados1 = $('input:text[name="manoobrados1"]').val();
	var manoobrados2 = $('input:text[name="manoobrados2"]').val();
	var manoobrados3 = $('input:text[name="manoobrados3"]').val();
	var manoobra1 = $('input:text[name="manoobra1"]').val();
	var manoobra2 = $('input:text[name="manoobra2"]').val();
	var manoobra3 = $('input:text[name="manoobra3"]').val();
	var costoprimounit1 = $('input:text[name="costoprimounit1"]').val();
	var costoprimounit2 = $('input:text[name="costoprimounit2"]').val();
	var costoprimounit3 = $('input:text[name="costoprimounit3"]').val();	
	var produccionmensprod1 = $('input:text[name="produccionmensprod1"]').val();
	var produccionmensprod2 = $('input:text[name="produccionmensprod2"]').val();
	var produccionmensprod3 = $('input:text[name="produccionmensprod3"]').val();
	var ventastotprod1 = $('input:text[name="ventastotprod1"]').val();
	var ventastotprod2 = $('input:text[name="ventastotprod2"]').val();
	var ventastotprod3 = $('input:text[name="ventastotprod3"]').val();
	var costoprimprod1 = $('input:text[name="costoprimprod1"]').val();
	var costoprimprod2 = $('input:text[name="costoprimprod2"]').val();
	var costoprimprod3 = $('input:text[name="costoprimprod3"]').val();
	var margenventasprod1 = $('input:text[name="margenventasprod1"]').val();
	var margenventasprod2 = $('input:text[name="margenventasprod2"]').val();
	var margenventasprod3 = $('input:text[name="margenventasprod3"]').val();
	$.post(link+"index.php/solicitud/reg_perdidasganancias",{ 
		codsolicitud : codsolicitud,
		totingmensual : totingmensual,
		totcostoprimo : totcostoprimo,		
		margtontal : margtontal,
		ventcredito : ventcredito,
		irrecuperabilidad : irrecuperabilidad,
		cant : cant,
		//perdidas ganancias detalle
		descproducto1 : descproducto1,
		descproducto2 : descproducto2,
		descproducto3 : descproducto3,
		unidmedida1 : unidmedida1,
		unidmedida2 : unidmedida2,
		unidmedida3 : unidmedida3,
		precioventaunit1 : precioventaunit1,
		precioventaunit2 : precioventaunit2,
		precioventaunit3 : precioventaunit3,
		materiaprimapri1 : materiaprimapri1,
		materiaprimapri2 : materiaprimapri2,
		materiaprimapri3 : materiaprimapri3,
		materiaprimasec1 : materiaprimasec1,
		materiaprimasec2 : materiaprimasec2,
		materiaprimasec3 : materiaprimasec3,
		materiaprimacomp1 : materiaprimacomp1,
		materiaprimacomp2 : materiaprimacomp2,
		materiaprimacomp3 : materiaprimacomp3,
		materiaprima1 : materiaprima1,
		materiaprima2 : materiaprima2,
		materiaprima3 : materiaprima3,
		manoobraun1 : manoobraun1,
		manoobraun2 : manoobraun2,
		manoobraun3 : manoobraun3,
		manoobrados1 : manoobrados1,
		manoobrados2 : manoobrados2,
		manoobrados3 : manoobrados3,
		manoobra1 : manoobra1,
		manoobra2 : manoobra2,
		manoobra3 : manoobra3,
		costoprimounit1 : costoprimounit1,
		costoprimounit2 : costoprimounit2,
		costoprimounit3 : costoprimounit3,
		produccionmensprod1 : produccionmensprod1,
		produccionmensprod2 : produccionmensprod2,
		produccionmensprod3 : produccionmensprod3,
		ventastotprod1 : ventastotprod1,
		ventastotprod2 : ventastotprod2,
		ventastotprod3 : ventastotprod3,
		costoprimprod1 : costoprimprod1,
		costoprimprod2 : costoprimprod2,
		costoprimprod3 : costoprimprod3,
		margenventasprod1 : margenventasprod1,
		margenventasprod2 : margenventasprod2,
		margenventasprod3 : margenventasprod3
		},
		function(data){
			if(data=='false'){
				alert('NO SE PUDO GUARDAR EL BALANCE');
			}
		});
}
$("#guardar_perdganbtnvc").click(function (){
	var totingmensual = $('input:text[name="totingmensual"]').val();
	var totcostoprimo = $('input:text[name="totcostoprimo"]').val();
	$('input:text[name="ventaspg"]').val(totingmensual);
	$('input:text[name="costopg"]').val(totcostoprimo);
	var utilidadbpg = parseFloat(totingmensual) - parseFloat(totcostoprimo);
	$('input:text[name="utilidadbpg"]').val(utilidadbpg.toFixed(2));
	guardar_perdganbtnvc(); //GUARDAR EM BD perdgananc
	calcularutilidadneta();
});
$("#guardargastosneg").click(function (){
	var codsolicitud = $('#codsolicitud').val();
	var alquilerpg = $('input:text[name="alquilerpg"]').val();
	var serviciospg = $('input:text[name="serviciospg"]').val();
	var personalpg = $('input:text[name="personalpg"]').val();
	var sunatpg = $('input:text[name="sunatpg"]').val();	
	var transportepg = $('input:text[name="transportepg"]').val();
	var gastosfinan = $('input:text[name="gastosfinan"]').val();
	var otrospg = $('input:text[name="otrospg"]').val();
	var total =0;
	total = parseFloat(alquilerpg)+parseFloat(serviciospg)+parseFloat(personalpg)+parseFloat(sunatpg)+parseFloat(transportepg)+parseFloat(gastosfinan)+parseFloat(otrospg);
	$("#gastoneg").val(total);
	// utilidadbpg = isNaN(utilidadbpg) ? 0 : utilidadbpg;
	// utilidadbpg = (utilidadbpg=='') ? 0 : utilidadbpg;	
	// var utilidopera = parseFloat(utilidadbpg)-parseFloat(total);
	// $('input:text[name="utilidopera"]').val(utilidopera.toFixed(2));
	calcularutilidadneta();	
	$.post(link+"index.php/solicitud/registrargastosnegocio",{ 
		codsolicitud : codsolicitud,
		alquilerpg : alquilerpg,
		serviciospg : serviciospg,
		personalpg : personalpg,
		sunatpg : sunatpg,
		gastosfinan: gastosfinan,
		transportepg : transportepg,
		otrospg : otrospg
		},
		function(data){
			if(data=='false'){
				alert('NO SE PUDO GUARDAR CONSULTE A SU SOPORTE');
			}
		});
});
$("#grdgastosfam").click(function (){
	var codsolicitud = $('#codsolicitud').val();
	var alimentac = $('input:text[name="alimentac"]').val();
	var alquil = $('input:text[name="alquil"]').val();
	var educac = $('input:text[name="educac"]').val();
	var servic = $('input:text[name="servic"]').val();	
	var transport = $('input:text[name="transport"]').val();
	var salud = $('input:text[name="salud"]').val();
	var otros_gf = $('input:text[name="otros_gf"]').val();
	var total =0;
	total = parseFloat(alimentac)+parseFloat(alquil)+parseFloat(educac)+parseFloat(servic)+parseFloat(transport)+parseFloat(salud)+parseFloat(otros_gf);
	$("#gastfamiliares").val(total);
	calcularutilidadneta();
	$.post(link+"index.php/solicitud/registrargastosfamiliares",{ 
		codsolicitud : codsolicitud,
		alimentac : alimentac,
		alquil : alquil,
		educac : educac,
		servic : servic,
		transport: transport,
		salud : salud,
		otros_gf : otros_gf,
		total : total
		},
		function(data){
			if(data=='false'){
				alert('NO SE PUDO GUARDAR CONSULTE A SU SOPORTE');
			}
		});	
});
function calcularutilidadneta(){
	var utilidadbpg = $('input:text[name="utilidadbpg"]').val();	
	var gastoneg = $('#gastoneg').val();
	gastoneg = (isNaN(gastoneg) || gastoneg=='') ? 0 : gastoneg;
	$('input:text[name="utilidopera"]').val((utilidadbpg-gastoneg).toFixed(2));
	var utilidopera = $('input:text[name="utilidopera"]').val();
	utilidopera = (isNaN(utilidopera) || utilidopera=='') ? 0 : utilidopera;
	var otrosing = $('input:text[name="otrosing"]').val();
	otrosing = (isNaN(otrosing) || otrosing=='') ? 0 : otrosing;
	var gastfamiliares = $('input:text[name="gastfamiliares"]').val();
	gastfamiliares = (isNaN(gastfamiliares) || gastfamiliares=='') ? 0 : gastfamiliares;
	var otrosegre = $('input:text[name="otrosegre"]').val();
	otrosegre = (isNaN(otrosegre) || otrosegre=='') ? 0 : otrosegre;	
	var total = (parseFloat(utilidopera)+parseFloat(otrosing))-parseFloat(gastfamiliares)-parseFloat(otrosegre);
	total = (isNaN(total)) ? 0 : total;
	$('input:text[name="utilneta"]').val(total);
	var tipoplazo = $('input[name="tipoplazosol"]').val();
	if(tipoplazo=='DIARIO'){
		$('#lblutilnet').html('Utilidad Neta Diaria');
		$('input:text[name="utilnetadiaria"]').val((total/26).toFixed(2));		
	}else{
		$('#lblutilnet').html('Utilidad Neta Semanal');
		$('input:text[name="utilnetadiaria"]').val((total/4).toFixed(2));			
	}
}
$("#grdperdi_ganan").click(function (){
	var codsolicitud = $('#codsolicitud').val();
	var ventaspg = $('input:text[name="ventaspg"]').val();
	var costopg = $('input:text[name="costopg"]').val();
	var utilidadbpg = $('input:text[name="utilidadbpg"]').val();
	var gastoneg = $('input:text[name="gastoneg"]').val();
	var utilidopera = $('input:text[name="utilidopera"]').val();
	var otrosing = $('input:text[name="otrosing"]').val();
	var otrosegre = $('input:text[name="otrosegre"]').val();
	var gastfamiliares = $('input:text[name="gastfamiliares"]').val();
	var utilneta = $('input:text[name="utilneta"]').val();
	var utilnetadiaria = $('input:text[name="utilnetadiaria"]').val();
	$.post(link+"index.php/solicitud/regperdidasganan_gral",{
		codsolicitud : codsolicitud,
		ventaspg : ventaspg,
		costopg : costopg,
		utilidadbpg : utilidadbpg,
		gastoneg : gastoneg,
		utilidopera : utilidopera,
		otrosing : otrosing,
		otrosegre : otrosegre,
		gastfamiliares : gastfamiliares,
		utilneta : utilneta,
		utilnetadiaria : utilnetadiaria
		},
		function(data){
			if(data=='false'){
				alert('NO SE REGISTRO LAS PERDIDAS GANANCIAS');
			}
		});
});
$('#otrosing').change(function (){
	calcularutilidadneta();
});
$('#otrosegre').change(function (){
	calcularutilidadneta();	
});
$("#grdpropuesta").click(function (){
	var codsolicitud = $('#codsolicitud').val();	
	var unidfam = $('textarea[name="unidfam"]').val();
	var expcred = $('textarea[name="expcred"]').val();
	var destprest = $('textarea[name="destprest"]').val();	
	var refper = $('textarea[name="refper"]').val();	
	$.post(link+"index.php/solicitud/regpropuestacred",{ 
		codsolicitud : codsolicitud,
		unidfam : unidfam,
		expcred : expcred,
		destprest : destprest,
		refper : refper
		},
		function(data){
			if(data=='false'){
				alert('NO SE REGISTRO LA PROPUESTA');
			}
		});
});
$('#btn_rechazarasesor').click(function (){
    var mensaje = prompt("INGRESA EL MOTIVO", "");
    if (mensaje != null) {
		$.post(link+"index.php/solicitud/rechazar_evalsolicitud",{ 
			mensaje : mensaje,
			codsolicitud : codsolicitud
		},
		function(data){
			if(data=='true'){
				alert('REGISTRADO');
			}else{
				alert('NO SE PUDO REGISTRAR');
			}
		});
    }
});
$('#imprimiranalisicual').click(function (){
 	var codsolicitud = $('#codsolicitud').val();	
	$.get(link+"index.php/solicitud/tieneanalisicualitativo/"+codsolicitud,function(data){
		if(data=='true'){
			window.open(link+'index.php/solicitud/analisiscualitativopdf/'+codsolicitud, '_blank');
		}else{
			alert('Guarde el analisis cualitativo');
		}
	});	
	return false;
});

$('input[name=irrecuperabilidad]').change(function (){
	var totingmensual = $('input[name=totingmensual]').val();
	var irrecuperabilidad = $(this).val();
	totingmensual = parseFloat(totingmensual) * (1 - parseFloat(irrecuperabilidad)/100);
	$('input[name=totingmensual]').val(totingmensual.toFixed(2));
});
$('input[name=apenomcliente]').keyup(function (){
	var desc = $(this).val();
	if(desc!=''){
		$.post(link+"index.php/solicitud/listasolicitudesgrente_ap",{ desc : desc },function(data){
			$('#tablasolicitudes').html(data);
		});			
	}else{
		$('#tablasolicitudes').html('');
	}
});
$('select[name=busqtiposolicitud]').change(function (){
	var estado = $(this).val();
	if(estado!=''){
		$.post(link+"index.php/solicitud/cargartablasolicxasesorestado",{ estado : estado },function(data){
			$('#tablasolicitudes').html(data);
		});			
	}else{
		$('#tablasolicitudes').html('');
	}	
});
$('#tiposolicitud').change(function (){
	var tiposolicitud = $(this).val();
	var codcliente = $('input[name=codcliente]').val();
	if(tiposolicitud=='Recurrente Con Saldo'){
		$('#selectsolicitudDIV').removeClass("hide");
		$('#selectsolicitudDIV').html('<div align="center"><img src="'+link+'activos/images/Loading_chico.gif"></div>');
		$.get(link+"index.php/solicitud/cargarsolvigentes/"+codcliente,function(data){
			$('#selectsolicitudDIV').html(data);
		});	
	}else{
		$('#selectsolicitudDIV').addClass("hide");
	}
});
$('select[name=producto]').change(function (){
	var value = $(this).val();
	if(value=='CREDI-6'){
		$('input[name=plazo]').val(20);
		$('input[name=plazo]').attr("readonly","readonly");
		$('select[name=tipoplazo]').html('<option value="DIARIO">Diario</option>');
	}else{
		$('input[name=plazo]').removeAttr("readonly");
		$('select[name=tipoplazo]').html('<option value="DIARIO">Diario</option><option value="SEMANAL">Semanal</option><option value="QUINCENAL">Quincenal</option><option value="MENSUAL">Mensual</option>');
	}
});
$('select[name=fuenterecursos]').change(function(){
	var value = $(this).val();
	if(value=='PROPIO'){
		$('select[name=producto]').html('<option value="CAPITAL">Capital</option><option value="PRENDARIO">Prendario</option><option value="ACTIVO FIJO">Activo Fijo</option><option value="TRANSPORTE">Transporte</option><option value="CONSUMO">Consumo</option><option value="CREDI-6">Credi-6</option>');	
		$('select[name=tipoplazo]').html('<option value="DIARIO">Diario</option><option value="SEMANAL">Semanal</option><option value="QUINCENAL">Quincenal</option><option value="MENSUAL">Mensual</option>');
	}else{
		$('select[name=producto]').html('<option value="CREDI-INVERSION">Credi-inversion</option>');	
		$('select[name=tipoplazo]').html('<option value="DIARIO">Diario</option><option value="SEMANAL">Semanal</option><option value="QUINCENAL">Quincenal</option><option value="MENSUAL">Mensual</option>');
	}
	$("input[type='number'][name='plazo']").val(30);
	$("#mostrar").html('Dias Hab.');
});