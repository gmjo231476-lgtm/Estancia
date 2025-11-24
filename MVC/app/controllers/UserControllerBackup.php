<?php

    // Incluir el modelo y la conexion a la BD
    include_once "app/models/UserModelBackup.php";
    include_once "config/db_connection.php";


    // Clase de controlador
    class UserControllerBackup{
        private $model;

        // Constructor de la clase
        public function __construct($connection){

            $this -> model = new UserModelBackup($connection);

        }

        public function realizarRespaldoBD(){

            $server = "localhost";
            $user = "root";
            $password = "";
            $db = "repositorios";

           $backup = $this -> model -> backup_tables($server, $user, $password, $db);

           echo $backup;

           $fecha = date("Y-m-d");

            //funcion que permite crear y nombrar el archivo
           header("Content-disposition: attachment; filename=db-backup-".$fecha.".sql");

           //permite que el archivo se descargue y no se ejecute
           header("content-type: MIME");

            //leer el archivo del escrip y mandarlo con descarga al navegador
           readfile("config/backups/db-backup-".$fecha.".sql");
        }

        // Metodo para la restauración
        public function restaurarBD(){
            $fecha = date("Y-m-d");

            $ruta = "config/backups/db-backup-" . $fecha .".sql";

            $restore = $this -> model -> restaurarBD($ruta);

            include_once "app/views/registro_alumno.php";
        }
    }