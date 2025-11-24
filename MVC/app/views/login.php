<?php
//codigo de prueba

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "repositorios";

    // Funcion para la conexion a la BD
    $connection = new mysqli($server, $user, $password, $db);

    if ($connection->connect_errno) {
        die("Error en la conexion" . $connection->connect_errno);
    }

    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    // CONSULTA CORRECTA
    $query = mysqli_query($connection, "SELECT * FROM Alumno WHERE usuario = '$usuario'");

    $b_pass = mysqli_fetch_assoc($query);

    // 2. Verificar usuario y contraseña ENCRIPTADA
    if ($b_pass && password_verify($pass, $b_pass["pass"])) {
        header("Location: pagina_inicio_alum.html");
        exit();
    } else {
        echo "No se pudo ingresar";
    }

    ?>
