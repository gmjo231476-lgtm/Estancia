<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Alumno</title>
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/style_registro.css?v=<?php echo time();  ?>">
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>REGISTRO DE ALUMNO</h1>

            <div class="input-box">
                <input type="text" name="nombre" placeholder="Nombre" required>
            </div>

            <div class="input-box">
                <input type="text" name="apellidoP" placeholder="Apellido Paterno" required>
            </div>

            <div class="input-box">
                <input type="text" name="apellidoM" placeholder="Apellido Materno" required>
            </div>

            <div class="input-box">
                <input type="text" name="usuario" placeholder="Usuario" required>
            </div>

            <div class="input-box">
                <input type="email" name="correo" placeholder="Correo Electrónico" required>
            </div>

            <div class="input-box">
                <input type="password" name="pass" placeholder="pass" required>
            </div>

            <div class="input-box">
                <select name="genero" required>
                    <option value="" disabled selected>Seleccione su género</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <br><br>
            <button type="submit" name="enviar" envule="Enviar" class="btn">REGISTRAR</button>
        </form>
            <?php if(isset($restore)){ ?>

                <?php echo $restore; ?>

                <script>
                    setTimeout(function (){
                        window.location.href = "index.php?controller=user&action=insert";
                    }, 3000);
                </script>
            <?php } ?>
            <br>
        <center><a href="javascript:history.back()"><button class="btn btn-secondary">Regresar</button></a></center>
    </div>

</body>
</html>
