<?php

    /*if (isset($_POST['send'])) {
        //CONEXION A LA BASE DE DATOS
        require_once 'db/conexion.php';

        //OBTENIENDO NOMBRE DEL ARCHIVOS CSV
        $data = $_FILES["archivo"]["name"];
        $name = substr($data, 0, -4);
        
        //CONSULTA PARA SABER SI EXISTE LA TABLA
        $exists = $exists = mysqli_query($connection, "SHOW TABLES LIKE '".$name."'");
        
        if ($exists->num_rows == 1) {
           
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
                
                $server = 'C:/xampp/htdocs/Data-Lab/csv/';
                $ruta = $server.$name."/"."Data_" .$datestring .$timestring .$data;
                $result = insert_Data($ruta,$name);
        }
        
    } 

    }*/


?>