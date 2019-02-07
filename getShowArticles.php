<?php
include("cabecera.php");
include("menu.php");
include("categorias.php");
include_once("toolsArticles.php");

echo "<div class='span9'>";
echo "<div class='well well-small'>";
echo "<h3>Artículos </h3>";
//comprueba si llegan referencias de categoria y subcategoria y llama a funcion que muestra lista de articulos seg�n desplazamiento
if(isset($_GET['nom_art'])){
       
    
    if(isset($_GET['nom_art'])){        
        $nom_art=$_GET['nom_art'];
    }else{
       // header("Location: index.php");
    }
    
    if(isset($_GET['num_filas'])){
        $num_filas=$_GET['num_filas'];
    }else{
        $num_filas=6;
    }
    
    if(isset($_GET['aumtfilas'])){
        $num_filas=$_GET['num_filas'];
        if($_GET['aumtfilas'] == 'aumt'){
            $num_filas=$num_filas+1;
            echo "<p>".$num_filas."</p>";
        }
    }
    
    if(isset($_GET['rstfilas'])){
        $num_filas=$_GET['num_filas'];
        if($_GET['rstfilas'] == 'rst'){
            if($_GET['num_filas']<=0){
                $num_filas=0;
            }else{
                $num_filas=$num_filas-1;
            }
            echo "<p>".$num_filas."</p>";
        }
    }
    
    if(isset($_GET['desplazamiento'])){
        $desplazamiento=$_GET['desplazamiento'];
    }else{
        $desplazamiento=0;
    }
    
    //echo '<a href="toolsCart.php?borrar='.$rst['id_articulo'].'"><span class="btn btn-mini">-</span></a>';
    echo '<a href="showArticles.php?aumtfilas=aumt&nom_art='.$nom_art.'&num_filas='.$num_filas.'"><span class="btn btn-mini">+</span></a>';
    echo '<a href="showArticles.php?rstfilas=rst&nom_art='.$nom_art.'&num_filas='.$num_filas.'"><span class="btn btn-mini">-</span></a>';
    echo "<hr class='soften'/>";
    echo "<div class='row-fluid'>";
    echo "<ul class='thumbnails'>";
    articulosBusca($nom_art,$desplazamiento,$num_filas);
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    
}else{
    
}
?>


<?php
include("pie.php");
?>