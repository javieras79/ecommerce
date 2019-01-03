<?php 
include_once("conectBBDD.php");

if (isset($_GET["editar"])) {
    $id=$_GET["id"];
    $nombre_categoria=$_POST["nombre_categoria"];
    $baja=$_POST["baja"];
}

function listCategories(){
       
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
                        echo "Baja";
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
            $baja=$datos["baja"];
            if ($baja==0){
                $chk="";
            }else{
                $chk="checked";
            }
            echo '<input type="checkbox" name="checkbox[]"'. $chk .' disabled>';
        echo '</div>';
    echo "</td>";
    echo "<td>";        
        echo '<a href="addCategories.php?editar=SI&id='.$id.'&categoria='.$nombre_categoria.'&baja='.$baja.'">';
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