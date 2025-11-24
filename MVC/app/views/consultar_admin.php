<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <h1>PERFIL ADMNISTRADOR</h1>
    <form >
        <b><label for="nombre">Nombre:</label></b>
        <input type="text" name="nombre" value="<?php echo $row ['nombre']; ?>" readonly>
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

        <b><label for="pass">Contraseña: </label></b>
        <input type="password" name="pass" value="<?php echo $row ['pass']; ?>" readonly>
        <br><br>

        <a href="index.php?action=editarPerfil_adm&id=<?php echo $row['idAdministrador']; ?>">
            <button type="button" class="btn active" data-bs-toggle="button" aria-pressed="true">Editar</button>
        </a>
    </form>
</body>
</html>