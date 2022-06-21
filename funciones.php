<?php

    if (isset($_POST['send'])) {
        //CONEXION A LA BASE DE DATOS
        require_once 'db/conexion.php';

        //OBTENIENDO NOMBRE DEL ARCHIVOS CSV
        $data = $_FILES["archivo"]["name"];
        $name = substr($data, 0, -4);
        
        //CONSULTA PARA SABER SI EXISTE LA TABLA
        $sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'data-lab' AND TABLE_NAME = '$data'";
        $result = mysqli_query($connection, $sql);

        //COMPROBANDO EJECUCCION DE LA CONSULTA
        if (!$result) {
        echo 'No se pudo ejecutar la consulta: ' . mysql_error();
        }

        //RECORRIENDO LOS RESULTADOS ENCONTRADOS
        $json = array();
           while ($row = mysqli_fetch_array($result)) {
           $json[] = array(
           'TABLA' => $row['TABLE_NAME']);            
        }

        //CANTIDAD DE RESULTADOS
        $cant = count($json);
        if ($cant > 0) {
            //ACTUALIZANDOS LOS DATOS
            require_once 'partials/update.php';
        }else{
            require_once 'partials/save.php';
            $date = new DateTime();
            $time = new DateTime();
            $timestring = strval($time->format('H-i-s-'));
            $datestring = $date->format('Y-m-d-');

            $data = $_FILES["archivo"]["name"];
            $url = $_FILES["archivo"]["tmp_name"];
            $path = "csv/".$name;
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $data_save = "./csv/".$name."/"."Data_" .$datestring .$timestring .$data ;

            if (copy($url, $data_save)) {
            echo 'Almacenado correctamente <br>';
            }else{
            echo 'Error';
            }

            if (file_exists($data_save)) {
                $fp = fopen($data_save, "r");
                $doc = fgetcsv ($fp, 0, ";");
                $num = count($doc);
                $rows = 0;
                
                $result = create_table($name, $num, $doc, $fp);


                while ($row = fgetcsv($fp, 0, ";")) {
                //echo $row[0] . " " . $row[1] . " " . $row[2] . " " 
                //. $row[3] . " " .$row[4] . "<br>";
                $rows ++;
                if ($rows > 1) {
                    $result = insert_Data($row[0], $row[1], $row[2], $row[3], $row[4], $name);

            }
        }
                 
                //echo $doc[0];
            }

        }
        

    }


?>