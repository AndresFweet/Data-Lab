<?php

    function create_table($table, $num, $doc, $fp){
        global $connection;

        $sql = "CREATE TABLE $table(id_ text)";
        $result = mysqli_query($connection, $sql);

        for ($i=0; $i <$num ; $i++) { 
            
            $camp = $doc[$i];
            $query = "ALTER TABLE `$table` ADD `$camp` varchar(255)"; 
            $result = mysqli_query($connection, $query);
        }        

        $drop = "ALTER TABLE $table DROP `id_`";
        $r = mysqli_query($connection, $drop);
    }


    function insert_Data($ruta,$table){

        global $connection;

        $sql = "LOAD DATA
        INFILE '$ruta'
        INTO TABLE $table
        FIELDS TERMINATED BY ';'
        
        IGNORE 1 ROWS";

        $r = mysqli_query($connection, $sql);
        //echo $url;
        
    }

?>