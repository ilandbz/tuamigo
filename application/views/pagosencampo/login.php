<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>FINANCIERA EMPRENDER</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>activos/images/logo.ico">
    <link rel="stylesheet" href="<?php echo base_url() ?>activos/css/bootstrap-switch.min.css">  
    <link rel="stylesheet" href="<?php echo base_url() ?>activos/bootstrap3/css/bootstrap.min.css">
    <style type="text/css">
        .login-form { 
          background: url(<?php echo base_url() ?>activos/images/fv.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        .panel-default {
            opacity: 0.9;
            margin-top:30px;
        }
        a:link
        {
        text-decoration:none;
        }
    </style>
</head>
<body class="login-form">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-lock"></span> Login </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo base_url()  ?>index.php/Pagosencampo/autenticar_user" method="POST">
                        <div class="form-group">
                            <label for="usuario" class="col-sm-3 control-label">Usuario</label>
                            <div class="col-xs-12">
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="clave" class="col-sm-3 control-label">Password</label>
                            <div class="col-xs-12">
                                <input type="password" class="form-control" id="clave" name="clave" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dispositivo" class="col-sm-3 control-label">Dispositivo</label>
                            <div class="col-xs-12">
                                <input type="text" class="form-control" id="dispositivo" name="dispositivo" placeholder="Password" value="<?= $_SERVER["REMOTE_ADDR"] ?>" required>
                            </div>
                        </div>                        
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success btn-sm">Iniciar</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            <div class="panel-footer">
                Si tiene problemas comunicar a soporte
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url() ?>activos/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>activos/bootstrap3/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('input[name=usuario]').change(function(){
            var codusuario = $(this).val();
            $.get("<?php echo base_url() ?>index.php/inicio/obteneragencia/"+codusuario,function(data){
                $("select[name=agencia]").val(data);
            });
        });
    </script>
</body>
</html>
