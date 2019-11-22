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
<?php 

$u_codigo=$_GET["u_codigo"];

echo"<p>".$u_codigo."</p>";


?>

 <h1>Bienvenido Usuario </h1>

 <?php
 
 echo "<h2><a href='crearReunion.php?u_codigo=".$u_codigo."'>Crear Reuniones</a></h2>";
 //echo "<h2><a href="">Buscar Reuniones</a></h2>";
 echo "<h2><a href='modificar_user.php'>Modificar datos</a></h2>";
 echo "<h2><a href='cambiar_contra_usuario.php?u_codigo=".$u_codigo."'>Cambiar contraseña</a></h2>";
 echo "<h2><a href='../../controladores/cerrarSesion.php'>Cerrar Sesion</a></h2>";
 
 ?>
 
 <table style="width:100%" class="tabla"> 
        <tr> 
            
            <th>Fecha</th>  
            <th>Hora</th> 
            <th>Lugar</th> 
            <th>Coordenadas</th> <!--FALTA-->             
                         
        </tr> 
        <?php 
            include '../../../config/conexionDB.php';  
            $sql = "SELECT * FROM reunion"; 
            $result = $conn->query($sql); 
             
            if ($result->num_rows > 0) { 
                 
                while($row = $result->fetch_assoc()) { 
                    echo "<tr>"; 
                    echo "   <td>" . $row["r_fecha"] . "</td>"; 
                    echo "   <td>" . $row['r_hora'] ."</td>"; 
                    echo "   <td>" . $row['r_lugar'] . "</td>"; 
                    echo "   <td>" . $row['r_coordenadas'] . "</td>"; 
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
