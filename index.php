<?php

include('componentes.php');

$valores = ['nombre' => '','apellido'=> '','cedula' =>'','comportamiento'=> ''];

if($_POST){

    if(!is_dir('datos')){
        mkdir('datos');
    }

    $cedula = $_POST['cedula'];

    $json = json_encode($_POST);
    file_put_contents("datos/{$cedula}.json",$json );

} else {
    if(isset($_GET['editar'])){
        $ced = $_GET['editar'];
        $path = "datos/{$ced}.json";

        if(is_file($path)){
            $valores = json_decode(file_get_contents($path),1);
        }
    }

     if(isset($_GET['eliminar'])){
        $ced = $_GET['eliminar'];
        $path = "datos/{$ced}.json";

        if(is_file($path)){
            unlink($path);
        }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <title>Tarea 1</title>
</head>
<body>

    <div class="container ">
        <h3 class="whiteletter">Datos personales</h3>
    <form action="" method ="post" class="margen-top-50">

        <?php
        input('cedula','Cedula',$valores['cedula']);
        input('nombre','Nombre',$valores['nombre']);
        input('apellido','Apellido',$valores['apellido']);
        input('comportamiento','Comportamiento',$valores['comportamiento'],'textarea');
        ?>
        
        <div class="margen-left">
            <button type="submit" class="btn btn-success" >Guardar</button>
            <a type="submit" class="btn btn-primary" href="index.php">Nuevo</a>
        </div>

    </form>
        <br><br><br>



        <table class="table table-dark">
            <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>

            <?php
            if(is_dir('datos')){
                $files = scandir('datos');
                foreach($files as $file){
                    $path = "datos/{$file}";
                    $mensaje= '"seguro?"';
                    if(is_file($path)){
                        $info = json_decode(file_get_contents($path),1);
                        echo "<tr><td> {$info['cedula']}</td>
                                    <td> {$info['nombre']}</td>
                                    <td> {$info['apellido']}</td>
                                    <td> <a href='index.php?editar={$info['cedula']}' class='btn btn-warning'> Editar </a>
                                        <a href='ver.php?ced={$info['cedula']}' target='_blank' class='btn btn-info'> Ver </a>
                                        <a href='index.php?eliminar={$info['cedula']}'  class='btn btn-danger' onclick='return confirm({$mensaje});'> Eliminar </a>
                                    </td>
</tr>";
                    }
                }
            }
            ?>

            </tbody>

        </table>



   </div>



</body>
</html>