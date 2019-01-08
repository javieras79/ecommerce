<?php
include_once("conectBBDD.php");

//muestra en el cuerpo la lista de articulos de la categoria seleccionada
function articuloslista($cat,$scat){
    $con = conectar_bd();
    //$sql = $con->prepare('Select * from articulos where id_categoria='.$cat.' and baja=0 limit 0,5;'); 
    $sql = $con->prepare('select a.id_articulo,a.nombre_articulo,a.descripcion,a.precio,m.nombre_marca,c.id_categoria,c.nombre_categoria,s.id_subcategoria,s.nombre_subcategoria from articulos a INNER JOIN marcas m ON a.id_marca = m.id_marca
                            INNER JOIN categorias c ON a.id_categoria = c.id_categoria
                            INNER JOIN subcategorias s ON a.id_subcategoria = s.id_subcategoria where a.id_categoria='.$cat.' and a.id_subcategoria='.$scat.' limit 0,6;');
    $sql->execute();
  /*  
    while($rst = $sql->fetch()){
        echo '<div class="row-fluid">';
        echo '<div class="span2">';
        //echo '<img src="'.existeImagen($rst['id_articulo']).'" alt="">';
        echo '</div>';
        echo '<div class="span6">';
        echo '<h5>'.$rst['nombre_subcategoria'].' </h5>';
        echo '</div>';
        echo '<div class="span6">';
        echo '<h5>'.$rst['nombre_articulo'].' </h5>';
        echo '<p>';
        echo $rst['descripcion'];
        echo '</p>';
        echo '</div>';
        echo '<div class="span4 alignR">';
        echo '<form class="form-horizontal qtyFrm">';
        echo '<h3> '.$rst['precio'].'</h3>';
        echo '<div class="btn-group">';
        echo '<a href="carritoUtil.php?suma2=SI&id='.$rst['id_articulo'].'&cantidad=1" class="defaultBtn"><span class=" icon-shopping-cart"></span> Añadir carrito</a>';
        echo '<a href="articuloDetalle.php?idart='.$rst['id_articulo'].'" class="shopBtn">VER</a>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '<hr class="soften">';
    }
    */    
    $reg=$sql->rowCount();
    //$rst = $sql->fetch();
    echo "<div class='well well-small'>";
    if($reg==0){
        echo "<div class='row-fluid'>";
        echo "<img src='img/sin_resultados.jpg' WIDTH=240 HEIGHT=310 BORDER=0 ALT='Un beb&eacute;' ALIGN='right'>"; 
        echo "</div>";
        echo "</div>";
    }
    //echo "<h3>".$rst["nombre_subcategoria"]."</h3>";    
    while($rst = $sql->fetch()){
        
         
        echo "<div class='row-fluid'>";
        echo "<ul class='thumbnails'>";
        echo "<li class='span4'>";
        echo "<div class='thumbnail'>";
        echo "<a href='product_details.html' class='overlay'></a>";
        echo '<a class="zoomTool" href="articuloDetalle.php?idart='.$rst['id_articulo'].'&idcat='.$rst['id_categoria'].'&idscat='.$rst['id_subcategoria'].'" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>';
        echo '<a href="articuloDetalle.php?idart='.$rst['id_articulo'].'&idcat='.$rst['id_categoria'].'&idscat='.$rst['id_subcategoria'].'">';
        echo "<img src='img/articulos/".$rst["id_articulo"].".jpg' alt=''></a>";
        echo "<div class='caption cntr'>";
        echo "<p>".$rst['descripcion']."</p>";
        echo "<p>".$rst['nombre_articulo']."</p>";
        echo "<p><strong>".$rst['precio']."</strong></p>";
        echo "<h4><a class='shopBtn' href='#' title='add to cart'> Add to cart </a></h4>";
        echo "<div class='actionList'>";
        echo "<a class='pull-left' href='#'>Add to Wish List </a>";
        echo "<a class='pull-left' href='#'> Add to Compare </a>";
        echo "</div>";
        echo "<br class='clr'>";
        echo "</div>";
        echo "</div>";
        echo "</li>";
        
        } 
}
?>