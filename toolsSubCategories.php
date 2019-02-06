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
    $sql = $con->prepare('UPDATE subcategorias set id_categoria='.$idcat.',nombre_subcategoria="'.$nombre_subcategoria.'",activo="'.$activo.'" where id_subcategoria='.$idsubcat);
    $sql->execute();
    header("Location: listSubCategories.php?editConfirm=OK");
}

//A�adir Subcategoria
if(isset($_GET["addSubCategoria"])){
    
    $nombre_subcategoria=$_POST["subcategoria"];
    $idcat=$_POST["categoria"];
    if(isset($_POST["activo"])){
        $activo=1;
    }else{
        $activo=0;
    }
    $con = conectar_bd();
    $sql = $con->prepare('Insert into subcategorias (id_categoria,nombre_subcategoria,activo) VALUES (:id_categoria,:nombre_subcategoria,:activo);');
    $sql->bindParam(':id_categoria',$idcat,PDO::PARAM_INT);
    $sql->bindParam(':nombre_subcategoria',$nombre_subcategoria,PDO::PARAM_STR);
    $sql->bindParam(':activo',$activo,PDO::PARAM_INT);
    $sql->execute();
    header("Location: listSubCategories.php?addConfirm=OK");
}

//Borrar Subcategoria
if(isset($_GET["delSubCategoria"])){
    
    $idsubcat=$_GET["id"];
    try{            
        $con = conectar_bd();          
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("delete from subcategorias where id_subcategoria=:idsubcat");
        $rows=$sql->execute(array(':idsubcat'=>$idsubcat));
        
        if($rows > 0){
            header("Location: listSubCategories.php?delConfirm=OK");
        }
    }catch(PDOException $e){
            header("Location: listSubCategories.php?delFail=OK");
    }
}

//funcionar que carga tabla de Subcategorias pero del men� de mantenimiento perfil con rol 2
function mtoSubCategories(){
    
    echo '<div class="span12">';
    echo '<h3> Mantenimiento de SubCategorías</h3>';
    echo '<hr class="soft">';
    echo '<div class="well">';
    echo '<a class="shopBtn" href="mtoSubCategories.php">Nueva SubCategoria</a>';
    echo '<hr class="soft">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-condensed">';
    echo '<tr class="success">';
    echo "<td><strong>";
    echo "Categoría Asociada";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Id SubCategoría";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Nombre SubCategoría";
    echo "</strong></td>";
    echo "<td><center><strong>";
    echo "Activado";
    echo "</strong></center></td>";
    echo "<td><center><strong>";
    echo "Acción";
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
        echo '<a href="toolsSubCategories.php?delSubCategoria=SI&id='.$idsubcat.'"><span class="icon icon-trash" aria-hidden="true"></span></a>';
        echo "</center></td>";
        echo "</tr>";
        
    }
    
    echo "</table>";
    //Muestra mensaje subcategoria borrada con exito
    if(isset($_GET["delConfirm"])){
        echo "<p style='color:green;'>La Subcategoría ha sido borrada con éxito</p>";
    }
    //Muestra error de borrado en subcategoria 
    if(isset($_GET["delFail"])){
        echo "<p style='color:green;'>La Subcategoría no ha sido borrada. Tiene artículos asociados.</p>";
    }
    //Muestra mensaje subcategoria a�adida con exito
    if(isset($_GET["addConfirm"])){
        echo "<p style='color:green;'>La Subcategoría ha sido dada de alta con éxito</p>";
    }
    //Muestra mensaje subcategoria a�adida con exito
    if(isset($_GET["editConfirm"])){
        echo "<p style='color:green;'>La Subcategoría ha sido modificada con éxito</p>";
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

?>