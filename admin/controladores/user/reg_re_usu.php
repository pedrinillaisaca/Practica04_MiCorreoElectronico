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
        
        $condigo_usuario=$_GET["u_codigo"];
        $condigo_reunion=$_GET["r_codigo"];
        echo "<p> ".$condigo_usuario." ".$condigo_reunion. "</p>";      
        include '../../../config/conexionDB.php';                 
 
        
                
        $sql = "INSERT INTO reunion_usuarios VALUES (0, '$condigo_usuario', '$condigo_reunion'";       
 
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
        //header("Location: ../../vista/user/crearReunion.php");
       
                   
    ?> 
 
</body> 
</html> 