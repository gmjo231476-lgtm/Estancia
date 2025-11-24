<?php
    // Crear las variables del servidor
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "repositorios";

    // Fncion para la conexion a la BD
    $connection = new mysqli($server, $user, $password, $db);

    if($connection -> connect_errno){
        // Conexion fallida
        die("Error en la conexion" . $connection -> connect_errno);
    }