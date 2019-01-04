<?php
    session_start();
    include("cabecera.php");
    include("menu.php");
?>
<!--
Seccion de contenido donde se incluye las categorias desde php
-->
<?php
include("categorias.php")
?>
<?php 
include("cuerpo.php")
?>
<?php

    include("pie.php");
?>

