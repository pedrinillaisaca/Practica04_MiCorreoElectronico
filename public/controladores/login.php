<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <title>Crear Nuevo Usuario</title> 
    <style type="text/css" rel="stylesheet"> 
        .error{ 
            color: red; 
        } 
    </style> 
</head> 
<body> 
 

<?php 
    session_start(); 
 
    include '../../config/conexionDB.php'; 
 
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null; 
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null; 
 
    $sql = "SELECT u_rol FROM usuario WHERE u_correo = '$usuario' and u_password = 
    MD5('$contrasena')"; 
 //'$contrasena'"; 
    $result = $conn->query($sql);        
    if ($result->num_rows > 0) { 
        
        $_SESSION['isLogged'] = TRUE; 
        ///PENDIENTE
        //echo"<p> resulado ".$result->__toString()."     puta      </p>";
        if($result=='U'){//ES UN USUARIO 
            //header("Location: ../../admin/vista/user/index.php");
            
        }else{//ES ADministrador
            //header("Location: ../../admin/vista/admin/index.php");
            header("Location: ../../admin/vista/user/index.php");//ojo aqui
        }
        
       
    } else { 
           
        header("Location: ../vista/login.html"); 
        //echo"<p> USUARIO " .$sql. " </p>"; 
    } 
         
    $conn->close(); 
 
?> 

    
</body> 
</html> 
  
  
  