<?php
session_start();
include("cabecera.php");
include("menu.php");
include_once("toolsArticles.php");
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
    //comprueba los ids de los articulos que están vinculados con las imagenes para que se muestren
    if(isset($_GET['imagen'])){
        echo "<div class='thumbnail'>";
        echo "<a href='product_details.html' class='overlay'></a>";
        echo "<a class='zoomTool' href='".$_SERVER['HTTP_REFERER']."' title='volver'><span class='icon-search'></span> Volver</a>";        
        echo "<img src='img/articulos/".$_GET["imagen"]."' alt=''></a>";
        echo "</div>";
    }else{    
    }
?>
</div>
</div>

<?php
include("pie.php");
?>