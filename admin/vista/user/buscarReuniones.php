<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: ../../../public/vista/login.html");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Buscar Reunion</title>
    <link rel="stylesheet" href="../../../css/formulario.css">
    <script src="main.js" type="text/javascript"></script>
</head>
<?php //$u_codigo=$_GET["u_codigo"]; echo "<p>".$u_codigo."</p>";  ?>


<section class="formulas">
    <h2>Ingresar un Criterio de Busqueda</h2>

    <form id="formulario01" method="POST" action="">
       
        <div>
            <label for="motivo">Motivo:</label>
            <!-- <input type="text" id="motivo" name="motivo" />-->

            <select name="motivo" id="motivo">
                <option value="Actualización de estado">Actualización de estado</option>
                <option value="Compartir Información">Compartir Información</option>
                <option value="Toma de Decisiones">Toma de Decisiones</option>
                <option value="Resolución de Problemas">Resolución de Problemas</option>
                <option value="Innovación"> Innovación</option>
                <option value="Creación de Equipos">Creación de Equipos</option>
                
            </select>
        </div>
      
        <div>
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarReunion()">            
        </div>

    </form>
    <div id="informacion"><b>Datos </b></div> 
 


    <h2><a href="../../vista/user/index.php">Regresar</a></h2>
    <h2><a href="agreInvitados.php">Agregar Invitados</a></h2>

</section>

</html>