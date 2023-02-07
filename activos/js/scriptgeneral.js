(function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);
var estado=false;
$('#versaldo').click(function(){
    if(estado==false){
        $.get(link+"index.php/caja/versaldocaja/",function(data){
            $('#spanversaldo').html(data);
        });
        estado = true;
    }else{
        estado=false;
        $('#spanversaldo').html(' <span class="glyphicon glyphicon-eye-open"></span>');
    }

  return false;
});
$('.solo_numeros').keypress(function(){//NO ACEPTA PUNTOS
    var keynum = window.event ? window.event.keyCode : e.which;
    return /\d/.test(String.fromCharCode(keynum));
});	
$('.numerosypunto').keypress(function(){
    var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
        return /\d/.test(String.fromCharCode(keynum));
});	

var s = false;
$('.unsoloclick').click(function(){
    if (!statSend) {
        statSend = true;
    } else {
        return false;
    }
}); 
function mayus(e) {
    e.value = e.value.toUpperCase();
}
function selecciona_value(objInput) {
    var valor_input = objInput.value; 
    var longitud = valor_input.length; 
    if (objInput.setSelectionRange) { 
        objInput.focus(); 
        objInput.setSelectionRange (0, longitud); 
    } 
    else if (objInput.createTextRange) { 
        var range = objInput.createTextRange() ; 
        range.collapse(true); 
        range.moveEnd('character', longitud); 
        range.moveStart('character', 0); 
        range.select(); 
    } 
}
var statSend = false;
function checkSubmit() {
    if (!statSend) {
        statSend = true;
        return true;
    } else {
        return false;
    }
}
$(".eliminar").click(function (){
    var url=$(this).attr("href");
    if(window.confirm("ESTA SEGURO DE ELIMINAR?")==true){
        window.location.href = url;
    }
    return false;
});

$(".sexocheck").bootstrapSwitch();
 var tableToExcel = (function() {
 var uri = 'data:application/vnd.ms-excel;base64,'
     , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><?xml version="1.0" encoding="UTF-8" standalone="yes"?><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
     , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
     , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
   return function(table, name) {
     if (!table.nodeType) table = document.getElementById(table)
     var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
     window.location.href = uri + base64(format(template, ctx))
   }
 })()
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}