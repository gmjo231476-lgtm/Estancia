<?php
class UserModel_cate {
    private $connection;

    // Constructor
    public function __construct($connection) {
        $this->connection = $connection;
    }

    // Insertar categoría
    public function insertarCategoria($nombreCategoria, $descripcion) {
        $sql = "INSERT INTO categoria (nombreCategoria, descripcion) VALUES (?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("ss", $nombreCategoria, $descripcion);
        
        return $statement->execute();
    }

    public function consultarCate(){

            $sql_statement = "SELECT * FROM categoria";

            //Guardar los datos de la consulta
            $result = $this -> connection -> query($sql_statement);

            return $result;
    }
    public function consultarPorID($id_browser){
            $sql_statement = "SELECT * FROM categoria WHERE idCategoria = ?";

            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i", $id_browser);

            $statement -> execute();

            $result = $statement -> get_result();
            return $result -> fetch_assoc();
    }
    
    public function actualizarCate($idCategoria, $nombreCategoria, $descripcion){
            $sql_statement = "UPDATE categoria SET nombreCategoria = ?, descripcion= ? 
            WHERE idCategoria = ?";
            
            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("ssi", $nombreCategoria, $descripcion, $idCategoria);

            return $statement -> execute();
    }
        

    public function eliminarCate($id_browser){
        $sql_statement = "DELETE FROM categoria WHERE idCategoria = ?";

        $statement = $this -> connection -> prepare($sql_statement);
        $statement -> bind_param("i", $id_browser);
            
        return $statement -> execute();
    }
}


