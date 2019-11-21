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
    <title>Modificar datos de persona </title>
</head>

<body>
    <?php
    //incluir conexión a la base de datos 
    include '../../../config/conexionDB.php';

    $codigo = $_POST["codigo"];
    //$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;

    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());

    $sql = "UPDATE usuario " .
        //"SET usu_cedula = '$cedula', " .
        "SET u_nombre = '$nombres', " .
        "u_apellido = '$apellidos', " .
        "u_direccion = '$direccion', " .
        "u_telefono = '$telefono', " .
        "u_correo = '$correo', " .
        "u_fecha_nacimiento = '$fechaNacimiento', " .
        "u_fecha_modificacion = '$fecha' " .
        "WHERE u_codigo = $codigo";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    echo "<p>Usuario Modificado</p>";
    echo "<a href='../../vista/user/index.php'>Regresar</a>";

    $conn->close();

    ?>
</body>

</html>