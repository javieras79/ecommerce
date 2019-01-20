<?php 
include_once("conectBBDD.php");
//muestra en el cuerpo la lista de articulos de la categoria seleccionada
function showOrders($user){
 
   $id_user=selUser($user); 
    $con = conectar_bd();        
    $sql = $con->prepare('select p.id_pedido,p.FechaPedido,e.estado from pedido as p
                          INNER JOIN estadopedido as e on p.id_estado=e.id_estado
                           where id_usuario='.$id_user);
    $sql->execute();  
    
    echo '<div class="span12">';
    echo '<h3>Listado de pedidos</h3>';
    echo '<hr class="soft">';
    echo '<div class="well">';    
    echo '<hr class="soft">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-condensed">';
    echo '<tr class="success">';
    echo "<td><strong>";
    echo "Id Pedido";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Fecha";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Estado";
    echo "</strong></td>";
    
    while($rst = $sql->fetch()){
        echo "<tr>";
        echo "<td>";
        $id = $rst["id_pedido"];
        echo $id;
        echo "</td>";
        echo "<td>";
        $fecha = $rst["FechaPedido"];
        echo $fecha;
        echo "</td>";
        echo "<td>";
        $estado = $rst["estado"];
        echo $estado;
        echo "</td>";                
    }
    echo "</tr>";
    echo "</table>";
    
}

//Recoge id usuario logado
function selUser($user){    

    $con=conectar_bd();    
    $sql=$con->prepare("select id_usuario from usuarios where nick='".$user."'");
    $sql->execute();
    $id_user=$sql->fetchColumn(0);
    return $id_user;
}
?>
