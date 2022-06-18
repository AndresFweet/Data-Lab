<?php
    function insert_Data($ID,$TIPO_ID,$NOMBRE,$FECHA,$ATENCION){

        global $connection;

        $sql = "INSERT INTO pacientes (ID,TIPO_ID,NOMBRE,FECHA,ATENCION)   VALUES($ID,'$TIPO_ID','$NOMBRE','$FECHA','$ATENCION')";

        $result = mysqli_query($connection, $sql);
        return $sql;
    }
?>