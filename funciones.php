<?php

    if (isset($_POST['send'])) {
        require_once 'db/conexion.php';
        require_once 'partials/save.php';

        $date = new DateTime();
        $time = new DateTime();
        $timestring = strval($time->format('H-i-s-'));
        $datestring = $date->format('Y-m-d-');
        

        $data = $_FILES["archivo"]["name"];
        $url = $_FILES["archivo"]["tmp_name"];
        $data_save = "./csv/Data_" .$datestring .$timestring .$data ;
        
        //echo $data . "Ubicado en la ruta: " . $url;
        if (copy($url, $data_save)) {
            echo 'Almacenado correctamente <br>';
        }else{
            echo 'Error';
        }

        if (file_exists($data_save)) {
            $fp = fopen($data_save, "r");
            $rows = 0;

            //recorido de filas con un limite de 1000
            while ($row = fgetcsv($fp, 1000, ";")) {
                //echo $row[0] . " " . $row[1] . " " . $row[2] . " " 
                //. $row[3] . " " .$row[4] . "<br>";
                $rows ++;
                if ($rows > 1) {
                    $result = insert_Data($row[0], $row[1], $row[2], $row[3], $row[4]);

            }
        }
        echo ('Datos Actualizados <br>');   
        if ($result) {
                    echo 'Datos Insertados correctamente';
                }else{
                    echo 'Hubo un error';
                }
                }
    }

?>