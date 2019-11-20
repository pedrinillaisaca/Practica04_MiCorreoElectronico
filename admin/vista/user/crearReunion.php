<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Crear Reunion</title>
    <link rel="stylesheet" href="../../css/formulario.css">
    <!--
    <script src="funciones.js" type="text/javascript"></script>-->

</head>


<section class="formulas">
    <h2>Formulario de Reunion</h2>
    <form id="formulario01" method="POST" action="../controladores/crear_usuario.php" > 

        <!--    
        <div><label for="cedula">Cedula:</label>
            <input type="text" id="ced" name="cedula" value="" placeholder="" onkeyup="return validarCedula()" />
            <span id="mensajeCedula" class="error"></span>
        </div>-->

        <div><label for="fecha">Fecha:</label>
            <input type="text" id="fecha" name="fecha" placeholder="yyyy/mm/dd" />
            <span id="mensajeNombre" class="error"></span>
        </div>


        <div> <label for="hora">Hora:</label>
            <input type="text" id="hora" name="hora"  />
            <span id="mensajeApellido" class="error"></span>
        </div>

        <div>
            <label for="lugar">Lugar:</label>
            <input type="text" id="lugar" name="lugar" /></div>
            
            
        <div>
            <label for="tel">Telefono:</label>
            <input type="text" id="tel"  name="telefono"/>
            <span id="mensajeTelefono" class="error"></span>
        </div>

        <div>
            <label for="coordenadas">Coordenadas:</label>
            <input type="text" id="coordenadas"  name="coordenadas"  />
            <span id="mensajeFechaNac" class="error"></span>
        </div>

        <div>
            <label for="motivo">Motivo:</label>
            <input type="text" id="motivo" name="motivo" />
            <span id="mensajeMail" class="error"></span>
        </div>

        <div>
            <label for="observacion">Observacion:</label>
            <input type="text" id="observacion" name="observacion" />
            <span id="mensajePass" class="error"></span>
        </div>
        <div>
            <input type="submit" value="Registrar Reunion" id="Registrar"></input>
            <!--
            <input type="submit" value="Validar" onclick="validar()"></input>-->
        </div>

    </form>
    <h2><a href="login.html">Iniciar Sesion</a></h2> <!--PENDIENTE-->
</section>

</html>