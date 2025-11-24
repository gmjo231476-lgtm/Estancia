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
                    header('Location: index.php?action=consult_cate');
                }else{
                    header('Location: index.php?action=update_cate');
                }
            }
            include_once "app/views/editar_cate.php";
        }
        
        public function eliminarCate(){
            if(isset($_GET['id']) && is_numeric($_GET['id'])){
                $id_browser = (int) $_GET['id'];

                $delete = $this -> model -> eliminarCate($id_browser);
                // cambiar
                if($delete){
                    header('Location: index.php?action=consult_cate');
                }else{
                    header('Location: index.php?action=delete_cate');
                }
            }
        }

        
}
?>
