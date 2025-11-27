<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/style_registro.css?v=<?php echo time(); ?>">
    <title>Editar</title>
</head>
<body>
    <div class="wrapper">
    <form action="index.php?action=editarPerfil" method="POST">
        <h1>EDITAR PERFIL <?php echo $row['nombre']; ?></h1> 
        <input type="hidden" name="id" value="<?php echo $row['idAlumno']; ?>">
        
        <div class="input-box">
            <b><label for="nombre">Nombre</label></b>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
            <br><br>
        </div>
        <div class="input-box">
            <b><label for="apellidoP">Apellido Parterno</label></b>
            <input type="text" name="apellidoP" value="<?php echo $row['apellidoP']; ?>">
            <br><br>
        </div>
        <div class="input-box">
            <b><label for="apellidoM">Apellido Materno</label></b>
            <input type="text" name="apellidoM" value="<?php echo $row['apellidoM']; ?>">
            <br><br>
        </div>

        <div class="input-box">
            <b><label for="usuario">Nombre de Usuario</label></b>
            <input type="text" name="usuario" value="<?php echo $row['usuario']; ?>">
            <br><br>
        </div>

        <div class="input-box">
            <b><label for="pass">Contraseña</label></b>
            <input type="password" name="pass" value="<?php echo $row['pass']; ?>">
            <br><br>
        </div>

        <button type="submit" name="editar"  class="btn active" data-bs-toggle="button" aria-pressed="true">Editar</button>
        <br><br>
        <a class="nav-link" href="/inicio_sesion/MVC/app/views/pagina_inicio_alum.php">
            <button type="button" class="btn btn-light">Regresar</button>
        </a>
    </form>
</div>
</body>
</html>