<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar Reunion</title>
    <link rel="stylesheet" href="../../../css/formulario.css">
</head>

<body>
    <?php
    echo"<h1>Borrar Reunion</h1>";
    $r_codigo = $_GET["r_codigo"];
    //echo "".$r_codigo."";
    $sql = "SELECT * FROM reunion where r_codigo=$r_codigo";

    include '../../../config/conexionDB.php';  
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formulario01" method="POST" action="../../controladores/admin/eliminarReunion.php"> 
                <div>
                    <input type="hidden" id="r_codigo" name="r_codigo" value="<?php echo $row["r_codigo"]; ?>" /><!--PILAS-->
                </div>
                <div>
                <label for="r_fecha">Fecha</label>
                <input type="text" id="r_fecha" name="r_fecha" value="<?php echo $row["r_fecha"]; ?>" disabled />
                </div>
                <div>
                <label for="r_hora">Hora</label>
                <input type="r_hora" id="r_hora" name="r_hora" value="<?php echo $row["r_hora"]; ?>" disabled />
                </div>
                <div>
                <label for="r_lugar">Lugar</label>
                <input type="r_lugar" id="r_lugar" name="r_lugar" value="<?php echo $row["r_lugar"]; ?>" disabled />
                </div>
                <div>
                <label for="r_coordenadas">Coordenadas</label>
                <input type="r_coordenadas" id="r_coordenadas" name="r_coordenadas" value="<?php echo $row["r_coordenadas"]; ?>" disabled />
                </div>                
                
                <div>
                <label for="r_motivo">Motivo</label>
                <input type="r_motivo" id="r_motivo" name="r_motivo" value="<?php echo $row["r_motivo"]; ?>" disabled />
                </div>
                <div>
                <label for="r_observacion">Observación</label>
                <input type="r_observacion" id="r_observacion" name="r_observacion" value="<?php echo $row["r_observacion"]; ?>" disabled />
                </div>
                <div>
                <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
                <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
                </div>
            </form>

    <?php
        }
    } else {
        echo "<p>Ha ocurrido un error inesperado !</p>";
        echo "<p>" . mysqli_error($conn) . "</p>";
    }
    $conn->close();
    ?>

</body>

</html>