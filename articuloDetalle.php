<?php
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
    //comprueba los ids de los articulos que est�n vinculados con las imagenes para que se muestren
    if(isset($_GET['imagen'])){
        $id=$_GET['id'];
        $con=conectar_bd();
        $sql=$con->prepare('select * from articulos where id_articulo='.$id);
        $sql->execute();
        $art_detalle = [];
        while ($data = $sql->fetch(PDO::FETCH_OBJ)){
            $art_detalle[] = $data;
        }
        echo "<div class='thumbnail'>";
        echo "<a href='product_details.html' class='overlay'></a>";
        echo "<a class='zoomTool' href='".$_SERVER['HTTP_REFERER']."' title='volver'><span class='icon-search'></span> Volver</a>";        
        echo "<img src='img/articulos/".$_GET["imagen"]."' alt=''></a>";
        echo "</div>";
        echo "<div class='row-fluid'>";
        echo "<li class='span12'>";
        echo "<div class='thumbnail'>";
        echo "<p><strong>".$art_detalle[0]->nombre_articulo."</strong></p>";
        echo "<p>".$art_detalle[0]->descripcion."</p>";
        echo "<br class='clr'>";
        echo "</div>";
        echo "</li>";
        echo "</div>";
    }else{    
    }
?>
</div>
</div>

<?php
include("pie.php");
?>