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
    <title>Crear Nueva Reunion</title> 
    <style type="text/css" rel="stylesheet"> 
        .error{ 
            color: red; 
        } 
    </style> 
</head> 
<body> 
 
    <?php         
        
        include '../../../config/conexionDB.php';                 
 
        $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null; 
        $hora = isset($_POST["hora"]) ? mb_strtoupper(trim($_POST["hora"]), 'UTF-8') : null; 
        $lugar = isset($_POST["lugar"]) ? mb_strtoupper(trim($_POST["lugar"]), 'UTF-8') : null; 
        $coordenadas = isset($_POST["coordenadas"]) ? mb_strtoupper(trim($_POST["coordenadas"]), 'UTF-8') : null; 
        $motivo = isset($_POST["motivo"]) ?  mb_strtoupper(trim($_POST["motivo"]), 'UTF-8') : null;         
        $observacion = isset($_POST["observacion"]) ?  mb_strtoupper(trim($_POST["observacion"]),'UTF-8') : null;        
                
        $sql = "INSERT INTO reunion VALUES (0, 'N', '$fecha', '$hora', '$lugar', '$coordenadas', 
        '$motivo','$observacion')";       
 
        if ($conn->query($sql) === TRUE) { 
            echo "<p>Se ha creado correctamemte!!!</p>";      
        } else { 
            if($conn->errno == 1062){ 
                echo "<p class='error'>error 1062 algun campo esta duplicado </p>";      
            }else{ 
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>"; 
            }             
        } 
         
        //cerrar la base de datos 
        $conn->close(); 
        header("Location: ../../vista/user/crearReunion.php");
       
                   
    ?> 
 
</body> 
</html> 
