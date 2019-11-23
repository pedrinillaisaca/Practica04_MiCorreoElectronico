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
<h1>Modificar Contraseña</h1>
<?php 
$u_codigo=$_GET["u_codigo"];
$u_nombre=$_GET["u_nombre"];
//echo"<p>".$u_codigo ."</p>";

echo "<h2><a href='index.php?u_codigo=".$u_codigo."&u_nombre=".$u_nombre."'>Regresar</a></h2>";
?>
    

    
<form  method="POST" action="../../controladores/user/actualizar_contra.php?u_codigo=<?php $u_codigo=$_GET["u_codigo"]; echo($u_codigo)?>&u_nombre=<?php $u_nombre=$_GET["u_nombre"]; echo($u_nombre)?>">


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
            <input type="submit" value="Cambiar" id="Registrar"></input>    
        </div>

    </form>

</body>

</html>