<?php
include_once("conectBBDD.php");

//muestra en el cuerpo la lista de articulos de la categoria seleccionada
function articuloslista($cat){
    $con = conectar_bd();
    //$sql = $con->prepare('Select * from articulos where id_categoria='.$cat.' and baja=0 limit 0,5;'); 
    $sql = $con->prepare('select a.nombre_articulo,a.descripcion,a.precio,m.nombre_marca,c.nombre_categoria,s.nombre_subcategoria from articulos a INNER JOIN marcas m ON a.id_marca = m.id_marca
                            INNER JOIN categorias c ON a.id_categoria = c.id_categoria
                            INNER JOIN subcategorias s ON a.id_subcategoria = s.id_subcategoria where a.id_categoria='.$cat.' limit 0,5;');
    $sql->execute();
    
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
}
?>