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
    if(isset($_GET['idart']) && isset($_GET['idcat']) && isset($_GET['idscat'])){
        echo "<div class='thumbnail'>";
        echo "<a href='product_details.html' class='overlay'></a>";
        echo '<a class="zoomTool" href="showArticles.php?id_cat='.$_GET['idcat'].'&id_scat='.$_GET['idscat'].'" title="volver"><span class="icon-search"></span> Volver</a>';        
        echo "<img src='img/articulos/".$_GET["idart"].".jpg' alt=''></a>";
        echo "</div>";
    }else{
    echo "hola";
    }
?>
</div>
</div>

<?php
include("pie.php");
?>