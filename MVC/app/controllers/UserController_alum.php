<?php

    // Incluir el modelo y la conexion a la BD
    include_once "app/models/UserModel_alum.php";
    include_once "config/db_connection.php";


    // Clase de controlador
    class UserController{

        private $model;

        // Constructor de la clase
        public function __construct($connection){

            $this -> model = new UserModel($connection);

        }

        // Metodo para obtener la infornacion del formulario
        public function insertUsuario(){
            if(isset($_POST['enviar'])){
                $nombre = $_POST['nombre'];
                $apellidoP = $_POST['apellidoP'];
                $apellidoM = $_POST['apellidoM'];
                $usuario = $_POST['usuario'];
                $correo = $_POST['correo'];
                $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                $genero = $_POST['genero'];

                // Llamar al metodo del modelo
                $insert = $this -> model -> insertarUsuario($nombre, $apellidoP, $apellidoM, $usuario
                , $correo, $pass, $genero);
            }
            //Incluir la vista
            include_once "app/views/registro_alumno.php";
        }

        public function consultarUsuarios(){
            $usuarios = $this -> model -> consultarUsuarios();

            include "app/views/consulta_alumno.php";

        }

        public function actualizarUsuario(){
            if(isset($_GET['id']) && is_numeric($_GET['id'])){
                $id_browser = (int) $_GET['id'];
                $row = $this -> model -> consultarPorID($id_browser);
                include_once "app/views/editar_alumno.php";
                return;
            }

            if(isset($_POST['editar'])){
                $idAlumno = (int) $_POST['id'];
                $nombre = trim($_POST['nombre']);
                $apellidoP = $_POST['apellidoP'];
                $apellidoM = $_POST['apellidoM'];
                $usuario = $_POST['usuario'];
                $pass = $_POST['pass'];

                $update = $this -> model -> actualizarUsuario($idAlumno, $nombre, $apellidoP, $apellidoM,
                $usuario, $pass);

                if($update){
                    header('Location: index.php?action=consult');
                }else{
                    header('Location: index.php?action=update');
                }
            }
            include_once "app/views/editar_alumno.php";
        }

        public function actualizarPerfil(){
            session_start();

            if(!isset($_SESSION['id'])){
                echo "No has inisiado sesión";
                exit();
            }

            $id = $_SESSION["id"];

            if(isset($_GET['id']) && is_numeric($_GET['id'])){
                $id_browser = (int) $_GET['id'];
                $row = $this -> model -> consultarPorID($id_browser);
                include_once "app/views/editar_perfilA.php";
                return;
            }

            if(isset($_POST['editar'])){
                $nombre = trim($_POST['nombre']);
                $apellidoP = $_POST['apellidoP'];
                $apellidoM = $_POST['apellidoM'];
                $usuario = $_POST['usuario'];
                $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

                $update = $this -> model -> actualizarUsuario($id, $nombre, $apellidoP,
                $apellidoM, $usuario, $pass);

                if($update){
                    header('Location: index.php?action=perfil');
                }else{
                    header('Location: index.php?action=editarPerfil');
                }
            }
            include_once "app/views/editar_perfilA.php";
        }

        public function eliminarUsuario(){
            if(isset($_GET['id']) && is_numeric($_GET['id'])){
                $id_browser = (int) $_GET['id'];

                $delete = $this -> model -> eliminarUsuario($id_browser);
                
                if($delete){
                    header('Location: index.php?action=consult');
                }else{
                    header('Location: index.php?action=delate');
                }
            }
        }

        public function perfilUsuario(){
            session_start();
            // Se puede quitar este if solo es para validar si inicio sesion
            if(!isset($_SESSION['id'])){
                echo "No has inisiado sesión";
                exit();
            }

            $id = $_SESSION["id"]; // optendra la id del usuario

            $row = $this -> model -> consultarPorID($id);

            include_once "app/views/consultar_alumno.php";
        }

    }