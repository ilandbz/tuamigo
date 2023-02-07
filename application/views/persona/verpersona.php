<div class="panel panel-info">
  <div class="panel-heading">
  	PERSONA : 
  	<div class="pull-right"><img src="<?php echo base_url() ?>activos/images/<?php echo $persona['sexo'] ?>.png" alt=""></div>
  </div>
  <div class="panel-body" style="font-size: 12px;">
  	<div class="row">
  		<div class="col-md-2" align="center">
  			<img class="img-responsive img-thumbnail" src="<?php echo base_url() ?>activos/images/<?php echo $persona['sexo']=='F' ? 'woman_avatar.png' : 'man_avatar.png' ?>" alt="">
				<div class="btn-group btn-group-sm">
					<a href="<?php echo base_url() ?>index.php/cliente/formactualizarpersona/<?php echo $persona['dni'] ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>
					<a href="<?php echo base_url() ?>index.php" class="btn btn-default"><span class="glyphicon glyphicon-object-align-vertical"></span> Posición</a>
				</div>
  		</div>
  		<div class="col-md-10">
  			<table class="table table-bordered table-striped">
		    	<tr>
		    		<th width="10%">DNI</th><td width="10%">: <?php echo $persona['dni'] ?></td>
		    		<th width="10%">RUC</th><td width="10%">: <?php echo $persona['ruc']=='' ? 'NINGUNO' : $persona['ruc'] ?></td>
		    		<th width="20%" colspan="2">APELLIDOS Y NOMBRES</th><td colspan="2" width="20%">: <?php echo $persona['apenom'] ?></td>		    		
		    	</tr>
		    	<tr>
		    		<th>ESTADO CIVIL</th>
            <td>: 
              <?php echo $persona['estadocivil'] ?>
              <?php if($persona['estadocivil']=='Casado' || $persona['estadocivil']=='Conviviente'){
                echo '<br><a href="'.base_url().'index.php/cliente/verpersona/'.$persona['dniconyugue'].'">Ver Conyugue</a>';
              } ?>
            </td>
		    		<th>FECHA NAC.</th><td>: <?php echo $persona['fecha_nac'] ?></td>
		    		<th>EDAD</th><td>: <?php echo $persona['edad'] ?> años</td>
		    		<th>GRADO DE INSTRUCCION</th><td>: <?php echo $persona['grado_instr'] ?></td>
		    	</tr>
		    	<tr>
		    		<th>NACIONALIDAD</th><td>: <?php echo $persona['nacionalidad'] ?></td>
		    		<th>CELULAR</th><td>: <?php echo $persona['celular'] ?></td>
		    		<th>TIPO DE TRABAJADOR</th><td>: <?php echo $persona['tipotrabajador'] ?></td>
		    		<th>EMAIL</th><td>: <?php echo $persona['email'] ?></td>
		    	</tr>
		    	<tr>
		    		<th>OCUPACION</th><td>: <?php echo $persona['ocupacion'] ?></td>
		    		<th>INSTITUCION DONDE LABORA</th><td colspan="3">: <?php echo $persona['institucion_lab'] ?></td>
		    		<th>LUGAR NACIMIENTO</th><td>: <?php echo $persona['departamentonombre_nac'].' - '.$persona['provincianombre_nac'].' - '.$persona['distritonombre_nac'] ?></td>
		    	</tr>
		    	<tr>
		    		<th>TIPO DE VIVIENDA</th><td>: <?php echo $persona['tipovivienda'] ?></td>
		    		<th colspan="4">
              <?php echo is_null($cliente) ? 'NO' : 'SI' ?> ES CLIENTE &nbsp;
              <?php if(!is_null($cliente)){
                echo '<a href="'.base_url().'index.php/cliente/ver/'.$cliente['codcliente'].'">Ver Cliente</a>';
              } ?>
            </th>
		    		<td></td><td></td>	    		
		    	</tr>
  			</table>
  		</div>
  	</div>
	<h4>Domicilio</h4>
    <table class="table table-bordered table-striped">
    	<tr>
    		<th>DEPARTAMENTO.</th><td>: <?php echo $persona['departamentonombre_domic'] ?></td>
    		<th>PROVINCIA.</th><td>: <?php echo $persona['provincianombre_domic'] ?></td>
    		<th>DISTRITO.</th><td>: <?php echo $persona['distritonombre_domic'] ?></td>
    	</tr>
    	<tr>
    		<th>TIPO DE VIA</th><td>: <?php echo $persona['tipovia'] ?></td>
    		<th>NOMBRE VIA</th><td>: <?php echo $persona['nombrevia'] ?></td>
    		<th>NRO</th><td>: <?php echo $persona['Nro'] ?></td>
    	</tr>
    	<tr>
    		<th>INTERIOR</th><td>: <?php echo $persona['interior'] ?></td>
    		<th>MZ</th><td>: <?php echo $persona['mz'] ?></td>
    		<th>LOTE</th><td>: <?php echo $persona['lote'] ?></td>
    	</tr>    	
    	<tr>
    		<th>TIPO ZONA</th><td>: <?php echo $persona['tipozona'] ?></td>
    		<th>NOMBRE ZONA</th><td>: <?php echo $persona['nombrezona'] ?></td>
    		<th>REFERENCIA</th><td>: <?php echo $persona['referencia'] ?></td>    		
    	</tr>
    </table>
  </div>
</div>