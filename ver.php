<?php
$valores = ['nombre' => '','apellido'=> '','cedula' =>'','comportamiento'=> ''];

if(isset($_GET['ced'])){
    $ced = $_GET['ced'];
    $path = "datos/{$ced}.json";

    if(is_file($path)){
        $valores = json_decode(file_get_contents($path),1);
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buena vista</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
    <h1 class="whiteletter"> Vista de usuario : <?php echo $valores['nombre'];?></h1>
    <h2  class="whiteletter">Cedula: <?php echo $valores['cedula'];?> </h2><p>  </p>
    <h2 class="whiteletter">Nombre: <?php echo $valores['nombre'];?> </h2><p>  </p>
    <h2 class="whiteletter">Apellido: <?php echo $valores['apellido'];?> </h2><p>  </p>
    <h2 class="whiteletter">Comportamiento: <?php echo $valores['comportamiento'];?> </h2>

    <a href="index.php" class="btn btn-success">Volver</a>
</div>
</body>
</html>
