<?php
include_once("conectBBDD.php");

//funcion que dibuja y muestra las categorias y subcategorias
function showcategories(){
    
    $con = conectar_bd();
    $sql = $con->prepare('Select id_categoria from categorias;');
    $sql->execute();
    $controla_duplicados=$sql->fetchColumn(0);
    
    $sql = $con->prepare('Select a.nombre_categoria,a.id_categoria,s.nombre_subcategoria,s.id_subcategoria
                          from categorias a INNER JOIN subcategorias s ON a.id_categoria = s.id_categoria order by a.id_categoria;');
    $sql->execute();
    
    $controlUL=true;
    while($datos = $sql->fetch()){
        
        $id_cat=$datos["id_categoria"];
        $id_scat=$datos["id_subcategoria"];
        $nombre_categoria=$datos["nombre_categoria"];
        $nombre_subcategoria=$datos["nombre_subcategoria"];
        
        if($controla_duplicados == $id_cat){
            if($controlUL){
                echo '<li class="active has-sub"><a href="showArticles.php?id_cat='.$id_cat.'">';
                echo $nombre_categoria."</a>";
                echo "<ul>";
                $controlUL=false;
            }
            echo '<li><a href="showArticles.php?id_cat='.$id_cat.'&id_scat='.$id_scat.'">';
            echo $nombre_subcategoria."</a></li>";
        }else{
            $controlUL=true;
            echo "</ul>";
            echo "</li>";
            echo '<li class="active has-sub"><a href="showArticles.php?id_cat='.$id_cat.'">';
            echo $nombre_categoria."</a>";
            echo "<ul>";
            echo '<li><a href="showArticles.php?id_cat='.$id_cat.'&id_scat='.$id_scat.'">';
            echo $nombre_subcategoria."</a></li>";
            $controla_duplicados = $id_cat;
        }
    }
}
//funcionar que carga tabla de categorias pero del men� de mantenimiento perfil con rol 2
function mtoCategories(){
    
    echo '<div class="span12">';
    echo '<h3> Mantenimiento de Categorias</h3>';
    echo '<hr class="soft">';
    echo '<div class="well">';
    echo '<a class="shopBtn" href="addCategories.php">Nueva Categoria</a>';
    echo '<hr class="soft">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-condensed">';
    echo '<tr class="success">';
    echo "<td>";
    echo "Id Categoria";
    echo "</td>";
    echo "<td>";
    echo "Nombre Categoria";
    echo "</td>";
    echo "<td>";
    echo "Activado";
    echo "</td>";
    echo "<td>";
    echo "Edita";
    echo "</td>";
    echo "<td>";
    echo "Borra";
    echo "</td>";
    
    $con = conectar_bd();
    $sql = $con->prepare('Select * from categorias;');
    $sql->execute();
    
    while($datos = $sql->fetch()){
        
        echo "<tr>";
        echo "<td>";
        $id = $datos["id_categoria"];
        echo $id;
        echo "</td>";
        echo "<td>";
        $nombre_categoria = $datos["nombre_categoria"];
        echo $nombre_categoria;
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
        echo '<a href="addCategories.php?editar=SI&id='.$id.'&categoria='.$nombre_categoria.'&activo='.$activo.'">';
        echo "Editar</a>";
        echo "</td>";
        echo "<td>";
        echo "<a href='gCategorias.php?editar=SI&id='.$id.'>Borrar</a>";
        echo "</td>";
        
    }
    
    echo "</table>";
    echo '</div>';
    echo '</div>';
    echo '</div>';
    
}


?>