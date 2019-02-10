<?php 
include_once("conectBBDD.php");
//muestra en el cuerpo la lista de pedidos con rol 1 para usuario
function showOrders($user){
 
    $id_user=selUser($user); 
    $con = conectar_bd();
    if(isset($_GET['historico'])){
    $sql = $con->prepare('select p.id_pedido,p.FechaPedido,e.estado from pedido as p
                          INNER JOIN estadoPedido as e on p.id_estado=e.id_estado
                          where id_usuario='.$id_user);
    }else{
    $sql = $con->prepare('select p.id_pedido,p.FechaPedido,e.estado from pedido as p
                          INNER JOIN estadoPedido as e on p.id_estado=e.id_estado
                           where e.estado="Abierto" and id_usuario='.$id_user);
    }
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
        echo '<a href="listDetailOrder.php?id_pedido='.$id.'&id_user='.$id_user.'">'.$estado."</a>";        
        echo "</td>";                
    }
    echo "</tr>";
    echo "</table>";
    echo '<table class="table table-condensed">';       
    echo "<tr><td><a class='shopBtn' href='".$_SERVER['HTTP_REFERER']."'>Volver</a></td></tr>";
    echo "</table>";
    
}

//muestra en el cuerpo la lista de pedidos con rol 1 para usuario
function showOrdersAdm($user,$estado){

    $id_user=selUser($user);
    $con = conectar_bd();     
    $sql = $con->prepare('select p.id_pedido,p.FechaPedido,e.estado,u.nick,e.id_estado from pedido as p
                          INNER JOIN estadoPedido as e on p.id_estado=e.id_estado
                          INNER JOIN usuarios as u on p.id_usuario=u.id_usuario where p.id_estado='.$estado.' order by u.nick asc');
    $sql->execute();
    
    echo '<div class="span12">';       
    echo '<div class="table-responsive">';
    echo '<table class="table table-condensed">';
    echo '<tr class="success">';
    echo "<td><strong>";
    echo "Estado Actual";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Usuario";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Id Pedido";
    echo "</strong></td>";    
    echo "<td><strong>";
    echo "Fecha";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Detalle";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Modificar Estado";
    echo "</strong></td>";
    echo "<td><strong>";
    echo "Borrar Pedido";
    echo "</strong></td>";
    echo '<form class="form-horizontal" action="listOrders.php?cambiaEstadoPedido=SI" method="POST" enctype="multipart/form-data">';
    $controla_estado=true;
    $state = array();
    while($rst = $sql->fetch()){
        echo "<tr>";
        echo "<td>";
        echo $rst['estado'];
        echo "</td>";
        echo "<td>";
        $usuario = $rst["nick"];
        echo $usuario;
        echo "</td>";
        echo "<td>";
        $id = $rst["id_pedido"];                        
        echo '<input type="text" name="idpedido" placeholder="idPedido" id="idpedido" value="'.$id.'" readonly="readonly" width="15">';                
        echo "</td>";
        echo "<td>";
        $fecha = $rst["FechaPedido"];
        echo $fecha;
        echo "</td>";
        echo "<td>";
        $estado = $rst["estado"];
        echo '<a href="listDetailOrder.php?id_pedido='.$id.'&id_user='.$id_user.'&vistaDetalle=SI" target="_blank"><span class="btn btn-mini">+</span></a>';
        echo "</td>"; 
        echo "<td>";
        $id_estado= $rst["id_estado"];
        $estado_actual = $rst["estado"];         
        //echo "<select name='estado'>";
        //echo "<option value='".$id_estado."'>$estado_actual</option>";  
        //llama funcion estado para que devuelva los estados con sus ids correspondientes
        $state=selStateOrder($id_estado);
        for($i=0;$i<count($state);$i++){
            $id_estado=$state[$i]['id_estado'];
            $estado=$state[$i]['estado'];
            echo '<a href="listOrders.php?idestado='.$id_estado.'&idpedido='.$id.'&estado='.$estado.'&cambiaEstadoPedido=SI"  onclick="return confirmarEstadoPedido()"><span class="btn btn-mini">'.$estado.'</span></a>';                       
        }                               
        echo "</td>";   
        echo "<td>";
        $estado = $rst["id_pedido"];
        echo '<center><a href="toolsOrders.php?id_pedido='.$id.'&delOrder=SI onclick="return confirmarBorraOrder()"><span class="icon icon-trash" aria-hidden="true"></span></a></center>';
        echo "</td>"; 
    }
    echo "</tr>";
    echo "</table>";
    echo '<table class="table table-condensed">';    
    echo "</table>";
    echo '</form>';
    
}

//Borra pedido y lineas
if(isset($_GET['delOrder'])){
    
    $id=$_GET['id_pedido'];
    try{
        $con=conectar_bd();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql=$con->prepare('delete from detallepedido where id_pedido='.$id);
        $row1=$sql->execute();
        $sql=$con->prepare('delete from pedido where id_pedido='.$id);
        $row2=$sql->execute();
        if($row1 > 0 && $row2 > 0){
            header("Location: listOrders.php?borra=ok");
        }
    }catch(PDOException $e){
            //echo $e;
            header("Location: listOrders.php?borrano=ok");
    }    
}

//recoge estados pedido
function selStateOrder($id_estado){
    $con = conectar_bd();
    $sql = $con->prepare('select id_estado,estado from estadoPedido where id_estado!='.$id_estado);
    $sql->execute();
    $state=$sql->fetchall();    
    return $state;
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
