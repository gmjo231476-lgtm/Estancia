<?php

class LoginModel {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function verificarUsuario($usuario) {

        //Buscar en la tabla Alumno ---
        $sql = "SELECT idAlumno AS id, usuario, pass, 'alumno' AS rol FROM Alumno WHERE usuario = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("s", $usuario);
        $statement->execute();
        $res = $statement->get_result()->fetch_assoc();

        if ($res) return $res;

        // Buscar en la tabla Profesor
        $sql = "SELECT idProfesor AS id, usuario, pass, 'profesor' AS rol FROM Profesor WHERE usuario = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("s", $usuario);
        $statement->execute();
        $res = $statement->get_result()->fetch_assoc();

        if ($res) return $res;

        // Buscar en la tabla Administrador 
        $sql = "SELECT idAdministrador AS id, usuario, pass, 'administrador' AS rol FROM Administrador WHERE usuario = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("s", $usuario);
        $statement->execute();
        $res = $statement->get_result()->fetch_assoc();

        if ($res) return $res;

        // Si no está en ninguna tabla:
        return null;
    }
}

