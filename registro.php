<?php
    include("cabecera.php");
    include("menu.php");
    include("editUser.php");
?>
<!--
Incluir categorias
-->
<?php
include("categorias.php")
?>
<!--
contenido formulario registro
-->

<div class="span9">
<?php if(isset($_GET["cuenta"])){echo "<h3>Edición cuenta</h3>";}else{echo "<h3> Registro de Usuario</h3>";}?>
<hr class="soft"/>
<div class="well">

<?php
//esta variable viene del men� de navegaci�n 
    if(isset($_GET["cuenta"])){
        echo'<form class="form-horizontal" action="editUser.php?edit=SI" method="POST" onsubmit="return validarAlta();">';
    }else{
        echo'<form class="form-horizontal" action="toolUser.php" method="POST" onsubmit="return validarAlta();">';
    }
?>
    <form class="form-horizontal" action="toolUser.php" method="POST" onsubmit="return validarAlta();">
        <h3>Datos Personales</h3>
        <div class="control-group">
            <label class="control-label" for="nombre">Nombre <sup>*</sup></label>
            <div class="controls">
                <input type="text" id="nombre" placeholder="Nombre" name="nombre" value="<?php if(isset($nombre)){echo $nombre;}else{echo "";}?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="apellidos">Apellidos <sup>*</sup></label>
            <div class="controls">
                <input type="text" id="apellidos" placeholder="Apellidos" name="apellidos" value="<?php if(isset($apellidos)){echo $apellidos;}else{echo "";}?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Email <sup>*</sup></label>
            <div class="controls">
                <input type="text" id="email" placeholder="Email" name="email" value="<?php if(isset($email)){echo $email;}else{echo "";}?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="nick">Usuario <sup>*</sup></label>
            <div class="controls">
                <input type="text" id="nick" placeholder="Usuario" name="nick" value="<?php
                //comprueba si el usuario existe y lo rellena en el campo
                if (isset($_GET["usr"]))
                    {
                        $usuario=$_GET["usr"];
                        echo ltrim($usuario);
                    } if(isset($nick)){echo $nick;}else{echo "";}
                ?>">
            </div>
            <?php
            if (isset($_GET["existeusr"])){
                $existe=$_GET["existeusr"];
                if ($existe=='SI'){
                    echo'<div class="alert alert-danger" role="alert"><p>El usuario ya existe</p></div>';
                }
            }
            ?>
        </div>
        <div class="control-group">
            <label class="control-label">Password <sup>*</sup></label>
            <div class="controls">
                <input type="password" id="pasw" placeholder="Password" name="password" value="<?php if(isset($pwd)){echo $pwd;}else{echo "";}?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="email">Dirección </label>
            <div class="controls">
                <input type="text" placeholder="Dirección" name="direccion" class="span5" value="<?php if(isset($direccion)){echo $direccion;}else{echo "";}?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Provincia </label>
            <div class="controls">
                <input type="text" placeholder="Provincia" name="provincia" value="<?php if(isset($provincia)){echo $provincia;}else{echo "";}?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Población </label>
            <div class="controls">
                <input type="text" placeholder="Población" name="poblacion" value="<?php if(isset($poblacion)){echo $poblacion;}else{echo "";}?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Teléfono </label>
            <div class="controls">
                <input type="text" placeholder="Teléfono" name="telefono" value="<?php if(isset($tlf)){echo $tlf;}else{echo "";}?>">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
           <?php if(isset($_GET["cuenta"])){
               echo "<input type='submit' name='submitRegistro' value='Modificar' class='exclusive shopBtn'>  ";
               echo "<a class='exclusive shopBtn' href='".$_SERVER['HTTP_REFERER']."'>Volver</a>";
           }else{
               echo "<input type='submit' name='submitRegistro' value='Registrar' class='exclusive shopBtn'>  ";
               echo "<a class='exclusive shopBtn' href='".$_SERVER['HTTP_REFERER']."'>Volver</a>";
           };?>
            </div>
        </div>
    </form>
</div>

</div>

<?php

    include("pie.php");
?>

