<?php
(isset($_GET['vistaDetalle'])) ? include("cabeceraDetalle.php"): include("cabecera.php");
(isset($_GET['vistaDetalle'])) ? : include("menu.php");
include_once("conectBBDD.php");
?>
<?php
(isset($_GET['id_user'])) ? $id_user=$_GET['id_user'] : $id_user="";
if(isset($_SESSION['usr']) && $_SESSION['rol'] == 1 && $_SESSION['id_usr'] == $id_user){
    selDetailOrderUsr();
}else if(isset($_SESSION['usr']) && $_SESSION['rol'] == 2 || $_SESSION['rol'] == 3){
    selDetailOrderAdm();
}else{
    echo "No dispone de permisos para acceder a este detalle.";
}
//Seleccionar detalle para perfil Usr
function selDetailOrderUsr(){
    if(isset($_GET['id_pedido'])){
        $id=$_GET['id_pedido'];
        $con=conectar_bd();
        $sql=$con->prepare('select d.precio,d.iva,d.cantidad,d.id_articulo,a.nombre_articulo from detallepedido as d
                                INNER JOIN articulos a ON d.id_articulo=a.id_articulo where id_pedido='.$id);
        $sql->execute();
        $totalArt=0;
        $total=0;
        echo '<div class="span12">';
        echo '<h3> Detalle de Pedido</h3>';
        echo '<hr class="soft">';
        echo '<div class="well">';
        echo "<p size=15><strong>Número Pedido: ".$id."</strong>";
        echo '<hr class="soft">';
        echo '<div class="table-responsive">';
        echo '<table class="table table-condensed">';
        echo '<tr class="success">';
        echo "<td align='justify'><strong>";
        echo "Id Artículo";
        echo "</strong></td>";
        echo "<td align='justify'><strong>";
        echo "Cantidad";
        echo "</strong></td>";
        echo "<td align='justify'><strong>";
        echo "Nombre";
        echo "</strong></td>";
        echo "<td align='justify'><strong>";
        echo "Precio";
        echo "</strong></td>";
        echo "<td align='justify'><strong>";
        echo "Iva";
        echo "</strong></td>";
        echo "</tr>";
        
        while($rst = $sql->fetch()){
            echo "<tr>";
            echo "<td align='justify'>";
            $id_articulo=$rst["id_articulo"];
            echo $id_articulo;
            echo "</td>";
            echo "<td align='justify'>";
            $cantidad=$rst["cantidad"];
            echo $cantidad;
            echo "</td>";
            echo "<td align='justify'>";
            $nombre_articulo=$rst["nombre_articulo"];
            echo $nombre_articulo;
            echo "</td>";
            echo "<td align='justify'>";
            $precio=$rst["precio"];
            echo $precio;
            echo "</td>";
            echo "<td align='justify'>";
            $iva=$rst["iva"];
            echo $iva;
            echo "</td>";
            echo "</tr>";
            $totalArt=$totalArt+$cantidad;
            $total=$total+$precio;
        }
        
        echo "</table>";
        echo '<table class="table table-condensed">';
        echo '<tr class="success">';
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td align='right'><strong>Total Unidades</strong></td>";
        echo "<td align='right'><strong>".$totalArt."</strong></td>";
        echo "<td align='right'><strong>Total:</strong></td><td align='center'><strong>".$total.".00 euros</strong></td>";
        echo "</tr>";
        if(isset($_GET['vistaDetalle'])){
        }else{
            echo "<tr><td><a class='shopBtn' href='".$_SERVER['HTTP_REFERER']."'>Volver</a></td></tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}
//Seleccionar detalle para perfil ADM
function selDetailOrderAdm(){
    if(isset($_GET['id_pedido'])){
        $id=$_GET['id_pedido'];
        $con=conectar_bd();
        $sql=$con->prepare('select d.precio,d.iva,d.cantidad,d.id_articulo,a.nombre_articulo from detallepedido as d
                                INNER JOIN articulos a ON d.id_articulo=a.id_articulo where id_pedido='.$id);
        $sql->execute();
        $totalArt=0;
        $total=0;
        echo '<div class="span12">';
        echo '<h3> Detalle de Pedido</h3>';
        echo '<hr class="soft">';
        echo '<div class="well">';
        echo "<p size=15><strong>Número Pedido: ".$id."</strong>";
        echo '<hr class="soft">';
        echo '<div class="table-responsive">';
        echo '<table class="table table-condensed">';
        echo '<tr class="success">';
        echo "<td align='justify'><strong>";
        echo "Id Artículo";
        echo "</strong></td>";
        echo "<td align='justify'><strong>";
        echo "Cantidad";
        echo "</strong></td>";
        echo "<td align='justify'><strong>";
        echo "Nombre";
        echo "</strong></td>";
        echo "<td align='justify'><strong>";
        echo "Precio";
        echo "</strong></td>";
        echo "<td align='justify'><strong>";
        echo "Iva";
        echo "</strong></td>";
        echo "</tr>";
        
        while($rst = $sql->fetch()){
            echo "<tr>";
            echo "<td align='justify'>";
            $id_articulo=$rst["id_articulo"];
            echo $id_articulo;
            echo "</td>";
            echo "<td align='justify'>";
            $cantidad=$rst["cantidad"];
            echo $cantidad;
            echo "</td>";
            echo "<td align='justify'>";
            $nombre_articulo=$rst["nombre_articulo"];
            echo $nombre_articulo;
            echo "</td>";
            echo "<td align='justify'>";
            $precio=$rst["precio"];
            echo $precio;
            echo "</td>";
            echo "<td align='justify'>";
            $iva=$rst["iva"];
            echo $iva;
            echo "</td>";
            echo "</tr>";
            $totalArt=$totalArt+$cantidad;
            $total=$total+$precio;
        }
        
        echo "</table>";
        echo '<table class="table table-condensed">';
        echo '<tr class="success">';
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td align='right'><strong>Total Unidades</strong></td>";
        echo "<td align='right'><strong>".$totalArt."</strong></td>";
        echo "<td align='right'><strong>Total:</strong></td><td align='center'><strong>".$total.".00 euros</strong></td>";
        echo "</tr>";
        if(isset($_GET['vistaDetalle'])){
        }else{
            echo "<tr><td><a class='shopBtn' href='".$_SERVER['HTTP_REFERER']."'>Volver</a></td></tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}
?>

<?php
(isset($_GET['vistaDetalle'])) ? : include("pie.php");   
?>