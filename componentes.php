<?php


function input($nombre,$label,$valor="",$tipo="input"){
    $control = "<input type='text' name='{$nombre}' id='{$nombre}' class='form-control' value='{$valor}'>";



    if($tipo=='textarea'){
        $control= "<textarea type='text' class='form-control' id='{$nombre}' name='{$nombre}'> {$valor} </textarea>";
    }

    echo "     <div class='form-group row'>
        <label for='{$nombre}' class='col-md-2 col-form-label whiteletter text-right'>{$label} :</label>
            <div class='col-sm-5'>
                {$control}
            </div>
        </div>";
}