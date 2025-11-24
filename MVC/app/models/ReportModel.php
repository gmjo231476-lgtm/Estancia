<?php

    class ReportModel{
        private $connection;
    
        public function __construct($connection) { 
            $this-> connection = $connection;
        }

        // metodo para consultar los usuarios 
        public function consultarUsuarios(){

            $sql_statement = "SELECT idAlumno, nombre, apellidoP, apellidoM, genero FROM alumno";

            $result = $this -> connection -> query($sql_statement);

            return $result;
        }
        
        public function consultarGenero(){
        
            $sql_statement = "SELECT genero, COUNT(*) AS total FROM alumno GROUP BY genero";
            $result = $this -> connection -> query($sql_statement);

            $data = [];

            while($row = $result -> fetch_assoc()){
                $data[] = [$row['genero'], (int)$row['total']];
            }

            return $data;
        }

        public function top3Materiales() {
            $sql_statement = "SELECT m.titulo AS nombreMaterial, c.puntuacion AS puntaje FROM Material m INNER JOIN 
            Calificacion c ON m.idMaterial = c.idMaterial ORDER BY c.puntuacion DESC LIMIT 3";

            $result = $this->connection->query($sql_statement);

            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        public function obtenerCategorias() {
            $sql_statement = "SELECT idCategoria, nombreCategoria FROM Categoria";
            return $this->connection->query($sql_statement);
        }

        public function contarCategorias() {
            $sql_statement = "SELECT COUNT(*) AS total FROM Categoria";
            $result = $this->connection->query($sql_statement);
            $row = $result->fetch_assoc();
            return $row['total'];
        }


    }