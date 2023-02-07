<!DOCTYPE html>
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
            margin: auto;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        .block input[type="text"] {
            width: 100%;
            font-size: 0.9em;
            padding: 10px;
        }
        #qrcode {
            margin: 0 auto;
        }
        </style>
</head>
<body>
    <div class="ticket"><br>
        <img src="<?= base_url() ?>activos/images/emprender.jpg" alt="Logotipo">
        <p class="centrado">
            TU AMIGO EMPRENDEDOR 3E S.A.C.
            <br>
            RUC: 20602734341
            <br>
            BOLETA DE VENTA ELECTRONICA<br>
            <?php echo $comprobante['serie'].'-'.$comprobante['nro']; ?>

                        <?php if($this->session->userdata('agencia')=='HUANUCO'){ ?>
                           <br> Jr. Tarapaca 335 Fono: 062-286809
                        <?php }else{ ?>
                            <br>Jr. Tito Jaime 697 Fono: 062-797215</p>
                        <?php } ?>
            <br>
            </P>
            <br>
            <p class="cabecera">
            ADQUIRIENTE: </p>
            <p class="cabecera">DNI: <?= $comprobante['codcliente'] ?></p>
            <p class="cabecera"><?= $comprobante['apenom'] ?></p>
            <p class="cabecera">Dir. <?= $comprobante['direccion']  ?></p>
            <p class="cabecera">FEC. EMISION : <?= $comprobante['fechaemision'] ?></p>
            <p class="cabecera">FEC. VENC. : <?= $comprobante['fechavencimiento'] ?></p>
            <p class="cabecera">MONEDA : SOLES</p>
            <p class="cabecera">IGV : 18%</p>
        <table>
            <tbody>
                <tr>
                    <th class="cantidad" colspan="2">DESCRIPCION</th>
                </tr>          
            <?php $suma=0; foreach($detcomprobantes as $row){ ?>
 
                <tr><td colspan="2"><?= $row['descripcion'] ?></td></tr>
                <tr>
                    <td class="cantidad">MONTO</td>
                    <td class="producto">S/.<?= number_format($row['importe'],2); $suma+=$row['importe']; ?></td>
                </tr>
            <?php } ?>
                <tr>
                    <td class="cantidad">EXONERADA</td>
                    <td class="producto">S/.<?= number_format($suma,2) ?></td>
                </tr>
                <tr>
                    <td class="cantidad">GRAVADA</td>
                    <td class="producto">S/.<?= 0.00 ?></td>
                </tr>
                <tr>
                    <td class="cantidad">IGV</td>
                    <td class="producto">S/.<?= 0.00 ?></td>
                </tr>                                  
                <tr>
                    <td class="cantidad">TOTAL</td>
                    <td class="producto">S/.<?= number_format($suma,2) ?></td>
                </tr>
            </tbody>
        </table>
         <p class="centrado">        <div class="block">
            <div id="qrcode" style="width:110px; height:110px; margin-top:15px;"></div>
        </div></p>
    </div>
    
        <script type="text/javascript">
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 100,
            height : 100
        });
        function makeCode () {
            qrcode.makeCode('esto es una prueba');
        }
        makeCode();
        </script>
    <button class="oculto-impresion" onclick="imprimir()">Imprimir</button>
</body>
</html>