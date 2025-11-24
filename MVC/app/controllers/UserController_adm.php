<?php

// Incluir el modelo y la conexión
include_once 'app/models/UserModel_adm.php';
include_once 'config/db_connection.php';

    class UserController_adm{
         private $model;

        // Constructor de la clase
        public function __construct($connection) {
            $this->model = new UserModelAdmin($connection);
        }

        // Método para obtener la información del formulario
        public function insertAdministrador() {
            if (isset($_POST['enviar'])) {
                $nombre      = $_POST['nombre'];
                $apellidoP   = $_POST['apellidoP'];
                $apellidoM   = $_POST['apellidoM'];
                $usuario     = $_POST['usuario'];
                $correo      = $_POST['correo'];
                $pass  = password_hash($_POST['pass'], PASSWORD_BCRYPT);

                // Llamar al método del modelo
                $insert = $this->model->insertarAdministrador($nombre, $apellidoP, 
                $apellidoM, $usuario, $correo, $pass);
            }
            //Incluir la vista
            include_once "app/views/registro_admi.php";
        }

        public function consultarAdministrador(){
            $Administrador = $this -> model -> consultarAdministrador();

            include "app/views/consulta_admin.php";

        }

        public function actualizarAdministrador(){

            if(isset($_GET['id']) && is_numeric($_GET['id'])){

                $id_browser = (int) $_GET['id'];
                $row = $this -> model -> consultarPorID($id_browser);

                include_once "app/views/editar_admin.php";
                return;
            }

            if(isset($_POST['editar'])){
                $idAdministrador = (int) $_POST['id'];
                $nombre = trim($_POST['nombre']);
                $apellidoP = $_POST['apellidoP'];
                $apellidoM = $_POST['apellidoM'];
                $usuario = $_POST['usuario'];
                $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

                $update = $this -> model -> actualizarAdministrador($idAdministrador, $nombre, $apellidoP, $apellidoM,
                $usuario, $pass);

                if($update){
                    header('Location: index.php?action=consult_adm');
                }else{
                    header('Location: index.php?action=update_adm');
                }
            }
            include_once "app/views/editar_admin.php";
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

                include_once "app/views/editar_perfil_adm.php";
                return;
            }

            if(isset($_POST['editar'])){
                $nombre = trim($_POST['nombre']);
                $apellidoP = $_POST['apellidoP'];
                $apellidoM = $_POST['apellidoM'];
                $usuario = $_POST['usuario'];
                $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

                $update = $this -> model -> actualizarAdministrador($id, $nombre, $apellidoP, $apellidoM,
                $usuario, $pass);

                if($update){
                    header('Location: index.php?action=perfil_adm');
                }else{
                    header('Location: index.php?action=editarPerfil_adm');
                }
            }
            include_once "app/views/editar_perfil_adm.php";
        }

        public function eliminarAdministrador(){
            if(isset($_GET['id']) && is_numeric($_GET['id'])){
                $id_browser = (int) $_GET['id'];

                $delete = $this -> model -> eliminarAdministrador($id_browser);
                
                if($delete){
                    header('Location: index.php?action=consult_adm');
                }else{
                    header('Location: index.php?action=delate_adm');
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

            include_once "app/views/consultar_admin.php";
        }
    }


