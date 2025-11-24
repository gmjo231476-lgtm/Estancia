<?php
include_once 'app/models/UserModel_mate.php';
include_once 'config/db_connection.php';

class UserController_mate {
    private $model;

    public function __construct($connection) {
        $this->model = new UserModel_mate($connection);
    }

    // Insertar Material
    public function insertMaterial() {

        $categorias = $this->model->obtenerCategorias();
        
        if (isset($_POST['enviar'])) {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $fechaPublicacion = $_POST['fechaPublicacion'];
            $materia = $_POST['materia'];
            $cuatrimestre = $_POST['cuatrimestre'];
            $tipo = $_POST['tipo'];
            $estado = $_POST['estado'];
            $idCategoria = $_POST['idCategoria'];

            // Validar archivo
            if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == UPLOAD_ERR_OK) {
                $nombreArchivo = basename($_FILES['archivo']['name']);
                $rutaDestino = "uploads/" . $nombreArchivo;
                $rutaCompleta = __DIR__ . "/../../" . $rutaDestino;

                // Mover archivo a la carpeta uploads
                if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaCompleta)) {
                    // Insertar registro con la ruta
                    $insert = $this->model->insertarMaterial(
                        $titulo,
                        $descripcion,
                        $fechaPublicacion,
                        $materia,
                        $cuatrimestre,
                        $tipo,
                        $rutaDestino,
                        $estado,
                        $idCategoria
                    );

                    if ($insert) {
                        header('Location: index.php?action=insert_mate');
                        exit;
                    } else {
                        echo "Error al guardar el material en la base de datos.";
                    }
                } else {
                    echo "Error al mover el archivo subido.";
                }
            } else {
                echo "Error al subir el archivo.";
            }
        }

        include_once "app/views/registrar_material.php";
    }

    // Consultar materiales
    public function consultarMate() {
        $materiales = $this->model->consultarMate();
        include "app/views/consulta_mate.php";
    }

    public function consultarMate_alum() {
        $materiales = $this->model->consultarMate_alum();
        include "app/views/ver_material_aprobado.php";
    }

    // Actualizar material
    public function actualizarMate() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id_browser = (int) $_GET['id'];
            $row = $this->model->consultarPorID($id_browser);
            include_once "app/views/editar_mate.php";
            return;
        }

        if (isset($_POST['editar'])) {
            $idMaterial = (int) $_POST['idMaterial'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $fechaPublicacion = $_POST['fechaPublicacion'];
            $materia = $_POST['materia'];
            $cuatrimestre = $_POST['cuatrimestre'];
            $tipo = $_POST['tipo'];
            $estado = $_POST['estado'];
            $idCategoria = $_POST['idCategoria'];

            $rowActual = $this->model->consultarPorID($idMaterial);
            $archivo = $rowActual['archivo'];

            // Si subieron un nuevo archivo
            if (!empty($_FILES['archivo']['name'])) {
                $nombreArchivo = basename($_FILES['archivo']['name']);
                $rutaDestino = "uploads/" . $nombreArchivo;
                $rutaCompleta = __DIR__ . "/../../" . $rutaDestino;

                if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaCompleta)) {
                    $archivo = $rutaDestino;
                }
            }

            $update = $this->model->actualizarMate(
                $idMaterial,
                $titulo,
                $descripcion,
                $fechaPublicacion,
                $materia,
                $cuatrimestre,
                $tipo,
                $archivo,
                $estado,
                $idCategoria
            );

            if ($update) {
                header('Location: index.php?action=consult_mate');
                exit;
            } else {
                header('Location: index.php?action=update_mate');
                exit;
            }
        }

        include_once "app/views/editar_mate.php";
    }

    public function actualizarMaterialAlum() {

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $idMaterial = (int) $_GET['id'];
        $row = $this->model->consultarPorID($idMaterial);
        include "app/views/editar_mate_alum.php";
        return;
    }

    if (isset($_POST['editar_simple'])) {

        $idMaterial = $_POST['idMaterial'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $materia = $_POST['materia'];
        $cuatrimestre = $_POST['cuatrimestre'];
        $tipo = $_POST['tipo'];

        // Obtener archivo actual
        $rowActual = $this->model->consultarPorID($idMaterial);
        $archivo = $rowActual['archivo'];

        // Si suben archivo nuevo
        if (!empty($_FILES['archivo']['name'])) {
            $nombreArchivo = basename($_FILES['archivo']['name']);
            $rutaDestino = "uploads/" . $nombreArchivo;
            $rutaCompleta = __DIR__ . "/../../" . $rutaDestino;

            if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaCompleta)) {
                $archivo = $rutaDestino;
            }
        }

        $update = $this->model->actualizarMaterialAlum($idMaterial, $titulo, $descripcion, $materia, $cuatrimestre, $tipo, $archivo);

        if ($update) {
            header('Location: index.php?action=consult_mate_alum');
            exit;
        }
    }
}


    // Eliminar material
    public function eliminarMate() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id_browser = (int) $_GET['id'];
            $delete = $this->model->eliminarMate($id_browser);

            if ($delete) {
                header('Location: index.php?action=consult_mate');
                exit;
            } else {
                header('Location: index.php?action=delete_mate');
                exit;
            }
        }
    }

    // APROBAR MATERIAL
    public function aprobar() {
        if (isset($_GET['id'])) {
            $this->model->aprobarMaterial($_GET['id']);
        }
        header("Location: index.php?action=consult_mate");
        exit;
    }

    // RECHAZAR MATERIAL
    public function rechazar() {
        if (isset($_GET['id'])) {
            $this->model->rechazarMaterial($_GET['id']);
        }
        header("Location: index.php?action=consult_mate");
        exit;
    }

    public function verMaterialAprobado() {
    $materiales = $this->model->obtenerMaterialAprobado();
    include __DIR__ . '/../views/ver_material_aprobado.php';
    }

    public function calificarMaterial() {
            if (isset($_GET['id'])) {
                $idMaterial = $_GET['id'];
            }

            if (isset($_POST['enviar'])) {
                $puntuacion = $_POST['puntuacion'];
                $comentario = $_POST['comentario'];
                $idMaterial = $_POST['idMaterial'];
                $idAlumno = $_POST['idAlumno']; // Cambia por la sesión real

                $this->model->insertarCalificacion($puntuacion, $comentario, $idMaterial, $idAlumno);

                header("Location: index.php?action=consult_mate");
                exit;
            }

            include "app/views/calificar_mate.php";
        }


    public function filtrarMaterial() {

        // Obtener opciones del formulario (tus métodos)
        $materias     = $this->model->obtenerMaterias();
        $cuatrimestres = $this->model->obtenerCuatrimestres();
        $tipos        = $this->model->obtenerTipos();

        $where = "";

        if (!empty($_POST['materia'])) {

        $i = 0;
        $count = count($_POST['materia']);
        $selected = "";

        while ($i < $count) {
            $selected = $selected . "'" . $_POST['materia'][$i] . "'";
            if ($i < $count - 1) {
                $selected = $selected . ", ";
            }
            $i++;
        }

        $where = " WHERE materia IN (" . $selected . ")";
    }

    // -------------------- FILTRO CUATRIMESTRE (multi-select) --------------------
    if (!empty($_POST['cuatrimestre'])) {

        $i = 0;
        $count = count($_POST['cuatrimestre']);
        $selected = "";

        while ($i < $count) {
            $selected = $selected . "'" . $_POST['cuatrimestre'][$i] . "'";
            if ($i < $count - 1) {
                $selected = $selected . ", ";
            }
            $i++;
        }

        if ($where == "") {
            $where = " WHERE cuatrimestre IN (" . $selected . ")";
        } else {
            $where .= " AND cuatrimestre IN (" . $selected . ")";
        }
    }

    // -------------------- FILTRO TIPO (multi-select) --------------------
    if (!empty($_POST['tipo'])) {

        $i = 0;
        $count = count($_POST['tipo']);
        $selected = "";

        while ($i < $count) {
            $selected = $selected . "'" . $_POST['tipo'][$i] . "'";
            if ($i < $count - 1) {
                $selected = $selected . ", ";
            }
            $i++;
        }

        if ($where == "") {
            $where = " WHERE tipo IN (" . $selected . ")";
        } else {
            $where .= " AND tipo IN (" . $selected . ")";
        }
    }

    // Realizar consulta filtrada
    $materiales = $this->model->filtrarMateriales($where);

    // Mostrar vista
    include "app/views/filtrar_material.php";
}


}

