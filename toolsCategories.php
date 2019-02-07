<?php
include_once("conectBBDD.php");

//modicar categoria
if(isset($_GET["editarCategoria"])){
   
    $id_cat=$_GET["id"];    
    $nombre_categoria=$_POST["categoria"];
    if(isset($_POST["activo"])){        
        $activo=1;        
    }else{        
        $activo=0;
    }    
    $con = conectar_bd();
    $sql = $con->prepare('UPDATE categorias set nombre_categoria="'.$nombre_categoria.'",activo="'.$activo.'" where id_categoria='.$id_cat);
    $sql->execute();
    header("Location: listCategories.php");     
}

//Añadir categoria
if(isset($_GET["addCategoria"])){
        
    $nombre_categoria=$_POST["categoria"];
    if(isset($_POST["activo"])){
        $activo=1;
    }else{
        $activo=0;
    }
    $con = conectar_bd();
    $sql = $con->prepare('Insert into categorias (nombre_categoria,activo) VALUES (:nombre_categoria,:activo);');
    $sql->bindParam(':nombre_categoria',$nombre_categoria,PDO::PARAM_STR);
    $sql->bindParam(':activo',$activo,PDO::PARAM_INT);
    $sql->execute();
    header("Location: listCategories.php");
}

//Borrar categoria
if(isset($_GET["delCategoria"])){
    
    $id_cat=$_GET["id"];
    $con = conectar_bd();
    try{    
        $sql = $con->prepare("delete from categorias where id_categoria=".$id_cat);
        $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql->execute();        
        header("Location: listCategories.php");
    }catch(PDOException $e){
        header("Location: listCategories.php?sendError='SI'");
    }
}
/*
if(isset($_GET["delCategoria"])){
    
    $id_cat=$_GET["id"];
    $con = conectar_bd();
    $sql = $con->prepare("select id_categoria from subcategorias where id_categoria=".$id_cat);
    $sql->execute();  
    $reg = $sql->fetchColumn(0);    
    if($reg==null){
    $sql = $con->prepare("delete from categorias where id_categoria=".$id_cat);    
    $sql->execute();
        header("Location: listCategories.php");
    }else{        
        header("Location: listCategories.php?sendError='SI'");
    }
}
*/
//funcion que dibuja y muestra las categorias y subcategorias en la pagina principal
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
            $controlUL=false;
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
    echo '<h3> Mantenimiento de Categorías</h3>';
    echo '<hr class="soft">';
    echo '<div class="well">';
    echo '<a class="shopBtn" href="mtoCategories.php">Nueva Categoria</a>';
    echo '<hr class="soft">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-condensed">';
    echo '<tr class="success">';
    echo "<td><strong>";
    echo "Id Categoría";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Nombre Categoría";
    echo "</strong></td>";
    echo "<td><center><strong>";
    echo "Activado";
    echo "</strong></center></td>";
    echo "<td><center><strong>";
    echo "Acción";
    echo "</strong></center></td>";    
    echo "</tr>";
    
    $con = conectar_bd();
    $sql = $con->prepare('Select * from categorias order by nombre_categoria asc;');
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
        echo "<td><center>";
        echo '<a href="mtoCategories.php?editar=SI&id='.$id.'&categoria='.$nombre_categoria.'&activo='.$activo.'"><span class="icon icon-edit" aria-hidden="true"></span> </a>';        
        echo '<a href="toolsCategories.php?delCategoria=SI&id='.$id.'" onclick="return confirmar()"><span class="icon icon-trash" aria-hidden="true"></span></a>';
        echo "</center></td>";      
        echo "</tr>";
        
    }

    echo "</table>";
    //Muestra mensaje error al no poder borrar categoria
    if(isset($_GET["sendError"])){     
        echo "<p style='color:red;'>La categoría no puede ser borrada ya que tiene asociada alguna subcategoría</p>";
     }
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

?>