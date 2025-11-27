<?php

    // Incluir el modelo y la conexión a la BD
    include_once  'app/models/UserModel_prof.php';
    include_once  'config/db_connection.php';

// Clase de controlador
    class UserController_prof {

        private $model;

        // Constructor de la clase
        public function __construct($connection) {
            $this -> model = new UserModel_prof($connection);
        }

        // Método para obtener la información del formulario
        public function insertProfesor() {
            if (isset($_POST['enviar'])) {
                $nombre = $_POST['nombre'];
                $apellidoP = $_POST['apellidoP'];
                $apellidoM = $_POST['apellidoM'];
                $usuario = $_POST['usuario'];
                $numeroEmpleado = $_POST['numeroEmpleado'];
                $especialidad = $_POST['especialidad'];
                $correo = $_POST['correo'];
                $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

                // Llamar al método del modelo
                $insert = $this -> model -> insertarProfesor($nombre, $apellidoP, $apellidoM, 
                $usuario, $numeroEmpleado, $especialidad, $correo, $pass);

                if ($insert) {
                    echo "<script>alert('Se ha registrado el profesor correctamente');
                    window.location.href = '/inicio_sesion/MVC/index.php?action=insert_prof';</script>";
                    exit;
                } 
            }
            //Incluir la vista
            include_once "app/views/registro_profesor.php";
        }

        public function consultarProfesor(){
            $profesores = $this -> model -> consultarProfesor();

            include "app/views/consulta_profesor.php";

        }
        //para adm

        public function actualizarProfesor(){
            if(isset($_GET['id']) && is_numeric($_GET['id'])){
                $id_browser = (int) $_GET['id'];
                $row = $this -> model -> consultarPorID($id_browser);
                
                include_once "app/views/editar_profesor.php";
                return;
            }

            if(isset($_POST['editar'])){
                $idProfesor = (int) $_POST['id'];
                $nombre = $_POST['nombre'];
                $apellidoP = $_POST['apellidoP'];
                $apellidoM = $_POST['apellidoM'];
                $usuario = $_POST['usuario'];
                $especialidad = $_POST['especialidad'];

                $update = $this -> model -> actualizarProfesor($idProfesor, $nombre, $apellidoP, $apellidoM,
                $usuario, $especialidad);
                
                if($update){
                    echo "<script>alert('Los datos se registraron correctamente.');
                        window.location.href = '/inicio_sesion/MVC/index.php?action=consult_prof';</script>";
                        exit;
                }else{
                    echo "<script>alert('No se pudo actualizar los datos correctamente.');
                        window.location.href = '/inicio_sesion/MVC/index.php?action=update_prof';</script>";
                        exit;
                }
            }
            include_once "app/views/editar_profesor.php";
        }
        //para prof

        public function actualizarProf(){
            session_start();

            if(!isset($_SESSION['id'])){
                echo "No has inisiado sesión";
                exit();
            }

            $id = $_SESSION["id"];

            if(isset($_GET['id']) && is_numeric($_GET['id'])){
                $id_browser = (int) $_GET['id'];
                $row = $this -> model -> consultarPorID($id_browser);
                if(!$row){
                    echo "Profesor no encontrado";
                    exit();
                }
                include_once "app/views/editar_perfil_prof.php";
                return;
            }

            if(isset($_POST['editar'])){
                $nombre = $_POST['nombre'];
                $apellidoP = $_POST['apellidoP'];
                $apellidoM = $_POST['apellidoM'];
                $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                
                $update = $this -> model -> actualizarProf($id, $nombre, $apellidoP, $apellidoM,
                $pass);
                
                if($update){
                    echo "<script>alert('El perfil se ha actualizado correctamente.');
                        window.location.href = '/inicio_sesion/MVC/index.php?action=perfil_prof';</script>";
                        exit;
                }else{
                    echo "<script>alert('No se puede modificar los datos.');
                        window.location.href = '/inicio_sesion/MVC/index.php?action=editarPerfil_prof';</script>";
                        exit;
                }
            }
            include_once "app/views/editar_perfil_prof.php";
        }


        public function eliminarProfesor(){
            if(isset($_GET['id']) && is_numeric($_GET['id'])){
                $id_browser = (int) $_GET['id'];

                $delete = $this -> model -> eliminarProfesor($id_browser);
                
                if($delete){
                    echo "<script>alert('Eliminación exitosa.');
                        window.location.href = '/inicio_sesion/MVC/index.php?action=consult_prof';</script>";
                        exit;
                }else{
                    echo "<script>alert('No se pudo eliminar al profesor.');
                        window.location.href = '/inicio_sesion/MVC/index.php?action=delete_prof';</script>";
                        exit;
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

            include_once "app/views/consultar_profesor.php";
        }
    }
