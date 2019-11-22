<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: ../../../public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Usuario</title>
    <link rel="stylesheet" href="../../../css/formulario.css">
    <script src="main.js" type="text/javascript"></script>
</head>

<body>
    <h1>Seleciona los invitados</h1>


    <h2><a href="crearReunion.php">Regresar</a></h2>
    <table style="width:100%" class="tabla">
        <tr>

            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Invitar</th>
            <!--FALTA-->

        </tr>
        <?php
        //AQUI ESTOY ENVIANDO AL UUSARIO 
        //$codigo_reunion=$_GET["r_codigo"];
        include '../../../config/conexionDB.php';
        //SELECT MAX(r_codigo) FROM reunion

        $sql = "SELECT MAX(`r_codigo`) FROM `reunion` ";
        $r = $conn->query($sql);
        $r_codigo=0;
        if ($r->num_rows > 0) {
            while ($r2 = $r->fetch_assoc()) {
                //echo "<p>" . $r2["MAX(`r_codigo`)"] . "</p>";//solo para comprovar
                $r_codigo=$r2["MAX(`r_codigo`)"];//enviando el codigo de la reunion 
            }                        
        }else{
            echo"La puta consulta no sirve";
        }



        $sql = "SELECT * FROM usuario WHERE u_rol='U' AND u_eliminado='N'"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $cont=0;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row["u_nombre"] . "</td>";
                echo "   <td>" . $row['u_apellido'] . "</td>";
                echo "   <td>" . $row['u_correo'] . "</td>";
                
                //echo "   <td> <a href='../../controladores/user/reg_re_usu.php?u_codigo=".$row['u_codigo']."&r_codigo=".$codigo_reunion."'>Invitar</a> </td>"; //?r_codigo=".$codigo_reunion." 
                echo "<td> <input type='button' id='boton".$cont."' name='boton' value='Invitar' onclick='invitar(this.id,".$row['u_codigo'].",".$r_codigo.")'></td>";
                echo "</tr>";
                $cont=$cont+1;
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