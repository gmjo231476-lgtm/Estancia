<?php
include_once 'app/models/UserModel_cate.php';
include_once 'config/db_connection.php';

class UserController_cate {
    private $model;

    public function __construct($connection) {
        $this->model = new UserModel_cate($connection);
    }

    public function insertCategoria() {
        if (isset($_POST['enviar'])) {
            $nombreCategoria = $_POST['nombreCategoria'];
            $descripcion  = $_POST['descripcion'];

            $insert = $this->model->insertarCategoria($nombreCategoria, $descripcion);

            if ($insert) {
                echo "<script>alert('Se ha registrado la categoría correctamente.');
                window.location.href = '/inicio_sesion/MVC/index.php?action=insert_cate';</script>";
                exit;
            } 
        }

        include_once "app/views/registrar_cate.php";
    }

    public function consultarCate(){
            $categoria = $this -> model -> consultarCate();

            include "app/views/consulta_cate.php";

    }

    public function actualizarCate(){
            if(isset($_GET['id']) && is_numeric($_GET['id'])){
                $id_browser = (int) $_GET['id'];

                $row = $this -> model -> consultarPorID($id_browser);

                include_once "app/views/editar_cate.php";
                return;
            }

            if(isset($_POST['editar'])){

                $idCategoria = (int) $_POST['id'];
                $nombreCategoria = trim($_POST['nombreCategoria']);
                $descripcion = $_POST['descripcion'];

                $update = $this -> model -> actualizarCate($idCategoria, $nombreCategoria, $descripcion);

                if($update){
                        echo "<script>alert('Los datos se registraron correctamente.');
                        window.location.href = '/inicio_sesion/MVC/index.php?action=consult_cate';</script>";
                    exit;
                }else{
                    echo "<script>alert('No se pudo actualizar los datos correctamente.');
                        window.location.href = '/inicio_sesion/MVC/index.php?action=update_cate';</script>";
                    exit;
                }

            }
            include_once "app/views/editar_cate.php";
        }
        
        public function eliminarCate(){

            if(isset($_GET['id']) && is_numeric($_GET['id'])){
                $id_browser = (int) $_GET['id'];

                $delete = $this -> model -> eliminarCate($id_browser);
                
                if($delete){
                    echo "<script>alert('Eliminación exitosa.');
                    window.location.href = '/inicio_sesion/MVC/index.php?action=consult_cate';</script>";
                    exit;
                }else{
                    echo "<script>alert('No se pudo eliminar la categoría.');
                    window.location.href = '/inicio_sesion/MVC/index.php?action=delete_cate';</script>";
                    exit;     
                }
            }
        }      
    }

