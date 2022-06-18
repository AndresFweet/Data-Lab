<?php
    require_once './funciones.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data-Lab</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="container">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <h3>Ingresa un archivo...</h3>
            <input type="file" name="archivo" class="form-control">
            <br>
            <input type="submit" value="Cargar Datos" name="send" class="btn btn-primary">
        </form>
    </div>
</body>

</html>