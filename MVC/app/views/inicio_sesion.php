<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesión</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <div class="wrapper">
        <form action="/inicio_sesion/MVC/index.php?action=login_validar" method="POST">
            <h1>Iniciar sesión</h1>

            <div class="input-box">
                <input type="text" name="usuario" placeholder="Usuario" required>
            </div>

            <div class="input-box">
                <input type="password" name="pass" placeholder="Contraseña" required>
            </div>

            <button type="submit" class="btn">Iniciar sesión</button>

            <div class="register-link">
                <p>¿No tienes una cuenta? <a href="/inicio_sesion/MVC/">Registrarse</a></p>
            </div>
        </form>
    </div>
</body>
</html>
