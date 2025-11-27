<?php

    //Crear una clase del modelo
    class UserModel{
        private $connection;

        //Crear constructor para recibir la conexion
        public function __construct($connection){
            $this -> connection = $connection; //Se puede utizar cualquier palabra
        }

        // Metodo para insertar en la base de datos
        public function insertarUsuario($nombre, $apellidoP, $apellidoM, $usuario, $correo, $pass, $genero){

            $sql_statement = "INSERT INTO alumno (nombre, apellidoP, apellidoM, usuario,
            correo, pass, genero) VALUES (?,?,?,?,?,?,?)";

            // Preparar el statement. se enlazan los parametros con los valores recibidos
            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("sssssss",$nombre, $apellidoP, $apellidoM, $usuario, $correo, $pass, $genero);
            
            //Se ejecuta la consulta y se devuelve el resultado
            return $statement -> execute();

        }

        //Metodo para consultar los usuarios
        public function consultarUsuarios(){

            $sql_statement = "SELECT * FROM alumno";

            //Guardar los datos de la consulta
            $result = $this -> connection -> query($sql_statement);

            return $result;
        }

        public function consultarPorID($id_browser){
            $sql_statement = "SELECT * FROM alumno WHERE idAlumno = ?";

            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i", $id_browser);

            $statement -> execute();

            $result = $statement -> get_result();
            return $result -> fetch_assoc();
        }

        public function actualizarUsuario($idAlumno, $nombre, $apellidoP, $apellidoM, $usuario, $pass){
            $sql_statement = "UPDATE alumno SET nombre = ?, apellidoP= ?, apellidoM = ?,
             usuario= ?, pass = ? WHERE idAlumno = ?";
            
            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("sssssi", $nombre, $apellidoP, $apellidoM, $usuario, $pass, $idAlumno);

            return $statement -> execute();
        }
        

        public function eliminarUsuario($id_browser){
            $sql_statement = "DELETE FROM alumno WHERE idAlumno = ?";

            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i", $id_browser);
            
            return $statement -> execute();
        }

        public function obtenerPerfil($id_browser){
            $sql_statement = "SELECT * FROM alumno WHERE idAlumno = ?";

            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i",$id_browser);

            $statement -> execute();

            return $statement -> get_result() -> fetch_assoc();
        }

    }