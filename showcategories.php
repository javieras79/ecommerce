<?php
session_start();
include("cabecera.php");
include("menu.php");
include_once("toolsarticles.php");
?>

<!--
Seccion de contenido donde se incluye las categorias desde php
-->
<?php
include("categorias.php");
?>
<div class="span9">
<div class="well well-small">
<?php
    if(isset($_GET['id_cat'])){
        $cat=$_GET['id_cat'];
        articulosLista($cat);
    }
?>
</div>
</div>

<?php
include("pie.php");
?>