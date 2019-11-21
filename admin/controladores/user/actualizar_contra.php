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
    <title>Registro Reunion_usuario</title> 
    <style type="text/css" rel="stylesheet"> 
        .error{ 
            color: red; 
        } 
    </style> 
</head> 
<body> 
 
    <?php
        
        $codigo=$_GET["u_codigo"];
        //echo"<p>puto code ".$codigo."</p>";
        include '../../../config/conexionDB.php';                 
        $contrasena = isset($_POST["new_contra"]) ? trim($_POST["new_contra"]) : null;
                    
        $sql = "UPDATE usuario " .
        //"SET usu_cedula = '$cedula', " .
        "SET u_password = MD5('$contrasena') " .
        "WHERE u_codigo = $codigo";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    echo "<p>Usuario Modificado</p>";
    echo "<a href='../../vista/user/index.php'>Regresar</a>";


         
        //cerrar la base de datos 
        $conn->close(); 
        //header("Location: ../../vista/user/crearReunion.php");
       
                   
    ?> 
 
</body> 
</html> 