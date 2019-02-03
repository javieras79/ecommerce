<?php
include_once("conectBBDD.php");

//modicar categoria
if(isset($_GET["editarMarca"])){
    
    $id_mar=$_GET["id"];
    $nombre_marca=$_POST["marca"];
    if(isset($_POST["activo"])){
        $activo=1;
    }else{
        $activo=0;
    }
    $con = conectar_bd();
    $sql = $con->prepare('UPDATE marcas set nombre_marca="'.$nombre_marca.'",activo="'.$activo.'" where id_marca='.$id_mar);
    $sql->execute();
    header("Location: listMarcas.php");
}

//Añadir categoria
if(isset($_GET["addMarca"])){
    
    $nombre_marca=$_POST["marca"];
    if(isset($_POST["activo"])){
        $activo=1;
    }else{
        $activo=0;
    }
    $con = conectar_bd();
    $sql = $con->prepare('Insert into marcas (nombre_marca,activo) VALUES (:nombre_marca,:activo);');
    $sql->bindParam(':nombre_marca',$nombre_marca,PDO::PARAM_STR);
    $sql->bindParam(':activo',$activo,PDO::PARAM_INT);
    $sql->execute();
    header("Location: listMarcas.php");
}

//Borrar categoria
if(isset($_GET["delMarca"])){
    
    $id_mar=$_GET["id"];
    $con = conectar_bd();
    $sql = $con->prepare("select id_marca from marcas where id_marca=".$id_mar);
    $sql->execute();
    $reg = $sql->fetchColumn(0);
    if($reg==null){
        $sql = $con->prepare("delete from marcas where id_marca=".$id_mar);
        $sql->execute();
        header("Location: listMarcas.php");
    }else{
        header("Location: listMarcas.php?sendError='SI'");
    }
}


//funcionar que carga tabla de categorias pero del menú de mantenimiento perfil con rol 2
function mtoMarcas(){
    
    echo '<div class="span12">';
    echo '<h3> Mantenimiento de Marcas</h3>';
    echo '<hr class="soft">';
    echo '<div class="well">';
    echo '<a class="shopBtn" href="mtoMarcas.php">Nueva Marca</a>';
    echo '<hr class="soft">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-condensed">';
    echo '<tr class="success">';
    echo "<td><strong>";
    echo "Id Marca";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Nombre Marca";
    echo "</strong></td>";
    echo "<td><center><strong>";
    echo "Activado";
    echo "</strong></center></td>";
    echo "<td><center><strong>";
    echo "Accion";
    echo "</strong></center></td>";
    echo "</tr>";
    
    $con = conectar_bd();
    $sql = $con->prepare('Select * from marcas;');
    $sql->execute();
    
    while($datos = $sql->fetch()){
        
        echo "<tr>";
        echo "<td>";
        $id = $datos["id_marca"];
        echo $id;
        echo "</td>";
        echo "<td>";
        $nombre_marca = $datos["nombre_marca"];
        echo $nombre_marca;
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
        echo '<a href="mtoMarcas.php?editar=SI&id='.$id.'&marca='.$nombre_marca.'&activo='.$activo.'"><span class="icon icon-edit" aria-hidden="true"></span> </a>';
        echo '<a href="toolsMarcas.php?delMarca=SI&id='.$id.'"><span class="icon icon-trash" aria-hidden="true"></span></a>';
        echo "</center></td>";
        echo "</tr>";
        
    }
    
    echo "</table>";
    //Muestra mensaje error al no poder borrar categoria
    if(isset($_GET["sendError"])){
        echo "<p style='color:red;'>La marca no puede ser borrada.</p>";
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

?>