<?php

    function create_table($table, $num, $doc, $fp){
        global $connection;
        $rows = 0;
        $row = 22;

        $sql = "CREATE TABLE $table(id_ text)";
        $result = mysqli_query($connection, $sql);

        for ($i=0; $i <$num ; $i++) { 
            
            $camp = $doc[$i];
            $query = "ALTER TABLE `$table` ADD `$camp` TEXT"; 
            $result = mysqli_query($connection, $query);
        }        

        $drop = "ALTER TABLE $table DROP `id_`";
        $r = mysqli_query($connection, $drop);

        /*for ($i=0; $i <$num ; $i++) { 
            echo $doc[$i] . '      ';
            

        }

        while ($row = $rows = fgetcsv ($fp, 0, ";")) {
            echo '<br>';
            for ($i=0; $i <5 ; $i++) { 
                print_r($row[$i]);              
            }
        }*/

        

    }


    function insert_Data($ID,$TIPO_ID,$NOMBRE,$FECHA,$ATENCION,$TABLE){

        global $connection;

        $sql = "INSERT INTO $TABLE (`ID`, `TIPO ID`,`NOMBRE`,`FECHA`,`ATENCION`) VALUES('$ID','$TIPO_ID','$NOMBRE','$FECHA','$ATENCION')";

        $result = mysqli_query($connection, $sql);
        return $sql;
    }

?>