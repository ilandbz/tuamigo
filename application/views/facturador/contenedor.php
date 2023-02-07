<div class="register-box">
  <div class="register-logo">
<?php

		#  Se genera el archivo TXT  'a'
		$txt= fopen('./activos/facturador/opcion.cab', 'a') or die ('Problemas al crear el archivo');
		#  Se establecen los datos que va a conterner el archivo
		fwrite($txt, "primer dato|");
		fwrite($txt, "segundffffo dato|");
		#  Se hace el ciere para no sobre escribir datos 
		fclose($txt);

		// #  Se lee el archivo 'r'
		// $leer= fopen('./activos/facturador/opcion.txt', 'r');
		// #  Se juntan los datos en un solo string
		// $mostrar = fgets($leer);
		// #  Se separan los datos por medio de la condicion puesta ',' en este caso
	 //  	$datos = explode("|", $mostrar);
		
	 //  	#  Se crea la tabla la cual alberga todo los datos del archivo

		// echo '<table border="1">';
		// #  hacemos un conteo para saber cuanto datos tiene nuestro archivo y asi poder 		mostrarlos todos 			
		// $total = count($datos);
		// #  Creamos un for el cual va ha mostrar todos los datos en una tabla


		// for ($i=0; $i < $total -1; $i++) { 
		// #  Se establece la informacion que contienen los campo de la tabla	
		// 	echo '<tr>';
		// 	if(($i % 2)==0) {
		// 		echo 	'<td>'.$datos[$i].'</td><td>'. $datos[$i+1].'</td>';
		// 	}
		// 	echo '</tr>';
		// }
		// #  Cerramos la tabla 
		// echo  '</tbody></table>';
		// var_dump($datos);		

?>

	

</div></div>