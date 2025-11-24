<?php
require_once "./app/models/LoginModel.php";

class LoginController {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function index() {
        include "app/views/inicio_sesion.php";
    }

    public function validar() {
        $usuario = $_POST["usuario"];
        $pass = $_POST["pass"];

        $model = new LoginModel($this->connection);
        $data = $model->verificarUsuario($usuario);

        if (!$data) {
            echo "Usuario no encontrado";
            exit();
        }

        if (password_verify($pass, $data["pass"])) {

            session_start();
            $_SESSION["usuario"] = $data["usuario"];
            $_SESSION["rol"] = $data["rol"];
            $_SESSION["id"] = $data["id"];

            switch ($data["rol"]) {

                case "alumno":
                    header("Location: index.php?action=pagina_inicio_alum");
                    break;

                case "profesor":
                    header("Location: index.php?action=pagina_prof");
                    break;

                case "administrador":
                    header("Location: index.php?action=pagina_adm");
                    break;
            }
            exit();
            
        } else {
            echo "Contraseña incorrecta";
        }
    }


}
