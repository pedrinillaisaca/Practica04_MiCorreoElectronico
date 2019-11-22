<?php 
    //incluir conexión a la base de datos 
    include '../../../config/conexionDB.php';
 
    $r_codigo = $_GET["r_codigo"];
    $u_codigo= $_GET["u_codigo"];
    //echo "Hola " . $cedula;     
     //INSERT INTO `reunion_usuarios`(`int_usuario_fk`, `int_reunion_fk`) VALUES ([value-2],[value-3])
    
    $sql = "INSERT INTO `reunion_usuarios`(`int_usuario_fk`, `int_reunion_fk`) VALUES ('$u_codigo','$r_codigo')"; 


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
    //header("Location: ../../vista/user/agreInvitados2.php");//redirecciono a la pagina para adicionar a los invitados
   
               
?> 
