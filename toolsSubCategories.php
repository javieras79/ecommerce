<?php
include_once("conectBBDD.php");

//modicar categoria
if(isset($_GET["editarSubCategoria"])){
    
    $idsubcat=$_GET["id"];
    $idcat=$_POST["categoria"];
    $nombre_subcategoria=$_POST["subcategoria"];
    if(isset($_POST["activo"])){
        $activo=1;
    }else{
        $activo=0;
    }
    $con = conectar_bd();
    $sql = $con->prepare('UPDATE subcategorias set id_categoria="'.$idcat.'",nombre_subcategoria="'.$nombre_subcategoria.'",activo="'.$activo.'" where id_subcategoria='.$idsubcat);
    $sql->execute();
    header("Location: listSubCategories.php");
}

//Añadir Subcategoria
if(isset($_GET["addSubCategoria"])){
    
    $nombre_subcategoria=$_POST["subcategoria"];
    $idcat=$_POST["categoria"];
    if(isset($_POST["activo"])){
        $activo=1;
    }else{
        $activo=0;
    }
    $con = conectar_bd();
    $sql = $con->prepare('Insert into subcategorias (id_categoria,nombre_subcategoria,activo) VALUES (:id_categoria,:nombre_categoria,:activo);');
    $sql->bindParam(':id_categoria',$idcat,PDO::PARAM_INT);
    $sql->bindParam(':nombre_categoria',$nombre_categoria,PDO::PARAM_STR);
    $sql->bindParam(':activo',$activo,PDO::PARAM_INT);
    $sql->execute();
    header("Location: listSubCategories.php");
}

//Borrar Subcategoria
if(isset($_GET["delSubCategoria"])){
    
    $idsubcat=$_GET["id"];
    $con = conectar_bd();    
    $sql = $con->prepare("delete from subcategorias where id_subcategoria=".$idsubcat);
    $sql->execute();
        header("Location: listSubCategories.php");
    }

//funcionar que carga tabla de Subcategorias pero del menú de mantenimiento perfil con rol 2
function mtoSubCategories(){
    
    echo '<div class="span12">';
    echo '<h3> Mantenimiento de SubCategorias</h3>';
    echo '<hr class="soft">';
    echo '<div class="well">';
    echo '<a class="shopBtn" href="mtoSubCategories.php">Nueva SubCategoria</a>';
    echo '<hr class="soft">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-condensed">';
    echo '<tr class="success">';
    echo "<td><strong>";
    echo "Categoria Asociada";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Id SubCategoria";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Nombre SubCategoria";
    echo "</strong></td>";
    echo "<td><center><strong>";
    echo "Activado";
    echo "</strong></center></td>";
    echo "<td><center><strong>";
    echo "Accion";
    echo "</strong></center></td>";
    echo "</tr>";
    
    $con = conectar_bd();
    $sql = $con->prepare('Select s.id_subcategoria,s.nombre_subcategoria,s.activo,c.id_categoria,c.nombre_categoria from subcategorias as s 
                          LEFT JOIN categorias as c ON s.id_categoria=c.id_categoria;');
    $sql->execute();
    
    while($datos = $sql->fetch()){
        
        echo "<tr>";
        echo "<td>";
        $idcat = $datos["id_categoria"];
        echo $datos["nombre_categoria"];
        echo "</td>";
        echo "<td>";
        $idsubcat = $datos["id_subcategoria"];
        echo $idsubcat;
        echo "</td>";
        echo "<td>";
        $nombre_subcategoria = $datos["nombre_subcategoria"];
        echo $nombre_subcategoria;
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
        echo '<a href="mtoSubCategories.php?editar=SI&id='.$idsubcat.'&idcat='.$idcat.'&subcategoria='.$nombre_subcategoria.'&activo='.$activo.'"><span class="icon icon-edit" aria-hidden="true"></span> </a>';
        echo '<a href="toolsSubCategories.php?delCategoria=SI&id='.$idsubcat.'"><span class="icon icon-trash" aria-hidden="true"></span></a>';
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