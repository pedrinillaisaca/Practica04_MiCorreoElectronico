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
    <title>Administrador</title>
    <link rel="stylesheet" href="../../../css/formulario.css"> 
</head> 
<body> 

<?php 
//variables de usuarios
$u_codigo=$_GET["u_codigo"];
$u_nombre=$_GET["u_nombre"];

 echo "<h1>Administrador: ".$u_nombre."</h1>";
 //envio a cada pagina su respectivo id de usuario para realizar los cambios pertinentes
 //echo "<h2><a href='crearReunion.php?u_codigo=".$u_codigo."'>Crear Reuniones</a></h2>";
 //echo "<h2><a href='buscarReuniones.php?u_codigo=".$u_codigo."'>Buscar Reuniones</a></h2>";
 //echo "<h2><a href='modificar_user2.php?u_codigo=".$u_codigo."'>Modificar datos</a></h2>";
 //echo "<h2><a href='cambiar_contra_usuario.php?u_codigo=".$u_codigo."'>Cambiar contraseña</a></h2>";
 //echo "<h2><a href=''>Eliminar Reuniones</a></h2>";
 //echo "<h2><a href=''>Buscar Reuniones</a></h2>";
 //echo "<h2><a href=''>Modificar datos</a></h2>";
 echo "<h2><a href='cam_contra_user.php'>Cambiar contraseña de Usuarios</a></h2>";


 echo "<h2><a href='../../controladores/cerrarSesion.php'>Cerrar Sesion</a></h2>";
 
 ?>

 <table style="width:100%" class="tabla"> 
        <tr> 
            
            <th>Fecha</th>  
            <th>Hora</th> 
            <th>Lugar</th> 
            <th>Coordenadas</th>
            <th>Motivo</th>
            <th>Eliminar</th>
            
                         
        </tr> 
        <?php 
            include '../../../config/conexionDB.php';  
            //lisa reuniones no eliminadas ordenadas desde las mas recientes ajendadas por el usuario que en
            //este momento esta como logeado
            $sql = "SELECT * FROM reunion WHERE r_eliminada='N' ORDER BY r_codigo DESC"; 
            $result = $conn->query($sql); 
             
            if ($result->num_rows > 0) { 
                 
                while($row = $result->fetch_assoc()) { 
                    echo "<tr>"; 
                    echo "   <td>" . $row["r_fecha"] . "</td>"; 
                    echo "   <td>" . $row['r_hora'] ."</td>"; 
                    echo "   <td>" . $row['r_lugar'] . "</td>"; 
                    echo "   <td>" . $row['r_coordenadas'] . "</td>"; 
                    echo "   <td>" . $row['r_motivo'] . "</td>"; 

                    echo "   <td> <a href='borrarReunion.php?r_codigo=".$row['r_codigo']."&u_codigo=".$u_codigo."&u_nombre=".$u_nombre."'>Eliminar Reunion</a> </td>";  
                 
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
