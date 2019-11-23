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
    <title>Modificar datos de Personas</title>
    <link rel="stylesheet" href="../../../css/formulario.css">
</head>

<body>
<h1>Modificar Usuario</h1>

<h2><a href="index.php">Regresar</a></h2>
    <?php

    $u_codigo = $_GET["u_codigo"];
    $u_nombre = $_GET["u_nombre"];
    $sql = "SELECT * FROM usuario WHERE u_codigo=$u_codigo AND u_rol='U'";

    include '../../../config/conexionDB.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formulario01" method="POST" action="../../controladores/user/modificar_user.php">
                <input type="hidden" id="u_codigo" name="u_codigo" value="<?php echo $u_codigo ?>" />
                <input type="hidden" id="u_nombre" name="u_nombre" value="<?php echo $u_nombre ?>" />



                <div><label for="nombres">Nombres </label>
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["u_nombre"]; ?>"  />
                </div>

                <div><label for="apellidos">Apelidos </label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["u_apellido"]; ?>"  />
                </div>


                <div><label for="direccion">Dirección </label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["u_direccion"]; ?>"  />
                </div>

                <div><label for="telefono">Teléfono </label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["u_telefono"]; ?>"  />
                </div>
                <div>
                    <label for="correo">Correo electrónico </label>
                    <input type="email" id="correo" name="correo" value="<?php echo $row["u_correo"]; ?>"  />
                </div>

                <div><label for="fecha">Fecha Nacimiento </label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["u_fecha_nacimiento"]; ?>"  />
                </div>



                <div>
                    <input type="submit" id="eliminar" name="eliminar" value="Modificar" />
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" /> </div>
            </form>

    <?php
        }
    } else {
        echo "<p>Ha ocurrido un error inesperado !</p>";
        echo "<p>" . mysqli_error($conn) . "</p>";
    }
    $conn->close();
    ?>

</body>

</html>