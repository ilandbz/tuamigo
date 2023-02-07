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
        <img src="<?= base_url() ?>activos/images/emprender.jpg" alt="Logotipo">
        BAUCHER DE <?= $registro['tiporegistro'] ?>
            <p>NOMBRE : <?= $personal['apenom'] ?></p>
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CONCEPTO</th>
                    <th class="producto">IMPORTE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="producto"><?= $registro['tiporegistro'].' '.$registro['descripcion'] ?></td>
                    <td class="precio">S/.<?= number_format($registro['cantidad'], 2) ?></td>
                </tr>
                <tr>
                    <th class="cantidad">Fecha <br>Hora</th>
                    <td class="producto"><?= $registro['fechareg'] ?></td>
                </tr>
            </tbody>
            <tr>
                <td colspan="2" align="center" style="padding:20px"><br>
        ___________________________
        Firma
        <br></td>
            </tr>
        </table>

    </div>
    <button class="oculto-impresion" onclick="imprimir()">Imprimir</button>
</body>
</html>