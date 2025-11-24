<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/style_registro.css?v=<?php echo time(); ?>">
    <title>Perfil</title>
</head>
<body>
    <div class="wrapper">
    <form >
        <h1>Usuario</h1>
        <b><label for="nombre">Nombre:</label></b>
        <input type="text" name="nombre" value="<?php echo $row ['nombre']; ?> " readonly>
        <br><br>

        <b><label for="apellidoP">Apellido Paterno:</label></b>
        <input type="text" name="apellidoP" value="<?php echo $row ['apellidoP']; ?>" readonly>
        <br><br>

        <b><label for="apellidoM">Apellido Materno:</label></b>
        <input type="text" name="apellidoM" value="<?php echo $row ['apellidoM']; ?>" readonly>
        <br><br>

        <b><label for="usuario">Usuario:</label></b>
        <input type="text" name="usuario" value="<?php echo $row ['usuario']; ?>" readonly>
        <br><br>

        <b><label for="pass">Nombre: </label></b>
        <input type="password" name="pass" value="<?php echo $row ['pass']; ?>"readonly >
        <br><br>

        <a href="index.php?action=editarPerfil&id=<?php echo $row['idAlumno']; ?>">
            <button type="button" class="btn active" data-bs-toggle="button" aria-pressed="true">Editar</button>
        </a>
        <br><br>
        <a href="javascript:history.back()"> 
            <button class="btn active" data-bs-toggle="button" aria-pressed="true">Regresar</button>
        </a>
    </form>
</div>
</body>
</html>