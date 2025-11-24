<?php

// Crear una clase del modelo
class UserModelAdmin {
    private $connection;

    // Constructor para recibir la conexión
    public function __construct($connection) {
        $this -> connection = $connection;
    }

    // Método para insertar en la base de datos
    public function insertarAdministrador($nombre, $apellidoP, $apellidoM, $usuario, $correo, $pass) {

        $sql_statement = "INSERT INTO Administrador (nombre, apellidoP, apellidoM, usuario, correo, pass)
                          VALUES (?, ?, ?, ?, ?, ?)";

        // Preparar el statement
        $statement = $this->connection->prepare($sql_statement);
        $statement->bind_param("ssssss", $nombre, $apellidoP, $apellidoM, $usuario, $correo, $pass);

        return $statement->execute();
    }

    //Metodo para consultar los usuarios
        public function consultarAdministrador(){

            $sql_statement = "SELECT * FROM administrador";

            //Guardar los datos de la consulta
            $result = $this -> connection -> query($sql_statement);

            return $result;
        }

        public function consultarPorID($id_browser){
            $sql_statement = "SELECT * FROM administrador WHERE idAdministrador = ?";

            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i", $id_browser);

            $statement -> execute();

            $result = $statement -> get_result();
            return $result -> fetch_assoc();
        }
        
        public function actualizarAdministrador($idAdministrador, $nombre, $apellidoP, $apellidoM, $usuario, $pass){
            $sql_statement = "UPDATE administrador SET nombre = ?, apellidoP= ?, apellidoM = ?,
             usuario = ?, pass = ? WHERE idAdministrador= ?";
            
            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("sssssi", $nombre, $apellidoP, $apellidoM, $usuario, $pass, $idAdministrador);

            return $statement -> execute();
        }
        

        public function eliminarAdministrador($id_browser){
            $sql_statement = "DELETE FROM administrador WHERE idAdministrador = ?";

            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i", $id_browser);
            
            return $statement -> execute();
        }

        public function obtenerPerfil($id_browser){
            $sql_statement = "SELECT * FROM administrador WHERE idAdministrador = ?";

            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i",$id_browser);

            $statement -> execute();

            return $statement -> get_result() -> fetch_assoc();
        }
    }

