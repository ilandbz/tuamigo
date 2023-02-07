<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FINANCIERA TU AMIGO</title>
	<style type="text/css">
		@page {
		    margin-top: 0em;
		    margin-left: 4.8em;
		    margin-right: 0.4em;
		    margin-bottom: 0.8em;
		}
		.micontenidoef{
			font-size: 9px;
		}
		table.conborde tr,table.conborde tr{
		    border: 1px solid black;
		}
	</style>
</head>
<body>

<P ALIGN=CENTER STYLE="margin-bottom: 0.10in; line-height: 100%">    
<B>GASTO ADMINISTRATIVO – N° <?php echo $poliza['idsolicitud'] ?></B>
<B style="position: absolute; right: 20px"><SPAN>S/.<?php echo number_format($poliza['monto'],2) ?></SPAN></B>
</P>

<P ALIGN=JUSTIFY STYLE="margin-bottom: 0.10in; line-height: 100%"><FONT SIZE=2 STYLE="font-size: 9pt"><B>1.-
Datos del Cliente</B></FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0.10in; line-height: 100%">   
 <FONT SIZE=2 STYLE="font-size: 9pt"><SPAN>Apellidos y Nombres: </SPAN></FONT>
 <FONT SIZE=2 STYLE="font-size: 9pt"><SPAN><?php echo $solicitud['apenom'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DNI N°: 
<?php echo $solicitud['dni'] ?></SPAN></FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0.10in; line-height: 100%"><FONT SIZE=2 STYLE="font-size: 9pt"><B>2.-
Coberturas </B></FONT>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.21in; margin-bottom: 0.10in; line-height: 100%">
<FONT SIZE=2 STYLE="font-size: 9pt"><B>Vida (Muerte natural y Muerte
accidental)</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">, Cubre el
fallecimiento del Asegurado por causas naturales y accidentales. </FONT>
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0.10in; line-height: 100%"><FONT SIZE=2 STYLE="font-size: 9pt"><B>3.-
Vigencia de la cobertura</B></FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.21in; margin-bottom: 0.10in; line-height: 100%">
<FONT SIZE=2 STYLE="font-size: 9pt"><U><B>Inicio de la vigencia:</B></U></FONT><FONT SIZE=2 STYLE="font-size: 9pt">
La vigencia de las coberturas otorgadas al amparo del presente seguro
se inicia desde que el Contratante efectúe el desembolso del
</FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>Crédito</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">.</FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.21in; margin-bottom: 0.10in; line-height: 100%">
<FONT SIZE=2 STYLE="font-size: 9pt"><U><B>Fin de  la Vigencia</B></U></FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>:
Las</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt"> coberturas se
mantendrán vigentes mientras concurran las siguientes
circunstancias: (I) se encuentre vigente el </FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>Crédito</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">
asegurado</FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B> (II) </B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">el
asegurado se encuentre al día en el pago de sus cuotas.</FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0.10in; line-height: 100%"><FONT SIZE=2 STYLE="font-size: 9pt"><B>4.-
Procedimiento y Requisitos para presentar una solicitud de cobertura
(aviso del siniestro)</B></FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.21in; margin-bottom: 0.10in; line-height: 100%">
<FONT SIZE=2 STYLE="font-size: 9pt">El beneficiario o los herederos</FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>
</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">del asegurado deberán
presentar la solicitud de cobertura dentro de los (7) días
siguientes a la fecha de ocurrencia del siniestro, de forma escrita a
través de cualquier oficina del contratante, adjuntando el original
y copia certificada notarialmente  de los siguientes documentos, </FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>(I)
Muerte Natural</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt"> Partida
de defunción, </FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>(II)
Muerte Accidental </B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">Partida
de defunción y Certificado Médico de defunción.</FONT></P>
<P ALIGN=JUSTIFY STYLE="text-indent: 0.21in; margin-bottom: 0.10in; line-height: 100%">
<FONT SIZE=2 STYLE="font-size: 9pt"><B><SPAN>Huanuco
<?php
setlocale(LC_TIME, "spanish");
$fecha = strtotime($solicitud['fecha']);
echo date('d \d\e ', $fecha).strftime("%B").date(' \d\e\l Y', $fecha); ?></SPAN></B></FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-left: 170px">   
<FONT SIZE=2 STYLE="font-size: 9pt;"><B>			   
______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	 
______________________________</B>
</FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-top:0; margin-left: 200px">
<FONT SIZE=2 STYLE="font-size: 9pt"></FONT>
<FONT SIZE=2 STYLE="font-size: 9pt"><B><SPAN>Asegurado</SPAN></B></FONT>
<FONT SIZE=2 STYLE="font-size: 9pt">				
             </FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Asesor Responsable</B></FONT></P>

<P ALIGN=CENTER STYLE="margin-bottom: 0.10in; line-height: 100%">    
<B>GASTO ADMINISTRATIVO – N° <?php echo $poliza['idsolicitud'] ?></B>
<B style="position: absolute; right: 20px"><SPAN>S/.<?php echo number_format($poliza['monto'],2) ?></SPAN></B>
</P>

<P ALIGN=JUSTIFY STYLE="margin-bottom: 0.10in; line-height: 100%"><FONT SIZE=2 STYLE="font-size: 9pt"><B>1.-
Datos del Cliente</B></FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0.10in; line-height: 100%">   
 <FONT SIZE=2 STYLE="font-size: 9pt"><SPAN>Apellidos y Nombres: </SPAN></FONT>
 <FONT SIZE=2 STYLE="font-size: 9pt"><SPAN><?php echo $solicitud['apenom'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DNI N°: 
<?php echo $solicitud['dni'] ?></SPAN></FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0.10in; line-height: 100%"><FONT SIZE=2 STYLE="font-size: 9pt"><B>2.-
Coberturas </B></FONT>
</P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.21in; margin-bottom: 0.10in; line-height: 100%">
<FONT SIZE=2 STYLE="font-size: 9pt"><B>Vida (Muerte natural y Muerte
accidental)</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">, Cubre el
fallecimiento del Asegurado por causas naturales y accidentales. </FONT>
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0.10in; line-height: 100%"><FONT SIZE=2 STYLE="font-size: 9pt"><B>3.-
Vigencia de la cobertura</B></FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.21in; margin-bottom: 0.10in; line-height: 100%">
<FONT SIZE=2 STYLE="font-size: 9pt"><U><B>Inicio de la vigencia:</B></U></FONT><FONT SIZE=2 STYLE="font-size: 9pt">
La vigencia de las coberturas otorgadas al amparo del presente seguro
se inicia desde que el Contratante efectúe el desembolso del
</FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>Crédito</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">.</FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.21in; margin-bottom: 0.10in; line-height: 100%">
<FONT SIZE=2 STYLE="font-size: 9pt"><U><B>Fin de  la Vigencia</B></U></FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>:
Las</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt"> coberturas se
mantendrán vigentes mientras concurran las siguientes
circunstancias: (I) se encuentre vigente el </FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>Crédito</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">
asegurado</FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B> (II) </B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">el
asegurado se encuentre al día en el pago de sus cuotas.</FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0.10in; line-height: 100%"><FONT SIZE=2 STYLE="font-size: 9pt"><B>4.-
Procedimiento y Requisitos para presentar una solicitud de cobertura
(aviso del siniestro)</B></FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.21in; margin-bottom: 0.10in; line-height: 100%">
<FONT SIZE=2 STYLE="font-size: 9pt">El beneficiario o los herederos</FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>
</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">del asegurado deberán
presentar la solicitud de cobertura dentro de los (7) días
siguientes a la fecha de ocurrencia del siniestro, de forma escrita a
través de cualquier oficina del contratante, adjuntando el original
y copia certificada notarialmente  de los siguientes documentos, </FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>(I)
Muerte Natural</B></FONT><FONT SIZE=2 STYLE="font-size: 9pt"> Partida
de defunción, </FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>(II)
Muerte Accidental </B></FONT><FONT SIZE=2 STYLE="font-size: 9pt">Partida
de defunción y Certificado Médico de defunción.</FONT></P>
<P ALIGN=JUSTIFY STYLE="text-indent: 0.21in; margin-bottom: 0.10in; line-height: 100%">
<FONT SIZE=2 STYLE="font-size: 9pt"><B><SPAN>Huanuco
<?php
echo date('d \d\e ', $fecha).strftime("%B").date(' \d\e\l Y', $fecha); ?></SPAN></B></FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-left: 170px">   
<FONT SIZE=2 STYLE="font-size: 9pt;"><B>			   
______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	 
______________________________</B>
</FONT></P>
<P ALIGN=JUSTIFY STYLE="margin-top:0; margin-left: 200px">
<FONT SIZE=2 STYLE="font-size: 9pt"></FONT>
<FONT SIZE=2 STYLE="font-size: 9pt"><B><SPAN>Asegurado</SPAN></B></FONT>
<FONT SIZE=2 STYLE="font-size: 9pt">				
             </FONT><FONT SIZE=2 STYLE="font-size: 9pt"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Asesor Responsable</B></FONT></P>
<P ALIGN=CENTER STYLE="margin-bottom: 0.10in; line-height: 100%"><A NAME="_GoBack"></A>
<BR><BR>
</P>


</body>
</html>