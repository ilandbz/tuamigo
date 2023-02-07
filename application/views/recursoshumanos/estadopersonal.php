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
        .division {
            padding: 4px;
        }
        img{
            width: 180px;
        }
        </style>
</head>

<body>
    <div class="ticket">

        <div class="centrado">
            <img src="<?= base_url() ?>activos/images/emprender.jpg" alt="Logotipo">
            <p>BAUCHER MOVIMIENTOS</p>        
            <p>EMPLEADO : <?= $personal['apenom'] ?></p>
        </div>
        <table>
            <tbody>
            <?php foreach ($operaciones as $row) { ?>
                <tr>
                    <th colspan="2"><?= $row['tiporegistro'] ?></th>
                </tr>
                <tr>
                    <td colspan="2"><?= $row['descripcion'] ?></td>
                </tr>                
                <tr>
                    <td class="producto"><?= $row['fechareg'] ?></td>
                    <td class="precio">S/.<?= number_format($row['cantidad'], 2) ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="division"></td>
                </tr>
            <?php } ?>
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