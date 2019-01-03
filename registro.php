<?php
    include("cabecera.php");
    include("menu.php");
?>
<!--
Seccion de contenido donde se incluye las categorias desde php
-->
<?php
include("categorias.php")
?>
<!--
contenido de la página
-->

<div class="span9">
<h3> Registro de Usuarios</h3>
<hr class="soft"/>
<div class="well">
    <form class="form-horizontal" action="usuario.php" method="POST" onsubmit="return validarAlta();">
        <h3>Datos Personales</h3>
        <div class="control-group">
            <label class="control-label" for="nombre">Nombre <sup>*</sup></label>
            <div class="controls">
                <input type="text" id="nombre" placeholder="Nombre" name="nombre">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="apellidos">Apellidos <sup>*</sup></label>
            <div class="controls">
                <input type="text" id="apellidos" placeholder="Apellidos" name="apellidos">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Email <sup>*</sup></label>
            <div class="controls">
                <input type="text" id="email" placeholder="Email" name="email">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="nick">Usuario <sup>*</sup></label>
            <div class="controls">
                <input type="text" id="nick" placeholder="Usuario" name="nick" value="<?php
                //comprueba si viene el campo de usuario relleno y se rellena en el formulario.
                if (isset($_GET["usr"]))
                    {
                        $usuario=$_GET["usr"];
                        echo ltrim($usuario);
                    }
                ?>">
            </div>
            <?php
            if (isset($_GET["existeusr"])){
                $existe=$_GET["existeusr"];
                if ($existe=='SI'){
                    echo'<div class="alert alert-danger" role="alert"><p>El usuario usado ya existe</p></div>';
                }
            }
            ?>
        </div>
        <div class="control-group">
            <label class="control-label">Password <sup>*</sup></label>
            <div class="controls">
                <input type="password" id="pasw" placeholder="Password" name="password">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="email">Dirección </label>
            <div class="controls">
                <input type="text" placeholder="Dirección" name="direccion" class="span5">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Provincia </label>
            <div class="controls">
                <input type="text" placeholder="Provincia" name="provincia">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Población </label>
            <div class="controls">
                <input type="text" placeholder="Población" name="poblacion">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Teléfono </label>
            <div class="controls">
                <input type="text" placeholder="Teléfono" name="telefono">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type="submit" name="submitRegistro" value="Registrar" class="exclusive shopBtn">
            </div>
        </div>
    </form>
</div>

</div>

<?php

    include("pie.php");
?>

