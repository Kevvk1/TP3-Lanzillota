<?php 

    $nombreArchivo = $_POST["fecha"];

    if(empty($nombreArchivo)){
        throw new Exception("Atención: la fecha no puede estar vacía");
    }

    $pf = fopen('../archivos/'.$nombreArchivo.'.txt', "w");

    $legajos = $_POST['legajo'];

    for ($i = 0; $i < count($legajos); $i++) {

        if (isset($_POST["chk$i"])) {
            fwrite($pf, "$legajos[$i] Presente \n");
        } else {
            fwrite($pf, "$legajos[$i] Ausente \n");
        }
    }

    fclose($pf);

    echo("Archivo creado exitosamente");
?>