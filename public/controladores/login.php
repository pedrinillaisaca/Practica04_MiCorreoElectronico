
<?php 
    session_start(); 
 
    include '../../config/conexionDB.php'; 
 
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null; 
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null; 
 
    $sql = "SELECT * FROM usuario WHERE u_correo = '$usuario' and u_password = 
    MD5('$contrasena')"; 
 //'$contrasena'"; 
    $result = $conn->query($sql);
    $fila=$result->fetch_assoc();//obteniendo los resultados de la consulta     
    if ($result->num_rows > 0) {         
        $_SESSION['isLogged'] = TRUE;//sesion iniciada 

        if($fila['u_rol']=='U'){//ES UN USUARIO
            $u_codigo=$fila['u_codigo'];
            header("Location: ../../admin/vista/user/index.php?u_codigo=$u_codigo");            
        }else{//ES ADministrador
            header("Location: ../../admin/vista/admin/index.php");
        }
        
       
    } else { //login fallido 
           
        header("Location: ../vista/login.html"); 
        //echo"<p> USUARIO " .$sql. " </p>"; 
    } 
         
    $conn->close(); 
 
?> 

  
  
  