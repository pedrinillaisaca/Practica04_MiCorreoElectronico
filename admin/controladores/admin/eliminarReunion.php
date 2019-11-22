<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: ../../../public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registro Reunion_usuario</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php

    $r_codigo = $_POST["r_codigo"];    
    echo"<p>PUTO CODE->".$r_codigo."</p>";
    include '../../../config/conexionDB.php';
    
    //$fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE reunion SET r_eliminada='S' WHERE r_codigo = $r_codigo";
    
    if ($conn->query($sql) === TRUE) {         
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";      
    } else {         
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";         
    } 
    //echo "<a href='../../vista/usuario/index.php'>Regresar</a>"; 
    header("location: ../../vista/admin/borrarReunion.php");//una vez actualizados los datos regresa al index
     

    $conn->close();



    ?>

</body>

</html>