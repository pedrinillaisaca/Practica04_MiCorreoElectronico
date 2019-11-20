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
    <title>Usuario</title>
    <link rel="stylesheet" href="../../../css/formulario.css"> 
</head> 
<body> 
 <h1>Seleciona los invitados</h1>


 <h2><a href="crearReunion.php">Regresar</a></h2>
 <table style="width:100%" class="tabla"> 
        <tr> 
            
            <th>Nombre</th>  
            <th>Apellido</th> 
            <th>Correo</th> 
            <th>Invitar</th> <!--FALTA-->             
                         
        </tr> 
        <?php
            //AQUI ESTOY ENVIANDO AL UUSARIO 
            $codigo_reunion=$_GET["r_codigo"];
            include '../../../config/conexionDB.php';  
           
           
            $sql = "SELECT * FROM usuario WHERE u_rol='U'"; 
            $result = $conn->query($sql); 
             
            if ($result->num_rows > 0) { 
                 
                while($row = $result->fetch_assoc()) { 
                    echo "<tr>"; 
                    echo "   <td>" . $row["u_nombre"] . "</td>"; 
                    echo "   <td>" . $row['u_apellido'] ."</td>"; 
                    echo "   <td>" . $row['u_correo'] . "</td>";                     
                    echo "   <td> <a href='../../controladores/user/reg_re_usu.php?u_codigo=".$row['u_codigo']."&r_codigo=".$codigo_reunion."'>Invitar</a> </td>"; //?r_codigo=".$codigo_reunion." 
                    echo "</tr>"; 
                } 
            } else { 
                echo "<tr>"; 
                echo "   <td colspan='7'> No existen reuniones registradas en el sistema </td>"; 
                echo "</tr>"; 
 
            } 
            $conn->close();          
        ?> 
    </table>     

</body> 
</html> 