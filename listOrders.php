<?php
include("cabecera.php");
include("menu.php");
include_once("toolsOrders.php");
?>
		<?php
		if(isset($_SESSION['usr']) && $_SESSION['rol'] == 1){
		    $user=$_SESSION['usr'];
		    showOrders($user);
		    //comprueba si el rol es ADM o Mto. para entrar en el menu de cambios de estado Pedidos
		}else if(isset($_SESSION['usr']) && $_SESSION['rol'] == 2 || $_SESSION['rol'] == 3){
		    //modifica el estado del pedido
		    if(isset($_GET['cambiaEstadoPedido'])){
		        $id_pedido=$_GET['idpedido'];
		        $mIdEstado=$_GET['idestado'];
		        $nombre_estado=$_GET['estado'];
		        $con = conectar_bd();
		        $sql = $con->prepare('update pedido set id_estado="'.$mIdEstado.'" where id_pedido='.$id_pedido);
		        $sql->execute();
		        echo "<p style='color:green;'>El ID: ".$id_pedido." de pedido ha sido modificado a estado ".$nombre_estado."</p>";
		    }
		    $con = conectar_bd();
		    $sql = $con->prepare('select id_estado,estado from estadoPedido');
		    $sql->execute();
		    echo '<form class="form-horizontal" action="listOrders.php?filtraEstado=SI" method="POST" enctype="multipart/form-data">';
		    echo '<div class="span12">';
		    echo '<h3>Gestión de pedidos </h3>';
		    echo '<hr class="soft">';		    
		    echo '<div class="table-responsive">';
		    echo '<table class="table table-condensed">';
		    echo '<tr class="success">';
		    echo "<td><strong>";
		    echo "Estado";
		    echo "</strong></td>";
		    echo "<td><strong>";
		    echo "<select name='estado'>";
		    echo "<option value=''></option>";
		    while($rst = $sql->fetch()){
		    $estado=$rst['estado'];
		    $id_estado=$rst['id_estado'];		    
		    echo "<option value='".$id_estado."'>$estado</option>";
		    }
		    echo "</strong></td>";
		    echo "<td><strong>";
		    echo '<input type="submit" name="submitEstado" value="Consultar" class="exclusive shopBtn">';		    
		    echo "</strong></td>";
		    echo "</tr>";
		    echo "</table>";
		    
		    echo "</div>";
		    echo "</div>";
		    echo "</form>";
		    if(isset($_GET['filtraEstado'])){		        
		        $user=$_SESSION['usr'];
		        $id_estado=$_POST['estado'];
		        if($id_estado!=""){
		          showOrdersAdm($user,$id_estado);
		        }else{
		          echo "<p style='color:orange;'>Debes filtrar por estado</p>";  
		        }
		    }		    
		}else{
		    echo "No dispones de permisos para acceder a este menú.";
		}
           
        ?>
<?php
    include("pie.php");
?>