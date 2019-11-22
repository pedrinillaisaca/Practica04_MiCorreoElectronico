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
    <title>Modificar Contraseña</title>
    <link rel="stylesheet" href="../../../css/formulario.css">
    <script src="fun_Pass.js" type="text/javascript"></script>
</head>

<body>

<?php $u_codigo=$_GET["u_codigo"]; echo"<p>".$u_codigo ."</p>";?>
    <h1>Modificar Contraseña</h1>

    <h2><a href="index.php">Regresar</a></h2>
<form  method="POST" action="../../controladores/user/actualizar_contra.php?u_codigo=<?php $u_codigo=$_GET["u_codigo"]; echo($u_codigo)?>">


        <div>
            <label for="nombre">Nueva Contraseña:</label>
            <input type="password" id="new_contra" name="new_contra" />
            <span id="aviso" ></span>            
        </div>


        <div> <label for="ape">Repetir Contraseña:</label>
            <input type="password" id="r_new_contra" name="r_new_contra" onkeyup="return validarPass(this)" />
            <span id="aviso2" ></span>
        </div>

      


        <div>
            <input type="submit" value="Cambiar" id="Cambiar"></input>    
        </div>

    </form>

</body>

</html>