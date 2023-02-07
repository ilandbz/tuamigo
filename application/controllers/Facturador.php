<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Facturador extends CI_Controller{
    private static $UNIDADES = [
        '',
        'UN ',
        'DOS ',
        'TRES ',
        'CUATRO ',
        'CINCO ',
        'SEIS ',
        'SIETE ',
        'OCHO ',
        'NUEVE ',
        'DIEZ ',
        'ONCE ',
        'DOCE ',
        'TRECE ',
        'CATORCE ',
        'QUINCE ',
        'DIECISEIS ',
        'DIECISIETE ',
        'DIECIOCHO ',
        'DIECINUEVE ',
        'VEINTE '
    ];

    private static $DECENAS = [
        'VENTI',
        'TREINTA ',
        'CUARENTA ',
        'CINCUENTA ',
        'SESENTA ',
        'SETENTA ',
        'OCHENTA ',
        'NOVENTA ',
        'CIEN '
    ];

    private static $CENTENAS = [
        'CIENTO ',
        'DOSCIENTOS ',
        'TRESCIENTOS ',
        'CUATROCIENTOS ',
        'QUINIENTOS ',
        'SEISCIENTOS ',
        'SETECIENTOS ',
        'OCHOCIENTOS ',
        'NOVECIENTOS '
    ];
	public function __construct(){
		parent::__construct();
		$this->load->model('operaciones_model');
		$this->load->model('Facturador_model');
	}
	function retornarheader($tipouser){
		switch($tipouser){
			case 1: 
				$data['header']='principal/headeradmin';
				$data['fechalogros']=$this->operaciones_model->ultimafechalogros($this->session->userdata('agencia'));
				break;
			case 2:
				$data['header']='principal/header';
				break;
			case 3://operaciones
				$this->load->model('caja_model');
				$data['saldo']=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
				$data['header']='principal/headeroperaciones';
				break;
			case 4://cobranza
				$this->load->model('caja_model');
				$data['saldo']=$this->caja_model->obtenersaldoagencia($this->session->userdata('agencia'));
				$data['header']='principal/headercobranza';
				break;
			case 5:
				$data['header']='principal/headeradmin';
				$data['fechalogros']=$this->operaciones_model->ultimafechalogros($this->session->userdata('agencia'));
				break;				
			case 6:
				$this->load->model('caja_model');
				$data['saldo']=$this->caja_model->obtenersaldo();
				$data['header']='principal/headeroperaciones';
				break;	
			case 7:
				$data['header']='principal/headergestorcobranza';
				break;			
		}
		return $data;
	}
	function index(){
		$this->load->view('facturador/contenedor');
	}
	function vercomprobante($idsolicitud, $monto){
		// $solicitud = $this->operaciones_model->vistasolicitdesembolsadosidsol2($idsolicitud);
		// $data['codsolicitud']=$idsolicitud;
		// $data['serie']='B001';
		// $data['nro']=$this->Facturador_model->obtenernroboleta('B001')+1;
		// $data['dni']=$solicitud['dni'];
		// $data['apenom']=$solicitud['apenom'];
		// $data['direccion']=$solicitud['direccion_dom'];
		// $data['fechaemision'] = date('Y-m-d');
		// $data['importe']=$monto;
		// $this->load->view('facturador/comprobante', $data);		
	}
	function vercomprobanteidcomprobante($idcomprobante){
		$data['comprobante'] = $this->Facturador_model->obtenercomprobante($idcomprobante);
		$data['detcomprobantes'] = $this->Facturador_model->obtenerdetcomprobante($idcomprobante);
		$this->load->view('facturador/comprobante', $data);		
	}	
	function formregistrosaemitir(){
		$estado = $this->input->post('estadosolic');
		$fechainipagos = $this->input->post('fechainipagos');		
		$fechafinpagos = $this->input->post('fechafinpagos');
		$asesor = $this->input->post('asesor');
		$agencia = $this->input->post('agenciabsc');	
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$idcomprobante=$this->Facturador_model->maxcodigo()+1;
		$vistareporte = $this->operaciones_model->reportefinancieroentrefechasparacomprobantes($fechainipagos, $fechafinpagos, $estado, $asesor, $agencia);
		$i=0;
		$filaanterior=$vistareporte[$i];
		$i++;
		while($i<=count($vistareporte)){
			if($i==count($vistareporte)){
				break;
			}
			$importe=0;
			$filaactual=$vistareporte[$i];
			if($filaactual['interespagado']>0){
				if($filaanterior['agencia']=='HUANUCO'){
					$serie='B001';
				}else{
					$serie='B002';
				}
				$data = array(
							'id' 	=> $idcomprobante,
							'serie' => $serie,
							'fechaemision' => date('Y-m-d H:i:s'),
							'fechavencimiento'	=> date('Y-m-d H:i:s'),
							'codcliente'	=> $filaanterior['dni'],
							'apenom'		=> $filaanterior['apenom'],
							'direccion'		=> $filaanterior['direccion'],
							'importe'		=> 0,
							'estado'		=> 'REGISTRADO'
							);
				$this->Facturador_model->registrarcomprobante($data);
				$datadetcomprobante = array(
					'idcomprobante' => $idcomprobante,
					'idsolicitud'	=> $filaanterior['idsolicitud'],
					'descripcion'	=> 'PAGO POR INTERES DE LA SOLICITUD '.$filaanterior['idsolicitud'],
					'importe'		=> $filaanterior['interespagado']
					);
				$this->Facturador_model->registrardetcomprobante($datadetcomprobante);
				$importe+=$filaanterior['interespagado'];
				while($filaactual['dni']==$filaanterior['dni']){
					if($filaactual['interespagado']>0){
						$datadetcomprobante = array(
							'idcomprobante' => $idcomprobante,
							'idsolicitud'	=> $filaactual['idsolicitud'],
							'descripcion'	=> 'PAGO POR INTERES DE LA SOLICITUD '.$filaactual['idsolicitud'],
							'importe'		=> $filaactual['interespagado']
							);
						$this->Facturador_model->registrardetcomprobante($datadetcomprobante);
						$importe+=$filaactual['interespagado'];
					}
					$i++;
					if($i==count($vistareporte)){
						break;
					}
					$filaactual=$vistareporte[$i];	
				}
				$datacomp = array('importe' => $importe);
				$this->Facturador_model->actualizarcomprobante($idcomprobante, $datacomp);
				$filaanterior=$filaactual;
				$idcomprobante++;

			}
			$i++;
		}
		redirect(base_url()."index.php/facturador/listacomprobantes/".date('Y-m-d'));
	}
	function listacomprobantes($fecha){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['vistareporte'] = $this->Facturador_model->listacomprobantes($fecha);
		$data['fecha']=$fecha;
		$data['footer']='principal/footer';
		$data['content']='facturador/registrostabla';
		$this->load->view('index',$data);		
	}
	function eliminarcomprobante($idcomprobante){
		$registro=$this->Facturador_model->obtenercomprobante($idcomprobante);
		$resultado = $this->Facturador_model->eliminarcomprobante($idcomprobante);
		$fecha = date('Y-m-d',strtotime($registro['fechaemision']));
		if($resultado==true){
			redirect(base_url()."index.php/facturador/listacomprobantes/".$fecha);
		}else{
			echo 'NO SE PUDO ELIMINAR CONSULTE A SU SOPORTE';
		}
	}
	function generarnrocomprobante($fecha){
		$registros = $this->Facturador_model->listacomprobantes($fecha);
		$nrob001 = $this->Facturador_model->obtenernroboleta('B001')+1;	
		$nrob002 = $this->Facturador_model->obtenernroboleta('B002')+1;			
		foreach ($registros as $row) {
			if($row['serie']=='B001'){
				$nro=$nrob001;
				$nrob001++;
			}else{
				$nro=$nrob002;
				$nrob002++;
			}
			$data = array(
						'nro'			=> $nro,
						'estado'		=> 'EMITIDO'
						);
			$this->Facturador_model->actualizarcomprobante($row['id'], $data);
		}
		redirect(base_url()."index.php/facturador/listacomprobantes/".$fecha);
	}
	function verdetcomprobante($idcomprobante){
		$data['detcomprobantes'] = $this->Facturador_model->obtenerdetcomprobante($idcomprobante);
		$this->load->view('facturador/tabladetcomprobantes',$data);	
	}
	function generartxtfacturadorboleta($id){
		$comprobante = $this->Facturador_model->obtenercomprobante($id);
		$txt= fopen('./activos/facturador/20602734341-03-'.$comprobante['serie'].'-'.$comprobante['nro'].'.cab', 'a') or die ('Problemas al crear el archivo');
		#  Se establecen los datos que va a conterner el archivo
		$p1='0101';
		$p2=substr($comprobante['fechaemision'], 0, 10);
		$p3=substr($comprobante['fechaemision'], 11,8);
		$p4=$comprobante['fechavencimiento'];
		$p5='0000';
		$p6='1';
		$p7=$comprobante['codcliente'];
		$p8=$comprobante['apenom'];
		$p9='PEN';
		$p10=0;
		$p11=$comprobante['importe'];
		$p12=$comprobante['importe'];
		$p13=0;
		$p14=0;
		$p15=0;
		$p16=$comprobante['importe'];
		$p17='2.1';
		$p18='2.0';
		fwrite($txt, $p1.'|'.$p2.'|'.$p3.'|'.$p4.'|'.$p5.'|'.$p6.'|'.$p7.'|'.$p8.'|'.$p9.'|'.$p10.'|'.$p11.'|'.$p12.'|'.$p13.'|'.$p14.'|'.$p15.'|'.$p16.'|'.$p17.'|'.$p18);
		fclose($txt);
		$data = array('estado' => 'GENERADO');
		$this->Facturador_model->actualizarcomprobante($id, $data);
		$this->generartxtdetcomprobante($id, $comprobante['serie'], $comprobante['nro']);
		$this->generartxttributos($comprobante['importe'], $comprobante['serie'], $comprobante['nro']);
		$archivo= fopen('./activos/facturador/20602734341-03-'.$comprobante['serie'].'-'.$comprobante['nro'].'.ley', 'a') or die ('Problemas al crear el archivo');
		$whole = floor($comprobante['importe']);
		$fraction = $comprobante['importe'] - $whole;
		$importeletras= $this->convertir($whole);
		$texto='1000|'.trim($importeletras).' CON '.(number_format($fraction,2)*100).'/100 NUEVOS SOLES|';
		fwrite($archivo, $texto);
		fclose($archivo);
		redirect(base_url()."index.php/facturador/listacomprobantes/".substr($comprobante['fechaemision'], 0, 10));	
	}
	function generartxtdetcomprobante($idcomprobante, $serie, $nro){
		$registros = $this->Facturador_model->obtenerdetcomprobante($idcomprobante);
		$archivo= fopen('./activos/facturador/20602734341-03-'.$serie.'-'.$nro.'.det', 'a') or die ('Problemas al crear el archivo');
		foreach ($registros as $row) {
			$det1='NIU';
			$det2=1;
			$det3=$row['idsolicitud'];;
			$det4='-';
			$det5=$row['descripcion'];
			$det6=$row['importe'];
			$det7=0;
			$det8=1000;
			$det9=0;
			$det10=$row['importe'];
			$det11='IGV';
			$det12='VAT';
			$det13='10';
			$det14=18;
			$det15='-';
			$det16='-';
			$det17='-';
			$det18='-';
			$det19='-';
			$det20='-';
			$det21='-';
			$det22='-';
			$det23='-';
			$det24='-';
			$det25='-';
			$det26='-';
			$det27='-';
			$det28='-';
			$det29='-';
			$det30='-';
			$det31='-';
			$det32='-';
			$det33='-';
			$det34=$row['importe'];
			$det35=$row['importe'];
			$det35='-';
			$texto=$det1.'|'.$det2.'|'.$det3.'|'.$det4.'|'.$det5.'|'.$det6.'|'.$det7.'|'.$det8.'|'.$det9.'|'.$det10.'|'.$det11.'|'.$det12.'|'.$det13.'|'.$det14.'|'.$det15.'|'.$det16.'|'.$det17.'|'.$det18.'|'.$det19.'|'.$det20.'|'.$det21.'|'.$det22.'|'.$det23.'|'.$det24.'|'.$det25.'|'.$det26.'|'.$det27.'|'.$det28.'|'.$det29.'|'.$det30.'|'.$det31.'|'.$det32.'|'.$det33.'|'.$det34.'|'.$det35.'|'.$det35.'|';
			fwrite($archivo, $texto);
			fwrite ($archivo, "\n");
		}
		fclose($archivo);		
	}
	function generartxttributos($importe, $serie, $nro){
		$archivo= fopen('./activos/facturador/20602734341-03-'.$serie.'-'.$nro.'.tri', 'a') or die ('Problemas al crear el archivo');
		$tri1='1000';
		$tri2='IGV';
		$tri3='VAT';
		$tri4=$importe;
		$tri5=0.00;
		$texto=$tri1.'|'.$tri2.'|'.$tri3.'|'.$tri4.'|'.$tri5;
		fwrite($archivo, $texto);
		fclose($archivo);				
	}
	function prueba(){
		$whole = floor(26.70);
		$fraction = 26.70 - $whole;
		$importeletras=$this->convertir($whole);
		$texto='1000|'.$importeletras.'CON '.(number_format($fraction,2)*100).'/100 NUEVOS SOLES|';
		echo $texto;
		// $n = 24.96;
		// $whole = floor($n);
		// $fraction = $n - $whole;
		// echo $this->convertir($whole).' CON '.(number_format($fraction,2)*100).'/100 NUEVOS SOLES';
	}
    public function convertir($number, $moneda = '', $centimos = '', $forzarCentimos = false){
        $converted = '';
        $decimales = '';
        if (($number < 0) || ($number > 999999999)) {
            return 'No es posible convertir el numero a letras';
        }
        $div_decimales = explode('.',$number);
        if(count($div_decimales) > 1){
            $number = $div_decimales[0];
            $decNumberStr = (string) $div_decimales[1];
            if(strlen($decNumberStr) == 2){
                $decNumberStrFill = str_pad($decNumberStr, 9, '0', STR_PAD_LEFT);
                $decCientos = substr($decNumberStrFill, 6);
                $decimales = self::convertGroup($decCientos);
            }
        }
        else if (count($div_decimales) == 1 && $forzarCentimos){
            $decimales = 'CERO ';
        }
        $numberStr = (string) $number;
        $numberStrFill = str_pad($numberStr, 9, '0', STR_PAD_LEFT);
        $millones = substr($numberStrFill, 0, 3);
        $miles = substr($numberStrFill, 3, 3);
        $cientos = substr($numberStrFill, 6);
        if (intval($millones) > 0) {
            if ($millones == '001') {
                $converted .= 'UN MILLON ';
            } else if (intval($millones) > 0) {
                $converted .= sprintf('%sMILLONES ', self::convertGroup($millones));
            }
        }
        if (intval($miles) > 0) {
            if ($miles == '001') {
                $converted .= 'MIL ';
            } else if (intval($miles) > 0) {
                $converted .= sprintf('%sMIL ', self::convertGroup($miles));
            }
        }
        if (intval($cientos) > 0) {
            if ($cientos == '001') {
                $converted .= 'UN ';
            } else if (intval($cientos) > 0) {
                $converted .= sprintf('%s ', self::convertGroup($cientos));
            }
        }
        if(empty($decimales)){
            $valor_convertido = $converted . strtoupper($moneda);
        } else {
            $valor_convertido = $converted . strtoupper($moneda) . ' CON ' . $decimales . ' ' . strtoupper($centimos);
        }
        return $valor_convertido;
    }
    private function convertGroup($n){
        $output = '';
        if ($n == '100') {
            $output = "CIEN ";
        } else if ($n[0] !== '0') {
            $output = self::$CENTENAS[$n[0] - 1];
        }
        $k = intval(substr($n,1));
        if ($k <= 20) {
            $output .= self::$UNIDADES[$k];
        } else {
            if(($k > 30) && ($n[2] !== '0')) {
                $output .= sprintf('%sY %s', self::$DECENAS[intval($n[1]) - 2], self::$UNIDADES[intval($n[2])]);
            } else {
                $output .= sprintf('%s%s', self::$DECENAS[intval($n[1]) - 2], self::$UNIDADES[intval($n[2])]);
            }
        }
        return $output;
    }
    function formreport(){
		$data=$this->retornarheader($this->session->userdata('tipouser'));
		$data['footer']='principal/footer';
		$data['content']='facturador/formreport';
		$this->load->view('index',$data);
    }
}

/* End of file cliente.php */
/* Location: ./application/controllers/cliente.php */