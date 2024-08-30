<!DOCTYPE html>
<html>

<head>
    <title>Asistencias de alumnos</title>
    <meta charset="utf-8">
</head>

<body>
    <form method="post" action="./php/GeneraArchivo.php" id="formulario">
        <fieldset>
            <legend><h1 style="color: #16325B">Sistema de Asistencia</h1></legend>
            <h2 style="color: #16325B">Listado de Alumnos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Numero de Legajo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Asistencia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $archivoListadoAlumnos = "./archivos/Alumnos.txt";
                        if (!file_exists($archivoListadoAlumnos))
                            throw new Exception("Error al abrir el archivo $RutaNombre.");
                        $pf = fopen($archivoListadoAlumnos, "r");
                        $i = 0;

                        while (!feof($pf)) {
                            $linea = fgets($pf);
                            $linea = trim($linea);
                            echo "";
                            $separada = explode(",", $linea);
                            if (!empty($linea)) {
                                echo "<tr> 
                                        <td name='legajo' style='text-align: center;'>$separada[0]</td> 
                                        <td>$separada[1]</td> <td>$separada[2]</td> 
                                        <td>
                                            <input type='hidden' name='legajo[]' value='$separada[0]'/>
                                            <input type='checkbox' name='chk$i' value=1 />
                                        </td>
                                    </tr>";
                            }
                            $i++;
                        }
                        fclose($pf)
                    ?>
                </tbody>
            </table>
            <br>
            <label for="fecha">Fecha de registro</label>
            <input type="date" name="fecha" id="fecha">
            <br>
            <br>
            <br>
            <input type="submit" value="Enviar">
            <input type="reset" value="Cancelar">
        </fieldset>
    </form>
</body>


<style>

    table, th, td, thead {
        border: 1px solid black;
        border-collapse: collapse;
        background-color: #D1E9F6;
    }
    table{
        width: 100%;
    }

    #formulario{
        text-align: center;
    }

    body{
        background-color: #78B7D0;
    }

</style>

</html>