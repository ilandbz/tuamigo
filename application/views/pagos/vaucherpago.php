|<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />

    <script type="text/javascript" src="<?php echo base_url() ?>activos/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>activos/js/qrcode.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>activos/css/estilovaucher.css">


    <script type="text/javascript">
        function imprimir() {
            window.print();
        }
    </script>
        <style>
        *{
            margin: 0;
        }
        .block {
            margin: 15px auto;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        .block input[type="text"] {
            width: 100%;
            font-size: 0.6em;
            padding: 10px;
        }
        #qrcode {
            margin: 0 auto;
        }
        </style>
</head>

<body>
    <div class="ticket">
        
        <p class="centrado">TICKET DE PAGO
        <img src="<?= base_url() ?>activos/images/emprender.jpg" alt="Logotipo" width="180px">
            <?php if($this->session->userdata('agencia')=='HUANUCO'){ ?>
               <br> Jr. Tarapaca 335 Fono: 062-286809
            <?php }else{ ?>
                <br>Jr. Tito Jaime 697 Fono: 062-797215</p>
            <?php } ?>
            <p>NOMBRE : <?= $kardex['apenom'] ?></p>
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CONCEPTO</th>
                    <th class="producto">IMPORTE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="producto">PAGO DE CREDITO</td>
                    <td class="precio">S/.<?= number_format($kardex['montopagado'], 2) ?></td>
                </tr>
                <tr>
<?php
                $kardex['fecha_hora_reg'] = strtotime ($kardex['fecha_hora_reg'] );
                $kardex['fecha_hora_reg'] = date ( 'd-m-Y h:i:s' , $kardex['fecha_hora_reg'] );
                $solicitud['fechacuotadebe'] = strtotime ($solicitud['fechacuotadebe'] );
                $solicitud['fechacuotadebe'] = date ( 'd-m-Y' , $solicitud['fechacuotadebe'] );                
 ?>

                    <td class="cantidad">Fecha y Hora</td>
                    <td class="producto"><?= $kardex['fecha_hora_reg'] ?></td>
                </tr>
                <tr>
                    <td class="cantidad">Cuota</td>
                    <td class="producto"><?= $ultimacuotapagado['nrocuota'].' de '.$solicitud['plazo'] ?></td>
                </tr>
                <?php if(!is_null($registrohoypagomora)){ ?>
                <tr>
                    <td class="cantidad">Mora</td>
                    <td class="producto">S/.<?= number_format($registrohoypagomora['total'],2) ?></td>
                </tr> 
                <?php } ?>
                <tr>
                    <td class="cantidad">Usuario</td>
                    <td class="producto"><?= $kardex['idusuario'] ?></td>
                </tr>                
                <tr>
                    <td class="cantidad">Vencimiento de la siguiente cuota</td>
                    <td class="producto"><?= $solicitud['fechacuotadebe'] ?></td>
                </tr>
            </tbody>
        </table>
<!--         <p class="centrado">        <div class="block">
            <div id="qrcode" style="width:100px; height:100px; margin-top:15px;"></div>
        </div></p> -->
    </div>
        <script type="text/javascript">
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 100,
            height : 100
        });
        function makeCode () {
            qrcode.makeCode("http://localhost/tuamigo/index.php/pagos/vaucher/We009316/1");
        }
        makeCode();
        </script>
    <button class="oculto-impresion" onclick="imprimir()">Imprimir</button>
</body>
</html>