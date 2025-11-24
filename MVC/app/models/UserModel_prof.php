<?php

    // Crear una clase del modelo
    class UserModel_prof {
        private $connection;

        // Constructor para recibir la conexión
        public function __construct($connection) {
            $this -> connection = $connection;
        }

        // Método para insertar en la base de datos
        public function insertarProfesor($nombre, $apellidoP, $apellidoM, $usuario, $numeroEmpleado, $especialidad, $correo, $pass) {

            $sql_statement = "INSERT INTO Profesor (nombre, apellidoP, apellidoM, usuario, 
            numeroEmpleado, especialidad, correo, pass) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            // Preparar el statement
            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("ssssssss", $nombre, $apellidoP, $apellidoM, $usuario, $numeroEmpleado, $especialidad, $correo, $pass);

            return $statement -> execute();
        }

        //Metodo para consultar los usuarios
        public function consultarProfesor(){

            $sql_statement = "SELECT * FROM profesor";

            //Guardar los datos de la consulta
            $result = $this -> connection -> query($sql_statement);

            return $result;
        }

        public function consultarPorID($id_browser){
            $sql_statement = "SELECT * FROM profesor WHERE idProfesor = ?";

            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i", $id_browser);

            $statement -> execute();

            $result = $statement -> get_result();
            return $result -> fetch_assoc();
        }
        
        //para adm
        public function actualizarProfesor($idProfesor, $nombre, $apellidoP, $apellidoM, $usuario, $especialidad){
            $sql_statement = "UPDATE profesor SET nombre = ?, apellidoP= ?, apellidoM = ?,
             usuario = ?, especialidad = ? WHERE idProfesor = ?";
            
            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("sssssi", $nombre, $apellidoP, $apellidoM, $usuario, $especialidad, $idProfesor);

            return $statement -> execute();
        }
        //para prof
        public function actualizarProf($idProfesor, $nombre, $apellidoP, $apellidoM, $pass){
            $sql_statement = "UPDATE profesor SET nombre = ?, apellidoP= ?, apellidoM = ?,
             pass = ? WHERE idProfesor = ?";
            
            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("ssssi", $nombre, $apellidoP, $apellidoM, $pass, $idProfesor);

            return $statement -> execute();
        }
        

        public function eliminarProfesor($id_browser){
            $sql_statement = "DELETE FROM profesor WHERE idProfesor= ?";

            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i", $id_browser);
            
            return $statement -> execute();
        }
    }