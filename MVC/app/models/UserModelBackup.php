<?php

    //Crear una clase dek modelo
    class UserModelBackup{
        private $connection;

        //Crear constructor para recibir la conexion
        public function __construct($connection){
            $this -> connection = $connection; //Se puede utizar cualquier palabra
        }
        //metodo para el respaldo de la BD
        public function backup_tables($host,$user,$pass,$name,$tables = '*'){
            $return='';
            $link = new mysqli($host,$user,$pass,$name);
            
            // Se obtienen los nombres de las tablas de datos si se eligen todas
            if($tables == '*')
            {
                $tables = array();
                $result = $link->query('SHOW TABLES');
                // Guardar tablas de la base de datos
                while($row = mysqli_fetch_row($result))
                {
                    $tables[] = $row[0];
                }
            }
            else
            {
                $tables = is_array($tables) ? $tables : explode(',',$tables);
            }
            
            // Obtener los registros de la tabla de datos
            foreach($tables as $table)
            {
                $result = $link->query('SELECT * FROM '.$table);
                $num_fields = mysqli_num_fields($result);

                
                $row2 = mysqli_fetch_row($link->query('SHOW CREATE TABLE '.$table));
                
                $return .= "\n\nDROP TABLE IF EXISTS `$table`;\n";
                
                $return.= "\n\n".$row2[1].";\n\n";
                
                for ($i = 0; $i < $num_fields; $i++)
                {
                    while($row = mysqli_fetch_row($result))
                    {
                        $return.= 'INSERT INTO '.$table.' VALUES(';
                        for($j=0; $j<$num_fields; $j++) 
                        {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = preg_replace("/\n/","\\n",$row[$j]);
                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                        if ($j<($num_fields-1)) { $return.= ','; }
                        }
                        $return.= ");\n";
                    }
                }
                $return.="\n\n\n";
            }

            // Guardar el nombre de la tabla de datos
            $fecha=date("Y-m-d");

            // Abrir el archivo para escribir las consultas. 
            $handle = fopen('config/backups/db-backup-'.$fecha.'.sql','w+');
                fwrite($handle, $return);
                fclose($handle);
        }

        public function restaurarBD($ruta){

            $query_archivo = file_get_contents($ruta);
        
            // Validar que existen multibles querys y ejecutarlos
            if($this -> connection -> multi_query($query_archivo)){
                do{
                    // Almacenar los resultados en una variable
                    if($result = $this -> connection -> store_result()){
                        $result -> free();
                    }

                }while($this -> connection -> more_results() && $this -> connection -> next_result());

                return "Restauracion exitosa :D";

            }else{
                return "Error en la restauración :(";
            }
       }
    }