<?php
include_once("conectBBDD.php");

//muestra en el cuerpo la lista de articulos de la categoria seleccionada
function articuloslista($cat,$scat,$desplazamiento){
    
    $con = conectar_bd();    
    $sql = $con->prepare('select a.id_articulo,a.nombre_articulo,a.descripcion,a.precio,m.nombre_marca,c.id_categoria,c.nombre_categoria,s.id_subcategoria,s.nombre_subcategoria from articulos a INNER JOIN marcas m ON a.id_marca = m.id_marca
                            INNER JOIN categorias c ON a.id_categoria = c.id_categoria
                            INNER JOIN subcategorias s ON a.id_subcategoria = s.id_subcategoria where a.id_categoria='.$cat.' and a.id_subcategoria='.$scat.' limit 0,'.$desplazamiento.';');
    $sql->execute();  
    $reg=$sql->rowCount();
    $count=0;
    $count2=3;
    

    if($reg==0){
        echo "<div class='row-fluid'>";
        echo "<ul class='thumbnails'>";   
        echo "<img src='img/sin_resultados.jpg' WIDTH=240 HEIGHT=310 BORDER=0 ALT='Un beb&eacute;' ALIGN='right'>";
        echo "</ul>";
        echo "</div>";
    }
    //va sumando de 3 en 3 con $count y $count2 para que las imagenes se listen en filas de 3 imagenes por fila
    while($rst = $sql->fetch()){
        if($count==$count2){
            echo "</ul>";
            echo "</div>";
            echo "<div class='row-fluid'>";
            echo "<ul class='thumbnails'>";
            $count2=$count2+3;
        }
        echo "<li class='span4'>";
        echo "<div class='thumbnail'>";
        echo "<a href='product_details.html' class='overlay'></a>";
        echo '<a class="zoomTool" href="articuloDetalle.php?idart='.$rst['id_articulo'].'&idcat='.$rst['id_categoria'].'&idscat='.$rst['id_subcategoria'].'" title="quick view"><span class="icon-search"></span> QUICK VIEW</a>';
        echo '<a href="articuloDetalle.php?idart='.$rst['id_articulo'].'&idcat='.$rst['id_categoria'].'&idscat='.$rst['id_subcategoria'].'">';
        echo "<img src='img/articulos/".$rst["id_articulo"].".jpg' alt=''></a>";
        echo "<div class='caption cntr'>";
        echo "<p>".$rst['descripcion']."</p>";
        echo "<p>".$rst['nombre_articulo']."</p>";
        echo "<p><strong>".$rst['precio']."</strong></p>";        
        echo '<h4><a class="shopBtn" href="toolsCart.php?id_articulo='.$rst['id_articulo'].'&cantidad=1" title="add to cart"> Add to cart </a></h4>';
        echo "<br class='clr'>";
        echo "</div>";
        echo "</div>";
        echo "</li>";

        $count++;
    }
}

//funcionar que carga tabla de articulos pero del menú de mantenimiento perfil con rol 2
function mtoArticles(){
    
    echo '<div class="span12">';
    echo '<h3> Mantenimiento de Articulos</h3>';
    echo '<hr class="soft">';
    echo '<div class="well">';
    echo '<a class="shopBtn" href="mtoArticles.php">Nuevo Articulo</a>';
    echo '<hr class="soft">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-condensed">';
    echo '<tr class="success">';
    echo "<td><strong>";
    echo "Id Articulo";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Categoria";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "SubCategoria";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Marca";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Nombre Articulo";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Descripcion";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Precio";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Iva";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Activado";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Tablon";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "User";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Fecha alta";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Accion";
    echo "</strong></td>";    
    echo "</tr>";
    
    $con = conectar_bd();
    //$sql = $con->prepare('Select * from articulos;');
    $sql = $con->prepare("select a.id_articulo,a.nombre_articulo,a.descripcion , a.id_categoria,a.id_subcategoria,a.id_marca,c.nombre_categoria,s.nombre_subcategoria,m.nombre_marca,a.precio, a.iva,a.activo,a.tablon,a.usr_modif,a.fecha_modif
                          from articulos as a
                          left join categorias as c on a.id_categoria=c.id_categoria
                          left join marcas as m on a.id_marca=m.id_marca
                          left join subcategorias as s on a.id_subcategoria=s.id_subcategoria");
    $sql->execute();
    
    while($datos = $sql->fetch()){
        
        echo "<tr>";
        echo "<td>";
        $id = $datos["id_articulo"];
        echo $id;
        echo "</td>";
        echo "<td>";
        $nombre_categoria = $datos["nombre_categoria"];        
        echo $nombre_categoria;
        echo "</td>";
        echo "<td>";
        $nombre_subcategoria = $datos["nombre_subcategoria"];
        echo $nombre_subcategoria;
        echo "</td>";
        echo "<td>";
        $nombre_marca = $datos["nombre_marca"];
        echo $nombre_marca;
        echo "</td>";
        echo "<td>";
        $nombre_articulo = $datos["nombre_articulo"];
        echo $nombre_articulo;
        echo "</td>";
        echo "<td>";
        $descripcion = $datos["descripcion"];
        echo $descripcion;
        echo "</td>";
        echo "<td>";
        $precio = $datos["precio"];
        echo $precio;
        echo "</td>";
        echo "<td>";
        $iva = $datos["iva"];
        echo $iva;
        echo "</td>";        
        echo "<td>";
        echo '<div style="text-align: left">';
        $activo=$datos["activo"];
        if ($activo==0){
            $chk="";
        }else{
            $chk="checked";
        }
        echo '<center><input type="checkbox" name="checkbox[]"'. $chk .' disabled></center>';
        echo '</div>';
        echo "</td>";
        echo "<td>";
        echo '<div style="text-align: left">';
        $tablon=$datos["tablon"];
        if ($tablon==0){
            $chk="";
        }else{
            $chk="checked";
        }
        echo '<center><input type="checkbox" name="checkbox[]"'. $chk .' disabled></center>';
        echo '</div>';
        echo "</td>";
        echo "<td>";
        $usuario = $datos["usr_modif"];
        echo $usuario;
        echo "</td>";
        echo "<td>";
        $fecha = $datos["fecha_modif"];
        echo $fecha;
        echo "</td>";
        
        echo "<td><center>";
        echo '<a href="mtoArticles.php?editar=SI&id='.$id.'"><span class="icon icon-edit" aria-hidden="true"></span> </a>';
        echo '<a href="toolsArticles.php?delCategoria=SI&id='.$id.'"><span class="icon icon-trash" aria-hidden="true"></span></a>';
        echo "</center></td>";        
        echo "</tr>";
        
    }
    
    echo "</table>";
    //Muestra mensaje error al no poder borrar categoria
    if(isset($_GET["sendError"])){
        echo "<p style='color:red;'>La categoria no puede ser borrada ya que tiene asociada alguna subcategoria</p>";
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
}


?>