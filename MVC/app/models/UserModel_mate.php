<?php
class UserModel_mate {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function obtenerMaterias() {
        $sql = "SELECT DISTINCT materia FROM material ORDER BY materia ASC";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function obtenerCuatrimestres() {
        $sql = "SELECT DISTINCT cuatrimestre FROM material ORDER BY cuatrimestre ASC";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function obtenerTipos() {
        $sql = "SELECT DISTINCT tipo FROM material ORDER BY tipo ASC";
        $result = $this->connection->query($sql);
        return $result;
    }

    // Insertar Material
    public function insertarMaterial($titulo, $descripcion, $fechaPublicacion, $materia, $cuatrimestre, $tipo, $archivo, $estado, $idCategoria) {
        $sql = "INSERT INTO material 
                (titulo, descripcion, fechaPublicacion, materia, cuatrimestre, tipo, archivo, estado, idCategoria) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $statement = $this->connection->prepare($sql);
        $statement->bind_param("ssssssssi", 
            $titulo, $descripcion, $fechaPublicacion, $materia,
            $cuatrimestre, $tipo, $archivo, $estado, $idCategoria
        );

        return $statement->execute();
    }

    public function obtenerCategorias() {
        $sql = "SELECT idCategoria, nombreCategoria FROM categoria";
        $result = $this->connection->query($sql);

        $categorias = [];
        while ($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }
        return $categorias;
    }


    // Consultar todos los materiales
    public function consultarMate() {
        $sql = "SELECT * FROM material";
        $result = $this->connection->query($sql);
        return $result;
    }

    // Consultar un material por ID
    public function consultarPorID($id_browser) {
        $sql = "SELECT * FROM material WHERE idMaterial = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("i", $id_browser);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_assoc();
    }

    public function consultarMate_alum() {
        $sql = "SELECT idMaterial, titulo, descripcion, materia, cuatrimestre, tipo, archivo FROM material";
        return $this->connection->query($sql);
    }


    // Actualizar material
    public function actualizarMate($idMaterial, $titulo, $descripcion, $fechaPublicacion, $materia,
                                   $cuatrimestre, $tipo, $archivo, $estado, $idCategoria) {
        $sql = "UPDATE material SET titulo=?, descripcion=?, fechaPublicacion=?, materia=?, cuatrimestre=?, 
                    tipo=?, archivo=?, estado=?, idCategoria=? WHERE idMaterial=?";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("ssssssssii",$titulo,$descripcion,$fechaPublicacion,$materia,
            $cuatrimestre,$tipo,$archivo,$estado,$idCategoria,$idMaterial);
        return $statement->execute();
    }

    public function actualizarMaterialAlum($idMaterial, $titulo, $descripcion, $materia,$cuatrimestre, $tipo, $archivo) {
        $sql = "UPDATE material SET titulo=?, descripcion=?, materia=?, cuatrimestre=?, tipo=?, archivo=? WHERE idMaterial=?";
                
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("ssssssi", $titulo, $descripcion, $materia, $cuatrimestre, $tipo, $archivo, $idMaterial);
        return $statement->execute();
    }

    // Eliminar material
    public function eliminarMate($id_browser) {

        $sql = "DELETE FROM material WHERE idMaterial = ?";

        $statement = $this->connection->prepare($sql);

        $statement->bind_param("i", $id_browser);

        return $statement->execute();
    }

    public function aprobarMaterial($idMaterial) {
        $sql = "UPDATE material SET estado = 'aprobado' WHERE idMaterial = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("i", $idMaterial);
        return $statement->execute();
    }

    // RECHAZAR
    public function rechazarMaterial($idMaterial) {
        $sql = "UPDATE material SET estado = 'rechazado' WHERE idMaterial = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("i", $idMaterial);
        return $statement->execute();
    }

    public function obtenerMaterialAprobado() {
        $sql = "SELECT * FROM material WHERE estado = 'aprobado'";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function insertarCalificacion($puntuacion, $comentario, $idMaterial, $idAlumno) {
        $sql = "INSERT INTO calificacion (puntuacion, comentario, idMaterial, idAlumno)
                VALUES (?, ?, ?, ?)";

        $statement = $this->connection->prepare($sql);
        $statement->bind_param("isii", $puntuacion, $comentario, $idMaterial, $idAlumno);

        return $statement->execute();
    }
    
    public function filtrarMateriales($where) {
        $sql = "SELECT * FROM material " . $where;
        $result = $this->connection->query($sql);
        return $result;
    }

    

}




