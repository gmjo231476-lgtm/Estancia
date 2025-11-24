<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Profesor</title>
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/style_registro.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>REGISTRO DE PROFESOR</h1>

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
                <input type="text" name="numeroEmpleado" placeholder="Número de Empleado" required>
            </div>

            <div class="input-box">
                <input type="text" name="especialidad" placeholder="Especialidad">
            </div>

            <div class="input-box">
                <input type="email" name="correo" placeholder="Correo Electrónico" required>
            </div>

            <div class="input-box">
                <input type="password" name="pass" placeholder="pass" required>
            </div>

            <button type="submit" name="enviar" envule="Enviar" class="btn">REGISTRAR</button>

        </form>
        <br>
        <center><a href="javascript:history.back()"><button class="btn btn-secondary">Regresar</button></a></center>
    </div>

</body>
</html>
