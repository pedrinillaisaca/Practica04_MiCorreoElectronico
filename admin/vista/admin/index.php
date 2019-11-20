

 <!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <title>Usuario</title>
    <link rel="stylesheet" href="../../../css/formulario.css"> 
</head> 
<body> 
 <h1>Bienvenido Administrador </h1>

 <h2><a href="">Eliminar Reuniones</a></h2>
 <h2><a href="">Buscar Reuniones</a></h2>
 <h2><a href="">Modificar datos</a></h2>
 <h2><a href="">Cambiar contraseña</a></h2>
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

                    echo "   <td> <a href='eliminarReunion.php?codigo=" . $row['r_codigo'] . "'>Eliminar Reunion</a> </td>"; 
                    




                    
                 
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
