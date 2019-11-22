<?php
//incluir conexión a la base de datos 
include '../../../config/conexionDB.php';

$motivo =  mb_strtoupper($_GET['motivo']);
$u_codigo=$_GET['u_codigo'];
//echo "<p>".$motivo."</p>";   
//echo "<p>".$u_codigo."</p>";   

$sql = "SELECT * FROM reunion WHERE r_eliminada='N' AND r_motivo='$motivo' AND r_remitente='$u_codigo'";
//cambiar la consulta para puede buscar por ocurrencias de letras 
$result = $conn->query($sql);
echo  "<table style='width:100%' class='tabla'> 
            
        <tr> 
                     
            <th>Fecha</th>  
            <th>Hora</th> 
            <th>Lugar</th> 
            <th>Coordenadas</th>
            <th>Motivo</th>        
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "   <td>" . $row['r_fecha'] . "</td>";
        echo "   <td>" . $row['r_hora'] . "</td>";
        echo "   <td>" . $row['r_lugar'] . "</td>";
        echo "   <td>" . $row['r_coordenadas'] . "</td>";
        echo "   <td>" . $row['r_motivo'] . "</td>";

        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "   <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    
    echo "</tr>";
}
echo "</table>";
$conn->close();
?>