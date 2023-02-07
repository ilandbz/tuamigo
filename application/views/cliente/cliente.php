<div class="panel panel-info">
  <div class="panel-heading">
  	CLIENTE : <?php echo $cliente['codcliente'] ?>
    &nbsp;&nbsp;&nbsp;---->&nbsp;&nbsp;&nbsp;<?php echo $cliente['estado'] ?>
  	<div class="pull-right"><img src="<?php echo base_url() ?>activos/images/<?php echo $cliente['sexo'] ?>.png" alt=""></div>
  </div>
  <div class="panel-body" style="font-size: 12px;">
  	<div class="row">
  		<div class="col-md-2" align="center">
  			<img class="img-responsive img-thumbnail" src="<?php echo base_url() ?>activos/images/<?php echo $cliente['sexo']=='F' ? 'woman_avatar.png' : 'man_avatar.png' ?>" alt="">
				<div class="btn-group btn-group-sm">
					<a href="<?php echo base_url() ?>index.php/cliente/formactualizarpersona/<?php echo $cliente['dni'] ?>" class="btn btn-default" title="Editar Persona"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="<?php echo base_url() ?>index.php/report/verposisicion/<?php echo $cliente['codcliente'] ?>" class="btn btn-default" title="Posicion Cliente"><span class="glyphicon glyphicon-object-align-vertical"></span></a>
          <a href="<?php echo base_url() ?>index.php/cliente/configurarcliente/<?php echo $cliente['codcliente'] ?>" class="btn btn-default" title="Configurar Cliente"><span class="glyphicon glyphicon-wrench"></span></a>
				</div>
  		</div>
  		<div class="col-md-10">
  			<table class="table table-bordered table-striped">
		    	<tr>
		    		<th width="10%">DNI</th><td width="10%"><?php echo $cliente['dni'] ?></td>
		    		<th width="10%">RUC</th><td width="10%"><?php echo $cliente['ruc']=='' ? 'NINGUNO' : $cliente['ruc'] ?></td>
		    		<th width="20%" colspan="2">APELLIDOS Y NOMBRES</th><td colspan="2" width="20%"><?php echo $cliente['apenom'] ?></td>		    		
		    	</tr>
		    	<tr>
		    		<th>ESTADO CIVIL</th><td><?php echo $cliente['estadocivil'] ?>
              <?php if($cliente['estadocivil']=='Casado' || $cliente['estadocivil']=='Conviviente'){
                echo '<br><a href="'.base_url().'index.php/cliente/verpersona/'.$cliente['dniconyugue'].'">Ver Conyugue</a>';
              } ?>
		    		</td>
		    		<th>FECHA NAC.</th><td><?php echo $cliente['fecha_nac'] ?></td>
		    		<th>EDAD</th><td><?php echo $cliente['edad'] ?> años</td>
		    		<th>GRADO DE INSTRUCCION</th><td><?php echo $cliente['grado_instr'] ?></td>
		    	</tr>
		    	<tr>
		    		<th>NACIONALIDAD</th><td><?php echo $cliente['nacionalidad'] ?></td>
		    		<th>CELULAR</th><td><?php echo $cliente['celular'] ?></td>
		    		<th>TIPO DE TRABAJADOR</th><td><?php echo $cliente['tipotrabajador'] ?></td>
		    		<th>EMAIL</th><td><?php echo $cliente['email'] ?></td>
		    	</tr>
		    	<tr>
		    		<th>OCUPACION</th><td><?php echo $cliente['ocupacion'] ?></td>
		    		<th>INSTITUCION DONDE LABORA</th><td colspan="3"><?php echo $cliente['institucion_lab'] ?></td>
		    		<th>LUGAR NACIMIENTO</th><td><?php echo $cliente['departamentonombre_nac'].' - '.$cliente['provincianombre_nac'].' - '.$cliente['distritonombre_nac'] ?></td>
		    	</tr>
		    	<tr>
		    		<th>TIPO DE VIVIENDA</th><td><?php echo $cliente['tipovivienda'] ?></td>
		    		<th>POSEE AVAL</th><td><?php echo is_null($cliente['dniaval']) ? 'NO' : 'SI' ?>
              <?php if(!is_null($cliente['dniaval'])){
                echo '<a href="'.base_url().'index.php/cliente/verpersona/'.$cliente['dniaval'].'">Ver Aval</a>';
              } ?>
            </td>
		    		<th>NEGOCIO</th><td>: <?php echo $cliente['negocios']>0 ? 'SI' : 'NO' ?>
              <?php if($cliente['negocios']>0){
                echo '<a href="'.base_url().'index.php/cliente/vernegocios/'.$cliente['codcliente'].'">Ver Negocios</a>';
              } ?>
            </td>
		    		<th>FECHA DE REGISTRO</th><td><?php echo $cliente['fecha_registro'] ?></td>	    		
		    	</tr>
  			</table>
  		</div>
  	</div>
	<h4>Domicilio</h4>
    <table class="table table-bordered table-striped">
    	<tr>
    		<th>DEPARTAMENTO.</th><td>: <?php echo $cliente['departamentonombre_domic'] ?></td>
    		<th>PROVINCIA.</th><td>: <?php echo $cliente['provincianombre_domic'] ?></td>
    		<th>DISTRITO.</th><td>: <?php echo $cliente['distritonombre_domic'] ?></td>
    	</tr>
    	<tr>
    		<th>TIPO DE VIA</th><td>: <?php echo $cliente['tipovia'] ?></td>
    		<th>NOMBRE VIA</th><td>: <?php echo $cliente['nombrevia'] ?></td>
    		<th>NRO</th><td>: <?php echo $cliente['nro'] ?></td>
    	</tr>
    	<tr>
    		<th>INTERIOR</th><td>: <?php echo $cliente['interior'] ?></td>
    		<th>MZ</th><td>: <?php echo $cliente['mz'] ?></td>
    		<th>LOTE</th><td>: <?php echo $cliente['lote'] ?></td>
    	</tr>    	
    	<tr>
    		<th>TIPO ZONA</th><td>: <?php echo $cliente['tipozona'] ?></td>
    		<th>NOMBRE ZONA</th><td>: <?php echo $cliente['nombrezona'] ?></td>
    		<th>REFERENCIA</th><td>: <?php echo $cliente['referencia'] ?></td>    		
    	</tr>
    </table>
  </div>
</div>
